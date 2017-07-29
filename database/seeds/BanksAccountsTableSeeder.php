<?php

use Illuminate\Database\Seeder;

class BanksAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \financeiro\Repositories\BankRepository $repository*/
        $repository = app(\financeiro\Repositories\BankRepository::class);
        $bank = $repository->all();
        $max = 15;
        $bankAccountId = rand(1, $max);

        factory(\financeiro\Models\BankAccount::class, $max)
            ->create()
        ->each(function ($bankAccountId) use(){

        });
    }
}
