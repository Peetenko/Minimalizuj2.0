<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['amount','measure','dateExpired'];
    protected $primaryKey = 'id';
    protected $table = 'store';
}
