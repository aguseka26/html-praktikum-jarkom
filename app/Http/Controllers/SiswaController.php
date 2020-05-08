<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = \App\Siswa::all();
        return view('siswa.index',['data_siswa'=> $data_siswa]);
    }

    public function create(Request $request)
    {
         //memasukan data kedalam database dengan memanggil model yang diikuti static fungsi create
        \App\Siswa::create($request->all());
        return redirect('/siswa');
    }

    public function edit($id)
    {
        $siswa = \App\siswa::find($id);
        return view('siswa/edit',['siswa' => $siswa]);
    }
    public function update(Request $request,$id)
    {
        $siswa = \App\siswa::find($id);
        $siswa->update($request->all());
        return redirect('/siswa')->with('succes','Data Berhasil Di Update');
    }
    public function delete($id)
    {
        $siswa = \App\siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('success','Data Berhasil Di hapus');
    }


}
