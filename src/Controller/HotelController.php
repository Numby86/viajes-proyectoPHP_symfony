<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Entity\Ventajas;
use App\Form\HotelType;
use App\Form\SearchType;
use App\Manager\HotelManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class HotelController extends AbstractController {

    #[Route("/inicio", name:"inicio")]
    public function inicio(EntityManagerInterface $doctrine, Request $request){

        $form = $this-> createForm(SearchType::class);
        $form-> handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()) {
            $hotel = $form -> get('hotel')->getData();
            return $this -> redirectToRoute('detalleHotel', ['id'=>$hotel->getId()]);
        }

        $repository = $doctrine->getRepository(Hotel::class);
        $hoteles = $repository->findAll();

        return $this -> render("hoteles/inicio.html.twig", ['hoteles' => $hoteles, 'hotelSearch'=>$form]);
    }


    #[Route("/hotel/{id}", name:"detalleHotel")]
    public function showHotel(EntityManagerInterface $doctrine, $id){

        $repository = $doctrine->getRepository(Hotel::class);
        $hotel = $repository->find($id);

        return $this -> render("hoteles/showHotel.html.twig", ["hotel" => $hotel]);
    }

    #[Route("/provinciahotel/{provincia}", name:"hotelProvincia")]
    
    public function provHoteles(EntityManagerInterface $doctrine, $provincia){

        $repository = $doctrine->getRepository(Hotel::class);
        $provincia = $repository->find($provincia);

    return $this -> render('hoteles/provHotel.html.twig', ['provincia' => $provincia]);
    }

    #[Route("/hoteles", name:"listaHoteles")]
    
    public function listHoteles(EntityManagerInterface $doctrine){

        $repository = $doctrine->getRepository(Hotel::class);
        $hoteles = $repository->findAll();

    return $this -> render('hoteles/listHoteles.html.twig', ['hoteles' => $hoteles]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route("/create/hotel")]
    public function createHotel(EntityManagerInterface $doctrine){

        $hotel1 = new Hotel();
        $hotel1 -> setNombre('Alojamiento Covadonga');
        $hotel1 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/max1280x900/332594859.jpg?k=ea2ed721376eb9ca9be1718dbe971f75c24fa644630b33d541cd59e10d268528&o=&hp=1');
        $hotel1 -> setDireccion('Avenida Castilla, 38');
        $hotel1 -> setCiudad('Cangas de Onis');
        $hotel1 -> setProvincia('Asturias');
        $hotel1 -> setPrecio(55);
        $hotel1 -> setValoracion(8.2);

        $hotel2 = new Hotel();
        $hotel2 -> setNombre('Hostal La Frontera');
        $hotel2 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/max1280x900/90194053.jpg?k=047b39317970c03b85450380ecb98046ea30be76361c32e6abe6947a73775727&o=&hp=1');
        $hotel2 -> setDireccion('San Andres, 4');
        $hotel2 -> setCiudad('Ferrol');
        $hotel2 -> setProvincia('Galicia');
        $hotel2 -> setPrecio(38);
        $hotel2 -> setValoracion(6.5);

        $hotel3 = new Hotel();
        $hotel3 -> setNombre('NH ciudad de Santander');
        $hotel3 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/276325316.webp?k=a541462c2ed5f74d5e9b600b224ba0f82cd3e40f5a752b65a31a566de1ac5dc2&o=&s=1');
        $hotel3 -> setDireccion('Menendez Pelayo,13-15');
        $hotel3 -> setCiudad('Santander');
        $hotel3 -> setProvincia('Cantabria');
        $hotel3 -> setPrecio(58);
        $hotel3 -> setValoracion(8);

        $hotel4 = new Hotel();
        $hotel4 -> setNombre('Hotel Ilunion San Sebastián');
        $hotel4 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/358565091.webp?k=4b48cbb9f1bfacaadd77015f7e228cca8dda8199c62e2a69d00728a77b933267&o=&s=1');
        $hotel4 -> setDireccion('Hotel Ilunion San Sebastián');
        $hotel4 -> setCiudad('San Sebastián');
        $hotel4 -> setProvincia('País Vasco');
        $hotel4 -> setPrecio(63);
        $hotel4 -> setValoracion(8.2);

        $hotel5 = new Hotel();
        $hotel5 -> setNombre('Albergue Kortarixar');
        $hotel5 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/260865861.webp?k=1faacf25118087d98a31dcc6d54e27b43c6e67d67cd3c3f5324d9deb879d0822&o=&s=1');
        $hotel5 -> setDireccion('Kortarixar, s/n');
        $hotel5 -> setCiudad('Elizondo');
        $hotel5 -> setProvincia('Navarra');
        $hotel5 -> setPrecio(40);
        $hotel5 -> setValoracion(6.6);

        $hotel6 = new Hotel();
        $hotel6 -> setNombre('Pension La Cubana');
        $hotel6 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/47195456.webp?k=3193735cca1658d91e083b9786c344a44f7c9cf07029c4849079c302cab59b3d&o=&s=1');
        $hotel6 -> setDireccion('Calle O´Daily, 24');
        $hotel6 -> setCiudad('Santa Cruz de la Palma');
        $hotel6 -> setProvincia('Canarias');
        $hotel6 -> setPrecio(35);
        $hotel6 -> setValoracion(7.5);

        $hotel7 = new Hotel();
        $hotel7 -> setNombre('Hotel Boutique La Neu');
        $hotel7 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/134711637.webp?k=469a24c7a045c794b9e5f9be4c41473e0c9902cfc66b2c078f53f71b5c48d134&o=&s=1');
        $hotel7 -> setDireccion('Calle Villacampa, 6');
        $hotel7 -> setCiudad('Benasque');
        $hotel7 -> setProvincia('Aragón');
        $hotel7 -> setPrecio(155);
        $hotel7 -> setValoracion(9.4);

        $hotel8 = new Hotel();
        $hotel8 -> setNombre('Hotel Món Sant Benet');
        $hotel8 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/416341194.webp?k=dd2a5b7e11926581931c703ee62b49e4eb357e8d63744d893af05c23c3380806&o=&s=1');
        $hotel8 -> setDireccion('Camí de Sant Benet s/n');
        $hotel8 -> setCiudad('Sant Fruitos de Bages');
        $hotel8 -> setProvincia('Cataluña');
        $hotel8 -> setPrecio(145);
        $hotel8 -> setValoracion(8.7);

        $hotel9 = new Hotel();
        $hotel9 -> setNombre('Torre de Briñas Private Resort');
        $hotel9 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/263653174.webp?k=f18845c806a11f875cccdd957317883a19ca8d6e57fd8a36053e283148d955ac&o=&s=1');
        $hotel9 -> setDireccion('Travesía Real, 4');
        $hotel9 -> setCiudad('Briñas');
        $hotel9 -> setProvincia('La rioja');
        $hotel9 -> setPrecio(119);
        $hotel9 -> setValoracion(9.7);

        $hotel10 = new Hotel();
        $hotel10 -> setNombre('Cas Ferrer Nou Hotelet');
        $hotel10 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/83818251.webp?k=c6f40d85c072177b5f11724782b1b599b7bcff6b8aa652fff2e3a82b5ff0f54b&o=&s=1');
        $hotel10 -> setDireccion('Calle Pou Nou, 1');
        $hotel10 -> setCiudad('Alcudia');
        $hotel10 -> setProvincia('Islas Baleares');
        $hotel10 -> setPrecio(106);
        $hotel10 -> setValoracion(8.7);

        $hotel11 = new Hotel();
        $hotel11 -> setNombre('Hostal Juan Bravo');
        $hotel11 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/295344706.webp?k=2741e26366d50c3e12ee345a22572286e555ec5072c055ff07962471744f6619&o=&s=1');
        $hotel11 -> setDireccion('Juan Bravo, 12');
        $hotel11 -> setCiudad('Segovia');
        $hotel11 -> setProvincia('Castilla y León');
        $hotel11 -> setPrecio(42);
        $hotel11 -> setValoracion(7.5);

        $hotel12 = new Hotel();
        $hotel12 -> setNombre('Hostel Napoles');
        $hotel12 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/333345972.webp?k=f14deeba2814c765c254b287e67f56918f6d9a967b4aad34b8ef5cb40151682a&o=&s=1');
        $hotel12 -> setDireccion('Hortaleza, 64');
        $hotel12 -> setCiudad('Madrid');
        $hotel12 -> setProvincia('Madrid');
        $hotel12 -> setPrecio(22);
        $hotel12 -> setValoracion(5);

        $hotel13 = new Hotel();
        $hotel13 -> setNombre('Apartamentos Oncemolinos');
        $hotel13 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/365338490.webp?k=f188f7ba83c851ebf21b9bc38874846d6a8f0933f99800d7d2861a21170eacdb&o=&s=1');
        $hotel13 -> setDireccion('Calle Urda, 51');
        $hotel13 -> setCiudad('Consuegra');
        $hotel13 -> setProvincia('Castilla La Mancha');
        $hotel13 -> setPrecio(85);
        $hotel13 -> setValoracion(9.4);

        $hotel14 = new Hotel();
        $hotel14 -> setNombre('Apartamentos Turísticos El Altozano');
        $hotel14 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/376373301.webp?k=f9e548b59290c1ae92f795ccf13a847c33b183407ae7e3bbd0a14a2a2e3015c5&o=&s=1');
        $hotel14 -> setDireccion('Calle Juan Carlos I, 11');
        $hotel14 -> setCiudad('Fuentes de León');
        $hotel14 -> setProvincia('Extremadura');
        $hotel14 -> setPrecio(135);
        $hotel14 -> setValoracion(10);

        $hotel15 = new Hotel();
        $hotel15 -> setNombre('La Casa Verde');
        $hotel15 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/215731092.webp?k=f9de4b515459cec502e19d9c1ab907c30d5fce6bb52fffbebf3fc669608ce556&o=&s=1');
        $hotel15 -> setDireccion('Carril De La Esparza, 9');
        $hotel15 -> setCiudad('Murcia');
        $hotel15 -> setProvincia('Murcia');
        $hotel15 -> setPrecio(38);
        $hotel15 -> setValoracion(7.7);

        $hotel16 = new Hotel();
        $hotel16 -> setNombre('Carrer Abad Fernández Helguera');
        $hotel16 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/408646590.webp?k=caef3342847644891f102a60e040dd32c6fc99825c1df24c164ba0d272a79f24&o=&s=1');
        $hotel16 -> setDireccion('Carrer Abad Fernández Helguera');
        $hotel16 -> setCiudad('Alicante');
        $hotel16 -> setProvincia('Comunidad Valenciana');
        $hotel16 -> setPrecio(22);
        $hotel16 -> setValoracion(4.5);

        $hotel17 = new Hotel();
        $hotel17 -> setNombre('VAC LUXURY HOME SEVILLA');
        $hotel17 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/253751511.webp?k=8e6ad30d69ba71b9684cb133e01dbd6ae8f88dfbb58090d54ed1a3025ad6191e&o=&s=1');
        $hotel17 -> setDireccion('Calle Lepanto, 5');
        $hotel17 -> setCiudad('Sevilla');
        $hotel17 -> setProvincia('Andalucia');
        $hotel17 -> setPrecio(175);
        $hotel17 -> setValoracion(9.2);

        $hotel18 = new Hotel();
        $hotel18 -> setNombre('Hotel Ceuta Puerta de Africa');
        $hotel18 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/20717319.webp?k=0ed555c8674475b664a4c09ba6e7b5695b559e3da20781feee078ec940649e86&o=&s=1');
        $hotel18 -> setDireccion('Alcalde Sanchez Prados, 3');
        $hotel18 -> setCiudad('Ceuta');
        $hotel18 -> setProvincia('Ceuta');
        $hotel18 -> setPrecio(74);
        $hotel18 -> setValoracion(7.3);

        $hotel19 = new Hotel();
        $hotel19 -> setNombre('Hotel Anfora');
        $hotel19 -> setImagen('https://cf.bstatic.com/xdata/images/hotel/square600/70783395.webp?k=4b3c3bbc133da7a89a212c03c80690ced70802e1812ad5d327b4e4907bccb03f&o=&s=1');
        $hotel19 -> setDireccion('Pablo Vallesca, 16,');
        $hotel19 -> setCiudad('Melilla');
        $hotel19 -> setProvincia('Melilla');
        $hotel19 -> setPrecio(65);
        $hotel19 -> setValoracion(7.7);

        $ventaja1 = new Ventajas();
        $ventaja1 -> setNombre('Piscina');

        $ventaja2 = new Ventajas();
        $ventaja2 -> setNombre('Playa cerca');

        $ventaja3 = new Ventajas();
        $ventaja3 -> setNombre('Gimnasio');

        $ventaja4 = new Ventajas();
        $ventaja4 -> setNombre('Parking gratuito');

        $ventaja5 = new Ventajas();
        $ventaja5 -> setNombre('Wifi alta velocidad');

        $ventaja6 = new Ventajas();
        $ventaja6 -> setNombre('Restaurante');

        $ventaja7 = new Ventajas();
        $ventaja7 -> setNombre('Cocina individual');

        $ventaja8 = new Ventajas();
        $ventaja8 -> setNombre('Desayuno gratis');

        $ventaja9 = new Ventajas();
        $ventaja9 -> setNombre('SPA');

        $hotel1 -> addVentaja($ventaja5);
        $hotel1 -> addVentaja($ventaja8);
        $hotel1 -> addVentaja($ventaja4);

        $hotel2 -> addVentaja($ventaja5);

        $hotel3 -> addVentaja($ventaja1);
        $hotel3 -> addVentaja($ventaja5);
        $hotel3 -> addVentaja($ventaja3);

        $hotel4 -> addVentaja($ventaja5);
        $hotel4 -> addVentaja($ventaja6);
        $hotel4 -> addVentaja($ventaja4);

        $hotel5 -> addVentaja($ventaja5);

        $hotel6 -> addVentaja($ventaja5);
        $hotel6 -> addVentaja($ventaja7);

        $hotel7 -> addVentaja($ventaja5);
        $hotel7 -> addVentaja($ventaja9);
        $hotel7 -> addVentaja($ventaja1);
        $hotel7 -> addVentaja($ventaja4);

        $hotel8 -> addVentaja($ventaja5);
        $hotel8 -> addVentaja($ventaja2);
        $hotel8 -> addVentaja($ventaja1);

        $hotel9 -> addVentaja($ventaja5);
        $hotel9 -> addVentaja($ventaja1);
        $hotel9 -> addVentaja($ventaja8);
        $hotel9 -> addVentaja($ventaja4);

        $hotel10 -> addVentaja($ventaja5);
        $hotel10 -> addVentaja($ventaja1);
        $hotel10 -> addVentaja($ventaja2);

        $hotel11 -> addVentaja($ventaja5);
        $hotel11 -> addVentaja($ventaja6);

        $hotel12 -> addVentaja($ventaja5);

        $hotel13 -> addVentaja($ventaja5);
        $hotel13 -> addVentaja($ventaja4);

        $hotel14 -> addVentaja($ventaja5);
        $hotel14 -> addVentaja($ventaja4);
        $hotel14 -> addVentaja($ventaja3);
        $hotel14 -> addVentaja($ventaja7);

        $hotel15 -> addVentaja($ventaja5);
        $hotel15 -> addVentaja($ventaja2);
        $hotel15 -> addVentaja($ventaja1);

        $hotel16 -> addVentaja($ventaja5);

        $hotel17 -> addVentaja($ventaja5);
        $hotel17 -> addVentaja($ventaja8);
        $hotel17 -> addVentaja($ventaja9);
        $hotel17 -> addVentaja($ventaja3);
        $hotel17 -> addVentaja($ventaja1);

        $hotel18 -> addVentaja($ventaja5);
        $hotel18 -> addVentaja($ventaja2);

        $hotel19 -> addVentaja($ventaja5);
        $hotel19 -> addVentaja($ventaja1);



        $doctrine->persist($hotel1);
        $doctrine->persist($hotel2);
        $doctrine->persist($hotel3);
        $doctrine->persist($hotel4);
        $doctrine->persist($hotel5);
        $doctrine->persist($hotel6);
        $doctrine->persist($hotel7);
        $doctrine->persist($hotel8);
        $doctrine->persist($hotel9);
        $doctrine->persist($hotel10);
        $doctrine->persist($hotel11);
        $doctrine->persist($hotel12);
        $doctrine->persist($hotel13);
        $doctrine->persist($hotel14);
        $doctrine->persist($hotel15);
        $doctrine->persist($hotel16);
        $doctrine->persist($hotel17);
        $doctrine->persist($hotel18);
        $doctrine->persist($hotel19);

        $doctrine->persist($ventaja1);
        $doctrine->persist($ventaja2);
        $doctrine->persist($ventaja3);
        $doctrine->persist($ventaja4);
        $doctrine->persist($ventaja5);
        $doctrine->persist($ventaja6);
        $doctrine->persist($ventaja7);
        $doctrine->persist($ventaja8);
        $doctrine->persist($ventaja9);

        $doctrine->flush();
        return new Response("Hoteles insertados correctamente");
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route("/new/hotel", name:"newHotel")]
    
    public function newHotel(Request $request, EntityManagerInterface $doctrine, HotelManager $manager){

        $form = $this-> createForm(HotelType::class);
        $form-> handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()) {
            $hotel = $form -> getData();
            $hotelImage = $form ->get('imagenHotel')-> getData();
            if($hotelImage) {
                $hoteImagen = $manager -> load($hotelImage, $this->getParameter('kernel.project_dir').'/public/assets/image');
                $hotel -> setImagen('/assets/image/'.$hoteImagen);
            }
            $doctrine -> persist($hotel);
            $doctrine->flush();
            $this -> addFlash('success', 'Hotel creado correctamente');
            return $this -> redirectToRoute('listaHoteles');
        }

        return $this-> renderForm("hoteles/crearHotel.html.twig", 
        [
            'hotelForm' => $form
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route("/edit/hotel/{id}", name:"editHotel")]
    
    public function editHotel(Request $request, EntityManagerInterface $doctrine, $id){

        $repository = $doctrine->getRepository(Hotel::class);
        $hotel = $repository->find($id);

        $form = $this-> createForm(HotelType::class, $hotel);
        $form-> handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()) {
            $hotel = $form -> getData();
            $doctrine -> persist($hotel);
            $doctrine->flush();
            $this -> addFlash('success', 'Hotel creado correctamente');
            return $this -> redirectToRoute('listaHoteles');
        }

        return $this-> renderForm("hoteles/crearHotel.html.twig", 
        [
            'hotelForm' => $form
        ]);
    }
    #[Route("/delete/hotel/{id}", name:"deleteHotel")]
    public function deleteHotel(EntityManagerInterface $doctrine, $id){

        $repository = $doctrine->getRepository(Hotel::class);
        $hotel = $repository->find($id);
        $doctrine -> remove($hotel);
        $doctrine->flush();
        $this -> addFlash('success', 'El Hotel se elimino correctamente');

        return $this -> redirectToRoute("listaHoteles");
    }

}