<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){
  header("location:login");

  exit();
}
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

                        <!-- CONTENT -->
                        <div class="page-content-wrapper">

                            <!-- HEADER -->
                            <div class="page-header light-fg row no-gutters align-items-center justify-content-between">

                                <!-- APP TITLE -->
                                <div class="col-12 col-sm">

                                    <div class="logo row no-gutters justify-content-center align-items-start justify-content-sm-start">
                                        <div class="logo-icon mr-3 mt-1">
                                            <i class="icon-cube-outline s-6"></i>
                                        </div>
                                        <div class="logo-text">
                                            <div class="h4">Articulos</div>
                                           <!--  <div class="">Total artiulos: 20</div> -->
                                        </div>
                                    </div>
                                    <div style="display: flex;align-items: center;">
                                        <a href="trashArticulo" class="text-white" style="text-decoration: none;">
                                               Papelera
                                        </a>
                                        <i class="icon-chevron-right"></i>
                                    </div>

                                </div>
                                <!-- / APP TITLE -->

                                <div class="col-auto">
                                    <a href="nuevoArticulo" class="btn btn-light">NUEVO ARTICULO</a>
                                </div>

                            </div>
                            <!-- / HEADER -->

                            <div class="page-content-card">

                                <table class="table dataTable">
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
                                                    <span class="column-title">Titulo</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Categoria</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Fecha</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Subtitulo</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Estado</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Acciones</span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php 
                                            $articulo = new gestorArticulosController();
                                            $articulo->verArticulosController();

                                            
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