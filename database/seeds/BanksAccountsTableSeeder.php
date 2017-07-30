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

        /** @var \financeiro\Repositories\BankRepository $repository */
        $repository = app(\financeiro\Repositories\BankRepository::class);
        $banks = $repository->all();
        $max = 15;
        $bankAccountId = rand(1, $max);

        factory(\financeiro\Models\BankAccount::class, $max)
            ->make()
            ->each(function ($bankAccount) use($banks, $bankAccountId){
                $bank = $banks->random();
                $bankAccount->bank_id = $bank->id;

                $bankAccount->save();

                if($bankAccountId == $bankAccount->id){
                    $bankAccount->default = 1;
                    $bankAccount->save();
                }
            });
    }
}
