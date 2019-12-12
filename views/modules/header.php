<header id="mobile-header" class="sb-slide">
	<a href="#" class="sb-toggle-left fa fa-bars" id="mobile-button"></a>
	<a href="index">
		<img id="mobile-logo" src="views/images/logo.jpg">
	</a>
</header>
<header id="header">
	
	<div class="container">
		<a href="index">
			<img class="logo" src="views/images/logo2.png">
		</a>
		<nav id="nav">
			<ul>
				<?php 
					$menu = new gestorMenusController();
					$menu->verMenusController();
				 ?>	
				<li class="carro" id="replacecheck">
			               
				</li>
			</ul>
		</nav>
	</div>
</header>