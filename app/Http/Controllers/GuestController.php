<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Guest;
use App\Exports\TamuExport;
use App\Imports\TamuImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuestController extends Controller
{
    public function index(Request $request){

        if ($request->has('search')){
            $data = Guest::where('nama','LIKE','%'.$request->search.'%')->paginate(5);
        } else {
            $data = Guest::paginate(5);
        }
    
        
        return view('datatamu', compact('data'));
    
    }

    public function tambahtamu(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        
        // dd($request->all());
        $data = Guest::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fototamu/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('tamu')->with('success','Data Berhasil Di input');
    }

    public function tampildata($id){
        $data = Guest::find($id);
        // dd($data);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id) {
        $data = Guest::find($id);
        $data->update($request->all());

        return redirect()->route('tamu')->with('success','Data Berhasil di update');

    }

    public function delete($id){
        $data = Guest::find($id);
        $data->delete();
        return redirect()->route('tamu')->with('success','Data Berhasil di hapus');

    }

    public function exportpdf(){

        $data = Guest::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('datatamu-pdf');
        return $pdf->download('data_tamu.pdf');
    }

    public function exportexcel(){
        return Excel::download(new TamuExport, 'data_tamu.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('GuestData', $namafile);

        Excel::import(new TamuImport, \public_path('/GuestData/'. $namafile));
        return \redirect()->back();
    }
}
