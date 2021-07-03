<?php include '../include/header.php';?>
<?php include '../include/sesion.php' ?>
<nav>
    <div class="nav-wrapper indigo lighten-4">
        <form>
        <div class="input-field">
            <input id="search" type="search" v-model='buscar' required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
        </div>
        </form>
    </div>
</nav>
<div class="container">
    <div class="row" v-for="item in datosFiltrados">
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                <span class="card-title"><img :src="item.foto" alt="item.foto" width="50" class="circle">{{item.user}}</span>
                <span class="card-title">{{item.titulo}}</span>
                    <div class="row">
                        <pre :id="'copy-'+item.id">
                            {{item.codigo}}
                        </pre>
                        <p>{{item.descripcion}}</p>
                        <div class="card-action">
                            <a v-if="item.user == userPost" :href="'http://vue.local/snippets/principal/editar.php?id='
                             + item.id">Editar</a>
                            <a v-if="item.user == userPost" href="#" @click="eliminar(item.id)">Eliminar</a>
                            <a href="#" class="copiar" :data-clipboard-target="'#copy-'+item.id">Copiar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../include/footer.php';?>