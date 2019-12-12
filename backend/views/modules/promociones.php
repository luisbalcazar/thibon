<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){
  echo "<script>location.href='login'</script>";

  exit();
}

$num_info = gestorPromocionesController::ver_num_promociones();
$num_promos = count($num_info);
?>  
<main>  
    <div id="the-container-prom"></div>
    <?php 
        include "header.php"; 
    ?>
    <div id="wrapper">
        <?php 
          include "left-sidebar.php"; 
        ?>
        <div class="content-wrapper">
            <div class="content custom-scrollbar">

                <div id="e-commerce-products" class="page-layout carded full-width">

                    <div class="top-bg bg-primary"></div>

                    <!-- CONTENT PRODUCTOS SIN OFERTA -->
                    <div class="page-content-wrapper contenedor_productos_sin_oferta" >

                        <!-- HEADER -->
                        <div class="page-header light-fg row no-gutters align-items-center justify-content-between">

                            <!-- APP TITLE -->
                            <div class="col-12 col-sm">

                                <div class="logo row no-gutters justify-content-center align-items-start justify-content-sm-start">
                                    <div class="logo-icon mr-3 mt-1">
                                        <i class="icon-cube-outline s-6"></i>
                                    </div>
                                    <div class="logo-text">
                                        <div class="h4">Promociones</div>
                                        <div class="">Total Promociones: <?php echo $num_promos; ?></div>
                                        
                                    </div>
                                </div>

                            </div>
                            <!-- / APP TITLE -->

                        </div>
                        <!-- / HEADER -->

                        <div class="page-content-card">

                            <table class="table dataTable table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">ID</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Image</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Alias</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">ID Productos</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Precio</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Cantidad</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Estado</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Actions</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="body_promociones">

                                    <?php 
                                        $producto = new gestorPromocionesController();
                                        $producto->verPromocionesoController();
                                     ?>
                    
                                                                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- / CONTENT -->
                    

                </div>

                <script type="text/javascript" src="views/js/apps/e-commerce/products/products.js"></script>

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

