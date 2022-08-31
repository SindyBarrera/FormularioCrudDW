<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Font Roboto CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


    <style>body{font-family:"Arial Black" !important;}</style>
    
    <style>body{font-family:"Arial Black" !important;}</style>
    


    <title>Lista de usuarios</title>
  </head>
  <body>
        <div class="container">
        <center style ="background-color: MediumBlue;" > 
        <font face=”Times New Roman”>
        <FONT COLOR="white"> <h1  class="mt-5">Listado De Alumnos Univeresitarios</h1></FONT>
        </font>
        </center>
        <div class="text-right">
        <a href="<?php echo base_url(); ?>nuevo-usuario" class="btn btn-primary"><ion-icon name="person-add-outline"></ion-icon>Agregar Nuevo Alumno</a> 
        </div>
        <table class="table mt-4">
            <thead class="thead-light">
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Dpi</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $number=0; foreach($data as $key => $value): ?>
                    <tr>
                        <td><?php echo $value->alumno;?></td>
                        <td><?php echo $value->nombre; ?> <?php echo $value->apellido; ?> </td>                       
                        <td><?php echo $value->direccion; ?></td>
                        <td><?php echo $value->movil; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->dpi; ?></td>
                        <td><?php echo $value->fecha_creacion; ?></td>
                        <td><?php echo $value->user; ?></td>
                        <td><?php if($value->inactivo == '0') {echo 'Activo';} ?>
                        <?php if($value->inactivo == '1') {echo 'Inactivo';} ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>usuario/<?php echo $value->alumno; ?>" class="btn btn-primary"><ion-icon name="create-outline"></ion-icon></a> 
                           <!-- <a href="<?php echo base_url(); ?>usuario/delete/<?php echo $value->alumno; ?>" class="btn btn-danger"><ion-icon name="trash"></ion-icon></a> -->
                           <button onclick="clicked(<?php echo $value->alumno; ?>)"  class="btn btn-danger"><ion-icon name="remove"></ion-icon></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script>
  const clicked = (alumno) => {
   swal({
    title: "¿Estas seguro de eliminar el alumno?",
    text: "Una vez eliminado, se eliminará permanentemente...",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
     swal("Presiones OK para proceder.", {
     icon: "success",
     }).then((willDelete1) => {
      if (willDelete1) {
       location.replace("<?php echo base_url(); ?>usuario/delete/<?php echo $value->alumno; ?>");
      }
     });
    } else {
     swal("No se ha eliminado nada.");
    }
    });
  }
 </script>
  </body>
</html>