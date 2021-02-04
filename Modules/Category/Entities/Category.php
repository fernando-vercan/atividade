<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Entities\Product;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'active'];

    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getFormattedActiveAttribute()
    {
        return $this->active ? "Sim" : "Não";
    }
}
