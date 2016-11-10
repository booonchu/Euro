<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SchoolLoyaltyFeeHistory;
use \Illuminate\Database\Eloquent\Collection;
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
						'updated_by',
                        'created_by',
						];
   protected $appends = [];

   /**
    * Get the updated user associated with the school.
    */
    public function getLastUpdateBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
     * Get a current SchoolLoyaltyFeeHistory Record
     */
    public function SchoolLoyaltyFeeCurrent() 
    {
        return  $this->hasOne('App\SchoolLoyaltyFeeHistory','school_id')->whereDate('effective_date', '<=', date('Y-m-d'))->orderBy('effective_date', 'desc')->orderBy('created_at','desc');//->loyalty_fee;//$this->hasOne('App\SchoolLoyaltyFeeHistory','school_id')->whereDate('effective_date', '<=', date('Y-m-d'))->orderBy('effective_date', 'desc');
    }

    /**
     * Get all LoyaltyFeeHistory Record
     */
    public function SchoolLoyaltyFeeHistory()
    {
        return $this->hasMany('App\SchoolLoyaltyFeeHistory','school_id')->orderBy('effective_date', 'desc');//->whereNotNull('school_id');
    }

    /**
     * Get current Loyalty Fee of school
     */
    public function getCurrentLoyaltyFee()
    {
        $record = $this->SchoolLoyaltyFeeCurrent;
        if (is_null($record)) {
            return 0;
        }
        return $record->loyalty_fee;
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
        $record1->user = $this->getLastUpdateBy->name;
        $record1->action = 'Insert';
        $record1->date = $this->created_at;
        $c->add($record1);
        return $c;
    }
}
