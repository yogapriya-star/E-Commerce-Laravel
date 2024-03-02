<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;

     protected $fillable = [
        'category_id',
        'name',
        'slug',
        'status',
     ];

     public function category(){
        return $this->belongsTo(Category::class);
     }

     public function childCategories(){
         return $this->hasMany(ChildCategory::class);
     }
}
