//document.addEventListener("DOMContentLoaded", function () { 
//    M.updateTextFields(); 
//});

const app = new Vue({
    el: '#app',
    data: {
        password:'',
        confirmarPassword:'',
        response:'',
        correo:'',
        boton:'btn blue disabled',
        menu:false,
    },
    methods:{
        register(){
            if( this.password === this.confirmarPassword ) {
                const form = document.getElementById('formRegistro');
                axios.post('../api/loginRegistro/registro.php', new FormData(form)).then( res => {
                    this.response = res.data;
                    this.direccionamiento();
                } )
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las contraseñas no coinsiden',
                })
            }
        },
        direccionamiento(){
            if( this.response == 'success' ) {
                console.log(this.response);
                location.href = 'index.php'

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo registrar',
                })
            }
        },
        validarCorreo(){

            if( this.validEmail(this.correo) ) {
                const formData = new FormData();
                formData.append('correo', this.correo);
                console.log(this.correo);
                axios.post('../api/loginRegistro/validarEmail.php', formData).then( res => {
                    this.response = res.data;
                    console.log(this.response);
                    if ( this.response == 'success' ) {
                        this.boton = 'btn blue';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'El correo ya existe',
                        })
                    }
                } )
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Escribe el correo de forma correcta',
                })
            }

            
        },
        validEmail: function (email) {
            var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        login(){
            const form = document.getElementById('iniciaSesion');
            axios.post('../api/loginRegistro/login.php', new FormData(form)).then( res => {
                this.response = res.data;
                console.log(this.response);
                if( this.response == 'success'){
                    location.href = '../principal';
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Datos incorrectos',
                    })
                }
            } )
        }
    }
});