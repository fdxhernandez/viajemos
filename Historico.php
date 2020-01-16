<?php 
include_once ('class.conexion.php');
    $modelo= new Conexion();
    $conexion= $modelo->get_conexion();
    $sql = "SELECT c.id,c.nombre,h.fecha,h.humedad FROM ciudades c INNER JOIN historico h ON c.id=h.id_ciudad";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idP', $idP);
    $statement->execute();
    $rows=$statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>        
        <title>Viajemos - prueba </title>  
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">        
    </head>
    <body>
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Prueba viajemos.com </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="javascript:void(0)">Weather API + Mysql + Js + Php</a>
                    </li>                            
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        	<a href="index.php" class="btn btn-success my-2 my-sm-0" type="button">Volver</a>
                        </li>
                    </ul>                            
                </form>
            </div>
        </nav>
        <div class="content" style="margin:5%">
            <div class="container">
                <div class="row">                    
                    <div class="col-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Ciudad</th>
                                    <th>Fecha</th>
                                    <th>% de humedad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($rows as $key => $value) {

                                ?>
                                <tr>
                                    <td><?php echo $value['nombre'] ?></td>
                                    <td><?php echo $value['fecha'] ?></td>
                                    <td><?php echo $value['humedad'] ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="js/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" ></script>
    <script type="text/javascript">
       $(document).ready(function() {
    $('#example').DataTable({
        "language": {
    "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
}
    });
} );
    </script>
</body>
</html>
