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
						'lastupdatedby',
						];
   protected $appends = [];
}
