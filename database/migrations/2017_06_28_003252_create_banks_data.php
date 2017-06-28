<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var \financeiro\Repositories\BankRepository $repository */
        $repository = app(\financeiro\Repositories\BankRepository::class);
        foreach ($this->getData() as $bankArray) {
            $repository->create($bankArray);
            sleep(1);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

    public function getData()
    {
        return [
            [
                'name' => 'Caixa',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/caixa-logo.jpg'),
                    'caixa-logo.jpg'
                )
            ],
            [
                'name' => 'Bradesco',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/bradesco-logo.jpg'),
                    'bradesco-logo.jpg'
                )
            ],
            [
                'name' => 'Banco do Brasil',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/bb-logo.png'),
                    'bb-logo.png'
                )
            ],
            [
                'name' => 'HSBC',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/hsbc-logo.jpg'),
                    'hsbc-logo.jpg'
                )
            ],
            [
                'name' => 'Itaú',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/itau-logo.jpg'),
                    'itau-logo.jpg'
                )
            ],
            [
                'name' => 'Santander',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/santander-logo.jpg'),
                    'santander-logo.jpg'
                )
            ],
        ];
    }
}
