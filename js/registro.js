Vue.config.debug = true;
        var ordonner = function (a, b) { 
        return (a.nom.toUpperCase() > b.nom.toUpperCase())
      };
        var app = new Vue({
            http: {
                root: 'http://cpdtelesup.com/colegio/public/concurso',
            },
            el: '#app',
            data: {
                sedes:[],
                carreras:[],
                departamentos:[],
                provincias:[],
                distritos:[],
                asignaturas:[],
                alumno:{
                    dni:'',
                    paterno:'',
                    materno:'',
                    nombres:'',
                    direccion:'',
                    departamento:'',
                    provincia:'',
                    distrito:'',
                    //datos_academicos:'',
                    //publicaciones:'',
                    sede:'',
                    carrera:'',
                    curso:'',
                    total_horas:'',
                    manania_lunes:'',
                    manania_martes:'',
                    manania_miercoles:'',
                    manania_jueves:'',
                    manania_viernes:'',
                    tarde_lunes:'',
                    tarde_martes:'',
                    tarde_miercoles:'',
                    tarde_jueves:'',
                    tarde_viernes:'',
                    noche_lunes:'',
                    noche_martes:'',
                    noche_miercoles:'',
                    noche_jueves:'',
                    noche_viernes:'',
                    //experiencias:'',
                    universidad_el:'',
                    anio_el:'',
                    cargo_el:'',

                    datos_academicos:[{}],
                    publicaciones:[{}],
                    experiencias:[{}],
                },
                alumnoReset:{
                    apellidos:'',
                    nombres:'',
                    dni:'',
                    direccion:'',
                    distrito:'',
                    provincia:'',
                    departamento:'',
                    carrera:'',
                    asignatura:'',
                    sede:'',
                    datos_academicos:[{}],
                    publicaciones:[{}],
                    experiencias:[{}],
                },
            },
            methods: {
                addDatos:function(){
                    app.alumno.datos_academicos.push({});
                },
                removeDatos:function(id){
                    app.alumno.datos_academicos.splice( id, 1 );
                },
                addPublicaciones:function(){
                    app.alumno.publicaciones.push({});
                },
                removePublicaciones:function(id){
                    app.alumno.publicaciones.splice( id, 1 );
                },
                addExperiencias:function(){
                    app.alumno.experiencias.push({});
                },
                removeExperiencia:function(id){
                    app.alumno.experiencias.splice( id, 1 );
                },
                onCV: function(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                      return;

                    var image = new Image();
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        app.alumno.cv = e.target.result;
                    };
                    reader.readAsDataURL(files[0]);
                },
                onGrado: function(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                      return;
                    var image = new Image();
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        app.alumno.grado = e.target.result;
                    };
                    reader.readAsDataURL(files[0]);
                },
                onRevista: function(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                      return;
                    var image = new Image();
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        app.alumno.revista = e.target.result;
                    };
                    reader.readAsDataURL(files[0]);
                },

                mostrarDepartamentos: function() {
                    this.$http.get('departamentos', function (response) {
                        app.departamentos=response.departamentos;
                        this.htmlListarSlct(app.departamentos,"departamento","simple");
                    });
                },
                mostrarProvincias:function() {
                    app.alumno.departamento=$("#departamento").val();
                    var request = {
                        departamentos: app.alumno.departamento,
                    };
                    this.$http.get('provincias',request, function (response) {
                        app.provincias=response.provincias;
                        this.htmlListarSlct(app.provincias,"provincia","simple");
                    });
                },
                mostrarDistritos:function() {
                    app.alumno.provincia=$("#provincia").val();
                    var request = {
                        provincias: app.alumno.provincia,
                    };
                    this.$http.get('distritos',request, function (response) {
                        app.distritos=response.distritos;
                        this.htmlListarSlct(app.distritos,"distrito","simple");
                    });
                },
                mostrarSedes: function() {
                    this.$http.get('sedes', function (response) {
                        app.sedes=response.sedes;
                        this.htmlListarSlct(app.sedes,"sede","multiple");
                    });
                },
                mostrarCarreras: function() {
                    app.alumno.sede=$("#sede").val();
                    var request = {
                        sedes: app.alumno.sede,
                    };
                    this.$http.get('carreras', request, function (response) {
                        app.carreras=response.carreras;
                        this.htmlListarSlct(app.carreras,"carrera","multiplegrupo");
                    });
                },
                mostrarCursos: function() {
                    app.alumno.carrera=$("#carrera").val();
                    var request = {
                        carreras: $("#carrera").val(),
                    };
                    console.log(request);
                    this.$http.get('cursos',request, function (response) {
                        app.cursos=response.cursos;
                        this.htmlListarSlct(app.cursos,"curso","multiple");
                    });
                },
                getCurso: function(){
                    app.alumno.curso=$("#curso").val();
                },
                getDistrito: function(){
                    app.alumno.distrito=$("#distrito").val();
                },
                registro: function() {
                    this.$http.post('registrar',app.alumno, function (response) {
                        //app.carreras=response;
                    });
                },
                htmlListarSlct:function(obj,slct,tipo,valarray,afectado,afectados,slct_id,slctant,slctant_id, funciones){
                var html="";var disabled=''; var grupo='';
                    if(tipo=="simple"){
                        html+= "<option value=''>.::Seleccione::.</option>";
                    }

                    $.each(obj,function(index,data){
                    disabled=''; 
                    rel=''; rel2='';rel3='';x='';y='';direccion='';rel4='';
                        if(data.block=='disabled'){ // validacion pra visualizacion
                            disabled='disabled';
                        }

                        if( data.relation!='' && data.relation!=null ){
                            rel='data-relation="|'+data.relation+'|"';
                        }

                        if( data.evento!='' && data.evento!=null ){
                            rel2=' data-evento="|'+data.evento+'|"';
                        }
                        else  if ( $("#"+slct).attr('data-evento')=='1' ) { 
                            rel2=' data-evento="|1|"';
                        }

                        if( data.select!='' && data.select!=null ){
                            rel3=' data-select="|'+data.select+'|"';
                        }
                        if (data.coord_x!='' && data.coord_x!=null) {
                            x=' data-coord_x="'+data.coord_x+'" ';
                        }
                        if (data.coord_y!='' && data.coord_y!=null) {
                            y=' data-coord_y="'+data.coord_y+'" ';
                        }
                        if (data.direccion!='' && data.direccion!=null) {
                            direccion=' data-direccion="'+data.direccion+'" ';
                        }

                        /*if send a concat data*/
                        if(data.concat !=''&& data.concat !=null){
                            rel4 = "("+data.concat+")";
                        }
                        /*end if  */
                        /* */
                                    //si se recibe estado
                        /*if (data.estado==1 && tipo=='multiple')
                            html += "<option selected"+rel+rel2+x+y+direccion+" value=\"" + data.id + "\" "+disabled+">" + data.nombre + "</option>";
                        else*/
                        if( tipo=='multiplegrupo' ){
                            if(grupo!=data.grupo){
                                if(html!=''){
                                    html+="</optgroup>";
                                }
                                grupo=data.grupo;
                                html+="<optgroup label='"+data.grupo+"'>";
                            }
                            html += "<option value=\"" + data.id + "\" data-grupo='"+data.grupo_id+"'>" + data.nombre + "</option>";
                        }
                        else{
                            html += "<option "+rel+rel2+rel3+x+y+direccion+" value=\"" + data.id + "\" "+disabled+">" + data.nombre + rel4 + "</option>";
                        }
                        
                    });

                    if( tipo=='multiplegrupo' ){
                        html+="</optgroup>";
                        tipo='multiple';
                    }
                    
                    $("#"+slct).html(html);
                    $("#"+slct).multiselect('destroy');
                    this.slctGlobalHtml(slct,tipo,valarray,afectado,afectados,slct_id,slctant,slctant_id, funciones);
                },
                slctGlobalHtml:function(slct,tipo,valarray,afectado,afectados,slct_id,slctant,slctant_id, funciones){
                    $("#"+slct).multiselect({
                        maxHeight: 200,             // max altura...
                        enableCaseInsensitiveFiltering: true, // Insensitive
                        buttonContainer: '<div class="btn-group col-lg-12" />', // actualiza la clase del grupo
                        buttonClass: 'btn btn-primary col-lg-12', // clase boton
                        templates: {
                            ul: '<ul data-select="'+slct+'" class="multiselect-container dropdown-menu col-lg-12"></ul>',
                            li: '<li ><a tabindex="0"><label></label></a></li>'
                        },
                        includeSelectAllOption: true, //opcion para seleccionar todo
                        enableFiltering: true,    // activa filtro
                        onDropdownShow: function() {
                            if(afectado==1 && afectado!=null){
                                $("[data-select='"+slct+"'] li").css('display','');
                                $("[data-select='"+slct+"'] li.disabled").css('display','none');
                            }
                        },
                        onDropdownHidden:function(){
                            var select=$("#"+slct+">option[value='"+$("#"+slct).val()+"']").attr('data-select');
                            if(slct_id!='' && slct_id!=null && afectados!='' && afectados!=null){
                                filtroSlct(slct,tipo,slct_id,afectados,slctant,slctant_id,select);
                            }

                            if( tipo!="multiple" && $("#"+slct+">option[value='"+$("#"+slct).val()+"']").attr('data-evento') ){
                                eventoSlctGlobalSimple(slct,$("#"+slct+">option[value='"+$("#"+slct).val()+"']").attr('data-evento'));
                            }
                        },
                        buttonText: function(options, select) { // para multiselect indicar vacio...

                            if(tipo=="multiple"){
                                if (options.length === 0) {
                                    return '.::Todo::.';
                                }
                                else if (options.length > 2) {
                                    return options.length+' Seleccionados';//More than 3 options selected!
                                }
                                else {
                                     var labels = [];
                                     options.each(function() {
                                         if ($(this).attr('label') !== undefined) {
                                             labels.push($(this).attr('label'));
                                         }
                                         else {
                                             labels.push($(this).html());
                                         }
                                     });
                                     return labels.join(', ') + '';
                                }
                            }
                            else{
                                return $(options).html();
                            }
                        },
                        onChange: function(option, checked, select) {
                            if (funciones!=='' && funciones!==undefined) {
                                if (funciones.change!=='' && funciones.change!==undefined) {
                                    funciones.change($(option).val(), checked);
                                }
                            }
                        }
                    });
                    if(valarray!=null && valarray.length>=1){

                        if(afectado==1 && afectados!=null && afectados!='' && tipo!='multiple'){  // pre seleccion para simple y limpiar valores
                            filtroSlct(afectados.split("|")[0],tipo,afectados.split("|")[2],afectados.split("|")[1],slctant,slctant_id,'',valarray);
                        }
                        else{
                            $('#'+slct).multiselect('select', valarray);
                            $('#'+slct).multiselect('refresh');
                        }
                            if( tipo!="multiple" && $("#"+slct+">option[value='"+$("#"+slct).val()+"']").attr('data-evento') ){
                                eventoSlctGlobalSimple(slct,$("#"+slct+">option[value='"+$("#"+slct).val()+"']").attr('data-evento'));
                            }
                    }
                    $("li.multiselect-all").removeAttr("data-select");
                },
                filtroSlct:function(slct,tipo,slct_id,afectados,slctant,slctant_id,select,valarray){
                    detafectados=afectados.split(",");
                    $(afectados).multiselect('deselectAll', false);
                    $(afectados).multiselect('updateButtonText');
                    valores='||';
                    valores2='';
                    if( $("#"+slct).val()!=null ){
                        if(tipo=="multiple"){
                            if(slctant!=null && slctant!=''){
                                valores2='|'+slctant_id+$("#"+slctant).val().join('|'+slctant_id)+'|';
                            }
                            valores='|'+slct_id+$("#"+slct).val().join('|'+slct_id)+'|';
                        }
                        else{
                            if(slctant!=null && slctant!=''){
                                valores2='|'+slctant_id+$("#"+slctant).val()+'|';
                            }
                            valores='|'+slct_id+$("#"+slct).val()+'|';
                        }
                        
                        var primerId=0;
                        var primerSelect=""; var primerValor="";
                        for(i=0;i<detafectados.length;i++){
                            $('option', $(detafectados[i])).each(function(element) {
                                $(this).removeAttr('disabled');
                                val=$(this).attr('data-relation');
                                if(val!='' && val!=null){
                                detval=val.split(",");
                                valida=0;
                                    for(j=0;j<detval.length;j++){
                                        if( valores.split(detval[j]).length>1 ){
                                            valida++;
                                            break;
                                        }
                                    }

                                    if(valores2!='' && valida>0){
                                        valida=0;
                                        for(j=0;j<detval.length;j++){
                                            if( valores2.split(detval[j]).length>1 ){
                                                valida++;
                                                break;
                                            }
                                        }

                                    }

                                    if(valida==0){
                                        $(this).attr('disabled','true');
                                    }
                                    else{
                                        if(primerId==0 && tipo!="multiple" && $.trim(select)!='' && detafectados.length==1){
                                            primerSelect=detafectados[i];
                                            primerValor=$(this).val();
                                        }
                                        primerId++;
                                    }
                                }
                            });
                        }

                        if(primerId==1 && primerSelect!='' && tipo!="multiple" && $.trim(select)!='' && detafectados.length==1){ // valida solo cuando tiene una sola opcion
                            $(primerSelect+">option[value='"+primerValor+"']").attr("selected","true");
                            if( tipo!="multiple" && $(primerSelect+">option[value='"+primerValor+"']").attr('data-evento') ){
                                eventoSlctGlobalSimple(primerSelect.substr(1),$(primerSelect+">option[value='"+primerValor+"']").attr('data-evento'));
                            }
                        }

                        if(valarray!=null && valarray.length>=1){
                            $(afectados).multiselect('select', valarray);
                        }

                    }
                    else{
                        $(detafectados.join(" option, ")+" option").removeAttr('disabled');
                    }

                    $(afectados).multiselect('refresh');
                },
                enterGlobal:function(e,etiqueta,selecciona){
                    tecla = (document.all) ? e.keyCode : e.which; // 2
                    if (tecla==13){
                        e.preventDefault();
                        $("#"+etiqueta).click(); 
                        if( typeof(selecciona)!='undefined' ){
                            $("#"+etiqueta).focus(); 
                        }
                    }
                }
            },
            ready: function(){
                this.slctGlobalHtml("departamento,#provincia,#distrito",'simple');
                this.slctGlobalHtml("sede,#carrera,#curso",'multiple');
                this.mostrarSedes();
                this.mostrarDepartamentos();
            },
        });
