<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'desc',
        'price',
        'brand_id',
        'status',
        'created_by',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
