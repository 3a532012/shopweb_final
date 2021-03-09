<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\User;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public function loginWithFakeUser()
    {
        $user = new User([
            'id' => 49,
            'name' => 'yish'
        ]);

        $this->be($user);
        return $this;
    }
    public function initDatabase()
    {
        Artisan::call('migrate:reset');
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
    protected function initMock($class)
    {
        $mock = \Mockery::mock($class);
        $this->app->instance($class, $mock);

        return $mock;
    }

}
