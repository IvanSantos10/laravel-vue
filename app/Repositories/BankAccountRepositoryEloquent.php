<?php

namespace financeiro\Repositories;

use financeiro\Presenters\BankAccountPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use financeiro\Models\BankAccount;

/**
 * Class BankAccountRepositoryEloquent
 * @package namespace financeiro\Repositories;
 */
class BankAccountRepositoryEloquent extends BaseRepository implements BankAccountRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BankAccount::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return BankAccountPresenter::class;
    }
}
