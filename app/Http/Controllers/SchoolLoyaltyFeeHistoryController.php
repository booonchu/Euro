<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolLoyaltyFeeHistory;
use App\School;
use App\User;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SchoolLoyaltyFeeHistoryController extends Controller
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

        return view('schoolloyaltyfee.index')->with('record',$schoolrecord);
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
        $record = new SchoolLoyaltyFeeHistory();
            $record->school_id = $request->school_id;
            $record->effective_date = $request->effective_date;
            $record->loyalty_fee = $request->loyalty_fee;
            $record->created_by = Auth::id();
            $record->updated_by = Auth::id();//Need to find from Session
            $record->save();
            $request->session()->regenerateToken();
            Alert::success('New record added successfully')->flash();
            return redirect()->back();
        //return redirect()->route('schoolloyaltyfeehistory.index',['id'=>$request->school_id]);
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
        $record = SchoolLoyaltyFeeHistory::find($id);
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
