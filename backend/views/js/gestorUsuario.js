$("#login-button").on("click",(e)=>{
	e.preventDefault();
	var formData = new FormData(document.getElementById("loginForm"));
	var error = false;
	
		formData.forEach((item, i, ob)=>{
			if (item == "") {
				$("#"+i).addClass('is-invalid');
				$("#"+i).css('background-color', '#ff000021');
				error = "Llene todos los campos";
				
			}
		});

		formData.append('ingreso',"true");

	if (!error) {
		OptionsAjax.data = formData;
		OptionsAjax.url = "views/ajax/ajax.php"
		ajax.setDataForm(OptionsAjax);
		ajax.ejecutar()
			.then((data)=>{
				console.log(data);
				if (data == "ok") {
					window.location = "home";
				}else{

					$(".mensajes").html(`
						<div class="alert alert-danger" role="alert" style="color: #721c24 !important; background-color: #f8d7da !important; border-color: #f5c6cb !important;">
			               `+ data.mensaje +`
			            </div>
					`);
				}

			},(fail)=>{
				console.log("fallo");
				console.log(fail);
			})

	}else{
		$("#error").html(`
			<div class="alert alert-danger" role="alert" style="color: #721c24 !important; background-color: #f8d7da !important; border-color: #f5c6cb !important;">
               ${error}
            </div>
		`)
	}

})


$(".guardar_user").on("click",function(){
	
	var form_data = new FormData(document.getElementById("new_user_form"))
	var error = false

	form_data.forEach((valor,key,obj)=>{
        
        $("#"+key).removeClass("is-invalid")
      
        if (valor == "") {
        	$("#"+key).addClass("is-invalid")
     
        	error = "Llene los campos obligatorios"
        }             
                                 
    })

    if (!error) {    	
    	$(".error_insert").html("")

    	form_data.append('nuevo_usuario',"true")

    	OptionsAjax.data = form_data;
		ajax.setDataForm(OptionsAjax)
		ajax.ejecutar()
		.then((data)=>{

				if (data.status == "ok") {
					Swal.fire(
					  'Ok!',
					  'usuario agregado',
					  'success'
					)
					.then((result) => {

						$("#user_name").val("")
						$("#user_email").val("")
						$("#user_password").val("")
						$("#user_photo").val("")
						// if (result) {
						// 	window.location = "products"
						// }else{
						// 	window.location = "products"
						// }
					}) 
				}else{
					$(".error_insert").html(data.error)
				}

			},(fail)=>{
				console.log("fallo");
				console.log(fail);
			})

    }else{
    	
    	console.log(error)
    	$(".error_insert").html(error)
    }


})

$(".toggle_user").on("click",function(){
	var id = $(this).attr("data-id")
	$(".form_hide_"+id).show()
	if ($(".form_hide_"+id).hasClass("hide_")) {		
		$(".form_hide").addClass('hide_')
		$(".form_hide_"+id).removeClass("hide_")
	}else{		
		$(".form_hide_"+id).addClass('hide_')		
	}
})


$("#actualizar_info").on("click",function(){

	OptionsAjax.data = {
		cambiar_contrasena: true,
		user_password_now: $("#user_password_now").val(),
		user_new_password: $("#user_new_password").val() 
	};
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

$("#photo_user").on("change",function(){


	var form_img = new FormData(document.getElementById("form_photo"))

	form_img.append('change_photo',"true")

	OptionsAjax.data = form_img;
	ajax.setDataForm(OptionsAjax)
	ajax.ejecutar()
	.then((data)=>{

			console.log(data)

			if (data.status == "ok") {
				util.alertSuccess("actualizado")
				$(".profile-image").attr("src",data.ruta)

			}

		},(fail)=>{
			console.log("fallo");
			console.log(fail);
		})




})

$(".user_e_n").on("blur",function(){

	var id = $(this).attr("data-id")
	var key = $(this).attr("data-key")
	var value = $(this).val()
	

	OptionsAjax.data = {
		update_field: true,
		key: key,
		value: $(this).val(),
		id_user: id
	}

	ajax.setData(OptionsAjax)
	ajax.ejecutar()
	.then((data)=>{

			if (data.status == "ok") {
				util.alertSuccess("actualizado")
				if (key == "usuario") {
					$(".text-user_"+id).html(value)
				}else if (key == "correo") {
					$(".text-email_"+id).html(value)
				}
			}else{
				$(".info_edit_"+id).html("<span class='text-danger'>" + data.error + "</span>")
				util.alertError(data.error)
			}

		},(fail)=>{
			console.log("fallo");
			console.log(fail);
		})




})

$(".borrar_user").on("click",function(){

	var id = $(this).attr("data-id")



	util.alertConfirm("¿estás seguro de borrar este usuario?")
	.then((ok)=>{
		console.log("seguir")

		OptionsAjax.data = {
			borrar_usuario: true,
			id_user: id
		}

		ajax.setData(OptionsAjax)
		ajax.ejecutar()
		.then((data)=>{

				if (data.status == "ok") {					
					util.alertSuccess("borrado")		

					$("div[data-id='"+id+"']").remove()

				}else{
					$(".info_edit_"+id).html("<span class='text-danger'> ha ocurrido un error al borrar</span>")
				}

			},(fail)=>{
				console.log("fallo");
				console.log(fail);
			})



	}, (cancel)=>{
		console.log("cancelar")
	})

})