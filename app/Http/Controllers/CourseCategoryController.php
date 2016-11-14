<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseCategory;
use Illuminate\Support\Facades\Auth;
use Prologue\Alerts\Facades\Alert;
class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = CourseCategory::all();
        return view('coursecategories.index')
                ->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $record = new CourseCategory();
            //$record->status = '';
            //$record->updated_by = Auth::id();;//Need to find from Session
            $record->id = 0;
            //$record->branch_id->readonly = 'false';

        return view('coursecategories.edit')
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
        $record = new CourseCategory();
        $record->name = $request->name;
        $record->description = $request->description;
        $record->listorder = $request->listorder;
        //$record->status = 'ACTIVE'; This field are in defualt value
        
        $record->created_by = Auth::id();
        $record->updated_by = Auth::id();
        $record->save();

        //Prevent user twice click()
        $request->session()->regenerateToken();
        Alert::success('New record added successfully')->flash();
            //$request->session()->flash('flash_message','New record added successfully');
        return redirect()->route('coursecategories.index');
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
        $record = CourseCategory::find($id);

        return view('coursecategories.edit')
                    ->with('record',$record)
                    ->with('mode','U');//Sent mode 'U' as Edit mode.
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
        $record = CourseCategory::find($id); 
        $record->listorder = $request->listorder;
        $record->name = $request->name;
        $record->description = $request->description;
        $record->updated_by = Auth::id();//Need to find from Session
        $record->save();
        Alert::success('Data updated successfully!')->flash();

        //$request->session()->flash('flash_message', 'Data updated successfully!');
        return redirect()->route('coursecategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = CourseCategory::find($id); 
        if ($record->status === 'ACTIVE') {
            $record->status = 'INACTIVE';
        }
        else{
            $record->status = 'ACTIVE';
        }
        $record->save();
        Alert::success('Data updated successfully!')->flash();
        return redirect()->route('coursecategories.index');
    }
}
