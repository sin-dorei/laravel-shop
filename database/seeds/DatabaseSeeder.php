<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call(UserSeeder::class);
        $this->call(UserAddressSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CouponCodeSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
