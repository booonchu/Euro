<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
