<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // Pastikan ini mengarah ke Illuminate\Routing\Controller

class Controller extends BaseController // Dan class ini extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
