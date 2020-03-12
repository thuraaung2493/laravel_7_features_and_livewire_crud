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
        ])->get(config('mf.banks_url'));

        if ($response->clientError()) {
            return ['message' => 'Client Error', 'statusCode' => $response->status()];
        }

        if ($response->serverError()) {
            return ['message' => 'Server Error', 'statusCode' => $response->status()];
        }

        if ($response->successful()) {
            return $response->json();
        }
    }

    public function login($phone, $password)
    {
        $response = Http::withHeaders([
            'app-id' => config('mf.app_id'),
            'secret-key' => config('mf.secret_key'),
        ])->asForm()->post(config('mf.login_url'), [
           'phone_number' => $phone,
           'password' => $password,
        ]);

        $this->token = $response['data']['token'];

        if ($response->clientError()) {
            return ['message' => 'Client Error', 'statusCode' => $response->status()];
        }

        if ($response->serverError()) {
            return ['message' => 'Server Error', 'statusCode' => $response->status()];
        }

        if ($response->successful()) {
            return $response->json();
        }
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
                        ->get(config('mf.latest_loan_url') . $customerId);

        if ($response->clientError()) {
            return ['message' => 'Client Error', 'statusCode' => $response->status()];
        }

        if ($response->serverError()) {
            return ['message' => 'Server Error', 'statusCode' => $response->status()];
        }

        if ($response->successful()) {
            return $response->json();
        }
    }

    public function imageUpload()
    {
        $response = Http::withHeaders([
            'app-id' => config('mf.app_id'),
            'secret-key' => config('mf.secret_key'),
        ])->attach(
            'image', file_get_contents(config('mf.test_image')), 'pokemon.png'
        )->post(config('mf.image_upload_url'))->json();

        if ($response->clientError()) {
            return ['message' => 'Client Error', 'statusCode' => $response->status()];
        }

        if ($response->serverError()) {
            return ['message' => 'Server Error', 'statusCode' => $response->status()];
        }

        if ($response->successful()) {
            return $response->json();
        }
    }
}
