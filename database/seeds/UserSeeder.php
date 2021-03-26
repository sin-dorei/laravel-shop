<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->times(10)->create();

        $user = User::query()->first();
        $user->name = 'Chun';
        $user->email = 'spring@emt.com';
        $user->password = bcrypt('11111111');
        $user->save();

        $user = User::query()->find(2);
        $user->fill([
            'name' => 'Dong',
            'email' => 'winter@emt.com',
            'password' => bcrypt('44444444'),
        ]);
        $user->save();
    }
}
