<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = School::all();
        return view('schools.index')
                ->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $record = new School();
            $record->usercode = '';
            $record->name = '';
            $record->contact_email = '';
            $record->contact_phone = '';
            $record->address = '';
            $record->description = '';
            $record->status = '';
            $record->lastupdatedby = 1;//Need to find from Session
            $record->id = 0;
            //$record->branch_id->readonly = 'false';

        return view('schools.edit')
                    ->with('record',$record)
                    ->with('mode','I');//Sent mode 'U' as Edit mode.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new create();
            $record->usercode = $request->usercode;
            $record->name = $request->name;
            $record->contact_email = $request->contact_email;
            $record->contact_phone = $request->contact_phone;
            $record->address = $request->address;
            $record->description = $request->description;
            $record->status = $request->status;
            $record->lastupdatedby = 1;//Need to find from Session

            $record->save();
            Alert::success('New record added successfully')->flash();
            //$request->session()->flash('flash_message','New record added successfully');
        return redirect()->route('rooms.index');
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
    public function destroy($id)
    {
        //
    }
}
