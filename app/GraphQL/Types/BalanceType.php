<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL;
use App\Conta;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;


class BalanceType extends GraphQLType
{
    protected $attributes = [
        'name' => 'saldo',
        'description' => 'O saldo',
        'model' => Conta::class
    ];

    public function fields(): array
    {
        return [
            'saldo'=>[
                'type' => Type::nonNull(Type::int()),
                'description' => 'O saldo do usuário na conta'
            ]
        ];
    }
}
