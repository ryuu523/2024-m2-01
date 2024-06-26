<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table="events";
    protected $primaryKey = 'events_id';
    protected $fillable = ['name','place','date'];
    protected $guarded = ['events_id'];
    protected $dates=["create_at","update_at"];

}
