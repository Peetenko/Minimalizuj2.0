<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['amount','measure','dateExpired'];
    protected $table = 'store';
}
