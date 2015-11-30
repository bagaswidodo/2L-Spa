<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
         App\User::create([
            'name' => 'Amitav Roy',
            'email' => 'reachme@amitavroy.com',
            'password' => \Hash::make('pass'),
        ]);

        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
