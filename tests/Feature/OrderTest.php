<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testSendOrder()
    {
        # preparing for send order request

        //creating store
        $store = Store::create([
            'name' => 'Random Store',
            'guid' => 'store_guid'
        ]);


        // creating products
        $products = [];
        foreach ([0,1,2] as $i) {
            $product = Product::create([
                "guid" => "product_guid_{$i}",
                "category_id" => null,
                "brand_id" => null,
                "name" => "string",
                "code" => "string",
                "article" => "string",
                "description" => "string",
                "market_id" => "string",
                "is_active" => true
            ]);

            //storing some items to random store
            $product->stores()->save($store, [
                'quantity' => 3,
                'price' => 2000,
                'old_price' => 2500,
            ]);
        }


        $response = $this->json('post',
            '/api/v1/orders',
            [
                'email' => 'test@email.com',
                'phone' => '+71234567890',
                'items' => [
                    [
                        'product_id' => 1,
                        'quantity' => 1,
                        'price' => 2000,
                    ],
                    [
                        'product_id' => 2,
                        'quantity' => 2,
                        'price' => 2000,
                    ],
                    [
                        'product_id' => 3,
                        'quantity' => 3,
                        'price' => 2000,
                    ]
                ]
            ]
        );

        $response->assertStatus(200);

        $this->assertEquals(1,
            Order::count());

        $this->assertEquals(3,
            Order::first()
            ->items()
            ->count()
        );

        $this->assertEquals(6000,
            Order::first()
                ->items()
                ->sum('price')
        );

        //todo make another tests


    }
}
