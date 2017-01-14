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
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

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

      <section class="content">
        <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-indent fa-3x"></i>
              <h3 class="box-title">POSTULANTE - DATOS PERSONALES</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">DNI:</label>
                    <input type="text" class="form-control" id="txt_dni" placeholder="Ingrese DNI">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Paterno:</label>
                    <input type="text" class="form-control" id="txt_paterno" placeholder="Ingrese Paterno">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Materno:</label>
                    <input type="text" class="form-control" id="txt_materno" placeholder="Ingrese Materno">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nombre(s):</label>
                    <input type="text" class="form-control" id="txt_nombres" placeholder="Ingrese Nombres">
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-map-marker"></i>
              <h3 class="box-title">POSTULANTE - UBICACIÓN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dirección:</label>
                    <input type="text" class="form-control" id="txt_direccion" placeholder="Ingrese Dirección">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Departamento:</label>
                    <input type="text" class="form-control" id="txt_departamento" placeholder="Ingrese Departamento">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Provincia:</label>
                    <input type="text" class="form-control" id="txt_provincia" placeholder="Ingrese Provincia">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Distrito:</label>
                    <input type="text" class="form-control" id="txt_distrito" placeholder="Ingrese Distrito">
                  </div>
                </div>
                <!-- /.box-body -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>

      <section class="content">
        <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-graduation-cap"></i>
              <h3 class="box-title">DATOS ACADÉMICOS - PRE GRADO 1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Universidad:</label>
                    <input type="text" class="form-control" id="txt_universidad_p" placeholder="Ingrese Universidad">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título Profesional:</label>
                    <input type="text" class="form-control" id="txt_titulo_p" placeholder="Ingrese Título Profesional">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Año de Expedición del Diploma:</label>
                    <input type="text" class="form-control fecha" id="txt_año_diploma_p" placeholder="Ingrese Año de Expedición del Diploma">
                  </div>
                  <div class="form-group">
                    <label for="pregrado">Subir Archivo:</label>
                    <input type="file" id="pregrado">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-graduation-cap"></i>
              <h3 class="box-title">DATOS ACADÉMICOS - PRE GRADO 2</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Universidad:</label>
                    <input type="text" class="form-control" id="txt_universidad_p2" placeholder="Ingrese Universidad">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título Profesional:</label>
                    <input type="text" class="form-control" id="txt_titulo_p2" placeholder="Ingrese Título Profesional">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Año de Expedición del Diploma:</label>
                    <input type="text" class="form-control fecha" id="txt_año_diploma_p2" placeholder="Ingrese Año de Expedición del Diploma">
                  </div>
                  <div class="form-group">
                    <label for="pregrado2">Subir Archivo:</label>
                    <input type="file" id="pregrado2">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </div>
                </div>
                <!-- /.box-body -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>

      <section class="content">
        <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-graduation-cap"></i>
              <h3 class="box-title">DATOS ACADÉMICOS - MAESTRO O MAGISTER 1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Universidad:</label>
                    <input type="text" class="form-control" id="txt_universidad_m" placeholder="Ingrese Universidad">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título Profesional:</label>
                    <input type="text" class="form-control" id="txt_titulo_m" placeholder="Ingrese Título Profesional">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Año de Expedición del Diploma:</label>
                    <input type="text" class="form-control fecha" id="txt_año_diploma_m" placeholder="Ingrese Año de Expedición del Diploma">
                  </div>
                  <div class="form-group">
                    <label for="magister">Subir Archivo:</label>
                    <input type="file" id="magister">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-graduation-cap"></i>
              <h3 class="box-title">DATOS ACADÉMICOS - MAESTRO O MAGISTER 2</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Universidad:</label>
                    <input type="text" class="form-control" id="txt_universidad_m2" placeholder="Ingrese Universidad">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título Profesional:</label>
                    <input type="text" class="form-control" id="txt_titulo_m2" placeholder="Ingrese Título Profesional">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Año de Expedición del Diploma:</label>
                    <input type="text" class="form-control fecha" id="txt_año_diploma_m2" placeholder="Ingrese Año de Expedición del Diploma">
                  </div>
                  <div class="form-group">
                    <label for="magister2">Subir Archivo:</label>
                    <input type="file" id="magister2">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </div>
                </div>
                <!-- /.box-body -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>

      <section class="content">
        <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-graduation-cap"></i>
              <h3 class="box-title">DATOS ACADÉMICOS - DOCTOR 1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Universidad:</label>
                    <input type="text" class="form-control" id="txt_universidad_d" placeholder="Ingrese Universidad">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título Profesional:</label>
                    <input type="text" class="form-control" id="txt_titulo_d" placeholder="Ingrese Título Profesional">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Año de Expedición del Diploma:</label>
                    <input type="text" class="form-control fecha" id="txt_año_diploma_d" placeholder="Ingrese Año de Expedición del Diploma">
                  </div>
                  <div class="form-group">
                    <label for="doctor">Subir Archivo:</label>
                    <input type="file" id="doctor">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-graduation-cap"></i>
              <h3 class="box-title">DATOS ACADÉMICOS - DOCTOR 2</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Universidad:</label>
                    <input type="text" class="form-control" id="txt_universidad_d2" placeholder="Ingrese Universidad">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título Profesional:</label>
                    <input type="text" class="form-control" id="txt_titulo_d2" placeholder="Ingrese Título Profesional">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Año de Expedición del Diploma:</label>
                    <input type="text" class="form-control fecha" id="txt_año_diploma_d2" placeholder="Ingrese Año de Expedición del Diploma">
                  </div>
                  <div class="form-group">
                    <label for="doctor">Subir Archivo:</label>
                    <input type="file" id="doctor">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </div>
                </div>
                <!-- /.box-body -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>

      <section class="content">
        <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-newspaper-o"></i>
              <h3 class="box-title">PUBLICACIONES - ARTÍCULO EN REVISTA CIENTÍFICA 1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del Artículo:</label>
                    <input type="text" class="form-control" id="txt_articulo" placeholder="Ingrese Nombre del Artículo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título Revista:</label>
                    <input type="text" class="form-control" id="txt_revista" placeholder="Ingrese Título Revista">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Año de Publicación:</label>
                    <input type="text" class="form-control fecha" id="txt_publicacion" placeholder="Ingrese Año de Publicación">
                  </div>
                  <div class="form-group">
                    <label for="revista">Subir Archivo:</label>
                    <input type="file" id="revista">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-newspaper-o"></i>
              <h3 class="box-title">PUBLICACIONES - ARTÍCULO EN REVISTA CIENTÍFICA 2</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del Artículo:</label>
                    <input type="text" class="form-control" id="txt_articulo2" placeholder="Ingrese Nombre del Artículo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título Revista:</label>
                    <input type="text" class="form-control" id="txt_revista2" placeholder="Ingrese Título Revista">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Año de Publicación:</label>
                    <input type="text" class="form-control fecha" id="txt_publicacion2" placeholder="Ingrese Año de Publicación">
                  </div>
                  <div class="form-group">
                    <label for="revista2">Subir Archivo:</label>
                    <input type="file" id="revista2">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
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

      <section class="content">
        <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-indent"></i>
              <h3 class="box-title">DATOS DEL POSTULANTE - UBICACIÓN</h3>
            </div>
            <!-- /.box-header -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputFile">File input:</label>
                    <input type="file" id="exampleInputFile">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              <!-- /.box-body -->
            </form>
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
</body>
</html>
