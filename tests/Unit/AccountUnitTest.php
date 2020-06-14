<?php

namespace Tests;

use App\Conta;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AccountUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testFillable()
    {
        $fillable = ['conta','saldo'];
        $this->assertEquals($fillable,(new Conta())->getFillable());
    }

}
