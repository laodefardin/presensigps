<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $query = Karyawan::query();
        $query->select('karyawan.*' , 'nama_dept');
        $query->join('departemen','karyawan.kode_dept','=','departemen.kode_dept');
        $query->orderBy('nama_lengkap');
        if (!empty($request->nama_karyawan)){
            $query->where('nama_lengkap','LIKE','%' . $request->nama_karyawan . '%');
        }
        if (!empty($request->kode_dept)){
            $query->where('karyawan.kode_dept', $request->kode_dept);
        }
        $karyawan = $query->paginate(10);
         
        // $karyawan = DB::table('karyawan')->orderBy('nama_lengkap')
        //             ->join('departemen','karyawan.kode_dept','=','departemen.kode_dept')
        //             ->paginate(2);
        
        $departemen = DB::table('departemen')->get();
        return view('karyawan.index', compact('karyawan','departemen'));
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $nama_lengkap = $request->nama_lengkap;
        $jabatan = $request->jabatan;
        $no_hp = $request->no_hp;
        $kode_dept = $request->kode_dept;
        $password = Hash::make('karyawan123');
        // $karyawan = DB::table('karyawan')->where('email', $email)->first();

        // cek apakah email sudah ada di database
        $existingKaryawan = DB::table('karyawan')->where('email', $request->email)->first();
        if ($existingKaryawan) {
            return redirect()->back()->with('warning', 'Data Gagal Disimpan. Email ' . $request->email . ' sudah ada didalam database');
        }

        // Jika ada file foto yang diunggah, atur nama file baru
        if($request->hasFile('foto')){
            $foto = $email . ".". time() . "." . $request->file('foto')->getClientOriginalExtension();
        }else{
            $foto = ""; 
        }

        try {
            $data = [
                'email' => $email,
                'nama_lengkap' => $nama_lengkap,
                'jabatan' => $jabatan,
                'no_hp' => $no_hp,
                'kode_dept' => $kode_dept,
                'foto' => $foto,
                'password' => $password,
            ];
            $simpan = DB::table('karyawan')->insert($data);
            if ($simpan){
                if($request->hasFile('foto')){
                    $folderPath = "public/upload/karyawan/";
                    $request->file('foto')->storeAs($folderPath, $foto); 
                }
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            // dd($e);
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan: '] . $e->getMessage());
        }
    }

    public function edit(Request $request){
        $id = $request->id;
        $departemen = DB::table('departemen')->get();
        $karyawan = DB::table('karyawan')->where('id', $id)->first();
        return view('/karyawan.edit', compact('departemen', 'karyawan'));
    }

    public function update($id, Request $request){
        $id = $request->id;
        $email = $request->email;
        $nama_lengkap = $request->nama_lengkap;
        $jabatan = $request->jabatan;
        $no_hp = $request->no_hp;
        $kode_dept = $request->kode_dept;
        $password = Hash::make('karyawan123');
        $old_foto = $request->old_foto;
         
        if($request->hasFile('foto')){
            $foto = $email . ".". time() . "." . $request->file('foto')->getClientOriginalExtension();
        }else{
            $foto = $old_foto;
        }
        // dd($foto);

        try {
            $data = [
                'email' => $email,
                'nama_lengkap' => $nama_lengkap,
                'jabatan' => $jabatan,
                'no_hp' => $no_hp,
                'kode_dept' => $kode_dept,
                'foto' => $foto,
                'password' => $password,
            ];
            $update = DB::table('karyawan')->where('id', $id)->update($data);
            if ($update){
                if($request->hasFile('foto')){
                    $folderPath = "public/upload/karyawan/";
                    $folderPathOld = "public/upload/karyawan/" . $old_foto;
                    Storage::delete($folderPathOld);
                    $request->file('foto')->storeAs($folderPath, $foto); 
                }
                return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            }
        } catch (\Exception $e) {
            // dd($e);
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($id){
        $delete = DB::table('karyawan')->where('id', $id)->delete();
        if ($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil DiHapus']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagal DiHapus']);
        }
    }
}
