
<?php include 'slider.php'; ?>


<section class=" infoindex" >

    <div class=" infoindex-text">

        <h1>La familia Thibon se dedicaba al cultivo de la vid en su Francia natal <br>y trajo a Buenos Aires en 1935 sus conocimientos sobre el tema. </h1>
        <br>
        <p>Tres años después abrió el café que de nombre lleva su apellido y se destaca hasta la actualidad por su vinoteca. Pero no es todo: el café molido y tostado también se convirtió en un clásico para ser bebido en un ambiente agradable y con historia.  </p>
        <br>
        <a href="index.php?pagina=nosotros"><button type="button">Ver más</button></a>
    </div>

</section>

<section id="categorias" class="home-content ofertas">
    <div class="wraper">
        <h2>Destacados</h2>
        
        <div class="grid-container">
            <?php 
                GestorProductosController::ver_productos_destacados();
            ?>
        </div>
    </div>

</section>


<section >

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.14847038921!2d-58.39168068440062!3d-34.60040698046033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb6d11b75217%3A0x2eb0a3a3fd535ab1!2sThibon+Caf%C3%A9+Tes!5e0!3m2!1ses!2sar!4v1553203201071" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    
</section>