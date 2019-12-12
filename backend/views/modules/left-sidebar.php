
<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
    <div class="aside-content bg-primary-700 text-auto">

        <div class="aside-toolbar">

            <div class="logo">
                <span class="logo-icon">E</span>
                <span class="logo-text">Ecommerce</span>
            </div>

            <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                <i class="icon icon-backburger"></i>
            </button>
        </div>

        <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

            <li class="subheader">
                 <span>Paginas</span>
            </li>

            <li class="nav-item" role="tab" id="heading-dashboards">
                <a class='nav-link ripple <?php if($_GET["action"]=="home"){echo "active";} ?>' href="home" data-url="home">
                    <i class="icon s-4 icon-tile-four"></i>
                    <span>Inicio</span>
                </a> 
            </li>

           <!--  <li class="nav-item">
                <a class='nav-link ripple <?php #if($_GET["action"]=="orders"){echo "active";} ?>' href="orders" data-url="index.html">
                    <i class="icon s-4 icon-format-list-bulleted"></i>
                    <span>Ordenes</span>
                </a>
            </li> -->

            <li class="nav-item">
                 <a class='nav-link ripple <?php if($_GET["action"]=="products"){echo "active";} ?>' href="products" data-url="index.html">
                    <i class="icon s-4 icon-cart"></i>
                     <span>Productos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class='nav-link ripple <?php if($_GET["action"]=="product"){echo "active";} ?>' href="product" data-url="index.html">
                    <i class="icon s-4 icon-new-box"></i>

                    <span>Producto Nuevo</span>
                </a>
            </li>

            <li class="nav-item">
                <a class='nav-link ripple <?php if($_GET["action"]=="promociones"){echo "active";} ?>' href="promociones" data-url="index.html">
                    <i class="icon s-4 icon-new-box"></i>

                    <span>Promociones</span>
                </a>
            </li>
            <li class="nav-item">
                <a class='nav-link ripple <?php if($_GET["action"]=="productsOfert"){echo "active";} ?>' href="productsOfert" data-url="index.html">
                    <i class="icon s-4 icon-plus-circle"></i>

                    <span>Ofertas</span>
                </a>
            </li>

            

            <li class="nav-item" role="tab" id="heading-dashboards">

                <a class="nav-link ripple with-arrow " data-toggle="collapse" data-target="#collapse-dashboards" href="#" aria-expanded="true" aria-controls="collapse-dashboards">

                    <i class="icon s-4 icon-settings"></i>

                    <span>Ajustes</span>
                </a>
                <ul id="collapse-dashboards" class='collapse show' role="tabpanel" aria-labelledby="heading-dashboards" data-children=".nav-item">

                    <li class="nav-item">
                        <a class='nav-link ripple <?php if($_GET["action"]=="category"){echo "active";} ?>' href="category" data-url="index.html">
                            <!-- <i class="icon s-4 icon-label"></i> -->
                            <span>Categorias</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class='nav-link ripple <?php if($_GET["action"]=="slide"){echo "active";} ?>' href="slide" data-url="slide">
                            <!-- <i class="icon s-4 icon-file-image"></i> -->
                            <span>Slide</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link ripple <?php if($_GET["action"]=="editFooter"){echo "active";} ?>' href="editFooter" data-url="slide">
                            <!-- <i class="icon s-4 icon-file-image"></i> -->
                            <span>Footer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link ripple <?php if($_GET["action"]=="editNosotros"){echo "active";} ?>' href="editNosotros" data-url="slide">
                            <!-- <i class="icon s-4 icon-file-image"></i> -->
                            <span>Nosotros</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class='nav-link ripple <?php if($_GET["action"]=="menus"){echo "active";} ?>' href="menus" data-url="slide">
                            <!-- <i class="icon s-4 icon-file-image"></i> -->
                            <span>Menus</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link ripple <?php if($_GET["action"]=="editor"){echo "active";} ?>' href="editor" data-url="slide">
                            <!-- <i class="icon s-4 icon-file-image"></i> -->
                            <span>Editor de articulos</span>
                        </a>
                    </li>

                </ul>
            </li>

      
                        
        </ul>
    </div>
</aside>
