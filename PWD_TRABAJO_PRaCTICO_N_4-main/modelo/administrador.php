<?php 
class administrador extends BaseDatos{
private $id;
private $mail;
private $contrasenia;
private $mensajeoperacion;


public function __construct(){
    parent :: __construct();
    $this->id="";
    $this->mail="";
    $this->contrasenia="";
    $this->mensajeoperacion ="";
}
public function setear($id, $mail, $contrasenia) {
    $this->setId($id);
    $this->setMail($mail);
    $this->setContrasenia($contrasenia);
}

public function cargar(){
    $resp = false;
    //$base=new BaseDatos();
    $sql="SELECT * FROM administrador WHERE ID = '".$this->getId()."'";
    if ($this->Iniciar()) {
        $res = $this->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $row = $this->Registro();
                
                $this->setear($row['ID'], $row['Mail'], $row['Contrasenia']);
            }
        }
    } else {
        $this->setMensajeoperacion("administrador->listar: ".$this->getError());
    }
    return $resp;
}

public function insertar(){
    $resp = false;
    //$base=new BaseDatos();
    // Si lleva ID Autoincrement, la consulta SQL no lleva Patente. Y viceversa:
    $sql="INSERT INTO administrador(ID, Mail, Contrasenia)
        VALUES('"
        .$this->getId()."', '"
        .$this->getMail()."', '"
        .$this->getContrasenia()."');";
    if ($this->Iniciar()) {
        if ($this->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("administrador->insertar: ".$this->getError());
        }
    } else {
        $this->setMensajeoperacion("administrador->insertar: ".$this->getError());
    }
    return $resp;
}

public function modificar(){
    $resp = false;
    //$base=new BaseDatos();
    
   
    $sql="UPDATE administrador SET Mail='".$this->getMail()."', Contrasenia='".$this->getContrasenia(). 
    "' WHERE ID='".$this->getId()."'";
   
    if ($this->Iniciar()) {
        if ($this->Ejecutar($sql)) {
            $resp = true;
         
        } else {
            $this->setMensajeoperacion("administrador->modificar: ".$this->getError());
        }
    } else {
        $this->setMensajeoperacion("administrador->modificar: ".$this->getError());
    }
    return $resp;
}

public function eliminar(){
    $resp = false;
    //$base=new BaseDatos();
    $sql="DELETE FROM administrador WHERE ID='".$this->getId()."'";
    if ($this->Iniciar()) {
        if ($this->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("administrador->eliminar: ".$this->getError());
        }
    } else {
        $this->setMensajeoperacion("administrador->eliminar: ".$this->getError());
    }
    return $resp;
}

public function listar($parametro=""){
    $arreglo = array();
    //$base=new BaseDatos();
    $sql="SELECT * FROM administrador ";
   
    
    if ($parametro!="") {
        $sql.= "WHERE ".$parametro;
    }
    
    
    $res = $this->Ejecutar($sql);
    if($res>-1){
        if($res>0){
            while ($row = $this->Registro()){
                $obj= new administrador();
                
                $obj->setear($row['ID'], $row['Mail'], $row['Contrasenia']);
                array_push($arreglo, $obj);
            }
        }
    } else {
        $this->setMensajeoperacion("administrador->listar: ".$this->getError());
    }
    

    return $arreglo;
}
    
// -- Métodos get y set --

public function getId(){
    return $this->id;
}
public function setId($id){
    $this->id = $id;
    return $this;
}
public function getMail(){
    return $this->mail;
}
public function setMail($mail){
    $this->mail = $mail;
    return $this;
}
public function getContrasenia(){
    return $this->contrasenia;
}
public function setContrasenia($contrasenia){
    $this->contrasenia = $contrasenia;
    return $this; 
}
public function getMensajeOperacion(){
    return $this->mensajeoperacion;
}
public function setMensajeOperacion($mensaje){
    $this->mensajeoperacion = $mensaje;
    return $this;
}
} 


?>