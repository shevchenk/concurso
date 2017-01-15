<?php

class ConcursoController extends \BaseController
{
    public function getSedes()
    {
        $sql="  SELECT id,nombre
                FROM concurso_sedes";
        $r=DB::select($sql);
        $rst['sedes']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getCarreras()
    {
        $sedes=implode(",",Input::get('sedes'));
        $sql="  SELECT csc.id,cc.id grupo_id,cc.nombre,cs.nombre grupo
                FROM concurso_carreras cc 
                INNER JOIN concurso_sedes_carreras csc ON csc.carrera_id=cc.id
                INNER JOIN concurso_sedes cs ON cs.id=csc.sede_id
                WHERE csc.sede_id IN (".$sedes.")
                ORDER BY grupo,cc.nombre";
        $r=DB::select($sql);
        $rst['carreras']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getCursos()
    {
        $carreras=implode(",",Input::get('carreras'));
        $sql="  SELECT ccc.id,cc.id grupo_id,cc.nombre,cca.nombre grupo
                FROM concurso_cursos cc 
                INNER JOIN concurso_cursos_carreras ccc ON ccc.curso_id=cc.id
                INNER JOIN concurso_carreras cca ON cca.id=ccc.carrera_id
                INNER JOIN concurso_sedes_carreras csc ON csc.carrera_id=cca.id
                WHERE csc.id IN (".$carreras.")
                GROUP BY grupo,cc.nombre
                ORDER BY grupo,cc.nombre";
        $r=DB::select($sql);
        $rst['cursos']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getDepartamentos()
    {
        $sql="  SELECT id,nombre
                FROM departamentos";
        $r=DB::select($sql);
        $rst['departamentos']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getProvincias()
    {
        $departamento=Input::get('departamentos');
        $sql="  SELECT id,nombre
                FROM provincias
                WHERE departamento_id IN (".$departamento.")";
        $r=DB::select($sql);
        $rst['provincias']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getDistritos()
    {
        $provincia=Input::get('provincias');
        $sql="  SELECT id,nombre
                FROM distritos
                WHERE provincia_id IN (".$provincia.")";
        $r=DB::select($sql);
        $rst['distritos']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function postRegistrar()
    {
        if (Input::has('dni') && Input::get('dni')!='') {
            $rst['rst']='1';
            $rst['msj']='Registro realizado correctamente';
        } else {
            $rst['rst']='2';
            $rst['msj']='Verifique falta validar';
            return $rst;
        }
        $dni = Input::get('dni');
        $paterno = Input::get('paterno');
        $materno = Input::get('materno');
        $nombres = Input::get('nombres');
        $direccion = Input::get('direccion');
        $departamento = Input::get('departamento');
        $provincia = Input::get('provincia');
        $distrito = Input::get('distrito');
        
        $total_horas = Input::get('total_horas');
        $universidad_el = Input::get('universidad_el');
        $anio_el = Input::get('anio_el');
        $cargo_el = Input::get('cargo_el');

        //para insertar con bucles
        $maniana= Input::get('maniana');
        $tarde= Input::get('tarde');
        $noche= Input::get('noche');
        $sede = Input::get('sede');
        $carrera = Input::get('carrera');
        $curso = Input::get('curso');
        $datos_academicos =Input::get('datos_academicos');
        $publicaciones =Input::get('publicaciones');
        $experiencias_docente =Input::get('experiencias_docente');
        $experiencias_laboral =Input::get('experiencias_laboral');
        
        $uploadFolder = 'upload/'.$dni;
        
        if ( !is_dir('upload') ) {
            mkdir('upload');
        }
        if ( !is_dir($uploadFolder) ) {
            mkdir($uploadFolder);
        }
        if (Input::has('cv')) {
            $cv = Input::get('cv');
            list($type, $cv) = explode(';', $cv);
            list(, $type) = explode('/', $type);
            if ($type=='jpeg') $type='jpg';
            list(, $cv)      = explode(',', $cv);
            $cv = base64_decode($cv);
            //$imagen = "u".Input::get('id') . "." . $type;
            $imagen = $dni."_cv." . $type;
            $file = $uploadFolder . '/' . $imagen;
            file_put_contents($file , $cv);

        }

        DB::beginTransaction();
        $concurso=new Concurso;
        $concurso->dni = $dni;
        $concurso->paterno = $paterno;
        $concurso->materno = $materno;
        $concurso->nombres = $nombres;
        $concurso->direccion = $direccion;
        $concurso->departamento_id = $departamento;
        $concurso->provincia_id = $provincia;
        $concurso->distrito_id = $distrito;
        $concurso->ultima_institucion = $universidad_el;
        $concurso->anios = $anio_el;
        $concurso->cargo_actual = $cargo_el;
        $concurso->save();

        for($i=0; $i<count($maniana); $i++){
            $concursoHorario= new ConcursoHorario;
            $concursoHorario->concurso_registro_id=$concurso->id;
            $concursoHorario->dia=($i+1);
            $concursoHorario->turno=1;
            $concursoHorario->horas=$maniana[$i];
            $concursoHorario->save();

            $concursoHorario= new ConcursoHorario;
            $concursoHorario->concurso_registro_id=$concurso->id;
            $concursoHorario->dia=($i+1);
            $concursoHorario->turno=2;
            $concursoHorario->horas=$tarde[$i];
            $concursoHorario->save();

            $concursoHorario= new ConcursoHorario;
            $concursoHorario->concurso_registro_id=$concurso->id;
            $concursoHorario->dia=($i+1);
            $concursoHorario->turno=3;
            $concursoHorario->horas=$noche[$i];
            $concursoHorario->save();
        }

        for($i=0; $i<count($datos_academicos); $i++){
            $concursoAcademico= new ConcursoAcademico;
            $concursoAcademico->concurso_registro_id=$concurso->id;
            $concursoAcademico->tipo_academico_id=$datos_academicos[$i]['tipo_academico_p'];
            $concursoAcademico->universidad=$datos_academicos[$i]['universidad_p'];
            $concursoAcademico->titulo=$datos_academicos[$i]['titulo_p'];
            $concursoAcademico->anio=$datos_academicos[$i]['anio_diploma_p'];
            $concursoAcademico->save();
        }

        for($i=0; $i<count($experiencias_docente); $i++){
            $concursoExperiencia= new ConcursoExperiencia;
            $concursoExperiencia->concurso_registro_id=$concurso->id;
            $concursoExperiencia->universidad=$experiencias_docente[$i]['universidad_e'];
            $concursoExperiencia->anios=$experiencias_docente[$i]['anio_e'];
            $concursoExperiencia->save();
        }

        for($i=0; $i<count($publicaciones); $i++){
            $concursoPublicacion= new ConcursoPublicacion;
            $concursoPublicacion->concurso_registro_id=$concurso->id;
            $concursoPublicacion->nombre_articulo=$publicaciones[$i]['articulo'];
            $concursoPublicacion->revista=$publicaciones[$i]['revista'];
            $concursoPublicacion->anio=$publicaciones[$i]['publicacion'];
            $concursoPublicacion->save();
        }

        DB::commit();
        $datos = [
            $dni
        ];

        return Response::json($datos);
        //return Response::json($rst);
    }

}

