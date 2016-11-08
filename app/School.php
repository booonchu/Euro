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
						];
   protected $appends = [];

   /**
    * Get the updated user associated with the school.
    */
    public function getLastUpdateBy()
    {
        return $this->belongsTo('App\User', 'lastupdatedby');
    }

    /**
     * 
     */
    public function LoyaltyFees()
    {
        return $this->hasMany('App\SchoolLoyaltyFeeHistory','school_id');
    }

    /**
     * 
     */
    public function getCurrentLoyaltyFee()
    {
        return 4;//$this->LoyaltyFees()->whereDate('effective_date', '<=', date('Y-m-d'))->orderBy('effective_date', 'desc')->first()->loyalty_fee;
    }

    /**
     * 
     */
    public  function getHistories()
    {
        $record = new RecordHistory();
        $record->user = $this->getLastUpdateBy->name;
        $record->action = 'Update';
        $record->date = $this->updated_at;
        return $record;
    }
}
