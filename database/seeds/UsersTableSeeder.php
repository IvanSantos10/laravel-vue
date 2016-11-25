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
        factory(financeiro\User::class, 1)
            ->states('admin')
            ->create([
                    'name' => 'Admin',
                    'email' => 'admin@santos.com'
                ]
            );
        factory(financeiro\User::class, 1)
            ->create([
                    'name' => 'Ivan santos',
                    'email' => 'ivan@santos.com'
                ]
            );
    }
}
