<?php
declare(strict_types=1);

namespace App\Http\Controllers;


class UserController
{
    public function index()
    {
        return view('user');
    }
}
