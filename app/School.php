<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
   protected $table='schools';
   protected $fillable=['id ',
						'usercode',
						'name',
						'contact_email',
						'contact_phone',
						'address',
						'description',
						'status',
						'lastupdatedby',
						'created_at',
						'updated_at',
						];
   protected $appends = [];

   /**
    * Get the updated user associated with the school.
    */
    public function LastUpdateBy()
    {
        return $this->belongsTo('App\User');
    }

    public function GetFee()
    {
        return $this->belongsTo('App\User');
    }
}
