
<?php 
    $arr_config = GestorSlideController::ver_config_slide();

    $speed = $arr_config["speed"]["config_value"];
    $effect = $arr_config["effect"]["config_value"];
    $effect_t = $arr_config["effect_t_slider"]["config_value"];
    $auto = $arr_config["auto"]["config_value"];

    echo "
    	<input type='text' id='speed_slider_backend' value='$speed' hidden>
    	<input type='' id='effect_slider_backend' value='$effect' hidden>
    	<input type='' id='effect_t_slider_backend' value='$effect_t' hidden>
    	<input type='' id='auto_slider_backend' value='$auto' hidden>
    ";

?>
<div id="slider" class="slider">
  	<ul>

        <?php 
            GestorSlideController::verImagenes();
        ?>
    </ul>
    <a href="#categoria" class="fa fa-angle-down"></a>
</div>