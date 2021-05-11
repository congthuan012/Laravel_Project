<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guest;
use Illuminate\Support\Facades\Hash;
class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guest::create([
            'ten'           => 'Huỳnh Công Thuần',
            'email'         => 'thuan@gmail.com',
            'password'      => Hash::make('123456'),
            'sdt'           => '0362884401',
        ]);
    }
}
