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
                                    <div class="logo-icon mr-3 mt-1">
                                        <i class="icon-cube-outline s-6"></i>
                                    </div>
                                    <div class="logo-text">
                                        <div class="h4">Productos <?php echo $num_info["normal"] ?></div>                                        
                                        <div style="display: flex;align-items: center;" class='hide_sx'>
                                            <a href="productsOfert" class="text-white" style="text-decoration: none;">
                                                Productos en oferta
                                            </a>
                                            <i class="icon-chevron-right"></i>
                                        </div>
                                        <div style="display: flex;align-items: center;" class='hide_sx'>
                                            <a href="trash" class="text-white" style="text-decoration: none;">
                                                Papelera
                                            </a>
                                            <i class="icon-chevron-right"></i>
                                        </div>
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

                            <div class="col-auto" style="margin-right: 10px">
                                <a href="#" id="promocion-button" class="icon-cube" data-toggle='tooltip' title="nueva promoción"></a>
                            </div>

                            <div class="col-auto" style="margin-right: 10px">
                                <a href="product" class="icon-plus-circle" data-toggle='tooltip' title="nueva producto"></a>
                            </div>
                            <div class="col-auto show_xs">
                                <a href="trash" class="icon-trash" data-toggle='tooltip' title="ver papelera"></a>
                            </div>

                        </div>
                        <!-- / HEADER -->

                        <div class="page-content-card">

                            <table id="e-commerce-products-table" class="table dataTable product-table">
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
                                        $producto->verProductoController();
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

<div class='modal fade' id="modal-promo" tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Nueva Promocion</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body' id=''>
                    <form class='md-form' id='form-prom' name='form-prom'>
                        <div class='file-field'>
                            <div class='mb-4' id="prom-preview">
                                <img style='width: 170px; height: 156px; display: block; margin-left: auto;margin-right: auto;' src='https://mdbootstrap.com/img/Photos/Others/placeholder.jpg' class='rounded-circle z-depth-1-half avatar-pic' alt='example placeholder avatar' id="prom-pic">
                            </div>
                            <div class='d-flex justify-content-center'>
                                <div class='btn btn-mdb-color btn-rounded float-left'>
                                    <span>Añadir foto</span>
                                    <input type='file' id='promo-photo' name='editar-photo'>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class='form-group'>
                            <input type="text" name="alias-prom" id="alias-prom" class='form-control' aria-label='Amount (to the nearest dollar)'>
                            <label class='form-control-label'>Alias:</label>
                        </div>
                        <div class='form-group'>
                           
                            <textarea class="form-control" name="descripcion-prom" id="descripcion-prom" aria-describedby="product description" rows="5"  ></textarea>
                            <label class='form-control-label'>Descripción:</label>
                        </div>
                        <div class='form-group'>
                            <input type="number" name="price-prom" id="price-prom" class='form-control' aria-label='Amount (to the nearest dollar)'>
                            <label class='form-control-label' >Precio de Promocion:</label>
                        </div>
                        <h3>Productos seleccionados</h3>
                        <div id="contenedor-prom">
                            
                        </div>
                        <div class="error_insert text-danger"></div>
                        
                    </form>
                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                    <button type='button' class='btn btn-primary' id="guardar-promo">Guardar</button>
                </div>
            </div>
        </div>
</div>