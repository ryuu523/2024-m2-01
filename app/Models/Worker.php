<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table="workers";
    protected $primaryKey = 'workers_id';
    protected $fillable = ['name','email','password',"memo"];
    protected $guarded = ['workers_id'];
    protected $dates=["create_at","update_at"];
}
