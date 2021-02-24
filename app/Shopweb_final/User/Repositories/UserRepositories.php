<?php


namespace App\Shopweb_final\User\Repositories;


use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepositories
{

    public function __construct()
    {

    }
    public function getUserId()
    {

        return Auth::user()->id;
    }
}
