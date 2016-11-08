<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class School extends Model
{
	use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'schools';
	protected $primaryKey = 'id';
	public $timestamps = false;
	// protected $guarded = ['id'];
	 protected $fillable = [
		'usercode',
		'name',
		'contact_email',
		'contact_phone',
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
	public function getLoyaltyFeeLink() {
        return '<span>ปัจจุบัน: 5</span> | <a href="schoolloyaltyfeehistory?school_id='. $this->id .'">รายละเอียด</a>';
    }
	
	public function getCourseLink() {
        return '<a href="schoolcourse/create?school_id='. $this->id .'">เพิ่ม</a> | <a href="schoolcourse?school_id='. $this->id .'">รายละเอียด</a>';
    }
	
	public function getStatus() {
		if($this->status == 'ACTIVE')
			return '<span>ใช้งาน</span>';
		else
			return '<span>ยกเลิก</span>';
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
