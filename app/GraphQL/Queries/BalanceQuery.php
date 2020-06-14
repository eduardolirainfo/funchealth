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
use App\GraphQL\Types\BalanceType;
use GraphQL\Error\Error;

class BalanceQuery extends Query
{
    protected $attributes = [
        'name' => 'saldo',
        'description' => 'A pesquisa de saldo na conta'
    ];

    public function type(): Type
    {
        return Type::int();
    }

    public function args(): array
    {
        return [
            'conta'=>[
                'name' => 'conta',
                'type' => Type::nonNull(Type::int()),
                'description' => 'a conta do usuário no banco'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
          if (isset($args['conta'])) {
            $conta = Conta::where('conta', $args['conta'])->first();
            if ($conta) {
                return $conta->saldo;
            } else {
                return new Error('Conta não encontrada');
            }
        }
    }
}
