<?php
$Titulo = 'Consultas';
include_once('./estructura/cabecera.php');?>


<div class="container-sm">
    <div class="card mb-5 mt-5">
        <div class="card-body text-center">
            <h2 class="card-title">Consultas</h2>
            <p class="card-text">Dejanos tu consulta, en breve te la responderemos</p>
        </div>
    </div>  
    <div class="container-fluid mb-5">
        <form action="./accionComentario.php" method="post" name="Consulta" id="Consulta">
           <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label for="nombre" class="form-label"><h4>Nombre</h4></label>
                    <input type="text"
                        class="form-control text-center" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label for="apellido" class="form-label"><h4>Apellido</h4></label>
                    <input type="text"
                        class="form-control form-control-sm text-center" name="apellido" id="apellido" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
            </div>
           </div>           
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="mb-3">
                        <label for="email" class="form-label"><h4>Email</h4></label>
                        <input type="email" class="form-control text-center" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
                        <small id="emailHelpId" class="form-text text-muted">Help text</small>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 ">
                    
                    <div class="d-flex justify-content-around bd-highlight ">
                    <div class="form-check form-check-inline">
                        <input hidden checked class="form-check-input" type="radio" name="motivo" id="" value="Consulta">
                        <label hidden class="form-check-label" for="">Consulta</label>
                    </div>
                    
                    </div>
                </div>
                
            </div>
            
            <div class="mb-3">
                <label for="comentario" class="form-label"><h4>Comentario</h4></label>
                <textarea class="form-control" name="comentario" id="comentario" rows="5"></textarea>
            </div>

            <div class="row">
                <div class="col-6 w-15"><button type="submit" class="btn btn-outline-success w-100">Enviar</button></div>
                <div class="col-6"><button type="reset" class="btn btn-outline-danger w-100">Borrar</button></div>
            </div>

        </form>
    </div>

</div>


<?php include_once('./estructura/pie.php');?>