<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $primaryKey="id";
    protected $guarded=[];
    public $timestamps=false;
    protected $fillable = ['name', 'price', 'availability', 'category_id', 'admin_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
