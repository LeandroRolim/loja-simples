<?php

namespace Tests\Feature;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CouponTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_list_coupon()
    {
        $response = $this->getJson('/api/coupons');
        $response
            ->assertJson(
                fn(AssertableJson $json) => $json
                    ->whereType('data', 'array')
            )
            ->assertStatus(200);
    }

    public function test_show_coupon()
    {
        Coupon::factory()->count(10)->create();
        $coupon = Coupon::inRandomOrder()->first();
        $response = $this->getJson("/api/coupons/$coupon->id");
        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json->whereType('data', 'array'));
        $this->assertTrue(true);
    }

    public function test_create_coupon()
    {
        $coupon = Coupon::factory()->make();
        $response = $this->actingAs($this->user)->postJson("/api/coupons", $coupon->toArray());
        $response
            ->assertStatus(201)
            ->assertJson(fn(AssertableJson $json) => $json->whereType('data', 'array'));
    }

    public function test_update_coupon()
    {
        $coupon = Coupon::factory()->create();
        $response = $this->actingAs($this->user)->putJson("/api/coupons/$coupon->id", [
            'value' => 5
        ]);
        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json->whereType('data', 'array'));
    }

    public function test_udelete_coupon()
    {
        $coupon = Coupon::factory()->create();

        $response = $this->deleteJson("/api/coupons/$coupon->id");
        $response->assertStatus(401);

        $this->assertDatabaseHas(
            'coupons',
            [
                'id' => $coupon->id,
                'code' => $coupon->code,
            ],
        );

        $response2 = $this->actingAs($this->user)->deleteJson("/api/coupons/$coupon->id");
        $response2->assertStatus(204);

        $this->assertSoftDeleted($coupon);
    }
}
