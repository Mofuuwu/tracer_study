<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Kuisioner;
use Illuminate\Http\Request;
use App\Models\PilihanJawaban;
use App\Models\JawabanMahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\RiwayatPengisianKuisioner;

class KuisionerController extends Controller
{
    public function tambah_kuisioner(Request $request)
    {
        Kuisioner::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'dibuka_pada' => $request->dibuka_pada,
            'ditutup_pada' => $request->ditutup_pada,
        ]);
        return redirect()->back()->with('success', 'Kuisioner Telah Berhasil Dibuat');
    }

    public function hapus_kuisioner($id)
    {
        DB::beginTransaction(); 
        try {
            $kuisioner = Kuisioner::findOrFail($id);
            $soal = Soal::where('kuisioner_id', $id)->get();
            foreach ($soal as $s) {
                if ($s->tipe == 'pilihan_ganda') {
                    PilihanJawaban::where('soal_id', $s->id)->delete();
                }
                $s->delete();
            }
            $kuisioner->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Kuisioner Berhasil Dihapus!');
        } catch (\Exception $e) {
            DB::rollBack(); 
            return redirect()->back()->with('error', 'Gagal menghapus kuisioner! ' . $e->getMessage());
        }
    }

    public function kelola_isi_kuisioner($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $soal = Soal::where('kuisioner_id', $id)->with('pilihan_jawaban')->get();
        return view('admin.kuisioner.edit-kuisioner', compact('kuisioner', 'soal'));
    }

    public function update_isi_kuisioner(Request $request, $id)
    {
        $request->validate([
            'soal.*' => 'required|string',
            'tipe_soal.*' => 'required|in:isian,pilihan_ganda',
        ]);
        $kuisioner = Kuisioner::findOrFail($id);
        if ($request->has('soal')) {
            foreach ($request->soal as $index => $pertanyaan) {
                $soal = Soal::create([
                    'kuisioner_id' => $kuisioner->id,
                    'pertanyaan' => $pertanyaan,
                    'tipe' => $request->tipe_soal[$index],
                ]);
                if ($request->tipe_soal[$index] === 'pilihan_ganda' && isset($request->pilihan[$index])) {
                    foreach ($request->pilihan[$index] as $pilihan) {
                        $soal->pilihan_jawaban()->create([
                            'opsi' => $pilihan,
                        ]);
                    }
                }
            }
        }
        return redirect()->back()->with('success', 'Kuisioner berhasil diperbarui.');
    }

    public function update_header_kuisioner(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'dibuka_pada' => 'required|date',
            'ditutup_pada' => 'nullable|date|after_or_equal:dibuka_pada',
        ]);
        $kuisioner = Kuisioner::findOrFail($id);
        $kuisioner->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'dibuka_pada' => $request->dibuka_pada,
            'ditutup_pada' => $request->ditutup_pada,
        ]);
        return redirect()->back()->with('success', 'Kuisioner berhasil diperbarui.');
    }

    public function hapus_soal($id, $soal_id)
    {
        DB::beginTransaction();
        try {
            $soal = Soal::where('kuisioner_id', $id)->where('id', $soal_id)->first();
            if (!$soal) {
                return back()->with('error', 'Soal tidak ditemukan!');
            }
            if ($soal->tipe == 'pilihan_ganda') {
                PilihanJawaban::where('soal_id', $soal_id)->delete();
            }
            $soal->delete();
            DB::commit();
            return back()->with('success', 'Soal berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus soal! ' . $e->getMessage());
        }
    }

    public function submit_kuisioner(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kuisioner_id' => 'required|exists:kuisioner,id',
            'jawaban' => 'required|array',
        ]);
        DB::beginTransaction();
        try {
            $mahasiswaId = $request->user_id;
            $kuisionerId = $request->kuisioner_id;
            RiwayatPengisianKuisioner::create([
                'mahasiswa_id' => $mahasiswaId,
                'kuisioner_id' => $kuisionerId,
            ]);
            foreach ($request->jawaban as $soalId => $jawaban) {
                $isPilihanGanda = is_numeric($jawaban); 
                JawabanMahasiswa::create([
                    'kuisioner_id' => $kuisionerId,
                    'soal_id' => $soalId,
                    'mahasiswa_id' => $mahasiswaId,
                    'pilihan_id' => $isPilihanGanda ? $jawaban : null,
                    'jawaban_isian' => $isPilihanGanda ? null : $jawaban,
                ]);
            }
            DB::commit();
            return redirect()->route('user.kuisioner')->with('success', 'Kuisioner berhasil disubmit!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }

    public function lihat_jawaban($id) {
        $kuisioner = Kuisioner::with('soal.pilihan_jawaban')->findOrFail($id);
        $jawabanUser = JawabanMahasiswa::where('mahasiswa_id', Auth::id()) // Ganti user_id ke mahasiswa_id
                            ->where('kuisioner_id', $id)
                            ->get()
                            ->mapWithKeys(function ($item) {
                                return [
                                    $item->soal_id => $item->pilihan_id ?? $item->jawaban_isian ?? 'Belum dijawab'
                                ];
                            });
        return view('user.kuisioner.lihat-jawaban', compact('kuisioner', 'jawabanUser'));
    }
    
    public function lihat_statistik($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $total_responden = RiwayatPengisianKuisioner::where('kuisioner_id', $id)
            ->distinct('mahasiswa_id')
            ->count();
        $pilihan_ganda = Soal::where('kuisioner_id', $id)
            ->where('tipe', 'pilihan_ganda')
            ->with('pilihan_jawaban')
            ->get();
        $statistik_pilihan = [];
        foreach ($pilihan_ganda as $pertanyaan) {
            $data_opsi = [];
            foreach ($pertanyaan->pilihan_jawaban as $opsi) {
                $jumlah_pilih = JawabanMahasiswa::where('soal_id', $pertanyaan->id)
                    ->where('pilihan_id', $opsi->id)
                    ->count();
                $data_opsi[] = [
                    'teks' => $opsi->opsi,
                    'jumlah' => $jumlah_pilih
                ];
            }
            $statistik_pilihan[] = [
                'pertanyaan' => $pertanyaan->pertanyaan,
                'opsi' => $data_opsi
            ];
        }
        $jawaban_isian = Soal::where('kuisioner_id', $id)
            ->where('tipe', 'isian')
            ->with('jawaban_mahasiswa')
            ->get();
        return view('admin.kuisioner.view-statistik', compact(
            'kuisioner',
            'total_responden',
            'statistik_pilihan',
            'jawaban_isian'
        ));
    }
    
}
