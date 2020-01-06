<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use App\Models\Store;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApiGetProducts()
    {
        $response = $this->get('/api/v1/products');

        $response->assertStatus(200);
    }

    public function testExchangeCreateProduct() {
        $response = $this->json('post','/exchange/v1/product', [
            "guid" => "string",
            "category_guid" => "string",
            "brand_guid" => "string",
            "name" => "string",
            "code" => "string",
            "article" => "string",
            "description" => "string",
            "market_id" => "string",
            "is_active" => true
        ]);

        $response->assertStatus(200);

    }

    public function testExchangeUploadImage() {

        // creating product

        $this->json('post','/exchange/v1/product', [
            "guid" => "d9e787fa-db49-4bd8-97c3-df45f159295c",
            "category_guid" => "string",
            "brand_guid" => "string",
            "name" => "string",
            "code" => "string",
            "article" => "string",
            "description" => "string",
            "market_id" => "string",
            "is_active" => true
        ]);


        // upload image to product

        $response = $this->json('post','/exchange/v1/image', [
            "guid"=> "d9e787fa-db49-4bd8-97c3-df45f159299c",
            "object_guid"=> "d9e787fa-db49-4bd8-97c3-df45f159295c",
            "object_type"=> "Product",
            "extension"=> "jpg",
            "content"=> "iVBORw0KNVJPzl8/lT5LWqeAZ7x8ocEU/GN7E9PgM/A/Www+CYV3O5wAAAABJRU5ErkJggg=="
        ]);

        // assert

        $response->assertStatus(200);

        $this->assertEquals(1, Product::whereGuid('d9e787fa-db49-4bd8-97c3-df45f159295c')->first()->images()->count());

    }

    public function testExchangeCreateCategory() {

        // creating Category

        $response = $this->json('post','/exchange/v1/category', [
            "guid" => "d9e787fa-db49-4bd8-97c3-df45f159299c",
            "name" => "string",
            "parent_guid" => "string",
            "order" => 0,
            "is_active" => true
        ]);

        $response->assertStatus(200);

    }

    public function testExchangeUpdateCategoryProperties() {

        // creating Category
        $this->json('post','/exchange/v1/category', [
            "guid" => "category_guid",
            "name" => "string",
            "parent_guid" => "string",
            "order" => 0,
            "is_active" => true
        ]);


        // creating product

        $this->json('post','/exchange/v1/product', [
            "guid" => "d9e787fa-db49-4bd8-97c3-df45f159295c",
            "category_guid" => "category_guid",
            "brand_guid" => "string",
            "name" => "string",
            "code" => "string",
            "article" => "string",
            "description" => "string",
            "market_id" => "string",
            "is_active" => true
        ]);

        // add properties to category

        $response = $this->json('post','/exchange/v1/properties', [
            "property_arr" => [
                [
                "guid" => "property_guid",
                "name" => "string",
                "unit" => "string",
                "use_filter" => true,
                "use_analog" => true,
                "type" => "string",
                ]
            ],
            "category_guid" => "category_guid",
        ]);

        $response->assertStatus(200);

        // assert category name is equals product->category->name
        $this->assertEquals('category_guid',
            Product::whereGuid('d9e787fa-db49-4bd8-97c3-df45f159295c')
                ->first()->category->guid);

        $this->assertEquals(1,
            Category::whereGuid('category_guid')
                ->first()->properties()->count());

        $this->assertEquals('string',
            Category::whereGuid('category_guid')
                ->first()->properties()->first()->type);

    }

    public function testExchangeUpdatePropertyValues() {

        $this->withExceptionHandling();

        // creating Category
        $this->json('post','/exchange/v1/category', [
            "guid" => "category_guid",
            "name" => "string",
            "parent_guid" => "string",
            "order" => 0,
            "is_active" => true
        ]);

        // creating product

        $this->json('post','/exchange/v1/product', [
            "guid" => "product_guid",
            "category_guid" => "category_guid",
            "brand_guid" => "string",
            "name" => "string",
            "code" => "string",
            "article" => "string",
            "description" => "string",
            "market_id" => "string",
            "is_active" => true
        ]);

        // add properties
        $this->json('post','/exchange/v1/properties', [
            "property_arr" => [
                [
                    "guid" => "property_guid",
                    "name" => "string",
                    "unit" => "string",
                    "use_filter" => true,
                    "use_analog" => true,
                    "type" => "string",
                ]
            ],
            "category_guid" => "category_guid",
        ]);

        // add property values

        $response = $this->json('post','/exchange/v1/property_values', [
            "values" => [
                "val1",
                "val2",
                "val3",
                "val4",
            ],
            "property_guid" => "property_guid",
            "product_guid" => "product_guid",
        ]);

        $response->assertStatus(200);

        // assert category name is equals product->category->name
        $this->assertEquals('category_guid',
            Product::whereGuid('product_guid')
                ->first()->category->guid);

        $this->assertEquals(4,
            Property::whereGuid('property_guid')
                ->first()->values()->count());

        $this->assertEquals(4,
            Product::whereGuid('product_guid')
                ->first()->property_values()->count());
    }

    public function testExchangeUpdateProductStorePrice() {
        $this->withExceptionHandling();

        // creating Store 1
        $store1 = Store::create([
            'guid' => 'store1_guid',
            'name' => 'test_store'
        ]);

        // creating Store 2

        $store2 = Store::create([
            'guid' => 'store2_guid',
            'name' => 'test_store'
        ]);

        // creating product

        $this->json('post','/exchange/v1/product', [
            "guid" => "product_guid",
            "category_guid" => "category_guid",
            "brand_guid" => "string",
            "name" => "string",
            "code" => "string",
            "article" => "string",
            "description" => "string",
            "market_id" => "string",
            "is_active" => true
        ]);


        // set store quantity & price

        $response = $this->json('post', '/exchange/v1/update_store', [
            'product_guid' => 'product_guid',
            'stores' => [
                [
                    'store_guid' => $store1->guid,
                    'quantity' => 3,
                    'price' => 1500,
                    'old_price' => 2500,
                ],
                [
                    'store_guid' => $store2->guid,
                    'quantity' => 3,
                    'price' => 1500,
                    'old_price' => 2500,
                ],
            ]
        ]);

        $response->assertStatus(200);

        $this->assertEquals(2, Product::whereGuid('product_guid')->first()->stores()->count());
//        dd(Product::whereGuid('product_guid')->first()->stores);
        $this->assertEquals(3, Product::whereGuid('product_guid')->first()->stores()->first()->pivot->quantity);
    }
}
