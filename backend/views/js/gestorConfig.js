
$("#toggle-fold-aside-button").on("click",function(){
    
    c("click")

	OptionsAjax.data = {
		toggle_side_bar: true
	}
	OptionsAjax.url = "views/ajax/gestorConfig.php"
	ajax.setData(OptionsAjax)
	ajax.ejecutar()
	.then((data)=>{
			c("success")
			c(data)
			
		},(fail)=>{
			console.log("fallo");
			console.log(fail);
		})


})


$(".actualizar_config").on("blur",function(){

    var id = $(this).attr("data-id")
    var key = $(this).attr("data-key")
    var value = $(this).val()
    
    OptionsAjax.data = {
        update_field_config: true,
        key: key,
        value: $(this).val(),
        id_p: id
    }
    OptionsAjax.url = "views/ajax/gestorConfig.php"
    ajax.setData(OptionsAjax)
    ajax.ejecutar()
    .then((data)=>{

            if (data.status == "ok") {
                util.alertSuccess("actualizado")
            }else{
                
                util.alertError(data.error)
            }

        },(fail)=>{
            console.log("fallo");
            console.log(fail);
        })




})


// OptionsAjax.data = {
// 	ver_toggle_side_bar: true
// }
// OptionsAjax.url = "views/ajax/gestorConfig.php"
// ajax.setData(OptionsAjax)
// ajax.ejecutar()
// .then((data)=>{
// 	c("success")
// 	c(data)

// 	var n_class = data[0].config_value

// 	$("body").removeClass("fuse-aside-expanded").removeClass("fuse-aside-folded").addClass(n_class)
	
// },(fail)=>{
// 	console.log("fallo");
// 	console.log(fail);
// })