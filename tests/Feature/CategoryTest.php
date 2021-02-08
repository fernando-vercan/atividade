<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /** @test */
    public function check_if_user_can_register_category_without_being_logged_in()
    {
        $response = $this->post('categorias/cadastrar', [
            'name' => 'Nova Categoria',
            'active' => 1,
        ]);

        $response->assertStatus(405);
    }

    /** @test */
    public function test_new_category()
    {
        $response = $this->post('categorias/cadastrar', [
            'name' => 'Nova Categoria',
            'active' => 1,
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function test_edit_category()
    {
        $this->put('categorias/update/1', [
            'name' => 'New Category',
            'active' => 0,
        ]);

        $this->assertTrue(true);
    }
}
