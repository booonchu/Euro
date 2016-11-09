<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StudentSubscriptionRequest as StoreRequest;
use App\Http\Requests\StudentSubscriptionRequest as UpdateRequest;

class StudentSubscriptionCrudController extends CrudController {

	public function setUp() {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\StudentSubscription");
        $this->crud->setRoute("admin/studentsubscription");
        $this->crud->setEntityNameStrings('การลงทะเบียน', 'การลงทะเบียน');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

		// $this->crud->setFromDb();

		// ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');
		$this->crud->addField(
			[ 
			   'label' => "วิชา",
			   'type' => 'select',
			   'name' => 'course_id', 
			   'entity' => 'course',
			   'attribute' => 'name', 
			   'model' => "App\Models\Course" 
			]);

		$this->crud->addField(
			[
				'name' => 'main_teacher_id',
				'type' => 'custom_html',
				'value' => '<label>อาจารย์ </label> <a href="https://almsaeedstudio.com/themes/AdminLTE/pages/calendar.html" >&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-calendar"> </i>ตารางสอน</a>
								<select class="form-control">
									<option>บรรจบ สมบัติ</option>
							  </select>'
							  
			]);
			
		$this->crud->addField(
			[
				'name' => 'main_room_id',
				'type' => 'custom_html',
				'value' => '<label>ห้องเรียน</label> <a href="https://almsaeedstudio.com/themes/AdminLTE/pages/calendar.html" ><i class="fa fa-fw fa-calendar"></i>ตารางสอน</a>
								<select class="form-control">
									<option>เปียโน 1</option>
									<option>เปียโน 2</option>
									<option>ทั่วไป</option>
							  </select>'
			]);
			
		$this->crud->addField(
			[
				'name' => 'start_date',
				'label' => "วันที่เริ่มเรียน",
				'type' => 'date_picker',
			   'date_picker_options' => [
				  'todayBtn' => true,
				  'format' => 'dd-mm-yyyy',
				  'language' => 'en'
			   ],
			]);
			
		$this->crud->addField(
			[
				'name'        => 'day',
				'label'       => 'วันเรียน', 
				'type'        => 'radio',
				'options'     => [ 
									'MON' => "จันทร์",
									'TUE' => "อังคาร",
									'WED' => "พูธ",
									'THU' => "พฤหัส",
									'FRI' => "ศุกร์",
									'SAT' => "เสาร์",
									'SUN' => "อาทิตย์",
								],
				'inline'      => true,
			]);
			
		$this->crud->addField(
			[
				'name' => 'start_time',
				'type' => 'custom_html',
				'value' => '<label>เวลาเรียน</label>
								<div class="input-group">
								<input id="timepicker1" type="text" class="form-control timepicker">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
							</div>'
			]);

		$this->crud->addField(
			[
				'name' => 'btnVerfy',
				'type' => 'custom_html',
				'value' => '<div class="col-md-4 col-md-offset-4"><button id="btnVerfy"  type="button" class="btn btn-block btn-primary btn-lg" onclick="showClass()">ตรวจสอบ</button></div>'
			]);
			
		$this->crud->addField(
			[
				'name' => 'tbClass',
				'type' => 'custom_html',
				'value' => '<table id="tbClass" class="table table-bordered">
								<tbody>
								<tr>
								  <th>ครั้งที่</th>
								  <th>วันที่</th>
								</tr>
								<tr>
								  <td>1</td>
								  <td>12/11/2559</td>
								</tr>
								<tr>
								  <td>2</td>
								  <td>19/11/2559</td>
								</tr>
								<tr>
								  <td>3</td>
								  <td>26/11/2559</td>
								</tr>
								<tr>
								<tr>
								  <td>4</td>
								  <td>3/12/2559</td>
								</tr>
								</tr>
							  </tbody>
							  </table>'
			]);
			
        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);
        $this->crud->addColumn(
			[
			   'name' => 'ref', 
			   'label' => "เลขที่ลงทะเบียน",
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "วิชา",
			   'type' => "select",
			   'name' => 'course_id',
			   'entity' => 'courses', 
			   'attribute' => "name",
			   'model' => "App\Models\Course", 
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "อาจารย์",
			   'type' => "select",
			   'name' => 'main_teacher_id',
			   'entity' => 'teacher', 
			   'attribute' => "firstname",
			   'model' => "App\Models\Teacher", 
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "ห้องเรียน",
			   'type' => "select",
			   'name' => 'main_room_id',
			   'entity' => 'room', 
			   'attribute' => "name",
			   'model' => "App\Models\Room", 
			]
		);
		
		
        $this->crud->addColumn(
			[
			   'label' => "วันที่เรียน", 
			   'type' => "model_function",
			   'function_name' => 'getDay', 
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'start_time', 
			   'label' => "เวลาเรียน",
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "คาบเรียน",
			   'type' => "model_function",
			   'function_name' => 'getClassLink', 
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "การชำระเงิน",
			   'type' => "model_function",
			   'function_name' => 'getPaymentLink', 
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "สถานะ", 
			   'type' => "model_function",
			   'function_name' => 'getStatus', 
			]
		);
		
        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
		$this->crud->addButton('top', 'studentsubscription', 'view', 'vendor/backpack/crud/buttons/studentsubscription', 'beginning');
		$this->crud->removeButton('update');
		
        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();
        
        
        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}
