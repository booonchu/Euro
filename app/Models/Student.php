<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Student extends Model
{
	use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'students';
	protected $primaryKey = 'id';
	public $timestamps = false;
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
		'referrer_name',
		'referrer_phone',
		'description',
	];
	// protected $hidden = [];
    // protected $dates = [];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	public function getSubscriptionLink() {
        return '<a href="studentsubscription/create">เพิ่ม</a> | <a href="studentsubscription">รายละเอียด</a>';
    }
	
	public function getClassLink() {
        return '<a href="studentsubscription">รายละเอียด</a>';
    }
	
	public function getPaymentLink() {
        return '<a href="studentsubscription/create">เพิ่ม</a> | <a href="studentsubscription">รายละเอียด</a>';
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
	
	public function getAge() {
		return '<span>16</span>';
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