<?php

use App\User;
use App\Restaurante;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function seedUsers() {
        User::create(array('name' => 'Manolo','email' => 'manolotoro80@gmail.com', 'password' => bcrypt('12345678'), 'fechanacimiento' => date('1999-10-05'), "imagenusuario" => "img/defecto.png",'rol' => 'administrador'));
    }

    public function seedRestaurantes() {
        Restaurante::create(array('ciudad' => 'Barcelona','zona' => 'C.C. Som Multiespai','numeromesas' => '50', 'telefono' => '123456789'));
        Restaurante::create(array('ciudad' => 'Barcelona','zona' => 'Terrassa C.C. Parc Vallès','numeromesas' => '45', 'telefono' => '987654321'));
        Restaurante::create(array('ciudad' => 'Castellón','zona' => 'C.C. Estepark','numeromesas' => '30', 'telefono' => '147852369'));
        Restaurante::create(array('ciudad' => 'Córdoba','zona' => 'C.C. El Arcángel','numeromesas' => '25', 'telefono' => '157946358'));
        Restaurante::create(array('ciudad' => 'Granada','zona' => 'Universidad','numeromesas' => '30', 'telefono' => '267493118'));
        Restaurante::create(array('ciudad' => 'León','zona' => 'C.C. El Rosal Ponferrada','numeromesas' => '30', 'telefono' => '492116734'));
        Restaurante::create(array('ciudad' => 'Madrid','zona' => 'Bernabéu','numeromesas' => '50', 'telefono' => '404565891'));
        Restaurante::create(array('ciudad' => 'Madrid','zona' => 'Moncloa','numeromesas' => '42', 'telefono' => '102030405'));
        Restaurante::create(array('ciudad' => 'Málaga','zona' => 'C.C. Plaza Mayor','numeromesas' => '30', 'telefono' => '753159426'));
        Restaurante::create(array('ciudad' => 'Murcia','zona' => 'Cartagena Centro','numeromesas' => '30', 'telefono' => '111222333'));
        Restaurante::create(array('ciudad' => 'Navarra','zona' => 'Huarte C.C. Itaroa','numeromesas' => '30', 'telefono' => '444555666'));
        Restaurante::create(array('ciudad' => 'Sevilla','zona' => 'C.C. Los Arcos','numeromesas' => '30', 'telefono' => '777888999'));
        Restaurante::create(array('ciudad' => 'Sevilla','zona' => 'Camas C.C. Carrefour','numeromesas' => '30', 'telefono' => '167429840'));
        Restaurante::create(array('ciudad' => 'Valencia','zona' => 'Valencia Universidades','numeromesas' => '30', 'telefono' => '149630245'));
        Restaurante::create(array('ciudad' => 'Zaragoza','zona' => 'Intu Puerto Venecia','numeromesas' => '30', 'telefono' => '815567740'));
    }

    public function run()
    {
        $this->seedUsers();
        $this->seedRestaurantes();
    }
}
