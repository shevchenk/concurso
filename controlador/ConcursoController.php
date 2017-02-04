<?php

class ConcursoController extends \BaseController
{
    public function getArchivos()
    {
        $dni=Input::get('dni');
        $sql="  SELECT cr.id,cr.paterno,cr.materno,cr.nombres,cr.dni,
                GROUP_CONCAT(DISTINCT(cra.id)) academico,
                GROUP_CONCAT(DISTINCT(crp.id)) revista
                FROM concurso_registros cr
                LEFT JOIN concurso_registros_academicos cra ON cra.concurso_registro_id=cr.id
                LEFT JOIN concurso_registros_publicaciones crp ON crp.concurso_registro_id=cr.id
                WHERE cr.dni='$dni'
                GROUP BY cr.id
                ORDER BY cr.paterno,cr.materno,cr.nombres";
        $r=DB::select($sql);
        $rst['archivos']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getSedes()
    {
        $sql="  SELECT id,nombre
                FROM concurso_sedes
                ORDER BY nombre";
        $r=DB::select($sql);
        $rst['sedes']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getCarreras()
    {
        $sql="  SELECT id, nombre
                FROM concurso_carreras 
                ORDER BY nombre";
        $r=DB::select($sql);
        $rst['carreras']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getCursos()
    {
        $sql="  SELECT id, nombre
                FROM concurso_cursos 
                ORDER BY nombre";
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
    /**
     * $file  valor que se recive del frontend
     * $dni
     * $url_cv  url para guardar en el backend
     */
    public function fileToFile($file,$id, $url){
        if ( !is_dir('upload') ) {
            mkdir('upload',0777);
        }
        if ( !is_dir('upload/'.$id) ) {
            mkdir('upload/'.$id,0777);
        }
        list($type, $file) = explode(';', $file);
        list(, $type) = explode('/', $type);
        if ($type=='jpeg') $type='jpg';
        if (strpos($type,'document')!==False) $type='docx';
        if (strpos($type, 'sheet') !== False) $type='xlsx';
        if ($type=='plain') $type='txt';
        list(, $file)      = explode(',', $file);
        $file = base64_decode($file);
        file_put_contents($url.$type , $file);
        return $url. $type;
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
        $celular = Input::get('celular');
        $email = Input::get('email');
        $direccion = Input::get('direccion');
        $departamento = Input::get('departamento');
        $provincia = Input::get('provincia');
        $distrito = Input::get('distrito');
        
        $total_horas = Input::get('total_horas');
        $universidad_el = Input::get('universidad_el');
        $anio_el = Input::get('anio_el');
        $cargo_el = Input::get('cargo_el');

        //para insertar con bucles
        $manania= Input::get('manania');
        $tarde= Input::get('tarde');
        $noche= Input::get('noche');
        $sede = Input::get('sede');
        $carrera = Input::get('carrera');
        $curso = Input::get('curso');
        $datos_academicos =Input::get('datos_academicos');
        $publicaciones =Input::get('publicaciones');
        $experiencias_docente =Input::get('experiencias_docente');
        $experiencias_laboral =Input::get('experiencias_laboral');
        $url='';

        if (Input::has('cv')) {
            $cv = Input::get('cv');
            $url_cv = 'upload/'.$dni . "/cv." ;
            $url=$this->fileToFile($cv, $dni, $url_cv);
        }

        DB::beginTransaction();
        $carreras = implode(",",Input::get('carrera'));
        $cursos = implode(",",Input::get('curso'));
        $sedes = implode(",",Input::get('sede'));
        $concurso=new Concurso;
        $concurso->dni = $dni;
        $concurso->paterno = $paterno;
        $concurso->materno = $materno;
        $concurso->nombres = $nombres;
        $concurso->celular = $celular;
        $concurso->email = $email;
        $concurso->direccion = $direccion;
        $concurso->departamento_id = $departamento;
        $concurso->provincia_id = $provincia;
        $concurso->distrito_id = $distrito;
        $concurso->ultima_institucion = $universidad_el;
        $concurso->anios = $anio_el;
        $concurso->cargo_actual = $cargo_el;
        $concurso->sedes = $sedes;
        $concurso->carreras = $carreras;
        $concurso->cursos = $cursos;
        $concurso->url=$url;
        $concurso->save();

        /*if(count($manania)>0){
            for($i=0; $i<count($manania); $i++){
                $concursoHorario= new ConcursoHorario;
                $concursoHorario->concurso_registro_id=$concurso->id;
                $concursoHorario->dia=($i+1);
                $concursoHorario->turno=1;
                $concursoHorario->horas=$manania[$i];
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
        }*/

        if(count($datos_academicos)>0 AND isset($datos_academicos[0]['universidad_p']) ){
            for($i=0; $i<count($datos_academicos); $i++){
                $concursoAcademico= new ConcursoAcademico;
                $concursoAcademico->concurso_registro_id=$concurso->id;
                $concursoAcademico->tipo_academico_id=$datos_academicos[$i]['tipo_academico_p'];
                $concursoAcademico->universidad=$datos_academicos[$i]['universidad_p'];
                $concursoAcademico->titulo=$datos_academicos[$i]['titulo_p'];
                $concursoAcademico->anio=$datos_academicos[$i]['anio_diploma_p'];

                if ( isset($datos_academicos[$i]['archivo']) AND trim($datos_academicos[$i]['archivo'])!='' ) {
                    $url='';
                    $cv = $datos_academicos[$i]['archivo'];
                    $url_cv = 'upload/'.$dni . "/aca".$concursoAcademico->id."." ;
                    $url=$this->fileToFile($cv, $dni, $url_cv);
                $concursoAcademico->url=$url;
                }

                $concursoAcademico->save();
            }
        }

        if(count($experiencias_docente)>0 AND isset($experiencias_docente[0]['universidad_e'])){
            for($i=0; $i<count($experiencias_docente); $i++){
                $concursoExperiencia= new ConcursoExperiencia;
                $concursoExperiencia->concurso_registro_id=$concurso->id;
                $concursoExperiencia->universidad=$experiencias_docente[$i]['universidad_e'];
                $concursoExperiencia->anios=$experiencias_docente[$i]['anio_e'];
                $concursoExperiencia->save();
            }
        }

        if(count($publicaciones)>0 AND isset($publicaciones[0]['articulo'])){
            for($i=0; $i<count($publicaciones); $i++){
                $concursoPublicacion= new ConcursoPublicacion;
                $concursoPublicacion->concurso_registro_id=$concurso->id;
                $concursoPublicacion->nombre_articulo=$publicaciones[$i]['articulo'];
                $concursoPublicacion->revista=$publicaciones[$i]['revista'];
                $concursoPublicacion->anio=$publicaciones[$i]['publicacion'];

                if ( isset($publicaciones[$i]['archivo']) AND trim($publicaciones[$i]['archivo'])!='' ) {
                    $url='';
                    $cv = $publicaciones[$i]['archivo'];
                    $url_cv = 'upload/'.$dni . "/pub".$concursoPublicacion->id."." ;
                    $url=$this->fileToFile($cv, $dni, $url_cv);
                $concursoPublicacion->url=$url;
                }

                $concursoPublicacion->save();
            }
        }


        /*if(Input::get('curso')!=''){
        $carreras = implode(",",Input::get('carrera'));
        $cursos = implode(",",Input::get('curso'));
            $sql="  INSERT INTO concurso_registros_carreras_cursos (concurso_registro_id,concurso_sede_carrera_id,concurso_curso_carrera_id,created_at)
                    SELECT ".$concurso->id.",csc.id,ccc.id,now()
                    FROM concurso_cursos cc 
                    INNER JOIN concurso_cursos_carreras ccc ON ccc.curso_id=cc.id
                    INNER JOIN concurso_carreras cca ON cca.id=ccc.carrera_id
                    INNER JOIN concurso_sedes_carreras csc ON csc.carrera_id=cca.id
                    WHERE csc.id IN (".$carreras.")
                    AND ccc.id IN (".$cursos.")
                    GROUP BY ccc.id,csc.id";
            $rcurso=DB::insert($sql);
        }*/

        DB::commit();
        $datos = [
            $paterno." ".$materno.", ".$nombres." Con DNI:".$dni
        ];

        return Response::json($datos);
        //return Response::json($rst);
    }

    public function getReporteuno()
    {
        $r = Concurso::ReporteUno();
        $this->GenerarReporte($r,1);
    }

    public function getReportedos()
    {
        $r = Concurso::ReporteDos();
        $this->GenerarReporte($r,2);
    }

    public function GenerarReporte($r,$tiporeporte)
    {
        $az=array(  'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG');
        $styleAlignmentBold= array(
            'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleThinBlackBorderAllborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                    ->setCreator("Jorge Salcedo")
                    ->setLastModifiedBy("Jorge Salcedo")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Reporte de Problemas")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        //$objPHPExcel->getActiveSheet()->setCellValue("A1",$problemas);
        $objPHPExcel->getActiveSheet()->setCellValue("A2","REPORTE ".$tiporeporte);
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
        $objPHPExcel->getActiveSheet()->mergeCells('A2:M2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:M2')->applyFromArray( $styleAlignmentBold );
        
        $data=$r['data'];
        $cabecera=$r['cabecera'];
        $campos=$r['campos'];
        $length=$r['length'];

        for($i=0;$i<count($cabecera);$i++){
            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."4",$cabecera[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."4")->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($length[$i]);
        }

        $objPHPExcel->getActiveSheet()->getStyle('A4:'.$az[($i-1)].'4')->applyFromArray( $styleAlignmentBold );
        $objPHPExcel->getActiveSheet()->getStyle("A4:".$az[($i-1)]."4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

        $valorinicial=4;
        $cont=0;
        $azpos=0;
        $azposfin=0;
        $data=json_decode(json_encode($data), true);

        foreach($data as $row){
            $cont++;
            $valorinicial++;
            $azpos=0;

            $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$cont);$azpos++;

            for ($i=1; $i < count($campos); $i++) { 
                if(substr($campos[$i],-3)=='_dd'){
                    $registro=explode('**',$row[$campos[$i]]);
                    $detalleregistro=array();
                    for( $j=0;$j<count($registro);$j++ ){
                        $dregistro=explode("|",$registro[$j]);
                        for( $k=0;$k<count($dregistro);$k++ ){
                            if($j==0){
                                $detalleregistro[$k]=array();
                            }
                            array_push($detalleregistro[$k], $dregistro[$k]);
                        }
                    }

                    for( $j=0;$j<count($detalleregistro);$j++ ){
                        $ddr= implode("\n",$detalleregistro[$j]);
                        $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$ddr);
                        $objPHPExcel->getActiveSheet()->getStyle($az[$azpos].$valorinicial)->getAlignment()->setWrapText(true);$azpos++;
                    }
                }
                elseif(substr($campos[$i],-3)=='_ex'){
                    $detalle=str_replace("**","\n",$row[$campos[$i]]);
                    $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$detalle);$azpos++;
                }
                else{
                    $objPHPExcel->getActiveSheet()->setCellValue($az[$azpos].$valorinicial,$row[$campos[$i]]);$azpos++;
                }
            }

            if( $cont==1 ){
                $azposfin=$azpos-1;
            }
        }

        $objPHPExcel->getActiveSheet()->getStyle('A4:'.$az[count($cabecera)-1].$valorinicial)->applyFromArray( $styleThinBlackBorderAllborders );
        if($tiporeporte==1){
        $objPHPExcel->getActiveSheet()->getStyle('Q5:'.$az[count($cabecera)-1].$valorinicial)->getAlignment()->setWrapText(true);$azpos++;
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////
        $objPHPExcel->getActiveSheet()->setTitle('Reporte');
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client's web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_'.date("Y-m-d_H-i-s").'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

}

