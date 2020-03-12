<?php

return [
    'app_id' => 'wnV24w-O8SJiHqk2DYzynz',
    'secret_key' => 'fq7emqsxGUdXvZ6ck2mcH6Tvf-GbUgZZlcB1UMKn7wb99ny',

    'phone' => env('TEST_PHONE'),
    'password' => 123456,

    'test_image' => 'https://assets.pokemon.com/assets/cms2/img/misc/countries/mt/country_detail_pokemon.png',


    'banks_url' => env('BANKS_URL', 'http://sample.com/banks'),
    'login_url' => env('LOGIN_URL', 'http://sample.com/login'),
    'latest_loan_url' => env('LATEST_LOAN_URL', 'http://sample.com/loan'),
    'image_upload_url' => env('IMAGE_UPLOAD_URL', 'http://sample.com/imageupload'),
];
