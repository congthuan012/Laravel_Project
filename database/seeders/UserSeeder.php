<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'           => 'Huỳnh Công Thuần',
            'email'         => 'thuan@gmail.com',
            'password'      => Hash::make('123456'),
            'sdt'           => '0362884401',
            'kichhoat'      => 1
        ]);
    }
}
