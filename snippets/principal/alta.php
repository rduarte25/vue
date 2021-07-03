<?php include '../include/header.php';?>
<?php include '../include/sesion.php' ?>
<div class="container center">
    <div class="row" style="margin: 0 auto; width: 80%;">
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Postea tu código</span>
                    <form action="" id="altaPost" autocomplete="off" @submit.prevent="alta">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="titulo" id="titulo" required class="validate">
                                    <label for="titulo" >Titulo</label>
                                </div>  
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="codigo" id="codigo" class="materialize-textarea validate" required ></textarea>
                                    <label for="codigo" >Código</label>
                                </div>  
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="descripcion" id="descripcion" required class="materialize-textarea validate"></textarea>
                                    <label for="descripcion" >Descripción</label>
                                </div>  
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="categoria" id="categoria" class="browser-default" required>
                                        <option value="" disabled selected>Escoge una opción</option>
                                        <option value="php">PHP</option>
                                        <option value="css">CSS</option>
                                        <option value="html5">HTML5</option>
                                        <option value="mysql">MYSQL</option>
                                        <option value="vue">VUE</option>
                                    </select>
                                    
                                </div>  
                            </div>
                        
                        <div class="row">
                            <input type="submit" value="Guardar" class="btn blue">
                        </div>                        
                    </form>
                </div>
                <div class="card-action">
                <a href="registro.php">Registrarse</a>
                </div>
            </div>
        </div>
    </div>

</div>

            
<?php include '../include/footer.php';?>