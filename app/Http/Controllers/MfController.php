<?php

namespace App\Http\Controllers;

use App\Services\MfService;
use Illuminate\Http\Request;

class MfController extends Controller
{
    protected $mfService;

    public function __construct(MfService $mfService) {
        $this->mfService = $mfService;
    }

    public function getLatestLoan($customerId)
    {
        $this->mfService->login(config('mf.phone'), config('mf.password'));

        return $this->mfService->latestLoan($customerId);
    }

    public function imageUpload()
    {
        return $this->mfService->imageUpload();
    }
}
