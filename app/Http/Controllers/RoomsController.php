<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Room;
use App\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomDataRequest;
use TCPDF;
use Illuminate\Http\Response;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Input;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get orderby parameters
        $sort = Input::get('sortcolumn', 'name');
        $type = Input::get('sorttype', 'asc');

        $records = Room::orderBy($sort, $type)->paginate(10);

        $records->appends(['sortcolumn' => $sort,
                           'sorttype'=> $type,]) ->render();

        return view('editRoom')
            ->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RoomDataRequest $request, $id)
    {
        $Record = new Room();
        $Record->branch_id = $request->get('branch_id');
        $Record->name = $request->get('name');
        $Record->capacity = $request->get('capacity');
        $Record->save();
        Alert::success('New record added successfully')->flash();
        return redirect()->back()->with('alerts', Alert::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomDataRequest $request, $id)
    {

            $record = Room::find($id); 
            $record->branch_id = $request->get('branch_id');
            $record->name = $request->get('name');
            $record->capacity = $request->get('capacity');
            $record->save();
            Alert::success('Data updated successfully!')->flash();
            //Alert::add('error', 'Error message');
            //return view('alerts');
            //Alert::success('You have successfully logged in')->flash();
            //$request->session()->flash('flash_message', 'Data updated successfully!');
        return redirect()->back()->with('alerts', Alert::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id<>0) {
            $record = Room::find($id);
            $branch_lists = Branch::where('id',$record->branch_id)->pluck('name', 'id');
        }
        else
        {
            $record = new Room();
            $record->branch_id = '';
            $record->name = '';
            $record->capacity = '';
            $record->id = 0;
            //$record->branch_id->readonly = 'false';
            $branch_lists = Branch::pluck('name', 'id');
        }
        return view('newRoom') 
                    ->with('branch_lists', $branch_lists)
                    ->with('record',$record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomDataRequest $request, $id)
    {
        $record = Room::find($id); 
        $record->branch_id = $request->get('branch_id');
        $record->name = $request->get('name');
        $record->capacity = $request->get('capacity');
        $record->save();
        $request->session()->flash('flash_message', 'Data updated successfully!');
        return redirect()->back();
    }

     public function showNew($id)
     {
        if ($id<>0) {
            $record = Room::find($id);
            //$record->branch_id->readonly = 'true';
        }
        else
        {
            $record = new Room();
            $record->branch_id = '';
            $record->name = '';
            $record->capacity = '';
            $record->id = 0;
            //$record->branch_id->readonly = 'false';
        }
        $branch_lists = Branch::pluck('name', 'id');
        return view('newRoom') 
                    ->with('branch_lists', $branch_lists)
                    ->with('record',$record);
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $record = Room::find($id); 
        $record->delete();
        Alert::success('Record deleted successfully!')->flash();
        //$request->session()->flash('flash_message', 'Record deleted successfully!');
        return redirect()->back()->with('alerts', Alert::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function report($id)
    {
        // find the aliens record of given id
        
        $record = Room::find($id);

        if(count($record)>0){
            
            define('K_TCPDF_EXTERNAL_CONFIG', true);
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
            //$pdf->SetHeaderData(PDF_HEADER_IMAGE, PDF_HEADER_IMAGE_WIDTH);
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM+20);
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);
        
            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }
        
//          $logo=base_url('assets/images/logo.jpg');
        
            // add a page
            $pdf->AddPage();
            $pdf->SetFont( 'angsanaupc' , '', 14, '', true);
            
            $province = "";
            if($record->name!="")
                $province = "จ.".$record->name;
            
            $amount = number_format($record->capacity);
            $amount_text = $this->genTextFromNumber($record->capacity);
            $other = "";
            
            $company_name = $record->name;
            
            $data = file_get_contents(resource_path('\views\template\firstreport.html'));
            $data = str_replace("{doc_no}", '00001',$data);
            $data = str_replace("{company_name}",'Bon Company',$data);
            $data = str_replace("{branch_name}",$record->name,$data);
            $data = str_replace("{branch_add}",$record->name,$data);
            $data = str_replace("{branch_tel}",$record->name,$data);
            $data = str_replace("{branch_fax}",$record->name,$data);
            /*
            $data = str_replace("{stock_out_date}",$stockObj->sale_date,$data);
            $data = str_replace("{cust_name}",$stockObj->cust_fname." ".$stockObj->cust_lname,$data);
            $data = str_replace("{citizen_id}",$stockObj->citizen_id,$data);
            $data = str_replace("{cust_addr}",$stockObj->cust_addr,$data);
            $data = str_replace("{cust_addr_province}",$province,$data);
            $data = str_replace("{cust_tel}",$stockObj->cust_tel,$data);
            $data = str_replace("{brand_name}",$stockObj->brand_name,$data);
            $data = str_replace("{model_name}",$stockObj->model_name,$data);
            $data = str_replace("{cc}",$stockObj->cc,$data);
            $data = str_replace("{engine_no}",$stockObj->engine_no,$data);
            $data = str_replace("{color}",$stockObj->color,$data);
            $data = str_replace("{amount}",$amount,$data);
            $data = str_replace("{amount_text}",$amount_text,$data);
            $data = str_replace("{other}",$other,$data);
            */
            //return $data;
            //return $data;
            $pdf->writeHTML($data, true, false, false, false, '');
        
        
            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $pdf->Output('custinvoice.pdf', 'I');
        
            //============================================================+
            // END OF FILE
            //============================================================+
            
        }
    }
}
