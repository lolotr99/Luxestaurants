<?php

use App\User;
use App\Restaurante;
use App\Plato;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function seedUsers() {
        User::create(array('name' => 'Admin','email' => 'aboutluxestaurants@gmail.com', 'password' => bcrypt('12345678'), 'fechanacimiento' => date('1990-04-23'), "imagenusuario" => "img/defecto.png",'rol' => 'administrador'));
        User::create(array('name' => 'Manolo','email' => 'manolotoro80@gmail.com', 'password' => bcrypt('12345678'), 'fechanacimiento' => date('1999-10-05'), "imagenusuario" => "img/defecto.png",'rol' => 'basico'));
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

    public function seedCarta() {
        Plato::create(array('nombrePlato' => 'Omelette de Caviar Sevruga', 'descripcion' => 'La tortilla más cara del mundo no alcanza ese precio por su elaboración, sino por sus ingredientes. Consta de 6 huevos, caviar sevruga y una langosta acompañados de hierbas finas. Se sirve como desayuno y su presentación lo hace accesible solo para unos pocos.','imagenPlato' => 'img/carta/omeletteCaviarSevruga.png','precioPlato'=> 637));
        Plato::create(array('nombrePlato' => 'Jamón ibérico Cinco Jotas', 'descripcion' => '80 g del mejor jamón de Cinco Jotas. Es 100% ibérico de bellota y tiene su origen en animales que han sido criados en libertad y han permanecido en la dehesa durante 4 años con controles de calidad muy estrictos.','imagenPlato' => 'img/carta/jamonIberico5jotas.png','precioPlato'=> 29));
        Plato::create(array('nombrePlato' => 'Queso de leche de alce', 'descripcion' => '80 g de queso de alce. Este queso se elabora a partir de la leche de los alces de la granja Moose House, al norte de Suecia. La exclusividad de este viene dada porque las hembras solo se pueden ordeñar entre mayo y septiembre.','imagenPlato' => 'img/carta/quesoLecheAlce.png','precioPlato'=> 86));
        Plato::create(array('nombrePlato' => 'Matsukake', 'descripcion' => 'El matsukake japonés tiene una variedad exclusiva porque crece debajo del pino rojo de la isla. Su producción anual es muy limitada de ahí su alto coste.','imagenPlato' => 'img/carta/matsukake.png','precioPlato'=> 25));
        Plato::create(array('nombrePlato' => 'Sukiyaki de Wagyu', 'descripcion' => 'Se trata de un solomillo en trozos, proveniente del buey de Wagyu, una raza que habita en Kobe (Japón). Es un filete único en su tipo, por su alto grado de marmoleo, suavidad y gran sabor además de la nula presencia de grasa.','imagenPlato' => 'img/carta/sukiyakiWagyu.png','precioPlato'=> 45));
        Plato::create(array('nombrePlato' => 'Tarta de mouse de trufa blanca', 'descripcion' => 'Tarta de mouse de chocolate blanco ambientada con un poco de trufa blanca. El precio de esta se eleva debido al coste de adquisición de la trufa blanca.','imagenPlato' => 'img/carta/tartaTrufaBlanca.png','precioPlato'=> 27));
        Plato::create(array('nombrePlato' => 'Sashimi de fugu', 'descripcion' => 'Proviene de la cocina de lujo japonesa y debe su nombre a las distintas preparaciones gastronómicas del pez globo de la isla. Requiere ser preparado por cocineros expertos debido al riesgo de la tetradotoxina, veneno mortal para los humanos.','imagenPlato' => 'img/carta/fugu.png','precioPlato'=> 260));
        Plato::create(array('nombrePlato' => 'Rollitos de lenguado', 'descripcion' => 'Este plato de pescado es típico en comidad navideñas o festivas. Son unos rollitos hechos con filetes de lenguado, rellenos de gambas y trigueros, al vino de chacolí','imagenPlato' => 'img/carta/rollitosLenguado.png','precioPlato'=> 25));
        Plato::create(array('nombrePlato' => 'Mero con berenjenas', 'descripcion' => 'El mero es un pescado blanco muy aprecidado, que con el adobo gana mucho en sabor. Este con berenjenas y tomatitos cherry te hará disfrutar de una experiencia única.','imagenPlato' => 'img/carta/meroBerenjenas.png','precioPlato'=> 22));
        Plato::create(array('nombrePlato' => 'Silla de cordero', 'descripcion' => 'La textura de este plato te conquistará el paladar. Su tierna y jugosa carne será la protagonista de una lujosa y deliciosa comida.','imagenPlato' => 'img/carta/sillaCordero.png','precioPlato'=> 30));
        Plato::create(array('nombrePlato' => 'Coca de sardinas', 'descripcion' => 'El crujiente sabor de esta coca de sardinas se basa en nuestro secreto en el modo de hornearlas. Disfruta de una experiencia única con nuestra coca de sardinas','imagenPlato' => 'img/carta/cocaSardinas.png','precioPlato'=> 15));


    }

    public function run()
    {
        $this->seedUsers();
        $this->seedRestaurantes();
        $this->seedCarta();
    }
}
