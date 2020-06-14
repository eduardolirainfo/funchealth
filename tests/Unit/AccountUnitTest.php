<?php

namespace Tests\Unit;
use App\Conta;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class AccountUnitTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_fillable()
    {
        $fillable = ['conta','saldo'];
        $this->assertEquals($fillable, (new Conta())->getFillable());
    }

    // public function test_list()
    // {
    //     $conta = factory(Conta::class)->create();

    //     $this->assertCount(1, Conta::all());

    //     $fields = array_keys($conta->getAttributes());

    //     $this->assertEqualsCanonicalizing([
    //         'id',
    //         'conta',
    //         'saldo',
    //         'created_at',
    //         'updated_at'
    //             ], $fields);
    // }
    public function teste_create_account()
    {
        $contas = Conta::create([
            'conta'=> 11111
        ]);

        $this->assertDatabaseHas('contas',[
            'conta' => 11111
        ]);

        $this->assertEquals(11111, $contas->conta );
    }

    public function teste_delete_account()
    {
        $conta = factory(Conta::class)->create();
        $conta->delete();
        $this->assertNull(Conta::find($conta->conta));
    }
}
