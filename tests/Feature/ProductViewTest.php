<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductViewTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_view(): void
    {
           // Create a user to act as the authenticated user
    $user = User::factory()->create();

    // Simulate the authenticated user
    $this->actingAs($user);
    
   // Test creating a new product
   $response = $this->post('/product/create', [
       'name' => "View Product",
       'price' => "45$",
       'description' => "View testing",
       'categories' => [1,4],// assuming the product has categories
    ]);

    $response->assertStatus(201);

    $response = $this->get('/product/show');

    $response->assertStatus(200);
    }
}
