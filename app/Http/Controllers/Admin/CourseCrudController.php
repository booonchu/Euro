<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CourseRequest as StoreRequest;
use App\Http\Requests\CourseRequest as UpdateRequest;

class CourseCrudController extends CrudController {

	public function setUp() {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Course");
        $this->crud->setRoute("admin/course");
        $this->crud->setEntityNameStrings('วิชา', 'วิชา');

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
				'name' => 'usercode',
				'label' => "รหัส",
				'type' => 'text',
			]);
		
		$this->crud->addField(
			[
				'name' => 'name',
				'label' => "ชื่อ",
				'type' => 'text',
			]);
		
		$this->crud->addField(
			[ 
			   'label' => "กลุ่มวิชา",
			   'type' => 'select',
			   'name' => 'course_category_id', 
			   'entity' => 'course_categories',
			   'attribute' => 'name', 
			   'model' => "App\Models\CourseCategory" 
			]);
		
		$this->crud->addField(
			[
				'name' => 'total_classes',
				'label' => "จำนวนคาบ",
				'type' => 'text',
			]);
		
		$this->crud->addField(
			[ 
				'name' => 'class_hours',
				'label' => "ชั่งโมงเรียน",
				'type' => 'select_from_array',
				'options' => ['30' => '30 นาที', '60' => '60 นาที', '90' => '90 นาที', '120' => '120 นาที'],
				'allows_null' => false
			]);
		
		$this->crud->addField(
			[
				'name' => 'standard_cost',
				'label' => "ราคาเรียกเก็บมาตรฐาน",
				'type' => 'text',
				'suffix' => "฿",
			]);
			
		$this->crud->addField(
			[
				'name' => 'standard_saleprice',
				'label' => "ราคาเสนอขายมาตรฐาน",
				'type' => 'text',
				'suffix' => "฿",
			]);
		
		$this->crud->addField(
			[
				'name' => 'is_non_kawaii',
				'label' => 'ประเภท', 
				'type' => 'radio',
				'options' => [
									0 => "Kawaii",
									1 => "Non Kawaii"
								],
				'inline' => true,
			]);
		
		$this->crud->addField(
			[
				'name' => 'description',
				'label' => "รายละเอียด",
				'type' => 'textarea',
			]);
		
		$this->crud->addField(
			[
				'name' => 'listorder',
				'label' => "ลำดับ",
				'type' => 'text',
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
			   'name' => 'usercode', 
			   'label' => "รหัส",
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'name', 
			   'label' => "ชื่อ",
			]
		);
		
        $this->crud->addColumn(
			[
			   'label' => "กลุ่มวิชา",
			   'type' => "select",
			   'name' => 'course_category_id',
			   'entity' => 'course_categories', 
			   'attribute' => "name",
			   'model' => "App\Models\CourseCategory", 
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'total_classes', 
			   'label' => "จำนวนคาบ",
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'class_hours', 
			   'label' => "ชั่งโมงเรียน",
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'standard_cost', 
			   'label' => "ราคาเรียกเก็บมาตรฐาน",
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'standard_saleprice', 
			   'label' => "ราคาเสนอขายมาตรฐาน",
			]
		);
		
        $this->crud->addColumn(
			[
				'name' => 'is_non_kawaii', 
				'label' => 'ประเภท',
				'type' => 'boolean',
				'options' => [0 => 'Kawaii', 1 => 'Non Kawaii']
			]
		);
		
        $this->crud->addColumn(
			[
			   'name' => 'listorder', 
			   'label' => "ลำดับ",
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
