<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE'); 
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>.::Telesup::.</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-multiselect/dist/css/bootstrap-multiselect.css">
  <style type="text/css">
    .is-danger {
      color: red;
    }
    .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper" id='app'>

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
        <a href="../../index2.html" class="navbar-brand">.::TELESUP::.</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"><b>CONCURSO NACIONAL DE DOCENTES POR INVITACIÓN</b></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        <h1>
        </h1>
      </section>
      <form id="form" name="form" method="POST" action="">
      </form>
      <section class="content">
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-indent fa-3x"></i>
              <h3 class="box-title">DESCARGAR ARCHIVOS DEL POSTULANTE</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="col-md-12">
                    <div class="col-md-3">
                    <label>DNI:</label>
                    <input type="text" class="form-control" v-model='alumno.dni'
                    v-validate.initial="alumno.dni" data-rules="required|numeric|digits:8" :class="{'input': true, 'is-danger': errors.has('alumno.dni') }">
                    <i v-show="errors.has('alumno.dni')" class="fa fa-warning"></i>
                    <span v-show="errors.has('alumno.dni')" class="help is-danger">{{ errors.first('alumno.dni') }}</span>
                    </div>
                    <div class="col-md-3">
                      <br>
                      <a @click="mostrarArchivos" class="btn btn-primary btn-sm">
                        <i class="fa fa-search fa-lg"></i>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <br>
                    <hr>
                    <h3>Listado de Postulantes</h3>
                    <br>
                    <table id="listado" class="table table-hover table-bordered">
                      <thead> 
                      <th>N°</th>
                      <th>Paterno</th>
                      <th>Materno</th>
                      <th>Nombres</th>
                      <th>DNI</th>
                      <th><i class="fa fa-graduation-cap"></i>Académicos</th>
                      <th><i class="fa fa-newspaper-o"></i>Publicaciones</th>
                      <th><i class="fa fa-user"></i>CV</th>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>








    </div>
  </div>

  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2017</strong> All rights reserved.
    </div>
  </footer>
</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.2/vue-resource.min.js"></script>
<script src="https://cdn.jsdelivr.net/vee-validate/1.0.0-beta.8/vee-validate.min.js"></script>
<script src="plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
<script src="js/archivos.js"></script>


</body>
</html>
