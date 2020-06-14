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
    protected function rules(array $args = []): array
    {
        return [
            'conta' => ['min:5','max:5'],
            'valor' => ['integer','min:0.1']
        ];
    }
    public function validationErrorMessages(array $args = []): array
    {
        return [
            'conta.min' => 'A conta precisa no mínimo de 5 dígitos.',
            'conta.max' => 'A conta possui até 5 dígitos',
            'valor.min' => 'Valor inválido. Saque deve ser maior que zero',
            'valor.integer' => 'Valor inválido'
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $conta = Conta::where('conta', $args['conta'])->first();

        if ($conta) {
              if ($conta->saldo >= $args['valor']) {
                  $conta->saldo -= $args['valor'];
                  $conta->fill($args);
                  $conta->save();
              } else {
                  return new Error('Saldo insuficiente');
              }
            return $conta;

        } else {
            return new Error('Conta não encontrada');

        }



    }
}
