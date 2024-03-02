<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;

class ChildCategory extends Model
{
    use HasFactory;

     protected $fillable = [
        'sub_category_id',
        'name',
        'slug',
        'status',
     ];

     public function category(){
        return $this->belongsTo(Category::class);
     }

     public function subCategory(){
        return $this->belongsTo(SubCategory::class);
     }
}
