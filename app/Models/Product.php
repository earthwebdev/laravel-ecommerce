<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //protected $fillable = ['title','slug','price','discount_percentage','descriptioin','image','category_id','status','is_featured'];

    protected $guarded = ['id'];
}
