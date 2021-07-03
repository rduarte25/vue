const app = new Vue({
    el: '#app',
    data: {
        datos: '',
        menu:true,
        response:'',
        listar:[],
        buscar:'',
        itemId:'',
        formEditar:'',
        act: '',
        userPost:'',
    },
    created(){
        this.getCategoria();
        this.getUser();
        this.getId();
    },
    computed:{
        datosFiltrados(){
            return this.listar.filter((filtro) => {
                return filtro.titulo.toUpperCase().match(this.buscar.toUpperCase()) || filtro.descripcion.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods:{
        alta(){
            const form = document.getElementById('altaPost');
            axios.post('../api/crud/altaPost.php', new FormData(form)).then( res => {
                this.response = res.data;
            } );
            console.log(this.response)
            if( this.response == 'success' ) {
                Swal.fire({
                    icon: 'success',
                    title: 'Buen Trabajo',
                    text: 'Post Guardado',
                    button:'Ok'
                })
                form.reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El Post No Pudo Ser Guardado',
                })
            }
        },
        getId(){
            let uri = window.location.href.split('?');
            if( uri.length == 2 ) {
                let vars = uri[1].split('&');
                let getVars = {};
                let tmp = '';
                vars.forEach(function(v){
                    tmp = v.split('=');
                    if( tmp.length == 2 ) {
                        getVars[tmp[0]] = tmp[1];
                        
                    }
                });
                this.itemId = getVars;
                axios.get('http://vue.local/snippets/api/crud/getId.php?id=' + this.itemId.id).then( res => {
                    this.formEditar = res.data
                    this.activo = 'activo'
                } );
                
            }
        },
        editar(){
            const form = document.getElementById('editarPost');
            axios.post('../api/crud/editarPost.php', new FormData(form)).then( res => {
                this.response = res.data;
            } );
            console.log(this.response)
            if( this.response == 'success' ) {
                location.href = 'index.php';
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El Post No Pudo Ser Editado',
                })
            }
        },
        eliminar(id){
            Swal.fire({
                icon: 'warning',
                title: '¿Estas seguro que deseas eliminar el Post?',
                text: 'Al eliminarlo no podras recuperarlo',
                buttons:true,
                dangerMode:true,
                showCancelButton:true,
            }).then((aceptar) => {
                if( aceptar )  {
                    axios.get('http://vue.local/snippets/api/crud/eliminar.php?id=' + this.itemId.id ).then( res => {
                        //this.getCategoria
                        if( this.res.data == 'success' ) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Post Eliminado',
                                text: 'Post Eliminado',
                                button:'Ok'
                            })
                            this.getCategoria();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Post No Eliminado',
                                text: 'Post No Eliminado',
                                button:'Ok'
                            })
                        }
                    } );
                } else {
                    return false
                }
            })
        },
        getUser(){
            axios.get('http://vue.local/snippets/api/crud/getUser.php?id=' ).then( res => {
                this.userPost = res.data
            } );
        },
        getCategoria(){
            let uri = window.location.href.split('?');
            if( uri.length == 2 ) {
                let vars = uri[1].split('&');
                let getVars = {};
                let tmp = '';
                vars.forEach(function(v){
                    tmp = v.split('=');
                    if( tmp.length == 2 ) {
                        getVars[tmp[0]] = tmp[1];
                        
                    }
                });
                this.itemId = getVars;
                axios.get('http://vue.local/snippets/api/crud/getCategoria.php?cat=' + this.itemId.cat ).then( res => {
                    this.listar = res.data
                } );
                
            } else {
                axios.get('http://vue.local/snippets/api/crud/getPost.php').then( res => {
                    this.listar = res.data;
                } );
            }
        }
    }
});