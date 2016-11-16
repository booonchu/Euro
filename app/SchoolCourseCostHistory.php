<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolCourseCostHistory extends Model
{
    protected $table='school_course_cost_history';
   	protected $fillable=['id ',
						'school_courses_id',
						'effective_date',
						'cost',
						'created_by',
						];
    /**
    * Get the created user associated with the record.
    */
    public function getCreatedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
