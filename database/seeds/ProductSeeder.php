<?php

use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = factory(Product::class, 30)->create();
        foreach ($products as $product)
        {
            $skus = factory(ProductSku::class, 3)->create(['product_id' => $product->id]);
            $product->update(['price' => $skus->min('price')]);
        }
    }
}
