<?php

namespace App\Http\Controllers;

use App\Services\MfService;

class MfLoginController extends Controller
{
    public function __invoke(MfService $mfService)
    {
        return $mfService->login(
            config('mf.phone'),
            config('mf.password')
        );
    }
}
