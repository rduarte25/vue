<?php include '../include/header.php';?>
<div class="container center">
    <div class="row" style="margin: 0 auto; width: 50%;">
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Registro</span>
                    <div class="row">
                        <form action="" id="formRegistro" autocomplete="off" @submit.prevent="register" enctype="multipart/form-data" class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="user" id="user" required pattern="[A-Za-z]{5,30}" class="validate" value="">
                                    <label for="user">Nombre de Usuario</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="password" v-model="password" name="password" id="password" required pattern="[A-Za-z0-9]{8,15}" class="validate">
                                    <label for="password">Contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="password" name="confirm-password" v-model="confirmarPassword"id="confirm-password" required pattern="[A-Za-z0-9]{8,15}" class="validate">
                                    <label for="confirm-password">Confirmar Contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="email" name="email" id="email" required class="validate" @blur="validarCorreo" v-model="correo">
                                    <label for="email" >Correo electronico</label>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="file-field input-field" style="height: 1rem; bottom:0;">
                                    <div class="btn">
                                        <span>Imagen de Perfil</span>
                                        <input type="file" name="foto">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                    <label for="foto">Imagen de Perfil</label>
                                </div>
                            </div>
                            <div class="row">
                                <input type="submit" value="Registrar usuario" :class="boton">
                            </div>              
                            
                            
                        </form>
                    </div>
                    
                </div>
                <div class="card-action">
                <a href="index.php">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </div>

</div>
        
<?php include '../include/footerLogin.php';?>