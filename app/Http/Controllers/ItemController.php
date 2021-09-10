<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function barang(){

        $data = Item::all();
        return view('databarang', compact('data'));
    
    }

    public function tambahbarang(){
        return view('tambahbarang');
    }

    public function insertbarang(Request $request){
        
        Item::create($request->all());
    }
}
