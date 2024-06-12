<?php

include "modelo/conexion.php";

if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conexion->query("delete from persona where id_persona=$id");
    if($sql==1){
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Registro eliminado correctamente'
            }).then(function() {
                window.location = 'index1.php'; // Redirigir a otra página si es necesario
            });
        });
      </script>";
    }else{
        echo "<div>Error al eliminar</div>";
    }
}

?>