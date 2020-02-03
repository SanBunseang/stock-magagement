<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbStaff extends Model
{
   protected $guarded=['id'];
   protected $fillable=['Name','Gender','DOB','Position','Address','Phone','Email','HiredDate','Salary','Image','Status'];

}
