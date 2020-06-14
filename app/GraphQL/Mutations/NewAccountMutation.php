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

class NewAccountMutation extends Mutation
{
    protected $attributes = [
        'name' => 'criarConta',
        'description' => 'Criando uma nova conta'
    ];

    public function type(): Type
    {
        return GraphQL::Type('conta');
    }

    public function args(): array
    {
        return [
            'conta'=>[
                'name' => 'conta',
                'type' => Type::int(),
                'description' => 'A conta do usuário no banco'
            ],
            'saldo'=>[
                'name' => 'valor',
                'type' => Type::float(),
                'description' => 'O saldo do usuário no banco'
            ]
        ];
    }
    protected function rules(array $args = []): array
    {
        return [
            'conta' => ['min:5','max:5','unique:contas'],
            'valor' => ['integer','min:0']
        ];
    }

    public function validationErrorMessages(array $args = []): array
    {
        return [
            'conta.min' => 'A conta precisa no mínimo de 5 dígitos.',
            'conta.max' => 'A conta possui até 5 dígitos',
            'conta.unique' => 'Esta conta já foi criada',
            'valor.min' => 'Valor inválido',
            'valor.integer' => 'Valor inválido'
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $conta = new Conta();
        $args['saldo'] = $args['valor'] >= 0 ? $args['valor'] : 0.00;

        if (!isset($args['conta'])) {
            $args['conta'] = rand(50000,54320);
        }
        $conta->fill($args);
        $conta->save();

        return $conta;
    }
}




