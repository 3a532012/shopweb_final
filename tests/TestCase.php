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
            'id' => 2,
            'name' => 'yish'
        ]);

        $this->be($user);
    }
    public function initDatabase()
    {
        Artisan::call('migrate:reset');
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

}
