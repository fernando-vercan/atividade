<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function only_logged_in_users_can_see_products_list()
    {
        $this->get('/produtos')->assertRedirect('/login');
    }

    /** @test */
    public function only_logged_in_users_can_see_categories_list()
    {
        $this->get('/categorias')->assertRedirect('/login');
    }
}
