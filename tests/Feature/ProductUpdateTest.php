<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductUpdateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Update(): void
    {
         // Create a user to act as the authenticated user
         $user = User::factory()->create();

         // Simulate the authenticated user
         $this->actingAs($user);
         
        // Test creating a new product
        $response = $this->post('/product/create', [
            'name' => 'Test Creation',
            'price' => "1000$",
            'description' => "Testing description",
            'categories' => [1, 4],// assuming the product has categories
            'stock'=> 50
        ]);
 // Fetch the created product ID from the response
 
        $response->assertStatus(201); // Check if product is created
        $product = Product::latest()->first(); // Assuming you get the latest product

        $response = $this->put('/product/update/' .$product->id, [
            'name' => 'Updated Laptop',
            'price' => "100pkr"
        ]);
    
        $response->assertStatus(302);
    }
}
