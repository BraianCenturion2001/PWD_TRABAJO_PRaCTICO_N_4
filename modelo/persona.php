<?php 
class persona {
private $NroDni;
private $Apellido;
private $Nombre;
private $fechaNac;
private $Telefono;
private $Domicilio;
private $mensajeoperacion;


public function __construct(){
    $this->NroDni="";
    $this->Apellido="";
    $this->Nombre="";
    $this->fechaNac="";
    $this->Telefono="";
    $this->Domicilio="";
    $this->mensajeoperacion ="";
}
public function setear($NroDni, $Apellido, $Nombre, $fechaNac, $Telefono, $Domicilio) {
    $this->setNroDni($NroDni);
    $this->setApellido($Apellido);
    $this->setNombre($Nombre);
    $this->setfechaNac($fechaNac);
    $this->setTelefono($Telefono);
    $this->setDomicilio($Domicilio);
}

public function cargar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="SELECT * FROM persona WHERE NroDni = ".$this->getNroDni();
    if ($base->Iniciar()) {
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $row = $base->Registro();
                $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
            }
        }
    } else {
        $this->setMensajeoperacion("persona->listar: ".$base->getError());
    }
    return $resp;
}

public function insertar(){
    $resp = false;
    $base=new BaseDatos();
    // Si lleva ID Autoincrement, la consulta SQL no lleva dicho ID
    $sql="INSERT INTO persona(NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio) 
        VALUES('"
        .$this->getNroDni()."', '"
        .$this->getApellido()."', '"
        .$this->getNombre()."', '"
        .$this->getfechaNac()."', '"
        .$this->getTelefono()."', '"
        .$this->getDomicilio()."'
    );";
    if ($base->Iniciar()) {
        if ($esteid = $base->Ejecutar($sql)) {
            // Si se usa ID autoincrement, descomentar lo siguiente:
            // $this->setNroDni($esteid);
            $resp = true;
        } else {
            $this->setMensajeoperacion("persona->insertar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("persona->insertar: ".$base->getError());
    }
    return $resp;
}

public function modificar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="UPDATE persona SET 
        Apellido='".$this->getApellido()."', Nombre='".$this->getNombre()."', 
        fechaNac='".$this->getfechaNac()."', Telefono='".$this->getTelefono()."', 
        Domicilio='".$this->getDomicilio()."' WHERE NroDni=".$this->getNroDni();
  
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("persona->modificar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("persona->modificar: ".$base->getError());
    }
    return $resp;
}

public function eliminar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="DELETE FROM persona WHERE NroDni=".$this->getNroDni();
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("persona->eliminar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("persona->eliminar: ".$base->getError());
    }
    return $resp;
}

public static function listar($parametro=""){
    $arreglo = array();
    $base=new BaseDatos();
    $sql="SELECT * FROM persona ";
    if ($parametro!="") {
        $sql.='WHERE '.$parametro;
    }
    $res = $base->Ejecutar($sql);
    if($res>-1){
        if($res>0){
            while ($row = $base->Registro()){
                $obj= new persona();
                $obj->setear($row['NroDni'], 
                    $row['Apellido'], 
                    $row['Nombre'], 
                    $row['fechaNac'], 
                    $row['Telefono'], 
                    $row['Domicilio']);
                array_push($arreglo, $obj);
            }
        }
    } else {
        $this->setMensajeoperacion("persona->listar: ".$base->getError());
    }

    return $arreglo;
}
    
// -- Métodos get y set --

public function getNroDni() {
    return $this->NroDni;
}
public function setNroDni($NroDni) {
    $this->NroDni = $NroDni;
    return $this;
}

public function getApellido() {
    return $this->Apellido;
}
public function setApellido($Apellido) {
    $this->Apellido = $Apellido;
    return $this;
}

public function getNombre() {
    return $this->Nombre;
}
public function setNombre($Nombre) {
    $this->Nombre = $Nombre;
    return $this;
}

public function getfechaNac() {
    return $this->fechaNac;
}
public function setfechaNac($fechaNac) {
    $this->fechaNac = $fechaNac;
    return $this;
}

public function getTelefono() {
    return $this->Telefono;
}
public function setTelefono($Telefono) {
    $this->Telefono = $Telefono;
    return $this;
}

public function getDomicilio() {
    return $this->Domicilio;
}
public function setDomicilio($Domicilio) {
    $this->Domicilio = $Domicilio;
    return $this;
}

public function getMensajeoperacion() {
    return $this->mensajeoperacion;
}
public function setMensajeoperacion($mensajeoperacion) {
    $this->mensajeoperacion = $mensajeoperacion;
    return $this;
}
}

?>