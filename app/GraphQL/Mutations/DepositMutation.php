<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL;
use App\Conta;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL\Error\Error;

class DepositMutation extends Mutation
{
    protected $attributes = [
        'name' => 'depositar',
        'description' => 'Depósito na conta bancária'
    ];

    public function type(): Type
    {
        return GraphQL::type('conta');
    }

    public function args(): array
    {
        return [
            'conta'=>[
                'name' =>'conta',
                'type' => Type::int(),
                'description' => 'A conta do usuário no banco',
                'rules' => ['min:5', 'max:8'],
            ],
            'saldo'=>[
                'name'=> 'valor',
                'type' => Type::int(),
                'description' => 'O saldo do usuário no banco',
            ]
        ];
    }
      public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $conta = Conta::where('conta', $args['conta'])->first();
        if ($conta) {
            if ($args['valor'] > 0){
                $conta->saldo += $args['valor'];
                $conta->fill($args);
                $conta->save();

                return $conta;

            }elseif($args['valor'] == 0){
                return new Error('Valor de depósito nulo');
            }else{
                return new Error('Valor incorreto');
            }
        }else {
            return new Error('Conta não encontrada');

        }

        }
}

