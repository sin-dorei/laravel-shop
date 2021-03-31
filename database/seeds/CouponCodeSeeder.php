<?php

use App\Models\CouponCode;
use Illuminate\Database\Seeder;

class CouponCodeSeeder extends Seeder
{
    public function run()
    {
        factory(CouponCode::class, 20)->create();
    }
}
