<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\unitkerja;

class UnitKerjaController extends Controller
{
    public function allUnit()
    {
        $data['UnitAll'] = unitkerja::paginate(54);
        return view('Unit.all')->with($data);
    }
    
    public function addUnit()
    {
        $data['UnitKerja'] = unitkerja::all();
        
        return view('Unit.add')->with($data);
    }
    
    public function saveUnit(Request $r)
    {
        // $data['UnitKerja'] = unitkerja::find($id_unit);
        
        $new             = new unitkerja;
        $new->aa         = $r->input('unitkerja');
        $new->unit_kerja = $r->input('kantor');
        
        $new->save();
        
        return redirect()->route('allUnit');
    }
    
    public function editUnit($id_unit)
    {
        $data['editunit'] = unitkerja::where('id_unit', $id_unit)->first();
        
        return view('Unit.edit')->with($data);
    }
    
    public function updateUnit(Request $r)
    {
        $editunit = unitkerja::find($r->input('id_unit'));
        
        $editunit->aa         = $r->input('namacabang');
        $editunit->unit_kerja = $r->input('unitkerja');
        
        $editunit->save();
        return redirect()->route('allUnit');
    }
}