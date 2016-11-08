<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RecordHistory;

class Room extends Model
{
   protected $table='rooms';
   protected $fillable=['id','branch_id','name','capacity'];
   protected $appends = ['name_readonly'];

   /**
     * Get the branch record associated with the Room.
     */
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function getHistories()
    {
        $record = new RecordHistory();
        $record->user = $this->user;
        $record->name = '';
            $record->capacity = '';
        return $this->belongsTo('App\Branch');
    }
}
