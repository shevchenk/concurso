<?php

class Concurso extends Eloquent
{
    public $table = "concurso_registros";

    public static function ReporteUno()
    {
        $sql="
SELECT cr.created_at fecha_registro,cr.paterno, cr.materno, cr.nombres, cr.dni, cr.email, cr.celular, cr.direccion,
d.nombre departamento, p.nombre provincia, di.nombre distrito,
IF( COUNT(IF(cra.tipo_academico_id=2,1,NULL))>0,'SI','NO')  maestria,
IF( COUNT(IF(cra.tipo_academico_id=3,1,NULL))>0,'SI','NO') doctorado,
IF( COUNT(DISTINCT(cre.id))>0,'SI','NO') experiencia_docente, 
IF( IFNULL(cr.ultima_institucion,'')!='','SI','NO' ) experiencia_laboral,
(   SELECT GROUP_CONCAT(nombre SEPARATOR '**')
    FROM concurso_sedes 
    WHERE FIND_IN_SET(id,cr.sedes)>0) sedes_ex,
(   SELECT GROUP_CONCAT(nombre SEPARATOR '**')
    FROM concurso_carreras 
    WHERE FIND_IN_SET(id,cr.carreras)>0) carreras_ex,
(   SELECT GROUP_CONCAT(nombre SEPARATOR '**')
    FROM concurso_cursos 
    WHERE FIND_IN_SET(id,cr.cursos)>0) cursos_ex
FROM concurso_registros cr
LEFT JOIN departamentos d ON d.id=cr.departamento_id
LEFT JOIN provincias p ON p.id=cr.provincia_id
LEFT JOIN distritos di ON di.id=cr.distrito_id
LEFT JOIN concurso_registros_academicos cra ON cra.concurso_registro_id=cr.id
LEFT JOIN concurso_registros_experiencias cre ON cre.concurso_registro_id=cr.id
GROUP BY cr.id";

        $rs=DB::select($sql);

        $length=array(
            5,23,20,20,20,10,25,17,
            25,17,17,17,15,15,
            15,15,35,
            35,41
        );
        $cabecera=array(
            'N°','Fecha Registro','Paterno','Materno','Nombre','DNI','Email','Celular',
            'Dirección','Departamento','Provincia','Distrito','Tiene Maestría','Tiene Doctorado',
            'Experiencia Docente','Experiencia Laboral','Región Disponibilidad',
            'Carrera Disponibilidad','Asignatura Disponibilidad'
        );
        $campos=array(
            '','fecha_registro','paterno','materno','nombres','dni','email','celular',
            'direccion','departamento','provincia','distrito','maestria','doctorado',
            'experiencia_docente','experiencia_laboral','sedes_ex',
            'carreras_ex','cursos_ex'
        );

        $r['data']=$rs;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }

    public static function ReporteDos()
    {
        $sql="
SELECT cr.created_at fecha_registro,cr.paterno, cr.materno, cr.nombres, cr.dni, cr.email, cr.celular, cr.direccion,
d.nombre departamento, p.nombre provincia, di.nombre distrito,
GROUP_CONCAT(DISTINCT(CONCAT(cra1.universidad,'|',cra1.titulo,'|',cra1.anio)) SEPARATOR '**') pregrados_dd,
GROUP_CONCAT(DISTINCT(CONCAT(cra2.universidad,'|',cra2.titulo,'|',cra2.anio)) SEPARATOR '**') magisters_dd,
GROUP_CONCAT(DISTINCT(CONCAT(cra3.universidad,'|',cra3.titulo,'|',cra3.anio)) SEPARATOR '**') doctorados_dd,
GROUP_CONCAT(DISTINCT(CONCAT(crp.nombre_articulo,'|',crp.revista,'|',crp.anio)) SEPARATOR '**') revistas_dd,
GROUP_CONCAT(DISTINCT(CONCAT(cre.universidad,'|',cre.anios)) SEPARATOR '**') experiencias_dd,
cr.ultima_institucion, cr.cargo_actual, cr.anios anio
FROM concurso_registros cr
LEFT JOIN departamentos d ON d.id=cr.departamento_id
LEFT JOIN provincias p ON p.id=cr.provincia_id
LEFT JOIN distritos di ON di.id=cr.distrito_id
LEFT JOIN concurso_registros_academicos cra1 ON cra1.concurso_registro_id=cr.id AND cra1.tipo_academico_id=1
LEFT JOIN concurso_registros_academicos cra2 ON cra2.concurso_registro_id=cr.id AND cra2.tipo_academico_id=2
LEFT JOIN concurso_registros_academicos cra3 ON cra3.concurso_registro_id=cr.id AND cra3.tipo_academico_id=3
LEFT JOIN concurso_registros_publicaciones crp ON crp.concurso_registro_id=cr.id
LEFT JOIN concurso_registros_experiencias cre ON cre.concurso_registro_id=cr.id
GROUP BY cr.id";

        $rs=DB::select($sql);

        $length=array(
            5,23,20,20,20,10,25,17,
            25,17,17,17,
            25,25,15,
            25,25,15,
            25,25,15,
            25,25,15,
            25,15,
            25,15,15
        );
        $cabecera=array(
            'N°','Fecha Registro','Paterno','Materno','Nombre','DNI','Email','Celular',
            'Dirección','Departamento','Provincia','Distrito',
            'Universidad Pre Grado','Título Pre Grado','Año Pre Grado',
            'Universidad Magister','Título Magister','Año Magister',
            'Universidad Doctor','Título Doctor','Año Doctor',
            'Artículo Revista','Nombre Revista','Año Revista',
            'Experiencia Docente','Tiempo Docente',
            'Institución Laboral','Cargo Laboral','Tiempo Laboral'
        );
        $campos=array(
            '','fecha_registro','paterno','materno','nombres','dni','email','celular',
            'direccion','departamento','provincia','distrito',
            'pregrados_dd',
            'magisters_dd',
            'doctorados_dd',
            'revistas_dd',
            'experiencias_dd',
            'ultima_institucion','cargo_actual','anio'
        );

        $r['data']=$rs;
        $r['cabecera']=$cabecera;
        $r['campos']=$campos;
        $r['length']=$length;
        return $r;
    }
}
