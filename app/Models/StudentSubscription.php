<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class StudentSubscription extends Model
{
	use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'student_subscriptions';
	protected $primaryKey = 'id';
	public $timestamps = false;
	// protected $guarded = ['id'];
	protected $fillable = [
		'student_id',
		'course_id',
		'registration_date',
		'main_teacher_id',
		'main_room_id',
		'day',
		'start_time',
		'cost',
		'saleprice',
		'discount',
		'comment',
	];
	// protected $hidden = [];
    // protected $dates = [];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	public function courses() {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
	
	public function teacher() {
        return $this->belongsTo('App\Models\Teacher', 'main_teacher_id');
    }
	
	public function room() {
        return $this->belongsTo('App\Models\Room', 'main_room_id');
    }
	
	public function getDay() {
		if($this->day == 'MON')
			return '<span>จันทร์</span>';
		else if($this->day == 'TUE')
			return '<span>อังคาร</span>';
		else if($this->day == 'WED')
			return '<span>พูธ</span>';
		else if($this->day == 'THU')
			return '<span>พฤหัส</span>';
		else if($this->day == 'FRI')
			return '<span>ศุกร์</span>';
		else if($this->day == 'SAT')
			return '<span>เสาร์</span>';
		else if($this->day == 'SUN')
			return '<span>อาทิตย์</span>';
    }
	
	public function getStatus() {
		if($this->status == 'HELD')
			return '<span>ปกติ</span>';
		else if($this->status == 'COMPLETED')
			return '<span>สิ้นสุด</span>';
		else
			return '<span>ยกเลิก</span> | <a id="popover"  href="#" data-container="body"  data-toggle="popover"data-placement="left" data-html="true" data-content="<strong>วันที่ยกเลิก: </strong> 11/11/2559<br><strong>เหตุผล: </strong> เปลี่ยนวันเรียน">รายละเอียด</a>';
    }
	
	public function getClassLink() {
        return '<a href="studentsubscriptionclass">รายละเอียด</a>';
    }
	
	public function getPaymentLink() {
		if($this->status == 'HELD')
			return '<a href="studentsubscriptionpayment/create">เพิ่ม</a> | <a href="studentsubscriptionpayment" >รายละเอียด</a>';
		else
			return '<a href="studentsubscriptionpayment">รายละเอียด</a>';
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
