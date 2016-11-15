<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
class CourseCategory extends Model
{
   protected $table='course_categories';
   protected $fillable=['id',
						'name',
						'description',
						'status',
						'listorder',
						'updated_by',
                        'created_by',
						];

    /**
    * Get All CourseCategory Record
    */
    public static function getAllList()
    {
        return CourseCategory::orderBy('listorder', 'asc')->pluck('name', 'id');
    }

    /**
    * Get CourseCategory Active Record;
    */
    public static function getListForEdit($coures_category_id)
    {
        return CourseCategory::where('status','=',config('constants.STATUS_ACTIVE'))->orWhere('id', $coures_category_id)->orderBy('listorder', 'asc')->pluck('name', 'id');
    }


    /**
    * Get CourseCategory Active Record;
    */
    public static function getActiveList()
    {
        return CourseCategory::where('status','=',config('constants.STATUS_ACTIVE'))->orderBy('listorder', 'asc')->pluck('name', 'id');
    }


	/**
    * Get the updated user associated with the school.
    */
    public function getLastUpdateBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
    * Get the created user associated with the school.
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
