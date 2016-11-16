<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\School;
use App\User;
use App\Course;
use App\SchoolCourse;
use App\SchoolCourseCostHistory;
use Carbon\Carbon;
class SchoolCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolid = Input::get('id', 0);
        if($schoolid === 0) return 'Invalid Argument';

        $schoolrecord = School::find($schoolid);
        $course_lists = Course::getListForSchool($schoolid);
        return view('schoolcourses.index')
                ->with('record',$schoolrecord)
                ->with('course_lists',$course_lists);
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
            $record = new SchoolCourse();
            $record->school_id = $request->school_id;
            $record->course_id = $request->course_id;
            $record->created_by = Auth::id();
            $record->updated_by = Auth::id();//Need to find from Session
            $record->save();

            $recordCost = new SchoolCourseCostHistory();
            $recordCost->school_courses_id = $record->id;
            $recordCost->cost = $request->cost;
            $recordCost->effective_date = Carbon::today();//A
            $recordCost->created_by = Auth::id();
            $recordCost->save();

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
        $record = SchoolCourse::find($id); 
        if ($record->status === config('constants.STATUS_ACTIVE')) {
            $record->status = config('constants.STATUS_IN_ACTIVE');
        }
        else{
            $record->status = config('constants.STATUS_ACTIVE');
        }
        $record->save();
        Alert::success('Data updated successfully!')->flash();
        return redirect()->back();
    }
}
