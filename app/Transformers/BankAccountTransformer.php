<?php

namespace financeiro\Transformers;

use League\Fractal\TransformerAbstract;
use financeiro\Models\BankAccount;

/**
 * Class BankAccountTransformer
 * @package namespace financeiro\Transformers;
 */
class BankAccountTransformer extends TransformerAbstract
{

    /**
     * Transform the \BankAccount entity
     * @param \BankAccount $model
     *
     * @return array
     */
    public function transform(BankAccount $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'  => $model->name,
            'agency' => $model->agency,
            'account' => $model->account,
            'default' => (boolean)$model->default,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
