<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StudentSubscriptionClassRequest as StoreRequest;
use App\Http\Requests\StudentSubscriptionClassRequest as UpdateRequest;

class StudentSubscriptionClassCrudController extends CrudController {

	public function setUp() {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\StudentSubscriptionClass");
        $this->crud->setRoute("admin/studentsubscriptionclass");
        $this->crud->setEntityNameStrings('คาบเรียน', 'คาบเรียน');

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
				'label' => "วันที่เรียน",
				'type' => 'date_picker',
			   'date_picker_options' => [
				  'todayBtn' => true,
				  'format' => 'dd-mm-yyyy',
				  'language' => 'en'
			   ],
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

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);
        $this->crud->addColumn(
			[
			   'name' => 'id', 
			   'label' => "ครั้งที่",
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'start_date', 
			   'label' => "วันที่เรียน",
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "อาจารย์",
			   'type' => "select",
			   'name' => 'teacher_id',
			   'entity' => 'teacher', 
			   'attribute' => "firstname",
			   'model' => "App\Models\Teacher", 
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "ห้องเรียน",
			   'type' => "select",
			   'name' => 'room_id',
			   'entity' => 'room', 
			   'attribute' => "name",
			   'model' => "App\Models\Room", 
			]
		);

        $this->crud->addColumn(
			[
				'name' => 'is_paid', 
				'label' => 'สถานะชำระ',
				'type' => 'boolean',
				'options' => [0 => '', 1 => 'ชำระ']
			]
		);
			
        $this->crud->addColumn(
			[
				'name' => 'is_moved', 
				'label' => 'สถานะเลื่อน',
				'type' => 'boolean',
				'options' => [0 => '', 1 => 'เลื่อน']
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
		$this->crud->addButton('top', 'studentsubscriptionclass', 'view', 'vendor/backpack/crud/buttons/studentsubscriptionclass', 'beginning');
		
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
