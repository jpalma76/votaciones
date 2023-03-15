<?php

/* $txtIdVotante=(isset($_POST['txtIdVotante']))?$_POST['txtIdVotante']:""; */
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtAlias=(isset($_POST['txtAlias']))?$_POST['txtAlias']:"";
$txtRut=(isset($_POST['txtRut']))?$_POST['txtRut']:"";
$txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$txtRegion=(isset($_POST['txtRegion']))?$_POST['txtRegion']:"";
$txtComuna=(isset($_POST['txtComuna']))?$_POST['txtComuna']:"";
$txtCandidato=(isset($_POST['txtCandidato']))?$_POST['txtCandidato']:"";
$txtWeb=(isset($_POST['txtWeb']))?$_POST['txtWeb']:"";
$txtTv=(isset($_POST['txtTv']))?$_POST['txtTv']:"";
$txtRrss=(isset($_POST['txtRrss']))?$_POST['txtRrss']:"";
$txtAmigo=(isset($_POST['txtAmigo']))?$_POST['txtAmigo']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include('./config/conexion.php');

switch($accion) {
    case "votar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO votantes(nombre_votante,alias_votante,rut_votante,email_votante,region_votante,comuna_votante,eleccion_candidato,eleccion1,eleccion2,eleccion3,eleccion4) VALUES (:nombre_votante,:alias_votante,:rut_votante,:email_votante,:region_votante,:comuna_votante,:eleccion_candidato,:eleccion1,:eleccion2,:eleccion3,:eleccion4);");
        $sentenciaSQL->bindParam(':nombre_votante', $txtNombre);
        $sentenciaSQL->bindParam(':alias_votante', $txtAlias);
        $sentenciaSQL->bindParam(':rut_votante', $txtRut);
        $sentenciaSQL->bindParam(':email_votante', $txtEmail);
        $sentenciaSQL->bindParam(':region_votante', $txtRegion);
        $sentenciaSQL->bindParam(':comuna_votante', $txtComuna);
        $sentenciaSQL->bindParam(':eleccion_candidato', $txtCandidato);
        $sentenciaSQL->bindParam(':eleccion1', $txtWeb);
        $sentenciaSQL->bindParam(':eleccion2', $txtTv);
        $sentenciaSQL->bindParam(':eleccion3', $txtRrss);
        $sentenciaSQL->bindParam(':eleccion4', $txtAmigo);
        $sentenciaSQL->execute();
        break;
}

$sentenciaSQL=$conexion->prepare("SELECT * FROM votantes");
$sentenciaSQL->execute();
$registroVotantes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro votaciones</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <section class="formulario">
        <div class="form-header">
            <h4 class="subtitle">FORMULARIO DE VOTACION:</h4>
        </div>

        <div class="card-form">

            <form method="post">
                <div class="item">
                    <label for="txtNombre" class="label-data">Nombre y Apellido</label>
                    <input type="text" class="input-data" name="txtNombre" id="txtNombre">
                </div>

                <div class="item">
                    <label for="txtAlias" class="label-data">Alias</label>
                    <input type="text" class="input-data" name="txtAlias" id="txtAlias">
                </div>

                <div class="item">
                    <label for="txtRut" class="label-data">RUT</label>
                    <input type="text" class="input-data" name="txtRut" id="txtRut">
                </div>

                <div class="item">
                    <label for="txtEmail" class="label-data">Email</label>
                    <input type="email" class="input-data" name="txtEmail" id="txtEmail">
                </div>

                <div class="item">
                    <label for="txtRegion" class="label-data">Region</label>
                    <select class="input" name="txtRegion" id="txtRegion">
                        <option class="input" value="null"></option>
                        <option class="input" value="Arica y Parinacota">Arica y parinacota</option>
                        <option class="input" value="Antofagasta">Antofagasta</option>
                        <option class="input" value="Atacama">Atacama</option>
                        <option class="input" value="Coquimbo">Coquimbo</option>
                        <option class="input" value="Valparaiso">Valparaiso</option>
                        <option class="input" value="Libertador Gral. Bernardo O'Higgins">Libertador Gral. Bernardo O'Higgins</option>
                        <option class="input" value="Maule">Maule</option>
                        <option class="input" value="Ñuble">Ñuble</option>
                        <option class="input" value="Biobio">Biobio</option>
                        <option class="input" value="Araucania">de la Araucanía</option>
                        <option class="input" value="Los Rios">Los Rios</option>
                        <option class="input" value="Los Lagos">Los lagos</option>
                        <option class="input" value="Aisen">Aisen</option>
                        <option class="input" value="Magallanes y la Antartica Chilena">Magallanes y la Antartica</option>
                        <option class="input" value="Metropolitana">Metropolitana</option>
                    </select>                
                </div>

                <div class="item">
                    <label for="txtComuna" class="label-data">Comuna</label>
                    <select class="input" name="txtComuna" id="txtComuna">
                        <option class="input" value="null"></option>
                        <option class="input" value="Comuna 1">comuna 1</option>
                        <option class="input" value="Comuna 2">comuna 2</option>
                    </select>                
                </div>

                <div class="item">
                    <label for="txtCandidato" class="label-data">Candidato</label>
                    <select class="input" name="txtCandidato" id="txtCandidato">
                        <option class="input" value="null"></option>
                        <option class="input" value="Candidato 1">Candidato 1</option>
                        <option class="input" value="Candidato 2">Candidato 2</option>
                    </select>                
                </div>

                <div class="item">
                    <p class="label-data" for="">Como se enteró de Nosotros</p>

                    <input class="input-check" type="checkbox" name="txtWeb" id="txtWeb" value="Web">
                    <label class="label-check" for="txtWeb">Web</label>

                    <input class="input-check" type="checkbox" name="txtTv" id="txtTv" value="TV">
                    <label class="label-check" for="txtTv">TV</label>

                    <input class="input-check" type="checkbox" name="txtRrss" id="txtRrss" value="Redes Sociales">
                    <label class="label-check" for="txtRrss">Redes Sociales</label>

                    <input class="input-check" type="checkbox" name="txtAmigo" id="txtAmigo" value="Amigo">
                    <label class="label-check" for="txtAmigo">Amigo</label>
                </div>

                <section class="votar">
                    <button type="submit" name="accion" id="votar" value="votar"> Votar </button>
                </section>
            </form>

        </div>

    </section>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID votante</th>
                <th>Nombre Votante</th>
                <th>Alias</th>
                <th>RUT</th>
                <th>Email</th>
                <th>Region</th>
                <th>Comuna</th>
                <th>Candidato</th>
                <th>Eleccion 1</th>
                <th>Eleccion 2</th>
                <th>Eleccion 3</th>
                <th>Eleccion 4</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($registroVotantes as $votante) { ?>
            <tr>
                <td><?php echo $votante['id_votante']; ?></td>
                <td><?php echo $votante['nombre_votante']; ?></td>
                <td><?php echo $votante['alias_votante']; ?></td>
                <td><?php echo $votante['rut_votante']; ?></td>
                <td><?php echo $votante['email_votante']; ?></td>
                <td><?php echo $votante['region_votante']; ?></td>
                <td><?php echo $votante['comuna_votante']; ?></td>
                <td><?php echo $votante['eleccion_candidato']; ?></td>
                <td><?php echo $votante['eleccion1']; ?></td>
                <td><?php echo $votante['eleccion2']; ?></td>
                <td><?php echo $votante['eleccion3']; ?></td>
                <td><?php echo $votante['eleccion4']; ?></td>
              
            </tr>
        <?php } ?>
        </tbody>


</body>
</html>