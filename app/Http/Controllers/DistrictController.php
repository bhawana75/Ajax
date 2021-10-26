<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DistrictController;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['districts']= District::all();
        $data['districts'] = DB::table('districts')
        ->join('provinces', 'provinces.id', '=', 'districts.province_id')
        ->get();
        // $data['locallevels']= Locallevel::all();
         
        return view('district.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province=Province::all();
        return view('district.create',compact('province'));
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
            'districtname' => 'required',
            'province_id'  => 'required',
        ]);
        $district = new District;
        $district->districtname = $request->districtname;
        $district->province_id = $request->province_id;
        $district->save();
        return redirect()->route('district.index')
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
        return view('district.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     return view('employee.edit');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'districtname' => 'required',
    //         'province_id'  => 'required',
    //     ]);
    //         $district = District::find($id);
    //         $district->districtname = $request->districtname;
    //         $district->province_id = $request->province_id;
    //         $district->save();
    //         return redirect()->route('employee.index')
    //         ->with('success','employee Has Been updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $user = District::find($name);
    //     $user->delete();
    //     return redirect()->route('employee.index')
    //     ->with('success',' has been deleted successfully');
    // }
}
