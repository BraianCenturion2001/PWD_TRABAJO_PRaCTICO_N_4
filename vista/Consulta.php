<?php
$Titulo = 'Consultas';
include_once('./estructura/cabecera.php'); ?>

<div class="container-sm p-4">
    <div class="container text-center">
        <h4><i class="fa-solid fa-clipboard-question"></i> Consultas</h4>
        <h5>Compártenos tu duda, en breve te la responderemos</h5>
    </div>

    <hr>

    <form action="./accionComentario.php" method="post" name="Consulta" id="Consulta" autocomplete=off novalidate class="row g-3">
        <div class="form-group col-md-4">
            <label for=nombre class="form-label">Nombre: </label>
            <input class="form-control" name=nombre id=nombre type=text>
        </div>
        <div class="form-group col-md-4">
            <label for=apellido class="form-label">Apellido: </label>
            <input class="form-control" name=apellido id=apellido type=text>
        </div>
        <div class="form-group col-md-4">
            <label for=email class="form-label">Email: </label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
        </div>
        <div class="form-group col-md-12">
            <label for="comentario" class="form-label">Consulta: </label>
            <textarea class="form-control" name="comentario" id="comentario" rows="5"></textarea>
        </div>
        <div class="col-md-6">
            <input type=submit value="Enviar" class="btn btn-outline-success">
        </div>
        <div class="form-group">
            <input hidden checked class="form-check-input" type="radio" name="motivo" id="motivo" value="Consulta">
        </div>
    </form>
</div>

</div>


<?php include_once('./estructura/pie.php'); ?>