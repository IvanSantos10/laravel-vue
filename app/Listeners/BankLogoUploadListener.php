<?php

namespace financeiro\Listeners;

use financeiro\Events\BankStoredEvent;
use financeiro\Models\Bank;
use financeiro\Repositories\BankRepository;

class BankLogoUploadListener
{
    /**
     * @var BankRepository
     */
    private $repository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(BankRepository $repository)
    {
        //
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  BankStoredEvent  $event
     * @return void
     */
    public function handle(BankStoredEvent $event)
    {
        $bank = $event->getBank();
        $logo = $event->getLogo();

        if($logo) {
            $name = $bank->created_at != $bank->updated_at ? $bank->logo : md5(time().$logo->getClientOriginalName()) . '.' . $logo->guessExtension();
            $destFile = Bank::logoDir();

            \Storage::disk('public')->putFileAs($destFile, $logo, $name);

            if($bank->created_at == $bank->updated_at) {
                $this->repository->update(['logo' => $name], $bank->id);
            }
        }
    }
}
