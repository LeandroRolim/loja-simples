<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductTest extends TestCase
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
    public function test_list_products()
    {
        Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->count(10)
            ->create();
        $response = $this->getJson('/api/products');

        $response
            ->assertStatus(200)
            ->assertJson(['data' => []]);
    }

    public function test_show_product()
    {
        $product = Product::factory()
            ->for(Category::factory())
            ->for(Brand::factory())
            ->create();
        $response = $this->getJson("/api/products/$product->id");
        $response->assertStatus(200);
        $response->assertJson(fn(AssertableJson $json) =>
        $json->whereType('data' , 'array'));
    }

    public function test_store_product()
    {
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();
        $product = Product::factory()
            ->for($category)
            ->for($brand)
            ->create();
        $product->photo = UploadedFile::fake()->image('photo.jpg');
        $response = $this->actingAs($this->user)->postJson('/api/products', $product->toArray());
        $response->assertCreated();
    }

    public function test_update_product()
    {
        Product::factory()
            ->count(random_int(2, 10))
            ->for(Category::factory())
            ->for(Brand::factory())
            ->create();
        $old = Product::inRandomOrder()->first();
        $new_product = Product::factory()->make();
        $response = $this->actingAs($this->user)->putJson("/api/products/$old->id", [
            'name' => $new_product->name,
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('products', [
            'id' => $old->id,
            'name' => $new_product->name,
        ]);
    }

    public function test_delete_products()
    {
        $product = Product::factory()
            ->for(Category::factory())
            ->for(Brand::factory())
            ->create();
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
        ]);
        $response = $this->actingAs($this->user)->deleteJson("/api/products/$product->id");
        $response->assertStatus(204);
        $this->assertSoftDeleted($product);
    }
}
