<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    protected $fillable = [
        'title_promotion',
        'start',
        'end',
    ];
    public function product() {
        return $this->hasMany(Product::class);
    }
}
