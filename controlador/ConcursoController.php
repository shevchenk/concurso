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
        $ok=2;
        $rst['rst']='2';
        $rst['msj']='Verifique falta validar';
        if($ok==1){
            $rst['rst']='1';
            $rst['msj']='Registro realizado correctamente';
        }

        $dni = Input::get('dni');
        $paterno = Input::get('paterno');
        $materno = Input::get('materno');
        $nombres = Input::get('nombres');
        $direccion = Input::get('direccion');
        $departamento = Input::get('departamento');
        $provincia = Input::get('provincia');
        $distrito = Input::get('distrito');
        $sede = Input::get('sede');
        $carrera = Input::get('carrera');
        $curso = Input::get('curso');
        $total_horas = Input::get('total_horas');
        $manania_lunes = Input::get('manania_lunes');
        $manania_martes = Input::get('manania_martes');
        $manania_miercoles = Input::get('manania_miercoles');
        $manania_jueves = Input::get('manania_jueves');
        $manania_viernes = Input::get('manania_viernes');
        $tarde_lunes = Input::get('tarde_lunes');
        $tarde_martes = Input::get('tarde_martes');
        $tarde_miercoles = Input::get('tarde_miercoles');
        $tarde_jueves = Input::get('tarde_jueves');
        $tarde_viernes = Input::get('tarde_viernes');
        $noche_lunes = Input::get('noche_lunes');
        $noche_martes = Input::get('noche_martes');
        $noche_miercoles = Input::get('noche_miercoles');
        $noche_jueves = Input::get('noche_jueves');
        $noche_viernes = Input::get('noche_viernes');
        $universidad_el = Input::get('universidad_el');
        $anio_el = Input::get('anio_el');
        $cargo_el = Input::get('cargo_el');

        //para insertar con bucles
        $datos_academicos =Input::get('datos_academicos');
        $publicaciones =Input::get('publicaciones');
        $experiencias_docente =Input::get('experiencias_docente');
        $experiencias_laboral =Input::get('experiencias_laboral');

        $concurso=new Concurso;
        $concurso->dni = $dni;
        $concurso->paterno = $paterno;
        $concurso->materno = $materno;
        $concurso->nombres = $nombres;
        $concurso->direccion = $direccion;
        $concurso->departamento_id = $departamento;
        $concurso->provincia_id = $provincia;
        $concurso->distrito_id = $distrito;
        $concurso->save();


/*
        $concurso->ultima_institucion = $universidad_el;
        $concurso->anios = $anio_el;
        $concurso->cargo_actual = $cargo_el;
*/
        /*
        $concurso->sede = $sede;
        $concurso->carrera = $carrera;
        $concurso->curso = $curso;
        $concurso->total_horas = $total_horas;
        $concurso->manania_lunes = $manania_lunes;
        $concurso->manania_martes = $manania_martes;
        $concurso->manania_miercoles = $manania_miercoles;
        $concurso->manania_jueves = $manania_jueves;
        $concurso->manania_viernes = $manania_viernes;
        $concurso->tarde_lunes = $tarde_lunes;
        $concurso->tarde_martes = $tarde_martes;
        $concurso->tarde_miercoles = $tarde_miercoles;
        $concurso->tarde_jueves = $tarde_jueves;
        $concurso->tarde_viernes = $tarde_viernes;
        $concurso->noche_lunes = $noche_lunes;
        $concurso->noche_martes = $noche_martes;
        $concurso->noche_miercoles = $noche_miercoles;
        $concurso->noche_jueves = $noche_jueves;
        $concurso->noche_viernes = $noche_viernes;
        */
        $datos = [
            $dni
        ];
        return Response::json($datos);
        //return Response::json($rst);
    }

}

