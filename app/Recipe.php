<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
   protected $fillable = ['title', 'body','thumbnail','image','name','user_id','order','recipeId','contentType'];
   protected $table = 'recipes';
   
}
