<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;

class ProductVariantItem extends Model
{
    use HasFactory;

    protected $fillable = [
     'product_variant_id',
     'name',
     'price',
     'is_default',
     'status',
     ];

     public function productVariant(){

        return $this->belongsTo(ProductVariant::class);
     }
}
