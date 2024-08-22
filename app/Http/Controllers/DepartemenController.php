<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DepartemenController extends Controller
{
    public function index(Request $request){
        $nama_dept = $request->nama_dept;
        $query = Departemen::query();
        $query->select('*');
        if(!empty($nama_dept)){
             $query->where('nama_dept' , 'like', '%' . $nama_dept . '%');
        }
        $departemen = $query->get();
        // $departemen = DB::table('departemen')->orderBy('kode_dept')->get();
        return view('departemen.index', compact('departemen'));
    }
    public function store(Request $request)
    {
        $kode_dept = $request->kode_dept;
        $nama_dept = $request->nama_dept;
        $data = [
            'kode_dept' => $kode_dept,
            'nama_dept' => $nama_dept,
        ];

        $simpan = DB::table('departemen')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $departemen = DB::table('departemen')->where('id', $id)->first();
        return view('departemen.edit', compact('departemen'));
    }

    public function update($id, Request $request)
    {
        $kode_dept = $request->kode_dept;
        $nama_dept = $request->nama_dept;
        $data = [
            'kode_dept' => $kode_dept,
            'nama_dept' => $nama_dept,
        ];

        $update =  DB::table('departemen')->where('id', $id)->update($data);
        if($update){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function delete($id)
    {
        $delete = DB::table('departemen')->where('id', $id)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil DiHapus']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagal DiHapus']);
        }
    }
}
