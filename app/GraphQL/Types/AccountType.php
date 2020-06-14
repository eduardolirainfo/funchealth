<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL;
use App\Conta;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class AccountType extends GraphQLType
{
    protected $attributes = [
        'name' => 'conta',
        'description' => 'O type da conta',
        'model' => Conta::class,
    ];

    public function fields(): array
    {
        return [
            'conta' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'O número da conta'
            ],
            'saldo'=>[
                'type' => Type::nonNull(Type::int()),
                'description' => 'O saldo do usuário na conta'
            ]
        ];
    }
}
