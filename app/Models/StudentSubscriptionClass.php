<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class StudentSubscriptionClass extends Model
{
	use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'student_subscription_classes';
	protected $primaryKey = 'id';
	public $timestamps = false;
	// protected $guarded = ['id'];
	protected $fillable = [
		'school_id',
		'student_subscription_id',
		'teacher_id',
		'room_id',
		'start_date',
		'end_date',
		'is_paid',
		'comment',
	];
	// protected $hidden = [];
    // protected $dates = [];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	public function teacher() {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }
	
	public function room() {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }
	
	public function getStatus() {
		if($this->status == 'HELD')
			return '<span>ปกติ</span>';
		else
			return '<span>ยกเลิก</span> | <a id="popover"  href="#" data-container="body"  data-toggle="popover"data-placement="left" data-html="true" data-content="<strong>วันที่ยกเลิก: </strong> 11/11/2559<br><strong>เหตุผล: </strong> ไปต่างประเทศ">รายละเอียด</a>';
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
