<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','price','image','quantity','CategoryID'];

    Public function product(){
        return $this->belongsTo('App/Models/Category');
    }
}
