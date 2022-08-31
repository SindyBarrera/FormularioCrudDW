<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>body{font-family:"Arial Black" !important;}</style>
    
    <title>Nuevo usuario</title>
  </head>
  <body>

<div class="container">

<center style ="background-color: MediumBlue;" > 
        <font face=”Times New Roman”>
        <FONT COLOR="white"> <h1 class="mt-5"><center>Nuevo usuario</center></h1></FONT>
        </font>
        </center>
    
    <form action="<?php echo base_url(); ?>nuevo-usuario/save" class="mt-4" method="POST">
        <div class="row">
            <div class="col-lg-6">
               

                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre:</label>
                    <input type="text" name="nombre" class="form-control <?php echo form_error('nombre') ? 'is-invalid':'' ; ?>" aria-describedby="emailHelp" placeholder="Nombre" value="<?php echo set_value('nombre'); ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('nombre'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido:</label>
                    <input type="text" name="apellido" class="form-control <?php echo form_error('apellido') ? 'is-invalid':'' ; ?>" aria-describedby="emailHelp" placeholder="Apellido" value="<?php echo set_value('apellido'); ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('apellido'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ; ?>" aria-describedby="emailHelp" placeholder="Correo eléctronico" value="<?php echo set_value('email'); ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Teléfono:</label>
                    <input type="text" name="movil" class="form-control <?php echo form_error('movil') ? 'is-invalid':'' ; ?>" placeholder="0000-0000" value="<?php echo set_value('movil'); ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('movil'); ?>
                    </div>
                </div>                   
            </div>
            
            <div class="col-lg-6">
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Dirección:</label>
                    <input type="text" name="direccion" class="form-control <?php echo form_error('direccion') ? 'is-invalid':'' ; ?>" placeholder="Direccion" value="<?php echo set_value('direccion'); ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('direccion'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Dpi:</label>
                    <input type="text" name="dpi" class="form-control <?php echo form_error('dpi') ? 'is-invalid':'' ; ?>" placeholder="xxxx-xxxxx-xxxx" value="<?php echo set_value('dpi'); ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('dpi'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Estado:</label>
                    <select name="inactivo" id="inactivo" class="form-control chosen-select">
                        <option value="">Seleccionar una opcion...</option>
                        <option value="0">Activa</option>
                        <option value="1">Inactiva</option>
                    </select>
                </div>
                <div class="col-lg-12">
                <button type="submit" class="btn btn-primary"><ion-icon name = "save-outline"></ion-icon>Guardar Registro</button>
        </button>
            </div>
            </div>               
        </div>    
    </form>
</div>

<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>
</html>