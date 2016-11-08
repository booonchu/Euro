<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SchoolCourseRequest as StoreRequest;
use App\Http\Requests\SchoolCourseRequest as UpdateRequest;

class SchoolCourseCrudController extends CrudController {

	public function setUp() {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\SchoolCourse");
        $this->crud->setRoute("admin/schoolcourse");
        $this->crud->setEntityNameStrings('วิชาเปิดสอน', 'วิชาเปิดสอน');

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
			   'entity' => 'courses',
			   'attribute' => 'name', 
			   'model' => "App\Models\Course" 
			]);
		
		$this->crud->addField(
			[
				'name' => 'cost',
				'type' => 'custom_html',
				'value' => '<label>ราคาเรียกเก็บ</label>
								<div class="input-group">
									<input type="text" class="form-control">
									<span class="input-group-addon">฿</span>
								</div>'
			]);
		
		$this->crud->addField(
			[
				'name' => 'saleprice',
				'type' => 'custom_html',
				'value' => '<label>ราคาเสนอขาย</label>
								<div class="input-group">
									<input type="text" class="form-control">
									<span class="input-group-addon">฿</span>
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
			   'label' => "ราคาเรียกเก็บ",
			   'type' => "model_function",
			   'function_name' => 'getCostLink', 
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "ราคาเสนอขาย",
			   'type' => "model_function",
			   'function_name' => 'getSalepriceLink', 
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
		$this->crud->addButton('top', 'school', 'view', 'vendor/backpack/crud/buttons/school', 'beginning');
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
