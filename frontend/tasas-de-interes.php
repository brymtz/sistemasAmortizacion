<?php
    session_start();
    if(empty($_SESSION["id"])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/asesor.css">
    <link rel="stylesheet" type="text/css" href="css/interes.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Dashboard Asesor</title>
</head>
<body>
    <div class="wrapper">
            <!--Top menu -->
            <div class="sidebar">
                <div class="profile">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="foto_perfil">
                    <h3>
                        <?php 
                            echo $_SESSION["nombre"]." ".$_SESSION["apellido"];
                        ?>
                    </h3>
                    <p>
                        <?php 
                            echo $_SESSION["tipoBanco"]." ".$_SESSION["nombreBanco"];
                        ?>
                    </p>
                </div>
                <ul>
                    <li>
                        <a href="dashboardAsesor.php">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="item">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="tasas-de-interes.php" class="active">
                            <span class="icon"><i class="fa-solid fa-percent"></i></i></span>
                            <span class="item">Tasas de Intéres</span>
                        </a>
                    </li>
                    <li>
                        <a href="simulador-credito.php">
                            <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                            <span class="item">Simulador</span>
                        </a>
                    </li>
                    <li>
                        <a href="../backend/controllers/control_logout.php">
                            <span class="icon"><i class="fas fa-arrow-right-from-bracket"></i></span>
                            <span class="item">Cerrar Sesión</span>
                        </a>
                    </li>
                </ul>
            </div>
    </div>

    <!-----TABLA-->
    <div class="container">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Tasas de interés del <?php echo $_SESSION["tipoBanco"]." ".$_SESSION["nombreBanco"];?></h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Tipo de crédito</th>
						<th>Tasa de interés</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<tr>

						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>        
</div>

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Editar la tasa de interés</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Tipo de crédito</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tasa de interés</label>
						<input type="email" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-info" value="Guardar">
				</div>
			</form>
		</div>
	</div>
</div>
    <!----SCRIPTS-->
    <script src="../js/asesor.js"></script>
</body>
</html>