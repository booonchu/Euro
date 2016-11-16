<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Collection;
class Course extends Model
{
   	protected $table='courses';
   	protected $fillable=['id',
						'course_category_id',
						'usercode',
						'name',
						'total_classes',
						'class_hours',
						'is_non_kawai',
						'standard_cost',
						'standard_saleprice',
						'description',
						'status',
						'listorder',
						'updated_by',
                        'created_by',
						];
	/**
    * Get the Course Category.
    */
    public function getCourseType()
    {
    	if($this->is_non_kawai === 1)
    		return trans('view.NONKAWAI');
        return trans('view.KAWAI');
    }

    /**
    * Get Course List for school filter not exists in school_courses and retrive status is active only
    */
    public static function getListForSchool($school_id)
    {
        return Course::
        whereNotIn('id', function($query) use ($school_id) { $query->select('course_id')
                      ->from('school_courses')->where('school_id', '=', $school_id); })
        ->Where('status','=',config('constants.STATUS_ACTIVE'))
        ->pluck('name', 'id');
    }

	/**
    * Get the Course Category.
    */
    public function getCourseCategory()
    {
        return $this->belongsTo('App\CourseCategory', 'course_category_id');
    }

	/**
    * Get the updated user associated.
    */
    public function getLastUpdateBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
    * Get the created user associated.
    */
    public function getCreatedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get System Audit History
     */
    public  function getSystemAuditHistory()
    {
        $c = new Collection;

        $record = new RecordHistory();
        $record->user = $this->getLastUpdateBy->name;
        $record->action = 'Update';
        $record->date = $this->updated_at;
        $c->add($record);

        $record1 = new RecordHistory();
        $record1->user = $this->getCreatedBy->name;
        $record1->action = 'Insert';
        $record1->date = $this->created_at;
        $c->add($record1);
        return $c;
    }
}
