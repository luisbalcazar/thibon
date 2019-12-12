<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){

  echo "<script>location.href='login'</script>";

  exit();
}

if (isset($_GET["id"])) {

    $editarArticulo = new gestorArticulosController();
    $articulo = $editarArticulo -> verEditArticulosController();

}

if (isset($_POST["article-title"])) {

    $respuesta = gestorArticulosController::editarArticulosController();
    
    if ($respuesta == "ok") {
        echo "
            <script> 
                function do_it(){
                    util.alertSuccess('actualizado')     
                }

                window.addEventListener('load',do_it,false)
                
            </script>

        ";

        $editarArticulo = new gestorArticulosController();
        $articulo = $editarArticulo -> verEditArticulosController();
    }

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

                    <div class="page-layout simple tabbed">

                        <!-- HEADER -->
                        <div class="page-header bg-primary text-auto row no-gutters align-items-center justify-content-between p-6">

                            <div class="row no-gutters align-items-center">

                                <a href="editor" class="btn btn-icon mr-4">
                                    <i class="icon icon-arrow-left"></i>
                                </a>

                                <div class="product-image mr-4">
                                    <img src="views/images/ecommerce/product-image-placeholder.png">
                                </div>

                                <div>Detalles del Articulo</div>
                            </div>

                            <button type="button" class="btn btn-light" id="save-article">
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

                                        <form id="article-form" enctype="multipart/form-data" method="post" action="editarArticulo_<?php echo $articulo[0]['id']; ?>">

                                            <div class="file-field">
                                                <div class="z-depth-1-half mb-4" id="preview" style="display: block; margin-left: auto;margin-right: auto; width: 300px;">
                                                  <img src="<?php echo $articulo[0]['foto']; ?>" class="img-fluid" id="picture" style="display: block; margin-left: auto;margin-right: auto; width: 300px;" alt="example placeholder">
                                                  <input type="hidden" name="editarPhoto">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                  <div class="btn btn-mdb-color btn-rounded waves-effect float-left">
                                                    <span>Escoger Imagen</span>
                                                    <input type="file" name="article-foto" id="foto">
                                                  </div>
                                                </div>
                                          </div>

                                            <div class="form-group">
                                                <input type="text" name="article-title" id="producto" class="form-control" aria-describedby="product name" value="<?php echo $articulo[0]['titulo']; ?>"/>
                                                <label>Titulo</label>
                                            </div>

                                             <div class="form-group">
                                                <input type="text" name="article-subtitle" class="form-control" aria-describedby="product name" value="<?php echo $articulo[0]['subtitulo']; ?>"/>
                                                <label>Subtitulo</label>
                                            </div>

                                             <div class="form-group">
                                                <input type="text" name="article-alias" class="form-control" aria-describedby="product name" value="<?php echo $articulo[0]['alias']; ?>" />
                                                <label>Alias</label>
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="categories-article" >
                                                    <?php 
                                                        $categorias = new gestorCategoriaController();
                                                        $categorias->verCategoriasProductosController();
                                                    ?>
                                                </select>
                                                <label>Categorias</label>
                                            </div>

                                              <div class="form-group">
                                                <input type="date" name="article-date" class="form-control" aria-describedby="product name" value="<?php echo $articulo[0]['fecha']; ?>" />
                                                <label></label>
                                            </div>

                                            <div class="form-group">
                                                <textarea class="form-control" name="article-extract" id="product-description" aria-describedby="product description" rows="5"><?php echo $articulo[0]['extracto']; ?></textarea>
                                                <label>Extracto</label>
                                            </div>

                                            <div class="form-group">

                                                <textarea name="cuerpo" id="mymce" rows="15" placeholder="Enter text..."><?php echo $articulo[0]['contenido']; ?></textarea>

                                            </div>

                                            <div class="form-group">
                                                <input value="<?php echo $articulo[0]['etiquetas']; ?>" type="text" name="article-tags" class="form-control" aria-describedby="product tags" />
                                                <label>Etiquetas</label>
                                            </div>

                                            <?php $numero =  mt_rand(100, 999); ?>
                                            <input type="hidden" name="id_edit" value="<?php echo $articulo[0]['id']; ?>">

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