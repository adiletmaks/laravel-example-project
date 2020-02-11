<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
            'role_id' => Role::getRoleBySlug(Role::ADMIN_ROLE)->id,
        ]);

        factory(\App\Models\User::class, 10)->create();
    }
}
