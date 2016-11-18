<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Teacher extends Model
{
	use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'teachers';
	protected $primaryKey = 'id';
	// public $timestamps = false;
	// protected $guarded = ['id'];
	protected $fillable = [
		'school_id',
		'usercode',
		'firstname',
		'lastname',
		'id_card',
		'birth_date',
		'sex',
		'email',
		'phone',
		'address',
		'description',
	];
	// protected $hidden = [];
    // protected $dates = [];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	public function school() {
        return $this->belongsTo('App\Models\School', 'school_id');
    }
	
	public function getTimetable() {
        return '<a href="https://almsaeedstudio.com/themes/AdminLTE/pages/calendar.html">รายละเอียด</a>';
    }
	
	public function getCourseLink() {
        return '<a href="teachercourse/create">เพิ่ม</a> | <a href="teachercourse">รายละเอียด</a>';
    }
	
	public function getStatus() {
		if($this->status == 'ACTIVE')
			return '<span>ใช้งาน</span>';
		else
			return '<span>ยกเลิก</span>';
    }
	
	public function getSex() {
		if($this->sex == 'MALE')
			return '<span>ชาย</span>';
		else
			return '<span>หญิง</span>';
    }
	
	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
