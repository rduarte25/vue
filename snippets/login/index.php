<?php @session_start();

    if(isset( $_SESSION['user'] ) ) {
        header('location:../principal');
    };


include '../include/header.php';?>
<div class="container center">
    <div class="row" style="margin: 0 auto; width: 50%;">
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Iniciar Sesión</span>
                    <form action="" id="iniciaSesion" autocomplete="off" @submit.prevent="login">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="email" name="email" id="email" required class="validate">
                                    <label for="email" >Correo electronico</label>
                                </div>  
                            </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" name="password" id="password" required pattern="[A-Za-z0-9]{8,15}" class="validate">
                                <label for="password">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Entrar" class="btn blue">
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

            
<?php include '../include/footerLogin.php';?>