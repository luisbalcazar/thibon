

//agragar nueva imagen al slide

$("#nuevaImagenSlide").on("click",function(){

    $("#modalNuevaImagen").modal("show");

    $("#guardarNuevaImagen").on("click",function(e){
        e.preventDefault()

        var formData = new FormData(document.getElementById("formNuevaImagen"));
            formData.append("nuevaImagenSlide","true")

        // var bar = util.barraDeProgreso("#barraProgresoNuevaImagen")
        var data = formData
        ajax.mostrarProgreso(function(prog){
            c(prog)
            // bar.animate(prog)
        })
        ajax.peticion("formData", data, "views/ajax/gestorSlide.php")
            .then((data)=>{

                // console.log(data)
                if(data.status == "ok"){
                    util.alertSuccess("Agregada",'slide')
                }else{
                    $("#mensajeNuevaImagen").html("<span class='text-danger'>"+data.mensaje+"</span>")
                    util.alertError(data.mensaje)
                    
                }
            })
    })
})


//ACTUALIZAR IMAGENES DEL SLIDE
$(".inputSlide").on("change",function(){
    var idform = "formImg" + $(this).attr('accesskey')
    var idimagen = $(this).attr('accesskey')

    // c(idform)
    // c(idimagen)

    var formData = new FormData(document.getElementById(idform));
        formData.append("actualizarImagenSlide","true")
        formData.append("idimagen",idimagen)

    // var bar = util.barraDeProgreso("#barraActualizarImagenes")
    $(".mensajeActualizarSlide").html("")

    var data = formData
    ajax.mostrarProgreso(function(prog){
        c(prog)
        // bar.animate(prog)
    })
    ajax.peticion("formData", data, "views/ajax/gestorSlide.php")
        .then((data)=>{

            // console.log(data)
            if(data.status == "ok"){
                util.alertSuccess("actualizada",'slide')
            }else{
                $("#barraActualizarImagenes").html("")
                $(".mensajeActualizarSlide").html(data.mensaje)
                util.alertError(data.mensaje)
                
            }
        },(fail)=>{
            c("fallo")
            c(fail)
        })
})


//Habilitar orden
var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarSlide").click(function(){
    $("#ordenarSlide").hide();
    $("#guardarOrdenSlide").show();
    $("#guardarOrdenImagenesProducto").show();


    $("#columnasSlide").css({"cursor":"move"})
    $("#columnasSlide span").hide()

    $("#columnasSlide").sortable({
        revert: true,
        connectWith: ".bloqueSlide",
        handle: ".handleImg",
        stop: function(event){            
            for(var i= 0; i < $("#columnasSlide li").length; i++){
                almacenarOrdenId[i] = event.target.children[i].id;
                ordenItem[i]  =  i+1;           
            }
        }

    });

});

//guardar nuevo orden de imágenes producto
$("#guardarOrdenImagenesProducto").on("click",function(){

    var id_p = $("#id_producto_hidden").html()

    var data = {
        actualizarOrdenProductos: true,
        nuevoOrden: almacenarOrdenId,
        id_p: id_p
    }
    ajax.peticion("normal", data, "views/ajax/gestorProductos.php")
        .then((data)=>{
            // console.log(data)
            if(data.status == "ok"){
                util.alertSuccess("actualizado")
                window.location.href = "edit_" + id_p
            }else{
                $(".mensajeActualizarSlide").html(data.mensaje)
                util.alertError(data.mensaje)
                
            }
        },(fail)=>{
            c("fallo")
            c(fail)
        })
})

//guardar nuevo orden de imágenes
$("#guardarOrdenSlide").on("click",function(){

    var data = {
        actualizarOrden: true,
        nuevoOrden: almacenarOrdenId
    }
    ajax.peticion("normal", data, "views/ajax/gestorSlide.php")
        .then((data)=>{

            // console.log(data)
            if(data.status == "ok"){
                util.alertSuccess("actualizado","slide")
            }else{
                $(".mensajeActualizarSlide").html(data.mensaje)
                util.alertError(data.mensaje)
                
            }
        },(fail)=>{
            c("fallo")
            c(fail)
        })
})

//borrar imágen del slide
$(".borrarImagenSlide").on("click",function(){

    var idimagen = $(this).attr("accesskey")

    util.alertConfirm("¿Estás seguro de borrar esta imagen?")
        .then(()=>{
            
            var data = {
                borrarImagen: true,
                idimagen: idimagen
            }
            ajax.peticion("normal", data, "views/ajax/gestorSlide.php")
                .then((data)=>{

                    // console.log(data)
                    if(data.status == "ok"){
                        util.alertSuccess("eliminada",'slide')
                    }
                },(fail)=>{
                    c("fallo")
                    c(fail)
                })
        }, ()=>{
            c("cancelado")
        })
           
})


$(".actualizar_text_img").on("click",function(){
    
    var id = $(this).attr("data-id")

    $(".contenedores_editar_texto").hide()
    $("#contenedor_img_slider").hide()
    $("#titulo_pag_slide").html("Slide editar texto #"+id)
    $("#content-arrow-left").html('<a href="#" class="btn btn-icon mr-4 back_slide"><i class="icon icon-arrow-left"></i></a>')

    $("#contenedor_editar_"+id).show()

    $(".back_slide").on("click",function(e){
        e.preventDefault()
        $("#titulo_pag_slide").html("Slide")
        $("#content-arrow-left").html("")
        $(".contenedores_editar_texto").hide()
        $("#contenedor_img_slider").show()

    })

})




