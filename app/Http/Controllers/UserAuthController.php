<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function edit_data_akun(Request $request)
    {
        $user = Auth::user(); 

        $validatedRequest = $request->validate([
            'email' => [
                'email',
                Rule::unique('users')->ignore($user->id), 
            ],
            'password' => ['nullable', 'min:8', 'confirmed'], 
        ]);

        $user->email = $validatedRequest['email'];

        if (!empty($validatedRequest['password'])) { 
            $user->password = bcrypt($validatedRequest['password']);
        }

        $user->save(); 

        return redirect()->back()->with('success', 'Data akun berhasil diperbarui!');
    }

    public function edit_data_mahasiswa(Request $request) {
        $user_id = Auth::user()->id;
        $validatedRequest = $request->validate([
            'email' => [
                'required', 
                'email',
                Rule::unique('mahasiswa')->ignore($user_id), 
            ],
            'nim' => ['required', 'string', 'max:20', Rule::unique('mahasiswa')->ignore($user_id, 'user_id')],
            'nama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tgl_lahir' => ['required', 'date'],
            'angkatan' => ['required', 'integer', 'digits:4'],
            'prodi' => ['required', 'string', 'max:255'],
            'fakultas' => ['required', 'string', 'max:255'],
            'semester' => ['required', 'integer', 'min:1'],
            'status' => ['required', Rule::in(['aktif', 'lulus', 'dropout'])],
            'pekerjaan' => ['required', 'string', 'max:255'],
        ]);    

        DB::beginTransaction();
        try {
            // Update data mahasiswa
            $mahasiswa = Mahasiswa::where('user_id', $user_id)->firstOrFail();
            $mahasiswa->update($validatedRequest);
    
            // Update email user di tabel users
            $user = Auth::user();
            $user->email = $validatedRequest['email'];
            $user->save();
    
            // Commit transaksi jika semuanya berhasil
            DB::commit();
            return redirect()->back()->with('success', 'Data mahasiswa berhasil diperbarui.');
        } catch (\Exception $e) {
            // Rollback jika terjadi error
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }
}
