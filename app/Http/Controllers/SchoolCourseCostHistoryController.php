<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\User;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\SchoolCourseCostHistory;
use App\SchoolCourse;
class SchoolCourseCostHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get SchoolCourse Record Id
        $id = Input::get('id', 0);
        $schoolid = Input::get('schoolid', 0);

        if($schoolid === 0 || $id === 0) return 'Invalid Argument';

        $schoolrecord = School::find($schoolid);
        $schoolcourse = SchoolCourse::find($id);

        return view('schoolcoursecost.index')
            ->with('record',$schoolrecord)
            ->with('schoolcourse',$schoolcourse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new SchoolCourseCostHistory();
            $record->school_courses_id = $request->school_courses_id;
            $record->effective_date = $request->effective_date;
            $record->cost = $request->cost;
            $record->created_by = Auth::id();
            $record->save();
            $request->session()->regenerateToken();
            Alert::success('New record added successfully')->flash();
            return redirect()->back();
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
        $record = SchoolCourseCostHistory::find($id);
        //Verify Invalid request?
        if (!is_null($record) && $record->effective_date > \Carbon\Carbon::today()) {
            $record->delete();
            Alert::success('Record deleted successfully!')->flash();
        }
        else{
            Alert::error('Cannot deleted this record!')->flash();
        }

        return redirect()->back();//route('rooms.index');
    }
}
