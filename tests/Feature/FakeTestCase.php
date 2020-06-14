<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FakeTestCase
{

    public $uri;

    public $data = [];

    public $headers = [];

    use \MarvinRabe\LaravelGraphQLTest\TestGraphQL;

    public function postJson($uri, array $data = [], array $headers = [])
    {
        $this->uri = $uri;
        $this->data = $data;
        $this->headers = $headers;
    }
}
