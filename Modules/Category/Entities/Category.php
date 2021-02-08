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

	/**
	* Create a new factory instance for the model.
	*
	* @return \Illuminate\Database\Eloquent\Factories\Factory
	*/
	protected static function newFactory()
	{
		return \Modules\Category\Database\factories\CategoryFactory::new();
	}
}
