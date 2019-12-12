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
                                        <span class="logo-text h4">Menu</span>
                                    </div>
                                </div>
                                <!-- / APP TITLE -->
                            </div>

                        </div>
                        <!-- / HEADER -->

                        <div class="page-content-wrapper">

                            <aside class="page-sidebar p-6" data-fuse-bar="contacts-sidebar" data-fuse-bar-media-step="md">
                                <div class="page-sidebar-card">
                                    <!-- SIDENAV HEADER -->
                                    <div class="header p-4">

                                        <!-- USER -->
                                        <div class="row no-gutters align-items-center">
                                            <span class="font-weight-bold">Añadir Nuevo enlace</span>
                                        </div>
                                        <!-- / USER -->

                                    </div>
                                    <!-- / SIDENAV HEADER -->

                                    <div class="divider"></div>

                                    <!-- SIDENAV CONTENT -->
                                    <div class="content">

                                        <ul class="nav flex-column">
                                            <form name="menu-form" id="menu-form">
                                                <li class="nav-item">
                                                    <div class="form-group mb-4" style="margin: 8px 8px 8px 8px">    <input type="text" name="menu-name" id="menu-name" class="form-control" required>
                                                        <label>Nombre</label>
                                                    </div>
                                                </li>

                                                <li class="nav-item">
                                                    <div class="form-group mb-4" style="margin: 8px 8px 8px 8px">    <input type="text" name="menu-tag" id="menu-tag" class="form-control" required>
                                                        <label>Etiqueta</label>
                                                    </div>
                                                </li>

                                                <li class="nav-item">
                                                    <div class="input-group" style="margin: 15px 0px 8px 8px; width: 205px">
                                                        <span class="input-group-addon">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="menu-checkbox" id="parent-checkbox" aria-label="Checkbox for following text input"/>
                                                                <span class="checkbox-icon"></span>

                                                            </label>
                                                        </span>
                                                        Menu Padre
                                                    </div>
                                                </li>

                                                <li class="nav-item" id="menu-padres">
                                                    <div class="custom-file" style="margin: 15px 0px 8px 8px; width: 205px">
                                                        <select class="form-control" name="categories-parent" id="categories-parent">
                                                            <option value="Sin menu padre" name="categories-parent">Sin menu padre</option>
                                                            <?php 
                                                                $menu = new gestorMenuController();
                                                                $menu->verMenuListaController();
                                                            ?>
                                                        </select>
                                                        <label>Menu Padre</label>
                                                    </div>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <div class="form-group mb-4" style="margin: 8px 8px 8px 8px">
                                                        <input type="text" name="menu-url" id="menu-url" class="form-control" required>
                                                        <label>URL</label>
                                                    </div>
                                                </li>

                                                <li class="nav-item">
                                                    <div class="form-group" style="margin: 8px 8px 8px 8px">
                                                        <button type="button" class="submit-button btn btn-block btn-secondary my-4 mx-auto" id="menu-button">
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
                                    <table id="menu-table" class="table dataTable table-hover">
                                        <!-- CONTACT LIST HEADER -->
                                        <thead>
                                            <div class="contacts-list-header p-4">
                                                <div class="row no-gutters align-items-center justify-content-between">

                                                    <div class="list-title text-muted">
                                                        Todas los items (25)
                                                    </div>

                                                    <button type="button" class="btn btn-icon">
                                                        <i class="icon icon-sort-alphabetical"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <tr>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Nombre</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">URL</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Etiqueta</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Menu padre</span>
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
                                   
                                        <tbody>
                                            <?php 
                                                $categorias = new gestorMenuController();
                                                $categorias->verMenusController();
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
</body>

</html>