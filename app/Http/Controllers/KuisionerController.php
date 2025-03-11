<?php

namespace App\Http\Controllers;

use App\Models\PilihanJawaban;
use App\Models\Soal;
use App\Models\Kuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KuisionerController extends Controller
{
    public function tambah_kuisioner (Request $request) {
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
    DB::beginTransaction(); // Memulai transaksi

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
        DB::rollBack(); // Batalkan semua perubahan jika terjadi error
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

    public function update_header_kuisioner(Request $request, $id) {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'dibuka_pada' => 'required|date',
            'ditutup_pada' => 'nullable|date|after_or_equal:dibuka_pada',
        ]);
    
        // Ambil data kuisioner berdasarkan ID
        $kuisioner = Kuisioner::findOrFail($id);
    
        // Update data
        $kuisioner->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'dibuka_pada' => $request->dibuka_pada,
            'ditutup_pada' => $request->ditutup_pada,
        ]);
    
        return redirect()->back()->with('success', 'Kuisioner berhasil diperbarui.');
    }

    public function hapus_soal($id, $soal_id) {
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
    
}
