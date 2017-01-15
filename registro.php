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
                    <input type="text" class="form-control" v-model='alumno.dni'
                    v-validate.initial="alumno.dni" data-rules="required|numeric|digits:8" :class="{'input': true, 'is-danger': errors.has('alumno.dni') }">
                    <i v-show="errors.has('alumno.dni')" class="fa fa-warning"></i>
                    <span v-show="errors.has('alumno.dni')" class="help is-danger">{{ errors.first('alumno.dni') }}</span>

                  </div>
                  <div class="form-group">
                    <label>Paterno:</label>
                    <input type="text" onkeypress="return app.validaLetras(event)" class="form-control" v-model='alumno.paterno'
                    v-validate.initial="alumno.paterno" data-rules="required|max:50" :class="{'input': true, 'is-danger': errors.has('alumno.paterno') }">
                    <i v-show="errors.has('alumno.paterno')" class="fa fa-warning"></i>
                    <span v-show="errors.has('alumno.paterno')" class="help is-danger">{{ errors.first('alumno.paterno') }}</span>

                  </div>
                  <div class="form-group">
                    <label>Materno:</label>
                    <input type="text" onkeypress="return app.validaLetras(event)" class="form-control" v-model='alumno.materno'
                    v-validate.initial="alumno.materno" data-rules="required|max:50" :class="{'input': true, 'is-danger': errors.has('alumno.materno') }">
                    <i v-show="errors.has('alumno.materno')" class="fa fa-warning"></i>
                    <span v-show="errors.has('alumno.materno')" class="help is-danger">{{ errors.first('alumno.materno') }}</span>
                  </div>
                  <div class="form-group">
                    <label>Nombre(s):</label>
                    <input type="text" onkeypress="return app.validaLetras(event)" class="form-control" v-model='alumno.nombres'
                    v-validate.initial="alumno.nombres" data-rules="required|max:50" :class="{'input': true, 'is-danger': errors.has('alumno.nombres') }">
                    <i v-show="errors.has('alumno.nombres')" class="fa fa-warning"></i>
                    <span v-show="errors.has('alumno.nombres')" class="help is-danger">{{ errors.first('alumno.nombres') }}</span>
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
                    <input type="text" class="form-control" v-model='alumno.direccion'
                    v-validate.initial="alumno.direccion" data-rules="required|max:100" :class="{'input': true, 'is-danger': errors.has('alumno.direccion') }">
                    <i v-show="errors.has('alumno.direccion')" class="fa fa-warning"></i>
                    <span v-show="errors.has('alumno.direccion')" class="help is-danger">{{ errors.first('alumno.direccion') }}</span>

                  </div>
                  <div class="form-group">
                    <label>Departamento:</label>
                    <br>
                    <select v-model="alumno.departamento" onchange="app.mostrarProvincias()" class="form-control col-md-12" id="departamento" nombre="departamento">
                      <option value="" selected>.::Seleccione::.</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Provincia:</label>
                    <br>
                    <select v-model="alumno.provincia" onchange="app.mostrarDistritos()" class="form-control" id="provincia" nombre="provincia">
                      <option value="" selected>.::Seleccione::.</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Distrito:</label>
                    <br>
                    <select v-model="alumno.distrito" onchange="app.getDistrito()" class="form-control col-md-12" id="distrito" nombre="distrito">
                      <option value="" selected>.::Seleccione::.</option>
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
                <a @click="addDatos" class="btn btn-succes btn-sm"><i class="fa fa-plus"></i></a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-bordered">
                <thead>
                <tr>
                  <th class="col-md-2" style="text-align:center;">Tipo Grado</th>
                  <th class="col-md-3" style="text-align:center;">Universidad</th>
                  <th class="col-md-3" style="text-align:center;">Titulo Profesional</th>
                  <th class="col-md-2" style="text-align:center;">Año de Expedición del Diploma</th>
                  <th class="col-md-1" style="text-align:center;">Subir Archivo</th>
                  <th class="col-md-1" style="text-align:center;">[]</th>
                </tr>
                </thead>
                <tbody id="tr_academicos">
                  <tr v-for="(item, index) in alumno.datos_academicos">
                    <td>
                        <select v-model='alumno.datos_academicos[item].tipo_academico_p' name="slct_tipo_grado">
                          <option value="">.::Seleccione::.</option>
                          <option value="1">Pre Grado</option>
                          <option value="2">Maestro o Magister</option>
                          <option value="3">Doctor</option>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control" v-model='alumno.datos_academicos[item].universidad_p' id="txt_universidad_p" name="txt_universidad_p[]" onkeypress="return app.validaAlfanumerico(event)"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" v-model='alumno.datos_academicos[item].titulo_p' id="txt_titulo_p" name="txt_titulo_p[]" onkeypress="return app.validaAlfanumerico(event)"></textarea>
                    </td>
                    <td>
                        <input type="text" class="form-control fecha" v-model='alumno.datos_academicos[item].anio_diploma_p'
                        v-validate.initial="alumno.datos_academicos[item].anio_diploma_p" data-rules="required|numeric|digits:4" :class="{'input': true, 'is-danger': errors.has('alumno.datos_academicos[item].anio_diploma_p') }">
                        <i v-show="errors.has('alumno.datos_academicos[item].anio_diploma_p')" class="fa fa-warning"></i>
                        <span v-show="errors.has('alumno.datos_academicos[item].anio_diploma_p')" class="help is-danger">{{ errors.first('alumno.datos_academicos[item].anio_diploma_p') }}</span>

                    </td>
                    <td>
                        <input type="hidden" v-model='alumno.datos_academicos[item].archivo' id='archivos' name="archivos[]" value="">
                        <input type="file" onchange="app.onGrado(event,{{item}});" id="grado" name="grado[]">
                        <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                    </td>
                    <td>
                        <a @click="removeDatos(item)" class="btn btn-danger btn-sm">
                          <i class="fa fa-trash fa-lg"></i>
                        </a>
                    </td>
                  </tr>
                </tbody>
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
                <a @click="addPublicaciones" class="btn btn-succes btn-sm"><i class="fa fa-plus"></i></a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th class="col-md-4" style="text-align:center;">Nombre del Artículo</th>
                    <th class="col-md-3" style="text-align:center;">Título Revista</th>
                    <th class="col-md-2" style="text-align:center;">Año de Publicación</th>
                    <th class="col-md-2" style="text-align:center;">Subir Archivo</th>
                    <th class="col-md-1" style="text-align:center;">[]</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in alumno.publicaciones">
                      <td>
                          <textarea class="form-control" v-model='alumno.publicaciones[item].articulo' id="txt_articulo" name="txt_articulo[]" onkeypress="return app.validaAlfanumerico(event)"></textarea>
                      </td>
                      <td>
                          <textarea class="form-control" v-model='alumno.publicaciones[item].revista' id="txt_revista" name="txt_revista[]" onkeypress="return app.validaAlfanumerico(event)"></textarea>
                      </td>
                      <td>
                          <input type="text" class="form-control fecha" v-model='alumno.publicaciones[item].publicacion'
                          v-validate.initial="alumno.publicaciones[item].publicacion" data-rules="required|numeric|digits:4" :class="{'input': true, 'is-danger': errors.has('alumno.publicaciones[item].publicacion') }">
                          <i v-show="errors.has('alumno.publicaciones[item].publicacion')" class="fa fa-warning"></i>
                          <span v-show="errors.has('alumno.publicaciones[item].publicacion')" class="help is-danger">{{ errors.first('alumno.publicaciones[item].publicacion') }}</span>
                      </td>
                      <td>
                           <input type="hidden" v-model='alumno.publicaciones[item].archivo' id='archivos' name="archivos[]" value="">
                           <input type="file" onchange="app.onRevista(event,{{item}});" id="revista" name="revista[]">
                           <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                      </td>
                      <td>
                          <a @click="removePublicaciones(item)" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash fa-lg"></i>
                          </a>
                      </td>
                  </tr>
                </tbody>
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
                    <label>Sede:</label>
                    <br>
                    <select v-model="alumno.sede" onchange="app.mostrarCarreras()" class="form-control" id="sede" nombre="sede[]" multiple>
                      <option value="">.::Seleccione::.</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Carrera:</label>
                    <br>
                    <select v-model="alumno.carrera" onchange="app.mostrarCursos()" class="form-control" id="carrera" nombre="carrera[]" multiple>
                      <option value="">.::Seleccione::.</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Curso:</label>
                    <br>
                    <select v-model="alumno.curso" onchange="app.getCurso()" class="form-control" id="curso" nombre="curso[]" multiple>
                      <option value="">.::Seleccione::.</option>
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
              <!--div class="col-md-2">
                <input type="numeric" class="form-control" v-model='alumno.total_horas' name="total_horas" value="0" readonly>
              </div>
            </div-->
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
                        <th>Sabado</th>
                        <th>Domingo</th>
                      </tr>
                      <tr>
                        <th>Mañana</th>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.manania[0]' name="lunes[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.manania[1]' name="martes[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.manania[2]' name="miercoles[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.manania[3]' name="jueves[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.manania[4]' name="viernes[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.manania[5]' name="sabado[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.manania[6]' name="domingo[]" value="0"></td>
                      </tr>
                      <tr>
                        <th>Tarde</th>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.tarde[0]' name="lunes[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.tarde[1]' name="martes[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.tarde[2]' name="miercoles[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.tarde[3]' name="jueves[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.tarde[4]' name="viernes[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.tarde[5]' name="sabado[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.tarde[6]' name="domingo[]" value="0"></td>
                      </tr>
                      <tr>
                        <th>Noche</th>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.noche[0]' name="lunes[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.noche[1]' name="martes[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.noche[2]' name="miercoles[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.noche[3]' name="jueves[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.noche[4]' name="viernes[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.noche[5]' name="sabado[]" value="0"></td>
                        <td><input type="numeric" onkeypress="return app.validaNumeros(event)" class="form-control" v-model='alumno.noche[6]' name="domingo[]" value="0"></td>
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
              <a @click="addExperienciasDocente" class="btn btn-succes btn-sm"><i class="fa fa-plus"></i></a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="col-md-9" style="text-align:center;">Universidad</th>
                        <th class="col-md-2" style="text-align:center;">Años</th>
                        <th class="col-md-1" style="text-align:center;">[]</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in alumno.experiencias_docente">
                        <td>
                            <input type="text" class="form-control" v-model='alumno.experiencias_docente[item].universidad_e'
                            v-validate.initial="alumno.experiencias_docente[item].universidad_e" data-rules="required|max:100" :class="{'input': true, 'is-danger': errors.has('alumno.experiencias_docente[item].universidad_e') }">
                          <i v-show="errors.has('alumno.experiencias_docente[item].universidad_e')" class="fa fa-warning"></i>
                          <span v-show="errors.has('alumno.experiencias_docente[item].universidad_e')" class="help is-danger">{{ errors.first('alumno.experiencias_docente[item].universidad_e') }}</span>

                        </td>
                        <td>
                            <input type="text" class="form-control" v-model='alumno.experiencias_docente[item].anio_e'
                            v-validate.initial="alumno.experiencias_docente[item].anio_e" data-rules="required|numeric|max:2" :class="{'input': true, 'is-danger': errors.has('alumno.experiencias_docente[item].anio_e') }">
                            <i v-show="errors.has('alumno.experiencias_docente[item].anio_e')" class="fa fa-warning"></i>
                            <span v-show="errors.has('alumno.experiencias_docente[item].anio_e')" class="help is-danger">{{ errors.first('alumno.experiencias_docente[item].anio_e') }}</span>
                        </td>
                        <td>
                            <a @click="removeExperienciaDocente(item)" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
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
                <thead>
                    <tr>
                      <th class="col-md-6" style="text-align:center;">Universidad</th>
                      <th class="col-md-3" style="text-align:center;">Cargo Actual</th>
                      <th class="col-md-2" style="text-align:center;">Años</th>
                      <th class="col-md-1" style="text-align:center;">Subir Hoja de Vida</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>
                          <input type="text" class="form-control" v-model='alumno.universidad_el'
                          v-validate.initial="alumno.universidad_el" data-rules="required|max:50" :class="{'input': true, 'is-danger': errors.has('alumno.universidad_el') }">
                            <i v-show="errors.has('alumno.universidad_el')" class="fa fa-warning"></i>
                            <span v-show="errors.has('alumno.universidad_el')" class="help is-danger">{{ errors.first('alumno.universidad_el') }}</span>
                        </td>
                        <td>
                          <input type="text" class="form-control" v-model='alumno.cargo_el'
                          v-validate.initial="alumno.cargo_el" data-rules="required|max:50" :class="{'input': true, 'is-danger': errors.has('alumno.cargo_el') }">
                            <i v-show="errors.has('alumno.cargo_el')" class="fa fa-warning"></i>
                            <span v-show="errors.has('alumno.cargo_el')" class="help is-danger">{{ errors.first('alumno.cargo_el') }}</span>
                        </td>
                        <td>
                          <input type="text" class="form-control" v-model='alumno.anio_el'
                          v-validate.initial="alumno.anio_el" data-rules="required|numeric|max:2" :class="{'input': true, 'is-danger': errors.has('alumno.anio_el') }">
                            <i v-show="errors.has('alumno.anio_el')" class="fa fa-warning"></i>
                            <span v-show="errors.has('alumno.anio_el')" class="help is-danger">{{ errors.first('alumno.anio_el') }}</span>
                        </td>
                        <td>
                          <label class="btn btn-primary btn-file">
                              Cargar<input type="file" @change="onCV" style="display: none;" id='cv'>
                          </label>
                          <p class="help-block">Formatos Permitidos => PDF|WORD|JPG|PNG</p>
                        </td>
                      </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>

      <section>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-cloud"></i>
              <h3 class="box-title">Guardar
                <a @click="registro" class="btn btn-primary btn-sm">
                  <i class="fa fa-save fa-lg"></i>
                </a>
              </h3>
            </div>
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
<script src="js/registro.js"></script>


</body>
</html>
s
