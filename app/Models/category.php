<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug','description','image','status'];

    public function subCategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
