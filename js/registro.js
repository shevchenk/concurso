Vue.config.debug = true;

        var app = new Vue({
            http: {
                root: 'http://cpdtelesup.com/colegio/public/concurso',
            },
            el: '#app',
            data: {
                ciudades:[],
                carreras:[],
                asignaturas:[],
                alumno:{},
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
                    ciudad:'',
                },
            },
            methods: {
                mostrarCiudades: function() {
                    this.$http.get('sedes', function (response) {
                        app.ciudades=response;
                    });
                },
                cambiarCiudad: function() {
                    var request = {
                        ciudad_id: app.alumno.ciudad,
                    };
                    this.$http.get('carreras.php', request, function (response) {
                        app.carreras=response;
                    });
                },
                cambiarCarrera: function() {
                    var request = {
                        carrera_id: app.alumno.carrera,
                    };
                    this.$http.get('asignaturas.php',request, function (response) {
                        app.asignaturas=response;
                    });
                },
                registro: function() {
                    this.$http.get('registro.php',app.alumno, function (response) {
                        //app.carreras=response;
                    });
                },
            },
            ready: function(){
                this.mostrarCiudades();
            },
        });
