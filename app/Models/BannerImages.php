<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerImages extends Model
{
    use HasFactory, SoftDeletes;

    public  $table = "banner_images";
    protected $fillable = ['type','image','title','description','created_at'];
}
