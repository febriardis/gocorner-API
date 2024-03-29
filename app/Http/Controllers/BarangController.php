<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;

class BarangController extends Controller
{    
	/**
    * Create a new controller instance.
    *
    * @return void
    */
    
    public function __construct()
    {
        //
    }
	
	public function show($id) {
		$tabel = Barang::where('id', $id)->get();

		return view('show_barang')
		->with('tabel', $tabel);
	}

	public function insert(Request $req){
		$tbKat = Kategori::all();
		$tb = Barang::create($req->all());
		return view('tambah_barang')
		->with('tbKat', $tbKat);
	}

	///////////////////////////////////
	public function showall(){
		$tb = Barang::all();
		return response()->json($tb);
	}
	public function find($id){
		return response()->json(Barang::find($id));
	}
	// public function insert(Request $req){
	// 	$tb = Barang::create($req->all());
	// 	return response()->json('Data Berhasil Disimpan', 200);
	// }
	public function update(Request $req, $id){
		$tb = Barang::findOrFail($id)->update($req->all());
		return response()->json('Data Berhasil Diupdate', 200);
	}
	public function delete($id){
		Barang::findOrFail($id)->delete();
		return response()->json('Data Berhasil Dihapus', 200);
	}
}