<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\ProvinceController;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['provinces']= Province::all();
        return view('province.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('province.create');
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
            'provincename' => 'required',
           
        ]);
        $province = new Province;
        $province->provincename = $request->provincename;
        $province->save();
        return redirect()->route('province.index')
        ->with('success','Created successfully');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('province.show');
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
    //         'provincename' => 'required',
    //     ]);
    //         $province = Province::find($id);
    //         $province->provincename = $request->provincename;
    //         $province->save();
    //         return redirect()->route('employee.index')
    //         ->with('success','employee Has Been updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($name)
    // {
    //     $user = Province::find($name);
    //     $user->delete();
    //     return redirect()->route('employee.index')
    //     ->with('success',' has been deleted successfully');
    // }
}
