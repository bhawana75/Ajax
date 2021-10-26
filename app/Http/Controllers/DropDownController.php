<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Dropdown;
use App\Models\Province;
use App\Models\Locallevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DropDownController;

class DropDownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['dropdowns'] = DB::table('dropdowns')
        ->select('dropdowns.id', 'districts.districtname','provinces.provincename','locallevels.locallevelname')
        ->join('districts', 'districts.id', '=', 'dropdowns.district_id')
        ->join('provinces', 'provinces.id', '=', 'dropdowns.province_id')
        ->join('locallevels', 'locallevels.id', '=', 'dropdowns.locallevel_id')
        
        ->get();
        // dd($data);
        return view('dropdown.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces=Province::all();
        $district=District::all();
        $locallevel=Locallevel::all();
        return view('dropdown.dropdown', compact('district','provinces','locallevel'));
    }
    public function getDistrict(Request $request)
    {
        $district = DB::table('districts')
            ->where("province_id",$request->province_id)
            ->pluck("districtname","id");
            return response()->json($district);
    }
    public function getLocalLevel(Request $request)
    {
        $locallevel = DB::table('locallevels')
            ->where("district_id",$request->district_id)
            ->pluck("locallevelname","id");
            return response()->json($locallevel);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->request);
        $request->validate([ 
            'locallevel_id' => 'required',
            'province_id'  => 'required',
            'district_id' => 'required',
        ]);
        $dropdown = new Dropdown;
        $dropdown->locallevel_id = $request->locallevel_id;
        $dropdown->province_id = $request->province_id;
        $dropdown->district_id= $request->district_id;
        $dropdown->save();

        return redirect()->route('dropdown.index')
        ->with('success','Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dropdown $dropdown)
    {
        // dd('ok');
        $dropdown->delete();
        return redirect()->route('dropdown.index')
        ->with('success','has been deleted successfully');
    }
}
