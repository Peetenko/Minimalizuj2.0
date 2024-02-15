<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
   protected $fillable = ['title', 'body','thumbnail','image','name','email','phone','price'];
   protected $table = 'sales';
   
}
