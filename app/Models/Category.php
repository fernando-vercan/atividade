<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'active'];

    protected $dates = ['deleted_at'];

    public function products (){
        return $this->belongsToMany(Product::class);
    }
}
