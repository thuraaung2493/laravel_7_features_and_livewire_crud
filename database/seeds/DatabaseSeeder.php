<?php

use App\Contact;
use App\User;
use App\Vacation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Contact::class, 40)->create();
        factory(Vacation::class, 3)->create();
    }
}
