<?php

namespace financeiro\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use financeiro\Repositories\BankRepository;
use financeiro\Models\Bank;
use financeiro\Validators\BankValidator;

/**
 * Class BankRepositoryEloquent
 * @package namespace financeiro\Repositories;
 */
class BankRepositoryEloquent extends BaseRepository implements BankRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bank::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
