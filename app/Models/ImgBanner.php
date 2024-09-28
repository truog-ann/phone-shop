<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgBanner extends Model
{
    use HasFactory;
    protected $table = 'img_banners';
    protected $fillable = ['banner_id', 'img_banner'];
    public function banner() {
        return $this->hasMany(Banner::class);
    }
}
