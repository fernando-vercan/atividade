<?php

namespace Tests\Feature;

use Modules\Category\Entities\Category;
use Tests\TestCase;
use Modules\Product\Entities\Product;

class ProductTest extends TestCase
{
	public function testNewProduct()
	{
		$this->post('produtos/register', [
			'name' => 'Novo Produto',
			'price' => '100.00',
			'active' => 1,
		]);

		$this->assertTrue(true);
	}

	public function testCreateNewProduct()
	{
		$product = Product::factory()
			->has(Category::factory()->count(3))
			->create();

		$this->assertDatabaseHas('products', [
			'name' => $product->name,
		]);
	}
}
