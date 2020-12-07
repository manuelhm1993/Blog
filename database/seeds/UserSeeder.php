<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 29)->create();

        User::create([
            'name' => 'Manuel Henriquez',
            'email' => 'manuelhm1993@gmail.com',
            'password' => bcrypt('Clave1234'),
        ]);
    }
}
