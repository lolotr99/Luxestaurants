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
        Restaurante::create(array('ciudad' => 'Barcelona','zona' => 'C.C. Som Multiespai','numeromesas' => '50', 'telefono' => '123456789', 'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=C.C%20Com%20Multiespai+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=13&iwloc=A&output=embed'));
        Restaurante::create(array('ciudad' => 'Barcelona','zona' => 'Terrassa C.C. Parc Vallès','numeromesas' => '45', 'telefono' => '987654321',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=Terrasa%20C.C.%20Parc%20Valles+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=13&iwloc=A&output=embed'));
        Restaurante::create(array('ciudad' => 'Castellón','zona' => 'C.C. Estepark','numeromesas' => '30', 'telefono' => '147852369',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=C.C%20Estepark+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=13&iwloc=A&output=embed'));
        Restaurante::create(array('ciudad' => 'Córdoba','zona' => 'C.C. El Arcángel','numeromesas' => '25', 'telefono' => '157946358',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=C.C%20El%20arcangel+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=13&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'Granada','zona' => 'Universidad','numeromesas' => '30', 'telefono' => '267493118',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=Granada%20Universidad+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=13&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'León','zona' => 'C.C. El Rosal Ponferrada','numeromesas' => '30', 'telefono' => '492116734',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=C.C%20Ponferrada+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=11&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'Madrid','zona' => 'Bernabéu','numeromesas' => '50', 'telefono' => '404565891',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=Bernabeu+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=11&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'Madrid','zona' => 'Moncloa','numeromesas' => '42', 'telefono' => '102030405',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=Moncloa+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=11&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'Málaga','zona' => 'C.C. Plaza Mayor','numeromesas' => '30', 'telefono' => '753159426',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=C.C.%20Plaza%20Mayor+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=11&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'Murcia','zona' => 'Cartagena Centro','numeromesas' => '30', 'telefono' => '111222333',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=Murcia%20Cartagena%20centro+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=20&iwloc=A&output=embed'));
        Restaurante::create(array('ciudad' => 'Navarra','zona' => 'Huarte C.C. Itaroa','numeromesas' => '30', 'telefono' => '444555666',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=Huarte%20C.C.%20Itaroa+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=17&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'Sevilla','zona' => 'C.C. Los Arcos','numeromesas' => '30', 'telefono' => '777888999',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=C.C.%20Los%20arcos+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=17&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'Sevilla','zona' => 'Camas C.C. Carrefour','numeromesas' => '30', 'telefono' => '167429840',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=Camas%20C.C.%20Carrefour+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=17&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'Valencia','zona' => 'Valencia Universidades','numeromesas' => '30', 'telefono' => '149630245',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=Valencia%20Universidades+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=17&iwloc=B&output=embed'));
        Restaurante::create(array('ciudad' => 'Zaragoza','zona' => 'Intu Puerto Venecia','numeromesas' => '30', 'telefono' => '815567740',  'mapa' => 'https://maps.google.com/maps?width=100%&height=600&hl=es&q=Intu%20Puerto%20Venecia+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=16&iwloc=B&output=embed'));
    }

    public function run()
    {
        $this->seedUsers();
        $this->seedRestaurantes();
    }
}
