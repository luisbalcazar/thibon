<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){
     echo "<script>window.location.href = 'login' </script>";

  exit();
}
if (!isset($_GET["id"])) {
    echo "<script>window.location.href = 'products' </script>";
}

$id = $_GET["id"];

$info = gestorProductoController::ver_info_producto($id);
$categoria = $info['info_p']["categoria"];
$destacado = $info['info_p']["destacado"];
// var_dump($info);
echo "<span hidden id='id_producto_hidden'>$id</span>";
echo "<span hidden id='categoria_hidden'>$categoria</span>";
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

                                <a href="products" class="btn btn-icon mr-4">
                                    <i class="icon icon-arrow-left"></i>
                                </a>                    

                                <div class="product-image mr-4">
                                    <img src="views/images/ecommerce/product-image-placeholder.png">
                                </div>

                                <div>Producto <?php echo "#$id" ?></div>
                            </div>
                    
                        </div>
                        <!-- / HEADER -->

                        <!-- CONTENT -->
                        <div class="page-content">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link btn active" id="basic-info-tab" data-toggle="tab" href="#basic-info-tab-pane" role="tab" aria-controls="basic-info-tab-pane" aria-expanded="true">Información Basica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="product-images-tab" data-toggle="tab" href="#product-images-tab-pane" role="tab" aria-controls="product-images-tab-pane">Galería</a>
                                </li>                             

                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                                    <div class="card p-6">

                                        <form id="form_edit_product" enctype="multipart/form-data">

                                            <div class="file-field">
                                                <div class="z-depth-1-half mb-4" id="preview" style="display: block; margin-left: auto;margin-right: auto;">
                                                  <img src="<?php echo $info['info_p']['foto'] ?>" class="img-fluid" id="picture" style="display: block; margin-left: auto;margin-right: auto; width: 100%;" alt="example placeholder">
                                                </div>
                                                <!-- <div class="d-flex justify-content-center">
                                                  <div class="btn btn-mdb-color btn-rounded waves-effect float-left">
                                                    <span>Imagen principal</span>
                                                    <input type="file" name="foto" id="foto">
                                                    <input type="hidden" name="form3-h" id="form3-h" value="<?php  #echo $numero; ?>">
                                                  </div>
                                                </div> -->
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="product-name" id="producto" class="form-control actualizar_campo" aria-describedby="product name" value="<?php echo $info['info_p']['nombre'] ?>" data-id='<?php echo $id ?>' data-key='nombre'>
                                                <label>Nombre del Producto</label>
                                            </div>

                                            <div class="form-group">
                                                <textarea class="form-control actualizar_campo" name="product-description" id="product-description" aria-describedby="product description" rows="5" data-id='<?php echo $id ?>' data-key='descripcion'><?php echo $info['info_p']['descripcion'] ?></textarea>
                                                <label>Descripcion del Producto</label>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control actualizar_campo" name="destacado" data-id='<?php echo $id ?>' data-key='destacado'>
                                                    <option value="false" <?php echo ($destacado == "false") ? "selected" : ""; ?> >No destacado</option>
                                                    <option value="true" <?php echo ($destacado == "true") ? "selected" : ""; ?>>destacado</option>
                                                </select>
                                                <!-- <label>Destacado</label> -->
                                            </div>
                                  
                                            <div class="form-group">
                                                <select class="form-control actualizar_campo categorias_editar" name="categories" id="categories" data-id='<?php echo $id ?>' data-key='categoria'>
                                                    <?php 
                                                        $categorias = new gestorCategoriaController();
                                                        $categorias->verCategoriasProductosController();
                                                    ?>
                                                </select>
                                                <label>Categorias</label>
                                            </div>
                                            

                                            <div class="form-group">
                                                <input type="text" name="tags" id="tags" class="form-control actualizar_campo" aria-describedby="product tags" value="<?php echo $info['info_p']['etiquetas'] ?>" data-id='<?php echo $id ?>' data-key='etiquetas'>
                                                <label>Etiquetas</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="code" id="code" class="form-control actualizar_campo" aria-describedby="barcode" value="<?php echo $info['info_p']['codigo'] ?>" data-id='<?php echo $id ?>' data-key='codigo'>
                                                <label>Codigo</label>
                                            </div>

                                            <div class="form-group">
                                                <input id="example-number-input" name="quantity" id="quantity" class="form-control actualizar_campo" type="number" aria-describedby="quantity" value="<?php echo $info['info_p']['inventario'] ?>" data-id='<?php echo $id ?>' data-key='inventario'>
                                                <label for="example-number-input">Cantidad</label>
                                            </div>

                                            <div class="input-group mb-8">

                                                <span class="input-group-addon pt-4">$</span>

                                                <div class="form-group">
                                                    <input type="text" name="taxes" id="taxes" class="form-control actualizar_campo" aria-label="Amount (to the nearest dollar)" value="<?php echo $info['info_p']['impuesto'] ?>" data-id='<?php echo $id ?>' data-key='impuesto'>
                                                    <label>Impuestos</label>
                                                </div>

                                                <span class="input-group-addon pt-4">.00</span>

                                            </div>

                                            <div class="input-group mb-8">

                                                <span class="input-group-addon pt-4">$</span>

                                                <div class="form-group">
                                                    <input type="text" name="price" id="price" class="form-control actualizar_campo" aria-label="Amount (to the nearest dollar)" value="<?php echo $info['info_p']['precio'] ?>" data-id='<?php echo $id ?>' data-key='precio'>
                                                    <label>Precio</label>
                                                </div>

                                                <span class="input-group-addon pt-4">.00</span>
                                                <?php $numero =  mt_rand(100, 999); ?>
                                                <input type="hidden" name="numero" id="numero" value="<?php echo $numero; ?>">
                                            </div>
                                            <div class="input-group mb-8">

                                                <span class="input-group-addon pt-4">$</span>

                                                <div class="form-group">
                                                    <input type="text" name="oferta" id="oferta" class="form-control actualizar_campo" aria-label="Amount (to the nearest dollar)" value="<?php echo $info['info_p']['oferta'] ?>" data-id='<?php echo $id ?>' data-key='oferta'>
                                                    <label>Oferta</label>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                    
                                <!-- tab galería -->

                                <div class="tab-pane fade" id="product-images-tab-pane" role="tabpanel" aria-labelledby="product-images-tab">

            
                                    <div class="card p-6">

                                        <div class="row">

                                            <div>

                                                <?php 

                                                    if ($info["count_media"] != 0) {
                                                        echo '<button id="ordenarSlide" class="btn btn-warning" style="margin:10px 30px">Ordenar</button>';
                                                    }


                                                ?>
                                        
                                                <button type="button" class="btn btn-primary ml-2 agregarArchivosProducto" 
                                                        aria-label="Send Message"
                                                        data-toggle="modal" 
                                                        data-target="#modal_more_files">
                                                    Agregar archivos
                                                </button>
                                                                                                                                                    
                                                

                                            </div>

                                            <div id="imgSlide" class="col-lg-12 col-md-10 col-sm-9 col-xs-12">
                                                <ul id="columnasSlide">
                                                    <?php gestorProductoController::ver_images_producto($id); ?>   
                                                </ul>
                                            

                                                <button id="guardarOrdenImagenesProducto" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden</button>

                                            </div>

                                        </div>
                                    </div>
                                </div>

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

    <div class='modal fade' id="modal_more_files" tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Agregar archivos al producto</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body' id=''>

                    <form class='md-form' id='form_add_files'>

                        <div class='file-field'>
                            <div class='d-flex '>
                                <div class='btn btn-mdb-color float-left'>
                                    <span>Max upload size: 15MB</span>
                                    <input type='file' id='' name='files_product[]' multiple="">
                                </div>
                            </div>
                        </div>
                        <div class="progress_bar_product">
                            <div class="line_progress"></div>
                        </div>
                        <div class="error_add_files text-danger"></div>
                        
                    </form>
                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                    <button type='button' class='btn btn-primary ' id="guardar_files_producto">Guardar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>