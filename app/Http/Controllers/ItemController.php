<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function barang(Request $request){

        if ($request->has('search')){
            $data = Item::where('nama','LIKE','%'.$request->search.'%')->paginate(5);
        } else {
            $data = Item::paginate(15);
        }

        // $data = Item::paginate(5);
        return view('databarang', compact('data'));
    
    }

    public function tambahbarang(){
        return view('tambahbarang');
    }

    public function insertbarang(Request $request){
        
        Item::create($request->all());
        return redirect()->route('databarang')->with('success','Data Berhasil Di input');
    }

    public function tampilbarang($id){
        $data = Item::find($id);
        // dd($data);
        return view('tampilbarang', compact('data'));
    }

    public function updatebarang(Request $request, $id){
        $data = Item::find($id);
        $data->update($request->all());

        return redirect()->route('databarang')->with('success','Data Berhasil Di update');
    }

    public function deletebarang($id){
        $data = Item::find($id);
        $data->delete();

        return redirect()->route('databarang')->with('success','Data Berhasil Di delete');
    }
}
