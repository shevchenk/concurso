messagesEs={
    after: (field, [target]) => `El campo ${field} debe ser posterior a ${target}.`,
    alpha_dash: (field) => `El campo ${field} solo debe contener letras, números y guiones.`,
    alpha_num: (field) => `El campo ${field} solo debe contener letras y números.`,
    alpha: (field) => `El campo ${field} solo debe contener letras.`,
    before: (field, [target]) => `El campo ${field} debe ser anterior a ${target}.`,
    between: (field, [min, max]) => `El campo ${field} debe estar entre ${min} y ${max}.`,
    confirmed: (field, [confirmedField]) => `El campo ${field} no coincide con ${confirmedField}.`,
    date_between: (field, [min, max]) => `El campo ${field} debe estar entre ${min} y ${max}.`,
    date_format: (field, [format]) => `El campo ${field} debe tener formato formato ${format}.`,
    decimal: (field, [decimals] = ['*']) => `El campo ${field} debe ser númerico y contener ${decimals === '*' ? '' : decimals} puntos decimales.`,
    digits: (field, [length]) => `El campo ${field} debe ser númerico y contener exactamente ${length} dígitos.`,
    dimensions: (field, [width, height]) => `El campo ${field} debe ser de ${width} pixeles por ${height} pixeles.`,
    email: (field) => `El campo ${field} debe ser un correo electrónico válido.`,
    ext: (field) => `El campo ${field} debe ser un archivo válido.`,
    image: (field) => `El campo ${field} debe ser una imagen.`,
    in: (field) => `El campo ${field} debe ser un valor válido.`,
    ip: (field) => `El campo ${field} debe ser una dirección ip válida.`,
    max: (field, [length]) => `El campo ${field} no debe ser mayor a ${length} caracteres.`,
    mimes: (field) => `El campo ${field} debe ser un tipo de archivo válido.`,
    min: (field, [length]) => `El campo ${field} debe tener al menos ${length} caracteres.`,
    not_in: (field) => `El campo ${field} debe ser un valor válido.`,
    numeric: (field) => `El campo ${field} debe contener solo caracteres númericos.`,
    regex: (field) => `El formato del campo ${field} no es válido.`,
    required: (field) => `El campo ${field} es obligatorio.`,
    size: (field, [size]) => `El campo ${field} debe ser menor a ${size} KB.`,
    url: (field) => `El campo ${field} no es una URL válida.`
};
const config = {
    errorBagName: 'errors', 
    delay: 0,
    locale: 'es',
    messages: null,
    strict: true,
    dictionary: { 
        es: {  
            messages: messagesEs
            
        },
    }
};

Vue.use(VeeValidate, config);
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
                archivos:[],
                alumno:{
                    dni:'',
                    paterno:'',
                    materno:'',
                    nombres:'',
                },
            },
            methods: {
                mostrarArchivos:function() {
                    var request = {
                        dni: app.alumno.dni,
                    };
                    this.$http.get('archivos',request, function (response) {
                        app.archivos=response.archivos;
                        this.htmlArchivos(app.archivos);
                    });
                },
                htmlArchivos:function(obj){
                    var html=''; var daca=''; var drev='';
                    $.each(obj,function(index,data){
                        html+="<tr>";
                        html+=" <td>";
                        html+=  index*1+1;
                        html+=" </td>";
                        html+=" <td>";
                        html+=  data.paterno;
                        html+=" </td>";
                        html+=" <td>";
                        html+=  data.materno;
                        html+=" </td>";
                        html+=" <td>";
                        html+=  data.nombres;
                        html+=" </td>";
                        html+=" <td>";
                        html+=  data.dni;
                        html+=" </td>";
                        html+=" <td>";
                        daca= data.academico.split(",");
                        for (var i =0; i<daca.length; i++) {
                            url="http://cpdtelesup.com/colegio/public/upload/"+data.dni+"/"+daca[i];
                        html+=" <a class='btn bg-navy btn-sm' href='"+url+"' TARGET='_blank'>"+
                                    "<i class='fa fa-cloud-download'></i>"+
                                "</a>";
                        }
                        html+=" </td>";
                        html+=" <td>";
                        drev= data.revista.split(",");
                        for (var i =0; i<drev.length; i++) {
                            url="http://cpdtelesup.com/colegio/public/upload/"+data.dni+"/"+drev[i];
                        html+=" <a class='btn bg-navy btn-sm' href='"+url+"' TARGET='_blank'>"+
                                    "<i class='fa fa-cloud-download'></i>"+
                                "</a>";
                        }
                        html+=" </td>";
                        html+=" <td>";
                            url="http://cpdtelesup.com/colegio/public/upload/"+data.dni+"/"+data.id;
                        html+=" <a class='btn bg-navy btn-sm' href='"+url+"' TARGET='_blank'>"+
                                    "<i class='fa fa-cloud-download'></i>"+
                                "</a>";
                        html+=" </td>";
                        html+="</tr>";
                    });
                    $("#listado tbody").html(html);
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
                },
                validaDni:function(e,id){ 
                    tecla = (document.all) ? e.keyCode : e.which;//captura evento teclado
                    if (tecla==8 || tecla==0) return true;//8 barra, 0 flechas desplaz
                    if($('#'+id).val().length==8)return false;
                    patron = /\d/; // Solo acepta números
                    te = String.fromCharCode(tecla); 
                    return patron.test(te);
                },
                validaLetras:function(e) { // 1
                    tecla = (document.all) ? e.keyCode : e.which; // 2
                    if (tecla==8 || tecla==0) return true;//8 barra, 0 flechas desplaz
                    patron =/[A-Za-zñÑáéíóúÁÉÍÓÚ\s]/; // 4 ,\s espacio en blanco, patron = /\d/; // Solo acepta números, patron = /\w/; // Acepta números y letras, patron = /\D/; // No acepta números, patron =/[A-Za-z\s]/; //sin ñÑ
                    te = String.fromCharCode(tecla); // 5
                    return patron.test(te); // 6
                },
                validaAlfanumerico:function(e) { // 1
                    tecla = (document.all) ? e.keyCode : e.which; // 2
                    if (tecla==8 || tecla==0 || tecla==46) return true;//8 barra, 0 flechas desplaz
                    patron =/[A-Za-zñÑáéíóúÁÉÍÓÚ@.,_\-\s\d]/; // 4 ,\s espacio en blanco, patron = /\d/; // Solo acepta números, patron = /\w/; // Acepta números y letras, patron = /\D/; // No acepta números, patron =/[A-Za-z\s]/; //sin ñÑ
                    te = String.fromCharCode(tecla); // 5
                    return patron.test(te); // 6
                },
                validaNumeros:function(e) { // 1
                    tecla = (document.all) ? e.keyCode : e.which; // 2
                    if (tecla==8 || tecla==0 || tecla==46) return true;//8 barra, 0 flechas desplaz
                    patron = /\d/; // Solo acepta números
                    te = String.fromCharCode(tecla); // 5
                    return patron.test(te); // 6
                },
            },
            ready: function(){
                
            },
        });
