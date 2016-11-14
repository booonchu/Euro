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
						'is_non_kawaii',
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
    	if($this->is_non_kawaii === 1)
    		return 'Non Kawii';
        return 'Kawii';;
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
