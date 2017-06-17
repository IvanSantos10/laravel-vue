<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\financeiro\Models\User::class, 1)
            ->states('admin')
            ->create([
                    'name' => 'Admin',
                    'email' => 'admin@financeiro.com'
                ]
            );
        factory(\financeiro\Models\User::class, 1)
            ->create([
                    'name' => 'Ivan santos',
                    'email' => 'ivan@financeiro.com'
                ]
            );
    }
}
