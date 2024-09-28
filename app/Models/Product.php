<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name_product',
        'img_prod',
        'quantity',
        'desc',
        'price',
        'price_promotion',
        'cate_id',
        'promotion_id',
        'views',
    ];
    public function cates()
    {
        return $this->belongsTo(Category::class,'cate_id');
    }
    public function promotions()
    {
        return $this->belongsTo(Promotion::class,'promotion_id');
    }
}
