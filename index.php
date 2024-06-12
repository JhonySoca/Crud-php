<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
<h1 class="text-center p-3">JSD</h1>
<?php


include "modelo/conexion.php";
include "controlador/eliminar_persona.php";

?>
<div class="container-fluid row">

<form class="col-4 p-3" method="POST">
    <h3 class="text-center text-secondary">Registro de persona</h3>
    <?php
    include "controlador/registro_persona.php";
    ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombres:</label>
    <input type="text" class="form-control" name="nombre">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellidos:</label>
    <input type="text" class="form-control" name="apellido">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">DNI:</label>
    <input type="text" class="form-control" name="dni">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha:</label>
    <input type="date" class="form-control" name="fecha">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo:</label>
    <input type="email" class="form-control" name="correo">
  </div>
  
  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
  <a href="#" class="btn btn-danger">Cerrar Sesión</a>
</form>

<div class="col-8 p-4">

<table class="table">
  <thead class="">
    <tr>
      <th scope="col">Ide</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">DNI</th>
      <th scope="col">Fecha</th>
      <th scope="col">Correo</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "modelo/conexion.php";
    $sql=$conexion->query("select * from persona");
    while($datos=$sql->fetch_object()){?>
      <tr>
      <td><?= $datos->id_persona?></td>
      <td><?= $datos->nombre?></td>
      <td><?= $datos->apellido?></td>
      <td><?= $datos->dni?></td>
      <td><?= $datos->fecha_nac?></td>
      <td><?= $datos->correo?></td>
      
      <td>
        <a href="modificar_persona.php?id=<?=$datos->id_persona?>" class="btn btn-small btn-warning"><i class='bx bxs-edit-alt'></i></a>
        <a href="index1.php?id=<?=$datos->id_persona?>" class="btn btn-small btn-danger"><i class='bx bxs-trash-alt' ></i></a>
        
      </td>
    </tr>
   <?php  }
    ?>
    
    
  </tbody>
</table>

</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>