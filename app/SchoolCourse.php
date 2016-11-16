<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolCourse extends Model
{
    protected $table='school_courses';
   	protected $fillable=['id',
						'school_id',
						'course_id',
						'status',
						'updated_by',
                        'created_by',
						];

	/**
     * Get Course record
     */
    public function getCourse()
    {
        return $this->belongsTo('App\Course','course_id');
    }

    /**
     * Get current Cost of Course
     */
    public function getCurrentCost()
    {
        $record = $this->SchoolCourseCostCurrent;
        if (is_null($record)) {
            return 0;
        }
        return $record->cost;
    }

    /**
     * Get a current SchoolCourseCostHistory Record
     */
    public function SchoolCourseCostCurrent() 
    {
        return  $this->hasOne('App\SchoolCourseCostHistory','school_courses_id')->whereDate('effective_date', '<=', date('Y-m-d'))->orderBy('effective_date', 'desc')->orderBy('created_at','desc');//->loyalty_fee;//$this->hasOne('App\SchoolLoyaltyFeeHistory','school_id')->whereDate('effective_date', '<=', date('Y-m-d'))->orderBy('effective_date', 'desc');
    }

    /**
     * Get all SchoolCourseCostHistory Record
     */
    public function SchoolCourseCostHistory()
    {
        return $this->hasMany('App\SchoolCourseCostHistory','school_courses_id')->orderBy('effective_date', 'desc');//->whereNotNull('school_id');
    }
}
