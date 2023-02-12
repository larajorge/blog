<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la Tabla
        User::truncate();
        $faker = Factory::create();
        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para el seeder, no se vuelva lento

        $password = Hash::make('123456');
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@rueda.com',
            'password' => $password,
        ]);

        //Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
