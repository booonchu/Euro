<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolLoyaltyFeeHistory extends Model
{
   protected $table='school_loyalty_fee_history';
   protected $fillable=['id ',
						'school_id',
						'effective_date',
						'loyalty_fee',
						'updated_by',
						'created_by',
						];
   protected $appends = [];

    /**
    * Get the updated user associated with the school.
    */
    public function getCreatedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

}
