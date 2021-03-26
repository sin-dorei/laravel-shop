<?php

use App\Models\UserAddress;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    public function run()
    {
        factory(UserAddress::class)->times(6)->create(['user_id' => 2]);
    }
}
