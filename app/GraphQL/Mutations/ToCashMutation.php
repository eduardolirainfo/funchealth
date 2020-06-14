<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;
// 92ef6ef020682289bd7873ce320642c0adc22a92
use Closure;
use GraphQL;
use App\Conta;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL\Error\Error;


class ToCashMutation extends Mutation
{
    protected $attributes = [
        'name' => 'sacar',
        'description' => 'A mutation'
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
            ],
            'saldo'=>[
                'name'=> 'valor',
                'type' => Type::float(),
                'description' => 'O saldo do usuário no banco',
            ]

        ];
    }
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $conta = Conta::where('conta', $args['conta'])->first();

        if ($conta) {
            if ($args['valor'] > 0){
              if ($conta->saldo >= $args['valor']) {
                  $conta->saldo = $conta->saldo - $args['valor'];
                  $conta->fill($args);
                  $conta->save();
              } else {
                  return new Error('Saldo insuficiente');
              }
            }elseif ($args['valor'] == 0){
                      return new Error('Valor de saque Nulo');
                }else{
                      return new Error('Valor incorreto');
                     }

            return $conta;

        } else {
            return new Error('Conta não encontrada');

        }



    }
}
