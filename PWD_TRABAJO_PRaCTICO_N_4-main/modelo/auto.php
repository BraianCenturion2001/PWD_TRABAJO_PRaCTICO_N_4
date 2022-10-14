<?php 
class auto extends BaseDatos {
private $Patente;
private $Marca;
private $Modelo;
private $ObjDuenio;
private $mensajeoperacion;


public function __construct(){
    parent::__construct();
    $this->Patente="";
    $this->Marca="";
    $this->Modelo="";
    $this->ObjDuenio="";
    $this->mensajeoperacion ="";
}
public function setear($Patente, $Marca, $Modelo, $ObjDuenio) {
    $this->setPatente($Patente);
    $this->setMarca($Marca);
    $this->setModelo($Modelo);
    $this->setObjDuenio($ObjDuenio);
}

public function cargar(){
    $resp = false;
    //$base=new BaseDatos();
    $sql="SELECT * FROM auto WHERE Patente = '".$this->getPatente()."'";
    if ($this->Iniciar()) {
        $res = $this->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $row = $this->Registro();
                $duenio = new Persona();
                $duenio->setNroDni($row['DniDuenio']);
                $duenio->cargar();
                $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $duenio);
            }
        }
    } else {
        $this->setMensajeoperacion("auto->listar: ".$this->getError());
    }
    return $resp;
}

public function insertar(){
    $resp = false;
    //$base=new BaseDatos();
    // Si lleva ID Autoincrement, la consulta SQL no lleva Patente. Y viceversa:
    $sql="INSERT INTO auto(Patente, Marca, Modelo, DniDuenio)
        VALUES('"
        .$this->getPatente()."', '"
        .$this->getMarca()."', '"
        .$this->getModelo()."', '"
        .$this->getObjDuenio()."');";
    if ($this->Iniciar()) {
        if ($this->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("auto->insertar: ".$this->getError());
        }
    } else {
        $this->setMensajeoperacion("auto->insertar: ".$this->getError());
    }
    return $resp;
}

public function modificar(){
    $resp = false;
    //$base=new BaseDatos();
    $dniDuenio = $this->getObjDuenio()->getNroDni();
   
    $sql="UPDATE auto SET Marca='".$this->getMarca()."', Modelo='".$this->getModelo()."', 
    DniDuenio='".$dniDuenio."' WHERE Patente='".$this->getPatente()."'";
   
    if ($this->Iniciar()) {
        if ($this->Ejecutar($sql)) {
            $resp = true;
         
        } else {
            $this->setMensajeoperacion("auto->modificar: ".$this->getError());
        }
    } else {
        $this->setMensajeoperacion("auto->modificar: ".$this->getError());
    }
    return $resp;
}

public function eliminar(){
    $resp = false;
    //$base=new BaseDatos();
    $sql="DELETE FROM auto WHERE Patente='".$this->getPatente()."'";
    if ($this->Iniciar()) {
        if ($this->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("auto->eliminar: ".$this->getError());
        }
    } else {
        $this->setMensajeoperacion("auto->eliminar: ".$this->getError());
    }
    return $resp;
}

public function listar($parametro=""){
    $arreglo = array();
    //$base=new BaseDatos();
    $sql="SELECT * FROM auto ";
   
    
    if ($parametro!="") {
        $sql.= "WHERE ".$parametro;
    }       
    if($this->Iniciar()){
        $res = $this->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $this->Registro()){
                    $obj= new auto();
                    $duenio = new Persona();
                    $duenio->setNroDni($row['DniDuenio']);
                    $duenio->cargar();
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $duenio);
                    array_push($arreglo, $obj);
                }
            }
        
        } else {        
            $this->setMensajeoperacion("auto->listar: ".$this->getError());
        }
    }   
   
    

    return $arreglo;
}
    
// -- Métodos get y set --

public function getPatente() {
    return $this->Patente;
}
public function setPatente($Patente) {
    $this->Patente = $Patente;
    return $this;
}

public function getMarca() {
    return $this->Marca;
}
public function setMarca($Marca) {
    $this->Marca = $Marca;
    return $this;
}

public function getModelo() {
    return $this->Modelo;
}
public function setModelo($Modelo) {
    $this->Modelo = $Modelo;
    return $this;
}

public function getObjDuenio() {
    return $this->ObjDuenio;
}
public function setObjDuenio($ObjDuenio) {
    $this->ObjDuenio = $ObjDuenio;
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