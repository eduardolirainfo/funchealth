<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use App\Conta;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use App\GraphQL\Types\AccountType;
use GraphQL\Error\Error;

class AccountQuery extends Query
{
    protected $attributes = [
        'name' => 'conta',
        'description' => 'A pesquisa de saldo na conta'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('conta'));
    }

    public function args(): array
    {
        return [
            'conta' => [
                'name' => 'conta',
                'type' => Type::int(),
                'description' => 'O número da conta'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['conta'])) {
            return Conta::where('conta', $args['conta'])->get();
        }
        return Conta::all();
    }
}
