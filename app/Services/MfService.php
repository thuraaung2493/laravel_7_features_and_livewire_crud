<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MfService
{
    protected $token;

    public function banks()
    {
        $response = Http::withHeaders([
            'app-id' => config('mf.app_id'),
            'secret-key' => config('mf.secret_key'),
        ])->get(config('mf.banks_url'))->json();

        return $response;
    }

    public function login($phone, $password)
    {
        $response = Http::withHeaders([
            'app-id' => config('mf.app_id'),
            'secret-key' => config('mf.secret_key'),
        ])->asForm()->post(config('mf.login_url'), [
           'phone_number' => $phone,
           'password' => $password,
        ])->json();

        $this->token = $response['data']['token'];

        return $response;
    }

    public function latestLoan($customerId)
    {
        $response = Http::withToken($this->token)
                        ->withHeaders([
                            'Accept' => 'application/json',
                            'app-id' => config('mf.app_id'),
                            'secret-key' => config('mf.secret_key'),
                            'customer-id' => $customerId,
                        ])
                        ->get(config('mf.latest_loan_url') . $customerId)
                        ->json();

        return $response;
    }

    public function imageUpload()
    {
        $response = Http::withHeaders([
            'app-id' => config('mf.app_id'),
            'secret-key' => config('mf.secret_key'),
        ])->attach(
            'image', file_get_contents(config('mf.test_image')), 'pokemon.png'
        )->post(config('mf.image_upload_url'))->json();

        return $response;
    }
}
