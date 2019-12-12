<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){

  echo "<script>location.href='login'</script>";

  exit();
}

if (isset($_POST["texto_slide_imagen"])) {

    $resp = GestorSlideController::guardar_text_imagen();
    
    if ($resp["status"] == "ok") {
        echo "
            <script> 
                function do_it(){
                    util.alertSuccess('actualizado')     
                }

                window.addEventListener('load',do_it,false)
                
            </script>

        ";
    }

}

$item1 = GestorSlideController::ver_config_slide();

$selected1 = ($item1["speed"]["config_value"]=="3000") ? "selected" : "";
$selected2 = ($item1["speed"]["config_value"]=="4000") ? "selected" : "";
$selected3 = ($item1["speed"]["config_value"]=="5000") ? "selected" : "";
$selected4 = ($item1["speed"]["config_value"]=="6000") ? "selected" : "";
$selected5 = ($item1["speed"]["config_value"]=="7000") ? "selected" : "";
$selected6 = ($item1["speed"]["config_value"]=="8000") ? "selected" : "";
$selected7 = ($item1["effect"]["config_value"]=="horizontal") ? "selected" : "";
$selected8 = ($item1["effect"]["config_value"]=="vertical") ? "selected" : "";
$selected9 = ($item1["effect"]["config_value"]=="fade") ? "selected" : "";
$selected10 = ($item1["effect_t_slider"]["config_value"]=="zoomIn") ? "selected" : "";
$selected11 = ($item1["effect_t_slider"]["config_value"]=="flipInY") ? "selected" : "";
$selected12 = ($item1["effect_t_slider"]["config_value"]=="pulse") ? "selected" : "";
$selected13 = ($item1["effect_t_slider"]["config_value"]=="bounceIn") ? "selected" : "";
$selected14 = ($item1["effect_t_slider"]["config_value"]=="bounceInDown") ? "selected" : "";
$selected15 = ($item1["effect_t_slider"]["config_value"]=="bounceInRight") ? "selected" : "";
$selected16 = ($item1["effect_t_slider"]["config_value"]=="rotateIn") ? "selected" : "";

// $item1 = $arrayTexto[0];
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

                    <div id="e-commerce-product" class="page-layout simple tabbed">

                        <!-- HEADER -->
                        <div class="page-header bg-primary position-relative text-auto row no-gutters align-items-center justify-content-between p-6">

                            <div class="progress_bar_product">
                                <div class="line_progress"></div>
                            </div>

                            <div class="row no-gutters align-items-center">   

                                <div id="content-arrow-left">
                                    
                                </div>                     

                                <h3 id="titulo_pag_slide">Slide</h3>
                            </div>
                    
                        </div>
                        <!-- / HEADER -->

                        <!-- CONTENT -->
                        <div class="page-content">

                            <div class="card p-3">
                                <div id="contenedor_img_slider">
                                    <div class="x_title">
                                        <h2>Imágenes del slide</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li>
                                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <p class="text-muted">Actualiza las imágenes del slide, tamaño requerido 1024px * 750px o mayor</p>
                                        <?php 

                                            $fn = new GestorSlideController();

                                            $modals = $fn -> verImagenes();

                                        ?>
                                    </div>


                                    <div>
                                        <h2>Ajustes</h2>
                                        <hr>
                                        <div>
                                            <form>
                                                <div class="form-group">
                                                    <label for="titulo">Velocidad:</label>
                                                    <select class="form-control actualizar_config" name="speed" id="speed" data-id='<?php echo $item1["speed"]["config_id"] ?>' data-key='config_value'>


                                                        <option value="3000" <?php echo $selected1; ?> >3 segundos</option>
                                                        <option value="4000" <?php echo $selected2; ?>>4 segundos</option>
                                                        <option value="5000" <?php echo $selected3; ?>>5 segundos</option>
                                                        <option value="6000" <?php echo $selected4; ?>>6 segundos</option>
                                                        <option value="7000" <?php echo $selected5; ?>>7 segundos</option>
                                                        <option value="8000" <?php echo $selected6; ?>>8 segundos</option>
                                                    
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="titulo">Efecto:</label>
                                                    <select class="form-control actualizar_config" name="effect" data-id='<?php echo $item1["effect"]["config_id"] ?>' data-key='config_value'>


                                                        <option value="horizontal" <?php echo $selected7; ?>>Horizontal</option>
                                                        <option value="vertical" <?php echo $selected8; ?>>Vertical</option>
                                                        <option value="fade" <?php echo $selected9; ?>>Fade</option>
                                                
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="titulo">Efecto para el texto:</label>
                                                    <select class="form-control actualizar_config" name="auto" data-id='<?php echo $item1["effect_t_slider"]["config_id"] ?>' data-key='config_value'>

                                                        <option value="zoomIn" <?php echo $selected10; ?>>zoomIn</option>
                                                        <option value="flipInY" <?php echo $selected11; ?>>flipInY</option>
                                                        <option value="pulse" <?php echo $selected12; ?>>pulse</option>
                                                        <option value="bounceIn" <?php echo $selected13; ?>>bounceIn</option>
                                                        <option value="bounceInDown" <?php echo $selected14; ?>>bounceInDown</option>
                                                        <option value="bounceInRight" <?php echo $selected15; ?>>bounceInRight</option>
                                                        <option value="rotateIn" <?php echo $selected16; ?>>rotateIn</option>
                                                
                                                    </select>
                                                </div>
                                             
                                            </form>
                                        </div>
                                    </div>



                                </div>
                                    

                                <?php echo $modals; ?>
                                
                            </div>
                        </div>
                        <!-- / CONTENT -->
                    </div>

                    <script type="text/javascript" src="views/js/apps/e-commerce/product/product.js"></script>

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


    <!-- modal nueva imagen slide -->
<div class="modal fade" id="modalNuevaImagen" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="main-modal-body">
                <form id="formNuevaImagen">
                <div class="form-group">
                    <label for="" class="control-label">Selecciona una imagen</label>
                    <input type="file" name="imagen" class="dropify" required="required">
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="mensajeNuevaImagen"></div>
                        <div id="barraProgresoNuevaImagen" style="width: 70px;position: absolute;top: 244px;z-index: 999;left: 213px;"></div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-mdb-color" id="guardarNuevaImagen" style="margin-top: 4px;font-size: 19px;">Guardar</button>
                    </div>
                    
                </div>
                
                

                </form>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

