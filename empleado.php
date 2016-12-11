<?php
include('../util/conexionServer.php');
include('../util/sesion.php');

$con = new DBManager();
$sesion = new Sesion();
$con->DBConectar();
$sesion->inicioSesion();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QualityCheck Application</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    [endif]-->

</head>

<body>

<form role="form" id="form_login" method="post">
        <!-- Navigation -->
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">Mantenimiento de Empleados
                <button type="button" class="btn btn-success btn-lg" style="float: right;" data-toggle="modal" data-target="#myModal">Nuevo empleado</button>&nbsp;</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nuevo Empleado</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control">
                                    </div>
                                </form>
                                <form role="form">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Clave</label>
                                        <input class="form-control">
                                </form>
                                </br>
                                <form role="form">
                                    <div class="form-group">
                                        <label>Departamento</label>
                                        <select name="nivel">
                                            <option value="1">DB1</option>
                                            <option value="2">DB2</option>
                                            <option value="3">DB3</option>
                                        </select>
                                </form>
                                </br></br>
                                <form role="form">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <select name="nivel">
                                            <option value="false">Jefe</option>
                                            <option value="true">Subordinado</option>
                                        </select>
                                </form>
                            </div></div>
                        </div>
                    </div>
                    </div>
                    <!--<div class="row">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Guardar">
                        </div>
                    </div>-->
                </div>
                <div class="modal-footer">
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Guardar"></div><div class="col-sm-6">
                        <button type="button" class="btn btn-lg btn-danger btn-block" data-dismiss="modal">Cancelar</button></div>
                </div>
            </div>

        </div>
    </div>
            </div>
</form>
            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Empleados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>Fecha creacion</td>
                                        <td>Estado</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4 class="fa fa-warning">Peligro</h4>
                                <p>Datos expuestos</p>
                                <!--<a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>-->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>


        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <!--<script src="../data/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
