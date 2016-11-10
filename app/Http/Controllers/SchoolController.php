<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\User;
use App\SchoolLoyaltyFeeHistory;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
            //$record->status = '';
            //$record->updated_by = Auth::id();;//Need to find from Session
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
        $record = new School();
        $record->usercode = $request->usercode;
        $record->name = $request->name;
        $record->contact_email = $request->contact_email;
        $record->contact_phone = $request->contact_phone;
        $record->address = $request->address;
        $record->description = $request->description;
        //$record->status = 'ACTIVE'; This field are in defualt value
        
        $record->created_by = Auth::id();
        $record->updated_by = Auth::id();
        $record->save();

        $feerecord = new SchoolLoyaltyFeeHistory();
        $feerecord->school_id = $record->id;
        $feerecord->effective_date = Carbon::today();//A
        $feerecord->loyalty_fee = $request->loyalty_fee;
        $feerecord->created_by = Auth::id();
        $feerecord->updated_by = Auth::id();
        $feerecord->save();

        //Prevent user twice click()
        $request->session()->regenerateToken();
        Alert::success('New record added successfully')->flash();
            //$request->session()->flash('flash_message','New record added successfully');
        return redirect()->route('schools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //This function don't use for test
        $record = School::find($id);
        return dd($record->getSystemAuditHistory());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the aliens record of given id
        $record = School::find($id);

        //Prepare Record History
        /*$recordHistory = new RecordHistory();
        $recordHistory->user = $record->getLastUpdateBy->name;//User::where('id',$record->updated_by)->first()->name;
        $recordHistory->action = 'Update';
        $recordHistory->date = $record ->updated_at;*/

        return view('schools.edit')
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
        $record = School::find($id); 
        $record->usercode = $request->usercode;
        $record->name = $request->name;
        $record->contact_email = $request->contact_email;
        $record->contact_phone = $request->contact_phone;
        $record->address = $request->address;
        $record->description = $request->description;
        $record->updated_by = Auth::id();//Need to find from Session
        $record->save();
        Alert::success('Data updated successfully!')->flash();

        //$request->session()->flash('flash_message', 'Data updated successfully!');
        return redirect()->route('schools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = School::find($id); 
        if ($record->status === 'ACTIVE') {
            $record->status = 'INACTIVE';
        }
        else{
            $record->status = 'ACTIVE';
        }
        $record->save();
        Alert::success('Data updated successfully!')->flash();
        return redirect()->route('schools.index');
    }
}
