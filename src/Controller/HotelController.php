<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController {

    #[Route("/hotel")]
    public function showTrip(){
        $hotel = [
            'nombre' => 'Alojamiento Covadonga',
            'imagen' => 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/332594859.jpg?k=ea2ed721376eb9ca9be1718dbe971f75c24fa644630b33d541cd59e10d268528&o=&hp=1' , 
            'direccion' => 'Avenida Castilla 38',
            'ciudad' => 'Cangas de Onis',
            'provincia' => 'Asturias',
            'precio' => 55 ,
            'valoracion' => 8.2
        ];
        return $this -> render("hoteles/showHotel.html.twig", ["hotel" => $hotel]);
    }

}