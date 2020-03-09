<?php

namespace App\Http\Controllers;

use App\Services\MfService;

class MfBanksController extends Controller
{
    public function __invoke(MfService $mfService)
    {
        return $mfService->banks();
    }
}
