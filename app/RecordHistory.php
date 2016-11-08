<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordHistory extends Model
{
    //
    protected $appends = ['user','action','date'];
}
