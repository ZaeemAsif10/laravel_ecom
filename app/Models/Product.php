<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'sub_category_id',
        'name',
        'url',
        'small_description',
        'image',
        'p_high_heading',
        'p_highlights',
        'p_des_heading',
        'p_description',
        'p_det_heading',
        'p_details',
        'sale_tag',
        'original_price',
        'offer_price',
        'quantity',
        'priority',
        'new_arrival_products',
        'featured_products',
        'popular_products',
        'offers_products',
        'status_products',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id','id');
    }

}
