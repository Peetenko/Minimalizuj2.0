<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
   protected $fillable = ['title', 'body','thumbnail','image','name','email','phone'];
   
}
