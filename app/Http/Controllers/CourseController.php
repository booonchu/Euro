<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseDataRequest;
use App\Course;
use App\CourseCategory;
use Illuminate\Support\Facades\Auth;
use Prologue\Alerts\Facades\Alert;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Course::all();
        return view('courses.index')
                ->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $record = new Course();
        //$record->id = 0;
        $record->total_classes = 1;
        $record->class_hours = 1;
        $record->is_non_kawai = 0;
        $record->standard_cost = 100;
        $record->standard_saleprice = 0;

        $course_category_lists = CourseCategory::getActiveList();
        return view('courses.edit')
                    ->with('record',$record)
                    ->with('course_category_lists', CourseCategory::getActiveList())
                    ->with('mode','I');//Sent mode 'U' as Edit mode.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseDataRequest $request)
    {
        $record = new Course();
        $record->course_category_id = $request->course_category_id;
        $record->usercode = $request->usercode;
        $record->name = $request->name;
        $record->total_classes = $request->total_classes;
        $record->class_hours = $request->class_hours;
        $record->is_non_kawai = $request->is_non_kawai;
        $record->standard_cost = $request->standard_cost;
        $record->standard_saleprice = $request->standard_saleprice;
        $record->description = $request->description;
        $record->listorder = $request->listorder;
        
        $record->created_by = Auth::id();
        $record->updated_by = Auth::id();
        $record->save();

        //Prevent user twice click()
        $request->session()->regenerateToken();
        Alert::success('New record added successfully')->flash();
            //$request->session()->flash('flash_message','New record added successfully');
        return redirect()->route('courses.index');
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
        $record = Course::find($id);
        return view('courses.edit')
                    ->with('record',$record)
                    ->with('course_category_lists', CourseCategory::getListForEdit($record->course_category_id))
                    ->with('mode','U');//Sent mode 'U' as Edit mode.
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseDataRequest $request, $id)
    {
        $record = Course::find($id); 

        $record->course_category_id = $request->course_category_id;
        $record->usercode = $request->usercode;
        $record->name = $request->name;
        $record->total_classes = $request->total_classes;
        $record->class_hours = $request->class_hours;
        $record->is_non_kawai = $request->is_non_kawai;
        $record->standard_cost = $request->standard_cost;
        $record->standard_saleprice = $request->standard_saleprice;
        $record->description = $request->description;
        $record->listorder = $request->listorder;

        $record->updated_by = Auth::id();//Need to find from Session
        $record->save();
        Alert::success('Data updated successfully!')->flash();

        //$request->session()->flash('flash_message', 'Data updated successfully!');
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Course::find($id); 
        if ($record->status === config('constants.STATUS_ACTIVE')) {
            $record->status = config('constants.STATUS_IN_ACTIVE');
        }
        else{
            $record->status = config('constants.STATUS_ACTIVE');
        }
        $record->save();
        Alert::success('Data updated successfully!')->flash();
        return redirect()->route('courses.index');
    }
}
