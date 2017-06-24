<?php

namespace financeiro\Events;

use financeiro\Models\Bank;

class BankCreatedEvent
{
    /**
     * @var Bank
     */
    private $bank;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bank $bank)
    {
        //
        $this->bank = $bank;
    }

    /**
     * @return Bank
     */
    public function getBank()
    {
        return $this->bank;
    }


}
