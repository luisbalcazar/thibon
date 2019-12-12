<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){

  echo "<script>location.href='login'</script>";

  exit();
}

if (isset($_POST["cuerpo"])) {

    $resp = GestorPagesController::actualizar_pages();
    
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

$footer = GestorPagesController::ver_page("footer");

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
                                <h3>Editar footer</h3>
                            </div>

                            <button type="button" class="btn btn-light" id="guardar_page">
                                GUARDAR
                            </button>
                            
                    
                        </div>
                        <!-- / HEADER -->

                        <!-- CONTENT -->
                        <div class="page-content">

                            <div class="card p-3">
                                <form id="form-page" enctype="multipart/form-data" method="post" action="editFooter">
                                    <textarea name="cuerpo"  id="mymce" rows="15" placeholder="Enter text ..."><?php echo $footer[0]["cuerpo"] ?></textarea>   
                                    <input type="text" name="name_page" hidden="" value="footer"> 
                                                                        
                                </form>
                                
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


</body>

</html>