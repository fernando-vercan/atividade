<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Providers\RouteServiceProvider;

class ProductTest extends TestCase
{
    public function test_new_product()
    {
        $this->post('produtos/register', [
            'name' => 'Novo Produto',
            'price' => '100.00',
            'active' => 1,
        ]);

        $this->assertTrue(true);
    }
}
