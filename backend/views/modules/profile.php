<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){
    
  echo "<script> window.location.href = 'login' </script>";

  exit();
}

?>
    <main>
        <?php 
            include "header.php"; 
        ?>
        <div id="wrapper">
            <?php 
              include "left-sidebar.php"; 
            ?>
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="profile" class="page-layout simple tabbed">

                        <!-- HEADER -->
                        <div class="page-header light-fg d-flex flex-column justify-content-center justify-content-lg-end p-6">

                            <div class="flex-column row flex-lg-row align-items-center align-items-lg-end no-gutters justify-content-between">

                                <div class="user-info flex-column row flex-lg-row no-gutters align-items-center">

                                    <img class="profile-image avatar huge mr-6" src="<?php echo $_SESSION['foto'] ?>">

                                    <div class="name h2 my-6"><?php echo $_SESSION["usuario"] ?></div>

                                </div>

                                <div class="actions row align-items-center no-gutters">

                                    <!-- <button type="button" class="btn btn-primary" aria-label="Follow">Follow</button> -->

                                    <form id="form_photo">
                                        <div class='file-field'>
                                            <div class='d-flex justify-content-center'>
                                                <div class='btn btn-mdb-color btn-rounded float-left'>
                                                    <span>Cambiar foto</span>
                                                    <input type='file' id='photo_user' name='photo_user'>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        
                                    
                                </div>

                            </div>
                        </div>
                        <!-- / HEADER -->

                        <!-- CONTENT -->
                        <div class="page-content">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <!-- <li class="nav-item">
                                    <a class="nav-link btn active" id="timeline-tab" data-toggle="tab" href="#timeline-tab-pane" role="tab" aria-controls="timeline-tab-pane" aria-expanded="true">Timeline</a>
                                </li> -->

                                <li class="nav-item">
                                    <a class="nav-link btn active" id="about-tab" data-toggle="tab" href="#about-tab-pane" role="tab" aria-controls="about-tab-pane">About</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link btn" id="users-tab" data-toggle="tab" href="#users-tab-pane" role="tab" aria-controls="photos-tab-pane">Usuarios</a>
                                </li>

                            </ul>

                            <div class="tab-content">
                       
                                <div class="tab-pane fade show active" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab">

                                    <div class="row">

                                        <div class="about col-12 col-md-7 col-xl-9">

                                            <div class="profile-box info-box general card mb-4">

                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title">General Information</div>
                                                </header>

                                                <div class="content p-4">

                                                    <form id="form_editar">
                                                        
                                                        <div class="info-line mb-6">
                                                            <div class='form-group'>
                                                                <label for='recipient-name' class='form-control-label'>Usuario:</label>
                                                                <input type='text' class='form-control user_e_n' id='user_name_edit' name='user_name_edit' value='<?php echo $_SESSION['usuario'] ?>' data-id='<?php echo $_SESSION['id'] ?>' data-key='usuario' >
                                                            </div>
                                                            <div class='form-group'>
                                                                <label for='recipient-name' class='form-control-label'>Correo:</label>
                                                                <input type='text' class='form-control user_e_n' id='user_email_edit' name='user_email_edit' value='<?php echo $_SESSION['correo'] ?>' data-id='<?php echo $_SESSION['id'] ?>' data-key='correo'>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label for='' class='form-control-label'>Tipo:</label>
                                                                <select class='form-control user_e_n' id='' data-id='<?php echo $_SESSION['id'] ?>' data-key='tipo'>
                                                                    <option value='0'>Administrador</option>
                                                                    <option value='1'>Normal</option>
                                                                </select>
                                                            </div>
                                                            <!-- <div class="divider my-8"></div> -->
                                                            <div class="title h6">Cambiar contraseña</div>
                                                            <div class='form-group'>
                                                                <label for='' class='form-control-label'>contraseña actual:</label>
                                                                <input type='text' class='form-control' id='user_password_now' name='user_password_now' value=''/>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label for='recipient-name' class='form-control-label'>Nueva contraseña:</label>
                                                                <input type='text' class='form-control' id='user_new_password' name='user_new_password' value=''/>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="info-line">
                                                        <button type="button" class="btn btn-primary float-right" id="actualizar_info">
                                                            Update
                                                        </button>
                                                    </div>                                                                                                        
                                                    <!-- <div class="info-line">
                                                        <div class="title font-weight-bold mb-1">About Me</div>
                                                        <div class="info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eget pharetra felis, sed ullamcorper dui. Sed et elementum neque. Vestibulum pellente viverra ultrices. Etiam justo augue, vehicula ac
                                                            gravida a, interdum sit amet nisl. Integer vitae nisi id nibh dictum mollis in vitae tortor.</div>
                                                    </div> -->

                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="about-sidebar col-12 col-md-5 col-xl-3">

                                            <div class="profile-box friends card mb-4">

                                                <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                                                    <div class="title h6">Usuarios</div>
                                                    <div class="more text-muted">
                                                        <span>See</span>
                                                        <span>454</span>
                                                        <span>More</span>
                                                    </div>
                                                </header>

                                                <div class="content row no-gutters p-4">

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="views/images/avatars/garry.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="views/images/avatars/carl.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="views/images/avatars/jane.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="views/images/avatars/garry.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="views/images/avatars/vincent.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="views/images/avatars/alice.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="views/images/avatars/andrew.jpg">
                                                    </div>

                                                </div>

                                            </div>

                                     
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="users-tab-pane" role="tabpanel" aria-labelledby="users-tab">

                                    <div class="users">
                                                                                
                                        <div class="profile-box info-box general card mb-4">

                                            <header class="h6 bg-secondary text-auto p-4">
                                                <div class="title">Usuarios</div>
                                                <button type="button" class="btn btn-primary ml-2 new_user float-right" 
                                                        aria-label="Send Message"
                                                        data-toggle="modal" 
                                                        data-target="#modal_crear_usuario">
                                                    Nuevo usuario
                                                </button>
                                            </header>

                                            <div class="content p-4">

                                                <?php GestorIngresoController::ver_usuarios(); ?>
                                                                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- / CONTENT -->
                    </div>

                </div>
            </div>
            <?php 
              include "right-sidebar.php"; 
            ?>

        </div>
        <?php 
            include "footer.php"; 
        ?> 
    </main>


    <!-- modal crear -->

    <div class='modal fade' id="modal_crear_usuario" tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Nuevo usuario</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body' id=''>
                    <form class='md-form' id='new_user_form' name='new_user_form'>
                        <div class='file-field'>                            
                            <div class='d-flex justify-content-center'>
                                <div class='btn btn-mdb-color btn-rounded float-left'>
                                    <span>Añadir foto</span>
                                    <input type='file' id='user_photo' name='user_photo'>
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='recipient-name' class='form-control-label'>Usuario:</label>
                            <input type='text' class='form-control' id='user_name' name='user_name' value=''/>
                        </div>
                        <div class='form-group'>
                            <label for='recipient-name' class='form-control-label'>Correo:</label>
                            <input type='text' class='form-control' id='user_email' name='user_email' value=''/>
                        </div>
                        <div class='form-group'>
                            <label for='recipient-name' class='form-control-label'>Contraseña:</label>
                            <input type='text' class='form-control' id='user_password' name='user_password' value=''/>
                        </div>
                        <div class='form-group'>
                            <select class='form-control' name='user_tipe' id='user_tipe'>
                                <option value='0'>Administrador</option>
                                <option value='1'>Normal</option>
                            </select>
                        </div>
                        <div class="error_insert text-danger"></div>
                        
                    </form>
                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                    <button type='button' class='btn btn-primary guardar_user'>Guardar</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>