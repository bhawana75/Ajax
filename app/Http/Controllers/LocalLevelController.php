<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Locallevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LocalLevelController;

class LocalLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['locallevels'] = DB::table('locallevels')
        ->join('districts', 'districts.id', '=', 'locallevels.district_id')
        ->join('provinces', 'provinces.id', '=', 'locallevels.province_id')
        ->get();
        return view('locallevel.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province=Province::all();
        $district=District::all();
        return view('locallevel.create',compact('district','province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'locallevelname' => 'required',
            'province_id'  => 'required',
            'district_id' => 'required',
        ]);
        $locallevel = new Locallevel;
        $locallevel->locallevelname = $request->locallevelname;
        $locallevel->province_id = $request->province_id;
        $locallevel->district_id= $request->district_id;
        $locallevel->save();
        return redirect()->route('locallevel.index')
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
        return view('locallevel.show');
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
    public function destroy($id)
    {
        //
    }
}
