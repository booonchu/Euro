<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StudentSubscriptionPaymentRequest as StoreRequest;
use App\Http\Requests\StudentSubscriptionPaymentRequest as UpdateRequest;

class StudentSubscriptionPaymentCrudControllerReadonly extends CrudController {

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
				'label' => "เล่มที่",
				'type' => 'text',
				'attributes'  => [
				   'disabled' => 'true'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'ref2',
				'label' => "เลขที่",
				'type' => 'text',
				'attributes'  => [
				   'disabled' => 'true'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'tbClass',
				'type' => 'custom_html',
				'value' => '<label>ครั้งเรียน</label>
								<table id="tbClass2" class="table table-bordered">
								<tbody>
								<tr>
								  <th>ครั้งที่</th>
								  <th>วันที่</th>
								  <th>ราคาขาย</th>
								</tr>
								<tr>
								  <td>1</td>
								  <td>12/11/2559</td>
								  <td>200</td>
								</tr>
								<tr>
								  <td>2</td>
								  <td>19/11/2559</td>
								  <td>200</td>
								</tr>
								<tr>
								  <td>3</td>
								  <td>26/11/2559</td>
								  <td>200</td>
								</tr>
								<tr>
								<tr>
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
				'value' => '<label>รวมราคาขาย</label>
								<div class="input-group">
									<input type="text" class="form-control" disabled value="800.00">
									<span class="input-group-addon">฿</span>
								</div>'
			]);
			
		$this->crud->addField(
			[
				'name' => 'discount',
				'label' => "ส่วนลดค่าเรียน",
				'type' => 'text',
				'suffix' => "%",
				'attributes'  => [
				   'disabled' => 'true',
				   'value' => '10'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'tbOther',
				'type' => 'custom_html',
				'value' => '
								<table id="tbOther" class="table table-bordered">
								<tbody>
								<tr>
								  <th></th>
								  <th>รายการขายอื่นๆ</th>
								  <th>ราคา</th>
								  <th>ส่วนลด (%)</th>
								</tr>
								<tr>
								  <td>1</td>
								  <td>ค่าธรรมเนียมแรกเข้า</td>
								  <td>100.00</td>
								  <td>0</td>
								</tr>
								<tr>
								  <td>2</td>
								  <td>ค่าหนังสือเปียโน เล่ม 1</td>
								  <td>100.00</td>
								  <td>0</td>
								</tr>
							  </tbody>
							  </table>'
			]);
			
		$this->crud->addField(
			[
				'name' => 'fee2',
				'type' => 'custom_html',
				'value' => '<label>รวมราคาขายอื่นๆ</label>
								<div class="input-group">
									<input type="text" class="form-control" disabled value="200.00">
									<span class="input-group-addon">฿</span>
								</div>'
			]);
			
		$this->crud->addField(
			[
				'name' => 'fee3',
				'type' => 'custom_html',
				'value' => '<label>รวมราคาขายสุทธิ</label>
								<div class="input-group">
									<input type="text" class="form-control" disabled value="920.00">
									<span class="input-group-addon">฿</span>
								</div>'
			]);
			
		$this->crud->addField(
			[
				'name'        => 'day',
				'label'       => 'วิธีชำระ', 
				'type'        => 'radio',
				'options'     => [ 
									'CASH' => "เงินสด",
									'CHEQUE' => "เช็คธนาคาร",
									'BANKDISPOSIT' => "สำเนาไบนำฝากธนาคาร",
									'CREDITCARD' => "บัตรเครดิต",
								],
				'inline'      => true,
				'attributes'  => [
				   'disabled' => 'true'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'cheque_bank',
				'label' => "เช็คธนาคาร",
				'type' => 'text',
				'attributes'  => [
				   'id' => 'cheque_bank'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'cheque_branch',
				'label' => "สาขา",
				'type' => 'text',
				'attributes'  => [
				   'id' => 'cheque_branch'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'cheque_no',
				'label' => "เลขที่เช็ค",
				'type' => 'text',
				'attributes'  => [
				   'id' => 'cheque_no'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'cheque_date',
				'label' => "ลงวันที่",
				'type' => 'date_picker',
			   'date_picker_options' => [
				  'todayBtn' => true,
				  'format' => 'dd-mm-yyyy',
				  'language' => 'en'
			   ],
				'attributes'  => [
				   'id' => 'cheque_date'
				 ],
			]);	
			
			
		$this->crud->addField(
			[
				'name' => 'bankdeposit_bank',
				'label' => "สำเนาใบนำฝากธนาคาร",
				'type' => 'text',
				'attributes'  => [
				   'id' => 'bankdeposit_bank'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'bankdeposit_branch',
				'label' => "สาขา",
				'type' => 'text',
				'attributes'  => [
				   'id' => 'bankdeposit_branch'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'bankdeposit_no',
				'label' => "เลขที่บัญชี",
				'type' => 'text',
				'attributes'  => [
				   'id' => 'bankdeposit_no'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'bankdeposit_date',
				'label' => "ลงวันที่",
				'type' => 'date_picker',
			   'date_picker_options' => [
				  'todayBtn' => true,
				  'format' => 'dd-mm-yyyy',
				  'language' => 'en'
			   ],
				'attributes'  => [
				   'id' => 'bankdeposit_date'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'creditcard_issuer',
				'label' => "บัตรเครดิต",
				'type' => 'text',
				'attributes'  => [
				   'id' => 'creditcard_issuer'
				 ],
			]);
			
		$this->crud->addField(
			[
				'name' => 'creditcard_no',
				'label' => "เลขที่",
				'type' => 'text',
				'attributes'  => [
				   'id' => 'creditcard_no'
				 ],
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
			   'label' => "เล่มที่",
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'ref2', 
			   'label' => "เลขที่",
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
			   'label' => "จำนวนครั้งเรียน", 
			   'type' => "model_function",
			   'function_name' => 'getTotalClass', 
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "รวมราคาขาย", 
			   'type' => "model_function",
			   'function_name' => 'getTotalSaleClass', 
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'discount_class', 
			   'label' => "ส่วนลดค่าเรียน (%)",
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "ราคาขายอื่นๆ", 
			   'type' => "model_function",
			   'function_name' => 'getOtherSale', 
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "ราคาขายสุทธิ", 
			   'type' => "model_function",
			   'function_name' => 'getTotalSale', 
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
