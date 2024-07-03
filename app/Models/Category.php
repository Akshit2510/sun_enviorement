<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public  $table = "category";
    protected $fillable = ['title','status'];

    public function sub_category()
    {
        return $this->belongsto(\App\Models\Category::class, 'sub_category_id','id');
    }
}
