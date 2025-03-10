<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use Illuminate\Http\Request;

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
    public function kelola_isi_kuisioner($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        return view('admin.kuisioner.edit-kuisioner', compact('kuisioner'));
    }
    public function hapus_kuisioner($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $kuisioner->delete();
        return redirect()->back()->with('success', 'Kuisioner Berhasil Dihapus');
    }
}
