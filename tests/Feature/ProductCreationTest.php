<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_product_creation(): void
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

        $response->assertStatus(201); // Check if product is created
    }
   public function test_product_creation_with_nullable_stock(){

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
        ]);

        $response->assertStatus(201); // Check if product is created
   }

   public function test_product_validation(){

    // Create a user to act as the authenticated user
    $user = User::factory()->create();

    // Simulate the authenticated user
    $this->actingAs($user);
    
   // Test creating a new product
   $response = $this->post('/product/create', [
       'name' => "",
       'price' => "",
       'description' => "",
       'categories' => [],// assuming the product has categories
    ]);

    $response->assertSessionHasErrors(['name', 'price', 'description']);

}

public function test_product_name_validation(){

    // Create a user to act as the authenticated user
    $user = User::factory()->create();

    // Simulate the authenticated user
    $this->actingAs($user);
    
   // Test creating a new product
   $response = $this->post('/product/create', [
       'name' => 12,
       'price' => "45$",
       'description' => "testing",
       'categories' => [1,4],// assuming the product has categories
    ]);

    $response->assertSessionHasErrors(['name']);

}

}
