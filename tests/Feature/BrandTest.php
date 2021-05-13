<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrandTest extends TestCase
{
    use RefreshDatabase;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_brands()
    {
        Brand::factory()->count(rand(0, 5))->create();
        $response = $this->get('/api/brands');

        $response->assertStatus(200);
    }

    public function test_get_one_brands()
    {
        Brand::factory()->count(rand(0, 5))->create();
        $brand = Brand::inRandomOrder()->first();
        $response = $this->get("/api/brands/$brand->id");

        $response->assertStatus(200);
    }

    public function test_create_brand()
    {
        $brand = Brand::factory()->make();
        $response = $this->actingAs($this->user)->post('/api/brands', [
            'name' => $brand->name,
        ]);
        $response->assertStatus(201);
    }

    public function test_update_brand()
    {
        $old = Brand::factory()->create();
        $brand = Brand::factory()->make();
        $response = $this->actingAs($this->user)->put("/api/brands/$old->id", [
            'name' => $brand->name,
        ]);
        $response->assertStatus(200);
    }
}
