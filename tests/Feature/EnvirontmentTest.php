<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

class EnvirontmentTest extends TestCase
{
    public function test_get_environment()
    {
        $environment = env("YOUTUBE");
        self::assertEquals("Programmer Zaman Now", $environment);
    }

    public function test_get_default_env()
    {
        $environment = Env::get("AUTHOR", "Yusharnadi");
        self::assertEquals("Yusharnadi", $environment);
    }
}
