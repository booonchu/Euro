<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\User;
use Prologue\Alerts\Facades\Alert;
use App\RecordHistory;
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
        $record = new School();
            $record->usercode = $request->usercode;
            $record->name = $request->name;
            $record->contact_email = $request->contact_email;
            $record->contact_phone = $request->contact_phone;
            $record->address = $request->address;
            $record->description = $request->description;
            $record->status = 'ACTIVE';
            $record->lastupdatedby = 1;//Need to find from Session
            $record->save();
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
        //
        $record = School::find($id);
        $loyaltyfee = $record->with(['LoyaltyFees' => function ($query) {
                        $query->whereDate('effective_date', '<=', date('Y-m-d'))->orderBy('effective_date', 'desc');
                    }])->first();
        $comments = $record->LoyaltyFees()->whereDate('effective_date', '<=', date('Y-m-d'))->orderBy('effective_date', 'desc')->get();
        return $record->getCurrentLoyaltyFee();
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
        $recordHistory = new RecordHistory();
        $recordHistory->user = $record->getLastUpdateBy->name;//User::where('id',$record->lastupdatedby)->first()->name;
        $recordHistory->action = 'Update';
        $recordHistory->date = $record ->updated_at;

        return view('schools.edit')
                    ->with('record',$record)
                    ->with('histories',$record->getHistories())
                    //->with('histories',$recordHistory)
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
        $record->lastupdatedby = 1;//Need to find from Session
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
