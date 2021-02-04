<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = ['name', 'price', 'active'];

    protected $dates = ['deleted_at'];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getFormattedActiveAttribute()
    {
        return $this->active ? "Ativo" : "Inativo";
    }

    public function getFormattedPriceAttribute()
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(",", ".", str_replace(".", "", $value));
    }
}
