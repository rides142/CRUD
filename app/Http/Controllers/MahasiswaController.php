<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{

    public function home(){
        return view ('home')->with('user',Auth::user());
    }

    public function create(Request $request)
    {
        try {
            $data = DB::table('mahasiswa')->insert([
                    "nama" => $request->nama,
                    "nim" => $request->nim,
                    "prodi" => $request->prodi,
                    "hobby" => $request->hobby,
                    "alamat" => $request->alamat,
                    "foto" => $request->foto,]);
                    if ($data) {
                        // Jika penyisipan berhasil, tangani pengunggahan file
                        if ($request->hasFile('foto')) {
                            $request->file('foto')->move('fotomhs/', $request->file('foto')->getClientOriginalName());
                            // Perbarui kolom "foto" dengan nama file
                            DB::table('mahasiswa')
                                ->where('nim', $request->nim) // Anggap "nim" adalah pengidentifikasi unik
                                ->update(['foto' => $request->file('foto')->getClientOriginalName()]);
                        }
                    }

            return redirect('/datamahasiswa')->with(
                'alert',
                'Data Berhasil Diinput'
            );
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->width('alert', 'gagal update data');
        }
    }
    public function inputform(?int $nim = null)
    {
        if($nim){
            $mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first();
            return view('input-form', ['mahasiswa' => $mahasiswa]);
        }
        return view('input-form', ['mahasiswa' => null]);
    }
    public function read()
    {
        $mahasiswa = DB::table('mahasiswa')->get();
        return view('datamahasiswa', ['mahasiswa' => $mahasiswa]);
    }
    public function delete($nim){
        DB::table('mahasiswa')->where('nim', $nim)->delete();
        return redirect('/datamahasiswa')->with(
            'alert',
            'Data Berhasil Dihapus'
        );
    }
    public function update(Request $request, $nim){
        try {
      // Mendapatkan nama file foto sebelum pembaruan
        $oldFoto = DB::table('mahasiswa')->where('nim', $nim)->value('foto');

            // Update data dalam database
            $updated = DB::table('mahasiswa')
                ->where('nim', $nim) // Anggap "nim" adalah pengidentifikasi unik
                ->update([
                    "nama" => $request->nama,
                    "prodi" => $request->prodi,
                    "hobby" => $request->hobby,
                    "alamat" => $request->alamat,
                    "foto" => $request->foto,
                ]);

            if ($updated) {
                // Jika pembaruan berhasil, tangani pengunggahan file
                if ($request->hasFile('foto')) {
                    // Hapus foto lama jika ada
                    if (!empty($oldFoto)) {
                        $oldFotoPath = public_path('fotomhs/') . $oldFoto;
                        if (file_exists($oldFotoPath)) {
                            unlink($oldFotoPath);
                        }
                    }
                if ($request->hasFile('foto')) {
                    $request->file('foto')->move('fotomhs/', $request->file('foto')->getClientOriginalName());
                    // Perbarui kolom "foto" dengan nama file
                    DB::table('mahasiswa')
                        ->where('nim', $nim) // Anggap "nim" adalah pengidentifikasi unik
                        ->update(['foto' => $request->file('foto')->getClientOriginalName()]);
                }

                return redirect('/datamahasiswa')->with(
                    'alert',
                    'Data Berhasil Diperbarui'
                );
            }
        } else {
                return redirect()->back()->with('alert', 'Gagal update data');
            }
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('alert', 'Gagal update data');
        }
    }
}
