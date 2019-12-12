<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){
  echo "<script>location.href='login'</script>";

  exit();
}

$num_info = gestorProductoController::ver_num_productos();

?>  
<main>  
    <div id="the-container"></div>
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

                                    <a href="products" class="btn btn-icon mr-4">
                                        <i class="icon icon-arrow-left"></i>
                                    </a>
                                    
                                    <div class="logo-text">
                                        <div class="h4">Ofertas</div>
                                        <div class="">Total Productos en oferta: <?php echo $num_info["oferta"] ?></div>
                                    </div>
                                </div>

                            </div>
                            <!-- / APP TITLE -->

                            <!-- SEARCH -->
                            <div class="col search-wrapper px-2">

                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-icon">
                                            <i class="icon icon-magnify"></i>
                                        </button>
                                    </span>
                                    <input id="products-search-input" type="text" class="form-control" placeholder="Search" aria-label="Search" />
                                </div>

                            </div>
                            <!-- / SEARCH -->


                        </div>
                        <!-- / HEADER -->

                        <div class="page-content-card">

                            <table id="e-commerce-products-table" class="table dataTable">
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
                                                <span class="column-title">Name</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Category</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Price</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Quantity</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Active</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="table-header">
                                                <span class="column-title">Actions</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php 
                                        $producto = new gestorProductoController();
                                        $producto->verProductoOfertaController();
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
</body>

</html>