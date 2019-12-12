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
        <div id="el-container"></div>
        <?php 
            include "header.php"; 
        ?>
        <div id="wrapper">
            <?php 
              include "left-sidebar.php"; 
            ?>
            <div id="wrapper">

            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="contacts" class="page-layout simple left-sidebar-floating">

                        <div class="page-header bg-primary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

                            <div class="col">

                                <div class="row no-gutters align-items-center flex-nowrap">

                                    <button type="button" class="sidebar-toggle-button btn btn-icon d-inline-block d-lg-none mr-2" data-fuse-bar-toggle="contacts-sidebar">
                                        <i class="icon icon-menu"></i>
                                    </button>

                                    <!-- APP TITLE -->
                                    <div class="logo row no-gutters align-items-center flex-nowrap">
                                        <span class="logo-icon mr-4">
                                            <i class="icon-account-box s-6"></i>
                                        </span>
                                        <span class="logo-text h4">Categorias</span>
                                    </div>
                                </div>
                                <!-- / APP TITLE -->
                            </div>

                            <!-- SEARCH -->
                            <div class="col search-wrapper">

                                <div class="input-group">

                                    <span class="input-group-btn">

                                        <button type="button" class="btn btn-icon">
                                            <i class="icon icon-magnify"></i>
                                        </button>

                                    </span>

                                    <input id="contacts-search-input" type="text" class="form-control" placeholder="Search for anyone" aria-label="Search for anyone" />

                                </div>
                            </div>
                            <!-- / SEARCH -->
                        </div>
                        <!-- / HEADER -->

                        <div class="page-content-wrapper">

                            <aside class="page-sidebar p-6" data-fuse-bar="contacts-sidebar" data-fuse-bar-media-step="md">
                                <div class="page-sidebar-card">
                                    <!-- SIDENAV HEADER -->
                                    <div class="header p-4">

                                        <!-- USER -->
                                        <div class="row no-gutters align-items-center">
                                            <span class="font-weight-bold">Añadir Nueva Categoria</span>
                                        </div>
                                        <!-- / USER -->

                                    </div>
                                    <!-- / SIDENAV HEADER -->

                                    <div class="divider"></div>

                                    <!-- SIDENAV CONTENT -->
                                    <div class="content">

                                        <ul class="nav flex-column">
                                            <form name="category-form" id="category-form">
                                                <li class="nav-item">
                                                    <div class="form-group mb-4" style="margin: 8px 8px 8px 8px">    <input type="text" name="category-name" id="category-name" class="form-control" required>
                                                        <label>Categoria</label>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <div class="custom-file" style="margin: 15px 0px 8px 8px; width: 205px">
                                                        <select class="form-control" name="categories-parent" id="categories-parent">
                                                            <option value="no" name="categories-parent">Sin categoria padre</option>
                                                            <?php 
                                                                $categorias = new gestorCategoriaController();
                                                                $categorias->verCategoriasProductosController();
                                                            ?>
                                                        </select>
                                                        <label>Categoria Padre</label>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <div class="form-group" style="margin: 8px 8px 8px 8px">
                                                        <textarea class="form-control" name="category-description"  rows="3" id="category-description"></textarea>
                                                        <label for="exampleFormControlTextarea1">Descripcion</label>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <div class="custom-file" style="margin: 15px 0px 8px 8px; width: 205px">
                                                        <input type="file" name="category-img" id="category-img" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFile">Escoger imagen</label>
                                                    </div>
                                                </li>

                                                <li class="nav-item">
                                                    <div class="form-group" style="margin: 8px 8px 8px 8px">
                                                        <button type="button" class="submit-button btn btn-block btn-secondary my-4 mx-auto" id="category-button">
                                                            <span>Guardar</span>
                                                        </button>
                                                    </div>
                                                </li>
                                            </form>
                                            <div class="divider"></div>

                                        </ul>
                                    </div>
                                    <!-- / SIDENAV CONTENT -->
                                </div>
                            </aside>

                            <!-- CONTENT -->
                            <div class="page-content p-4 p-sm-6">
                                <!-- CONTACT LIST -->
                                <div class="contacts-list card">
                                    <table id="category-table" class="table dataTable table-hover">
                                        <!-- CONTACT LIST HEADER -->
                                        <thead>
                                            <div class="contacts-list-header p-4">
                                                <div class="row no-gutters align-items-center justify-content-between">

                                                    <div class="list-title text-muted">
                                                        Todas las categorias (25)
                                                    </div>

                                                    <button type="button" class="btn btn-icon">
                                                        <i class="icon icon-sort-alphabetical"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <tr>
                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">ID</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Imagen</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Nombre</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Descripcion</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Categoria padre</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Opciones</span>
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <!-- / CONTACT LIST HEADER -->
                                   
                                        <tbody id="category-body">
                                            <?php 
                                                if (isset($_POST["actualiza"])) {
                                                    $categorias = new gestorCategoriaController();
                                                $categorias->verCategoriasController();
                                                return "ok";
                                                }else{
                                                    $categorias = new gestorCategoriaController();
                                                $categorias->verCategoriasController();
                                                }
                                                
                                            ?>
                                        </tbody>
                                   </table>

                                </div>
                                <!-- / CONTACT LIST -->
                            </div>
                            <!-- / CONTENT -->
                        </div>
                    </div>

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