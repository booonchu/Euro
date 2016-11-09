<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StudentSubscriptionPaymentRequest as StoreRequest;
use App\Http\Requests\StudentSubscriptionPaymentRequest as UpdateRequest;

class StudentSubscriptionPaymentCrudController extends CrudController {

	public function setUp() {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\StudentSubscriptionPayment");
        $this->crud->setRoute("admin/studentsubscriptionpayment");
        $this->crud->setEntityNameStrings('การชำระเงิน', 'การชำระเงิน');

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
				'name' => 'ref1',
				'label' => "หมายเลขอ้างอิง 1",
				'type' => 'text',
			]);
			
		$this->crud->addField(
			[
				'name' => 'ref2',
				'label' => "หมายเลขอ้างอิง 2",
				'type' => 'text',
			]);
			
		$this->crud->addField(
			[
				'name' => 'tbClass',
				'type' => 'custom_html',
				'value' => '<label>คาบเรียน</label>
								<table id="tbClass2" class="table table-bordered">
								<tbody>
								<tr>
								  <th></th>
								  <th>ครั้งที่</th>
								  <th>วันที่</th>
								  <th>ราคา</th>
								</tr>
								<tr>
								  <td><input type="checkbox"></td>
								  <td>1</td>
								  <td>12/11/2559</td>
								  <td>200</td>
								</tr>
								<tr>
								  <td><input type="checkbox"></td>
								  <td>2</td>
								  <td>19/11/2559</td>
								  <td>200</td>
								</tr>
								<tr>
								  <td><input type="checkbox"></td>
								  <td>3</td>
								  <td>26/11/2559</td>
								  <td>200</td>
								</tr>
								<tr>
								<tr>
								  <td><input type="checkbox"></td>
								  <td>4</td>
								  <td>3/12/2559</td>
								  <td>200</td>
								</tr>
								</tr>
							  </tbody>
							  </table>'
			]);
			
		$this->crud->addField(
			[
				'name' => 'fee',
				'type' => 'custom_html',
				'value' => '<label>รวมราคา</label>
								<div class="input-group">
									<input type="text" class="form-control" disabled value="800.00">
									<span class="input-group-addon">฿</span>
								</div>'
			],
			'create');
			
		$this->crud->addField(
			[
				'name' => 'discount',
				'label' => "ส่วนลด",
				'type' => 'text',
				'suffix' => "฿",
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
			   'name' => 'ref1', 
			   'label' => "หมายเลขอ้างอิง 1",
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'ref2', 
			   'label' => "หมายเลขอ้างอิง 2",
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'created_at', 
			   'label' => "วันที่ทำรายการ",
			]
		);
		
		
        $this->crud->addColumn(
			[
			   'label' => "จำนวนคาบ", 
			   'type' => "model_function",
			   'function_name' => 'getTotalClass', 
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "ราคาขายทั้งหมด", 
			   'type' => "model_function",
			   'function_name' => 'getTotalClass', 
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'discount', 
			   'label' => "ส่วนลด",
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "พิมพ์", 
			   'type' => "model_function",
			   'function_name' => 'getPrint', 
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
