<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Thêm khách hàng',
            'slug' => 'create-guest',
            'permissions' => json_encode([
                'guest.create' => true,
                'guest.update' => true,
            ])
        ]);
    }
}
