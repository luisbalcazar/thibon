<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){
    echo "<script>location.href='login'</script>";

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

                                <div>Detalles del Producto</div>
                            </div>

                            <button type="button" class="btn btn-light" id="save-product">
                                GUARDAR
                            </button>

                        </div>
                        <!-- / HEADER -->

                        <!-- CONTENT -->
                        <div class="page-content">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link btn active" id="basic-info-tab" data-toggle="tab" href="#basic-info-tab-pane" role="tab" aria-controls="basic-info-tab-pane" aria-expanded="true">Información Basica</a>
                                </li>

                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                                    <div class="card p-6">

                                        <form id="form0" enctype="multipart/form-data">

                                            <div class="file-field">
                                                <div class="z-depth-1-half mb-4" id="preview" style="display: block; margin-left: auto;margin-right: auto; width: 300px;">
                                                  <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="img-fluid" id="picture" style="display: block; margin-left: auto;margin-right: auto; width: 300px;" alt="example placeholder">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                  <div class="btn btn-mdb-color btn-rounded waves-effect float-left">
                                                    <span>Imagen principal</span>
                                                    <input type="file" name="foto" id="foto">
                                                    <input type="hidden" name="form3-h" id="form3-h" value="<?php echo $numero; ?>">
                                                  </div>
                                                </div>
                                          </div>

                                            <div class="form-group">
                                                <input type="text" name="product-name" id="producto" class="form-control" aria-describedby="product name" />
                                                <label>Nombre del Producto</label>
                                            </div>

                                            <div class="form-group">
                                                <textarea class="form-control" name="product-description" id="product-description" aria-describedby="product description" rows="5"></textarea>
                                                <label>Descripcion del Producto</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Archivos del producto</label>
                                                <div class='file-field'>
                                                    <div class='d-flex '>
                                                        <div class='btn btn-mdb-color float-left'>
                                                            <span>Max upload size: 15MB</span>
                                                            <input type='file' id='imgs_product' name='files_product[]' multiple="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="categories" id="categories">
                                                    <?php 
                                                        $categorias = new gestorCategoriaController();
                                                        $categorias->verCategoriasProductosController();
                                                    ?>
                                                </select>
                                                <label>Categorias</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="tags" id="tags" class="form-control" aria-describedby="product tags" />
                                                <label>Etiquetas</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="code" id="code" class="form-control" aria-describedby="barcode" />
                                                <label>Codigo</label>
                                            </div>

                                            <div class="form-group">
                                                <input id="example-number-input" name="quantity" id="quantity" class="form-control" type="number" value="10" aria-describedby="quantity" />
                                                <label for="example-number-input">Cantidad</label>
                                            </div>

                                            <div class="input-group mb-8">

                                                <span class="input-group-addon pt-4">$</span>

                                                <div class="form-group">
                                                    <input type="text" name="taxes" id="taxes" class="form-control" aria-label="Amount (to the nearest dollar)" />
                                                    <label>Impuestos</label>
                                                </div>

                                                <span class="input-group-addon pt-4">.00</span>

                                            </div>

                                            <div class="input-group mb-8">

                                                <span class="input-group-addon pt-4">$</span>

                                                <div class="form-group">
                                                    <input type="text" name="price" id="price" class="form-control" aria-label="Amount (to the nearest dollar)" />
                                                    <label>Total</label>
                                                </div>

                                                <span class="input-group-addon pt-4">.00</span>
                                            <?php $numero =  mt_rand(100, 999); ?>
                                            <input type="hidden" name="numero" id="numero" value="<?php echo $numero; ?>">

                                        </form>
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
</body>

</html>