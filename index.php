<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <?php
        include ("conexion.php");
        $cn= conectar();
        
        if($_GET && isset($_GET["id"])){
            
            
            $ubicacion= unserialize(file_get_contents("http://www.geoplugin.net/php.gp?id=".$_SERVER['REMOTE_ADDR']));
            $latitud=$ubicacion["geoplugin_latitude"];
            $longitud=$ubicacion["geoplugin_longitude"];
                
            $cn->query("UPDATE MASCOTA SET ultimaUbicacion='".$latitud." ".$longitud."' WHERE idMASCOTA=".$_GET["id"]);
                
            $rs=$cn->query("SELECT * FROM MASCOTA WHERE idMASCOTA=".$_GET["id"]);
        
            if ($mascota=$rs->fetch_object()){
                $titulo=$mascota->nombre;
                
                $nombre=$mascota->nombre; 
                $tipo=$mascota->tipo; 
                $raza=$mascota->raza; 
                $color=$mascota->color; 
                $fechaNacimiento=$mascota->fechaNacimiento; 
                $nombreDueno=$mascota->nombreDueno; 
                $telefono=$mascota->telefono; 
                $perdido=$mascota->perdido; 
                $ultimaUbicacion=$mascota->ultimaUbicacion;
                
                
            }else{
                header("Location: http://localhost/QRMascota/404.php");
            }
        }
        else{
            header("Location: http://localhost/QRMascota/404.php");
        }
        ?>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <title><?php echo $titulo;?></title>
        <style>
            .datos{
                margin: 40px
            }
            @media(max-width:1080px) {
                h2 {
                    font-size: 80px;
                }
                .form-control{
                    padding: 30px;
                    font-size: 30px;
                }
            }@media(max-height:900px) {
                h2 {
                    font-size: 80px;
                }
                .form-control{
                    padding: 30px;
                    font-size: 30px;
                }
            }
        </style>
    </head>
    <body>
        <div class="mensaje text-center bg-dark text-light p-3">
            <h2>Estos son los datos que has escaneado</h2>
        </div>
        <div class="datos justify-content-center ">
            <label class="m-1" for="nombre">Nombre</label>
            <input class="form-control m-1 text-center" type="text" id="nombre" value="<?php echo $nombre;?>" readonly/>
            <label class="m-1" for="tipo">Tipo</label>
            <input class="form-control m-1 text-center" type="text" id="tipo" value="<?php echo $tipo;?>"  readonly/>
            <label class="m-1" for="raza">Raza</label>
            <input class="form-control m-1 text-center" type="text" id="raza" value="<?php echo $raza;?>"  readonly/>
            <label class="m-1" for="color">Color</label>
            <input class="form-control m-1 text-center" type="text" id="color" value="<?php echo $color;?>"  readonly/>
            <label class="m-1" for="fechaNacimiento">Fecha Nacimiento</label>
            <input class="form-control m-1 text-center" type="text" id="fechaNacimiento" value="<?php echo $fechaNacimiento;?>"  readonly/>
            <label class="m-1" for="nombreDueno">Dueño</label>
            <input class="form-control m-1 text-center" type="text" id="nombreDueno" value="<?php echo $nombreDueno;?>"  readonly/>
            <label class="m-1" for="telefono">Teléfono</label>
            <input class="form-control m-1 text-center" type="text" id="telefono" value="<?php echo $telefono;?>"  readonly/>
            <label class="m-1" for="ultimaUbicacion">Ultima Ubicacion</label>
            <input class="form-control m-1 text-center" type="text" id="ultimaUbicacion" value="<?php echo $ultimaUbicacion;?>"  readonly/>
            <label class="m-1" for="perdido">¿Esta perdido?</label>
            <?php 
            if($perdido==TRUE){
                echo "<input class='form-control bg-danger text-light m-1 text-center' type='text' id='perdido' value='Si'  readonly/>";
            }else{
                echo "<input class='form-control bg-success text-light m-1 text-center' type='text' id='perdido' value='No'  readonly/>";
            }
            ?>
        </div>
    </body>
</html>
