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
                    <label>DNI:</label>
                    <input type="text" class="form-control" id="txt_dni" name="txt_dni" placeholder="Ingrese DNI">
                  </div>
                  <div class="form-group">
                    <label>Paterno:</label>
                    <input type="text" class="form-control" id="txt_paterno" name="txt_paterno" placeholder="Ingrese Paterno">
                  </div>
                  <div class="form-group">
                    <label>Materno:</label>
                    <input type="text" class="form-control" id="txt_materno" name="txt_materno" placeholder="Ingrese Materno">
                  </div>
                  <div class="form-group">
                    <label>Nombre(s):</label>
                    <input type="text" class="form-control" id="txt_nombres" name="txt_nombres" placeholder="Ingrese Nombres">
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
                    <label>Dirección:</label>
                    <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" placeholder="Ingrese Dirección">
                  </div>
                  <div class="form-group">
                    <label>Departamento:</label>
                    <br>
                    <select v-model="alumno.departamento" onchange="app.mostrarProvincias()" class="form-control col-md-12" id="departamento" nombre="departamento" placeholder="Seleccione Departamento">
                      <option value="">.::Seleccione::.</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Provincia:</label>
                    <br>
                    <select v-model="alumno.provincia" onchange="app.mostrarDistritos()" class="form-control" id="provincia" nombre="provincia" placeholder="Seleccione Provincia">
                      <option value="">.::Seleccione::.</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Distrito:</label>
                    <br>
                    <select v-model="alumno.distrito" class="form-control col-md-12" id="distrito" nombre="distrito" placeholder="Seleccione Distrito">
                      <option value="">.::Seleccione::.</option>
                    </select>
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
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-graduation-cap"></i>
              <h3 class="box-title">DATOS ACADÉMICOS
                <a class="btn btn-succes btn-sm"><i class="fa fa-plus"></i></a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-bordered">
                <tr>
                  <th class="col-md-2" style="text-align:center;">Tipo Grado</th>
                  <th class="col-md-3" style="text-align:center;">Universidad</th>
                  <th class="col-md-3" style="text-align:center;">Titulo Profesional</th>
                  <th class="col-md-2" style="text-align:center;">Año de Expedición del Diploma</th>
                  <th class="col-md-1" style="text-align:center;">Subir Archivo</th>
                  <th class="col-md-1" style="text-align:center;">[]</th>
                </tr>
                <tr>
                  <td>
                    <select name="slct_tipo_grado">
                      <option value="">.::Seleccione::.</option>
                      <option value="1">Pre Grado</option>
                      <option value="2">Maestro o Magister</option>
                      <option value="3">Doctor</option>
                    </select>
                  </td>
                  <td>
                    <textarea class="form-control" id="txt_universidad_p" name="txt_universidad_p[]" placeholder="Ingrese Universidad"></textarea>
                  </td>
                  <td>
                    <textarea class="form-control" id="txt_titulo_p" name="txt_titulo_p[]" placeholder="Ingrese Título Profesional"></textarea>
                  </td>
                  <td>
                    <input type="text" class="form-control fecha" id="txt_anio_diploma_p[]" name="txt_anio_diploma_p" placeholder="Ingrese Año de Expedición del Diploma">
                  </td>
                  <td>
                    <input type="file" id="grado" name="grado[]">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </td>
                  <td>
                    <a class="btn btn-danger btn-sm">
                      <i class="fa fa-trash fa-lg"></i>
                    </a>
                  </td>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </section>

      <section class="content">
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-newspaper-o"></i>
              <h3 class="box-title">PUBLICACIONES - ARTÍCULOS EN REVISTA CIENTÍFICA</h3>
                <a class="btn btn-succes btn-sm"><i class="fa fa-plus"></i></a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-bordered">
                <tr>
                  <th class="col-md-4" style="text-align:center;">Nombre del Artículo</th>
                  <th class="col-md-3" style="text-align:center;">Título Revista</th>
                  <th class="col-md-2" style="text-align:center;">Año de Publicación</th>
                  <th class="col-md-2" style="text-align:center;">Subir Archivo</th>
                  <th class="col-md-1" style="text-align:center;">[]</th>
                </tr>
                <tr>
                  <td>
                    <textarea class="form-control" id="txt_articulo" name="txt_articulo[]" placeholder="Ingrese Nombre del Artículo"></textarea>
                  </td>
                  <td>
                    <textarea class="form-control" id="txt_revista" name="txt_revista[]" placeholder="Título Revista"></textarea>
                  </td>
                  <td>
                    <input type="text" class="form-control fecha" id="txt_publicacion" name="txt_publicacion[]" placeholder="Ingrese Año de Publicación">
                  </td>
                  <td>
                    <input type="file" id="revista" name="revista[]">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </td>
                  <td>
                    <a class="btn btn-danger btn-sm">
                      <i class="fa fa-trash fa-lg"></i>
                    </a>
                  </td>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </section>

      <section class="content">
        <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-cogs"></i>
              <h3 class="box-title">DISPONIBILIDAD DEL DOCENTE - CURSOS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="ciudad">Sede:</label>
                    <select v-model="alumno.ciudad" @change="cambiarCiudad" class="form-control" id="ciudad" nombre="ciudad" placeholder="Ingrese ciudad">
                        <option v-for="(key, val) in ciudades" v-bind:value="val.id">
                          {{ val.nombre }}
                        </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="carrera">Carreras:</label>
                    <select v-model="alumno.carrera" @change="cambiarCarrera" class="form-control" id="carrera" nombre='carrera' placeholder="Ingrese carrera">
                        <option v-for="(key, val) in carreras" v-bind:value="key">
                          {{ val }}
                        </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="asignatura">Asignatura:</label>
                    <select v-model="alumno.asignatura"  class="form-control" id="asignatura" nombre='asignatura' placeholder="Ingrese asignatura">
                        <option v-for="(key, val) in asignaturas" v-bind:value="val.id">
                          {{ val.nombre }}
                        </option>
                    </select>
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
              <div class="col-md-10">
                <i class="fa fa-clock-o"></i>
                <h3 class="box-title">DISPONIBILIDAD DEL DOCENTE - TOTAL HORAS
                </h3>
              </div>
              <div class="col-md-2">
                <input type="numeric" class="form-control" name="total_horas" value="0" readonly>
              </div>
            </div>
            <!-- /.box-header -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                    <table class="table table-bordered">
                      <tr>
                        <th>Turno</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                      </tr>
                      <tr>
                        <th>Mañana</th>
                        <td><input type="numeric" class="form-control" name="lunes[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="martes[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="miercoles[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="jueves[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="viernes[]" value="0"></td>
                      </tr>
                      <tr>
                        <th>Tarde</th>
                        <td><input type="numeric" class="form-control" name="lunes[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="martes[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="miercoles[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="jueves[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="viernes[]" value="0"></td>
                      </tr>
                      <tr>
                        <th>Noche</th>
                        <td><input type="numeric" class="form-control" name="lunes[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="martes[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="miercoles[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="jueves[]" value="0"></td>
                        <td><input type="numeric" class="form-control" name="viernes[]" value="0"></td>
                      </tr>

                    </table>
                </div>
              <!-- /.box-body -->
            </form>
          </div>
        </div>
      </div>
      </section>

      <section class="content">
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-institution"></i>
              <h3 class="box-title">EXPERIENCIA - DOCENTE
              <a class="btn btn-succes btn-sm"><i class="fa fa-plus"></i></a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-bordered">
                <tr>
                  <th class="col-md-9" style="text-align:center;">Universidad</th>
                  <th class="col-md-2" style="text-align:center;">Años</th>
                  <th class="col-md-1" style="text-align:center;">[]</th>
                </tr>
                <tr>
                  <td>
                    <input type="text" class="form-control" id="txt_universidad_e" name="txt_universidad_e[]" placeholder="Ingrese Universidad">
                  </td>
                  <td>
                    <input type="text" class="form-control" id="txt_anio_e" name="txt_anio_e[]" placeholder="Ingrese Años">
                  </td>
                  <td>
                    <a class="btn btn-danger btn-sm">
                      <i class="fa fa-trash fa-lg"></i>
                    </a>
                  </td>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>

      <section class="content">
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-institution"></i>
              <h3 class="box-title">EXPERIENCIA - LABORAL
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-bordered">
                <tr>
                  <th class="col-md-6" style="text-align:center;">Universidad</th>
                  <th class="col-md-3" style="text-align:center;">Cargo Actual</th>
                  <th class="col-md-2" style="text-align:center;">Años</th>
                  <th class="col-md-1" style="text-align:center;">Subir Hoja de Vida</th>
                </tr>
                <tr>
                  <td>
                    <input type="text" class="form-control" id="txt_universidad_el" name="txt_universidad_el" placeholder="Ingrese Universidad">
                  </td>
                  <td>
                    <input type="text" class="form-control" id="txt_anio_el" name="txt_anio_el" placeholder="Ingrese Años">
                  </td>
                  <td>
                    <input type="text" class="form-control" id="txt_cargo_el" name="txt_cargo_el" placeholder="Ingrese Cargo Actual">
                  </td>
                  <td>
                    <input type="file" id="cv">
                    <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                  </td>
              </table>
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
<script src="plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
<script src="js/registro.js"></script>


</body>
</html>
