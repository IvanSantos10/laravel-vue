<?php

namespace financeiro\Listeners;

use financeiro\Events\BankStoredEvent;
use financeiro\Models\Bank;
use financeiro\Repositories\BankRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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

        $name = md5(time()). '.' . $logo->guessExtension();
        $destFile = Bank::logoDir();

        \Storage::disk('public')->putFileAs($destFile, $logo, $name);

        $this->repository->update(['logo' => $name], $bank->id);
    }
}
