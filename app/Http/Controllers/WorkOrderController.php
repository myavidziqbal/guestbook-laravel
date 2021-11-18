<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function workorder(){
        $data = WorkOrder::all();
        
        return view('datawo',compact('data'));
    }

    public function tambahwo(){
        return view('tambahwo');
    }

    public function insertwo(Request $request){
        
        WorkOrder::create($request->all());
        return redirect()->route('workorder')->with('success','Data Berhasil Di input');
    }

    public function tampilwo($id){
        $data = WorkOrder::find($id);
        // dd($data);
        return view('tampilwo', compact('data'));
    }

    public function updatewo(Request $request, $id){
        $data = WorkOrder::find($id);
        $data->update($request->all());

        return redirect()->route('workorder')->with('success','Data Berhasil Di update');
    }
    public function selesaiwo(Request $request, $id){
        $data = WorkOrder::find($id);
        if($data) {
            $data->status = 0 ;
            $data->save();
        }

        return redirect()->route('workorder')->with('success','Data Berhasil Di update');
    }
}
