<?php
include_once 'Pasajero.php';
include_once 'ResponsableV.php';
include_once 'Viaje.php';


echo "                      ¡MENU DEL VIAJE!                      \n";
echo"Ingrese destino:\n";
$destino=trim(fgets(STDIN));
echo"Ingrese codigo del viaje:\n";
$codViaje=trim(fgets(STDIN));
echo "ingrese cantidad de pasajes totales:\n";
$cantidadPasajero=trim(fgets(STDIN));

$pasajero1=new Pasajero("Ana","Rosa",43391007,47567987);
$pasajero2=new Pasajero("Amiel","Valencia",18102822,2995643768);
$pasajero3=new Pasajero("liza","Mont",32763512,154024225);
$pasajeros=[$pasajero1,$pasajero2,$pasajero3];


$ObjperResponsable=new ResponsableV(0045,1807,"sol","estrella");
$Viaje=new Viaje($codViaje,$destino,$cantidadPasajero,$pasajeros,$ObjperResponsable);

function menu()
{
      $menu= "                OPCIONES                \n".
     "opcion 1 Agregar pasajero:\n".
     "opcion 2 Modificar el destino del viaje:\n".
     "opcion 3 Modificar pasajero:\n".
     "opcion 4 Quitar pasajero:\n".
     "opcion 5 Modificar la cantidad de asientos del viaje:\n".
     "opcion 6 Modificar el codigo del viaje:\n".
     "opcion 7 Ver Viaje:\n".
     "opcion 8 Ver datos de Persona Responsable:\n".
     "opcion 9 Modificar datos de Persona Responsable:\n".
     "opcion 10 salir.\n";
     return $menu;
}

function recogerDatos(){
    echo"Nombre: ";
    $nombre=trim(fgets(STDIN))."\n";
    echo"Apellido: ";
    $apellido=trim(fgets(STDIN))."\n";
    echo"DNI: ";
    $dni=strval(trim(fgets(STDIN)))."\n";
    echo "Telefono: ";
    $telefono=trim(fgets(STDIN))."\n";
}

$ejecucion=true;
do {
    print menu();
   $opc=trim(fgets(STDIN));
    switch ($opc) {
        case '1':
            if($Viaje->hayPasajesDisponible()){
                echo "Ingrese los datos de un pasajero: \n";
                $pasajero = recogerDatos();
             
               echo $Viaje->venderPasaje($pasajero);
            
            }else{
                echo "No hay mas lugare en este viaje.\n";
            }            
            break;
        
        case '2':
            echo "El viaje con destino a: {$Viaje->getDestino()}. \n";
            echo "Ingrese el nuevo destino: \n";
            $destino = trim(fgets(STDIN));
            $Viaje->setDestino($destino);
            break;
        
        case '3':
             echo "Ingrese los datos del pasajero a modificar: \n";
            $pasajero = recogerDatos();
            echo "Ingrese los nuevos datos: \n";
            $otroPasajero = recogerDatos();
            $resultado= $Viaje->cambiaDatosPasajeros($pasajero, $otroPasajero);
            if($resultado==true){
               echo "El dato de a sido modificado\n";
            }else{
                echo "no se encontro el pasajero\n";
            }
            break;
        
        case '4':
            echo "Ingrese los datos del pasajero a quitar: \n";
            $pasajero = recogerDatos();
            echo $Viaje->eliminarPasajero($pasajero);
            echo "\nse elimino correctamente!\n";
            break;
        
        case '5':
            echo "El viaje posee {$Viaje->getCantidadPasajero()} asientos. \n";
            echo "Ingrese la nueva cantidad de asientos: \n";
            $cantidadAsientos = trim(fgets(STDIN));
            $cantidadAsientos = intval($cantidadAsientos);
            $Viaje->setCantidadPasajero($cantidadAsientos);
            break;
        
        case '6':
            echo "El viaje posee el código: {$Viaje->getCodigoViaje()}. \n";
            echo "Ingrese el nuevo código: \n";
            $codigo = trim(fgets(STDIN));
            $codigo = intval($codigo);
            $Viaje->setCodigoViaje($codigo);
            break;
        
        case '7':
            echo $Viaje->__toString();
            break;

        case '8':
            $ResponsableV=$$ObjperResponsable;
            echo $ResponsableV;
            break;

        case '9':
            echo "Modifique los datos del Responsable \n" .
            "Numero de empleado: \n";
            $numEmpleado=trim(fgets(STDIN))."\n";
            echo "Ingrese numero de licencia: \n";
            $numLicencia=trim(fgets(STDIN))."\n";
            echo"Nombre responsable: \n";
            $nombre=trim(fgets(STDIN))."\n";
            echo"Apellido responsable: \n";
            $apellido=trim(fgets(STDIN))."\n";
            $ResponsableV=$ObjperResponsable->setNumEmpleado($numEmpleado);
            $ResponsableV=$ObjperResponsable->setNumLicencia($numLicencia);
            $ResponsableV=$ObjperResponsable->setNombre($nombre);
            $ResponsableV=$ObjperResponsable->setApellido($apellido);
            break;

        default:
        $ejecucion=false;
        break;
    }
} while ($ejecucion == true);
