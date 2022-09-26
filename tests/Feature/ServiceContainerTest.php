<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function test_create_dependency_injection()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("Foo", $foo1->foo());
        self::assertEquals("Foo", $foo2->foo());

        self::assertNotSame($foo1, $foo2);
    }

    public function test_bind()
    {
        // $person = $this->app->make(Person::class); //bakal error
        // self::assertNotNull($person); //Unresolvable dependency resolving [Parameter #0 [ <required> string $firstName ]] in class App\Data\Person

        $this->app->bind(Person::class, function ($app) {
            return new Person("Eko", "Kurniawan");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Eko", $person1->firstName);
        self::assertEquals("Eko", $person2->firstName);

        self::assertNotSame($person1, $person2);
    }

    public function test_singleton()
    {

        $this->app->singleton(Person::class, function ($app) {
            return new Person("Eko", "Kurniawan");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Eko", $person1->firstName);
        self::assertEquals("Eko", $person2->firstName);

        self::assertSame($person1, $person2);
    }

    public function test_instance()
    {
        $person = new Person("Eko", "kurniawan");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Eko", $person1->firstName);
        self::assertEquals("Eko", $person2->firstName);

        self::assertSame($person1, $person2);
    }

    public function test_interface_to_class()
    {
        $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        // $this->app->singleton(HelloService::class, function () {
        //     return new HelloServiceIndonesia();
        // });


        $hello = $this->app->make(HelloService::class);

        self::assertEquals("Halo Eko", $hello->hello("Eko"));
    }
}
