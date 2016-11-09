<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class StudentSubscriptionPayment extends Model
{
	use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'student_subscription_payments';
	protected $primaryKey = 'id';
	public $timestamps = false;
	// protected $guarded = ['id'];
	protected $fillable = [
		'student_subscription_id',
		'ref1',
		'ref2',
		'payment_date',
		'comment',
	];
	// protected $hidden = [];
    // protected $dates = [];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	public function getTotalClass() {
        return '<span>800</span>';
    }
	
	public function getTotalClasswithDiscount() {
        return '<span>600</span>';
    }
	
	public function getPrint() {
        return '<a href="#"><i class="fa fa-fw fa-print"></i> พิมพ์</a>';
    }
	
	
	public function getStatus() {
		if($this->status == 'HELD')
			return '<span>ปกติ</span>';
		else
			return '<span>ยกเลิก</span> | <a id="popover"  href="#" data-container="body"  data-toggle="popover"data-placement="left" data-html="true" data-content="<strong>วันที่ยกเลิก: </strong> 11/11/2559<br><strong>เหตุผล: </strong> กรอกส่วนลดไม่ถูกต้อง">รายละเอียด</a>';
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
