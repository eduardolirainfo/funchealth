<?php

namespace Tests;

use App\Conta;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Console\Kernel;

abstract class TestCase extends BaseTestCase
{

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    // public function setUp():void
    // {
    // parent::setUp();

    // // more codes here
    // }
}
