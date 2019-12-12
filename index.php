<?php  
require_once 'models/conexion.php';
require_once 'models/consulta.php';
require_once 'models/enlaces.php';
require_once 'models/gestorSlide.php';
require_once 'models/gestorPages.php';
require_once 'models/gestorProductos.php';
require_once 'models/gestorMenus.php';

require_once 'controllers/enlaces.php';
require_once 'controllers/template.php';
require_once 'controllers/gestorSlide.php';
require_once 'controllers/gestorPages.php';
require_once 'controllers/gestorProductos.php';
require_once 'controllers/gestorMenus.php';

$template = new templateControllers();
$template -> template();



