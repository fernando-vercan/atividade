<?php

namespace Tests\Feature;

use Tests\TestCase;
use Modules\Category\Entities\Category;

class CategoryTest extends TestCase
{
	public function testCreateNewCategory()
	{
		Category::factory()->create([
			'name' => 'Fernando'
		]);

		$this->assertDatabaseHas('categories', [
			'name' => 'Fernando',
		]);
	}
}
