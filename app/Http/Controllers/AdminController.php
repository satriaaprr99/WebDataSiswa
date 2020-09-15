<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

    	if($request->has('cari')){
    		$siswa = \App\Models\siswa::where('nis', 'LIKE','%'.$request->cari.'%')->get();
    	}else if($request->has('cari')){
    		$siswa = \App\Models\siswa::where('nama', 'LIKE','%'.$request->cari.'%')->get();
    	}else{
    		$siswa = \App\Models\siswa::all()->sortBy('nis');
    	}
    	return view('admin', ['siswa' => $siswa]);
    }

    public function tambah(Request $request){

    	\App\Models\siswa::create($request->all());
    	return redirect('/admin')->with('sukses', 'Data Berhasil Ditambah');

    }

    public function edit($id){
    	$siswa = \App\Models\siswa::find($id);
    	return view('/edit', ['siswa' => $siswa]);
    	
    }

    public function update(Request $request, $id){
    	$siswa = \App\Models\siswa::find($id);
    	$siswa->update($request->all());
    	return redirect('/admin')->with('sukses', 'Data Berhasil Diedit');
    }

    public function hapus(Request $request, $id){

    	$delete = \App\Models\siswa::find($id);
    	$status = $delete->delete();
    	return redirect('/admin')->with('sukses', 'Data Berhasil Dihapus');
    }

}
