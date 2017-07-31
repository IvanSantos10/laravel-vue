<?php

use financeiro\Models\Bank;
use Illuminate\Database\Migrations\Migration;

class CreateBankLogoDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $logo = new \Illuminate\Http\UploadedFile(
            storage_path('app/files/banks/logos/logo-default.png'),
            'logo-default.png'
        );
        $name = env('BANK_LOGO_DEFAULT');
        $destFile = Bank::logoDir();

        \Storage::disk('public')->putFileAs($destFile, $logo, $name);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $file_name = env("BANK_LOGO_DEFAULT");
        $filePath = 'banks/images/'.$file_name;

        Storage::disk('public')->delete($filePath);
        echo "** Imagem $file_name deletada\n";
    }
}
