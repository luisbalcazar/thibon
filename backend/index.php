<?php  
require_once 'models/conexion.php';
require_once 'models/consulta.php';
require_once 'models/enlaces.php';
require_once 'models/gestorUsuario.php';
require_once 'models/gestorProducto.php';
require_once 'models/gestorCategoria.php';
require_once 'models/gestorArticulo.php';
require_once 'models/gestorMenu.php';
require_once 'models/gestorPromociones.php';
require_once 'models/gestorSlide.php';
require_once 'models/gestorConfig.php';
require_once 'models/gestorPages.php';

require_once 'controllers/enlaces.php';
require_once 'controllers/template.php';
require_once 'controllers/gestorUsuario.php';
require_once 'controllers/gestorProducto.php';
require_once 'controllers/gestorCategoria.php';
require_once 'controllers/gestorArticulo.php';
require_once 'controllers/gestorMenu.php';
require_once 'controllers/gestorPromociones.php';
require_once 'controllers/gestorSlide.php';
require_once 'controllers/gestorConfig.php';
require_once 'controllers/gestorPages.php';

$template = new templateControllers();
$template -> template();