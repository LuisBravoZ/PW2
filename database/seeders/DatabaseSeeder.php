<?php

namespace Database\Seeders;

use App\Models\DatoPersonal;
use App\Models\Estado;
use App\Models\Rol;
use App\Models\User;
use Database\Factories\UsuarioFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{ 
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password'=>'Tierrita24'
        ]);

 
        Rol::factory()->create([
            'nombre_rol' => 'Administrador',
            'descripcion' => 'test@example.com',
        ]);
        Rol::factory()->create([
            'nombre_rol' => 'Nutricionista',
            'descripcion' => 'test@example.com',
        ]);
        Rol::factory()->create([
            'nombre_rol' => 'Paciente',
            'descripcion' => 'test@example.com',
        ]);

        $this->call(UsuarioSeeder::class);
        $this->call(DatoPersonalSeeder::class);

        // Crear estados en la base de datos
        Estado::factory()->create([
            'nombre_estado' => 'No tomado',
            'descripcion' => 'Turno no tomado aún.',
        ]);

        Estado::factory()->create([
            'nombre_estado' => 'Terminado',
            'descripcion' => 'Turno ya finalizado.',
        ]);

        Estado::factory()->create([
            'nombre_estado' => 'Reservado',
            'descripcion' => 'Turno reservado por un paciente.',
        ]);

        Estado::factory()->create([
            'nombre_estado' => 'Cancelado',
            'descripcion' => 'Turno cancelado.',
        ]);


        $this->call(TurnoSeeder::class);

  

    }

}