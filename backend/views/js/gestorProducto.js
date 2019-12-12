$("#save-product").on("click",(e)=>{
	e.preventDefault();
	
	var formData1 = new FormData(document.getElementById("form0"));

	var error = false;

	var total_size = 0;
	
	formData1.forEach((item, i, ob)=>{
		if (item == "") {
			$("#"+i).addClass('is-invalid');
			$("#"+i).css('background-color', '#ff000021');
			error = "Llene todos los campos";
		}

		if (i == "files_product[]") {
			total_size += item.size		
		}
		
	});

	var mb = (total_size / 1024) / 1024
	
	if (mb > 15) {
		error = "Los archivos superan el límite de subida ( 15MB )";
	}


	if (!error) {

		ajax.mostrarProgreso(function(prog){
            console.log(prog)
            $(".progress_bar_product .line_progress").css("width", prog + "%")
        })
		ajax.peticion("formData",formData1,"views/ajax/gestorProductos.php")
		.then((data)=>{
				console.log(data)
				if (data.status == "ok") {				
					$(".progress_bar_product .line_progress").css("width", "100%")
					util.alertSuccess("producto agregado")
					window.location.href = "edit_" + data.id_producto
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
		util.alertError(error)
	}

})

$("#foto").on("change", (e)=>{
	e.preventDefault();
	var foto = $("#foto");
	let reader = new FileReader();
	reader.readAsDataURL(e.target.files[0]);
	reader.onload = function(){
    	let preview = document.getElementById('preview'),
            image = document.getElementById('picture');

	    image.src = reader.result;

	    preview.innerHTML = '';
	    preview.append(image);
	    $("img#foto").css("width", "300px");
	};
	console.log(foto)

})

$(".guardar-edit").on("click",(e)=>{
	e.preventDefault();
	var modal = $("div.show")[0];
	var formulario = modal.getElementsByTagName("form");
	var formData = new FormData(document.getElementById(formulario[0].id));

	console.log(formData)
	var error = false;
	
		formData.forEach((item, i, ob)=>{
			if (item == "") {
				$("#"+i).addClass('is-invalid');
				$("#"+i).css('background-color', '#ff000021');
				error = "Llene todos los campos";
			}
		});

		//formData.append('ingreso',"true");

	if (!error) {

		OptionsAjax.data = formData;
		OptionsAjax.url = "views/ajax/gestorProductos.php"
		ajax.setDataForm(OptionsAjax);
		ajax.ejecutar()	
		.then((data)=>{
				if (data == "ok") {
					Swal.fire(
					  'Ok!',
					  '¡La categoria ha sido editada correctamente!',
					  'success'
					)
					.then((result) => {
						if (result) {
							window.location = "products"
						}else{
							window.location = "products"
						}
					}) 
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

$(".delete-button").on("click",function(e){
	e.preventDefault();
	var boton = $(this);
	
	var id = boton[0].id.split("-");
	var pag = $(this).attr('data-pag');

	Swal.fire({
	  title: '¿Esta seguro de borrar este producto?',
	  text: "¡Se movera a la papelera!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, borralo!'
	}).then((result) => {

	  	if (result.value) {
		    OptionsAjax.data = {
				id: id[1]
			};
			OptionsAjax.url = "views/ajax/gestorProductos.php"
			ajax.setData(OptionsAjax);
			ajax.ejecutar()	
			.then((data)=>{
					if (data == "ok") {
						Swal.fire(
						  'Ok!',
						  '¡El Producto ha sido transladado a la papelera con éxito!',
						  'success'
						)
						.then((result) => {
							if (result) {
								window.location = pag
							}else{
								window.location = pag
							}
						}) 
					}

			},(fail)=>{
				console.log("fallo");
				console.log(fail);
			})
	  	}
	})

})

$(".borrar_permanete").on("click",function(){

	var id_p = $(this).attr("data-id")

	util.alertConfirm("¿seguro de borrar este producto de forma permanente?")
		.then((go)=>{
			
			ajax.peticion("normal",{borrar_permanente:true,id_p: id_p},"views/ajax/gestorProductos.php")
			.then((data)=>{
				console.log(data)
				if (data.status == "ok") {											
					// $("#"+id_p).remove()
					util.alertSuccess("borrada","trash")

				}
			},(fail)=>{
				console.log("fallo");
				// $("#"+id).remove()
				// util.alertSuccess("borrada","trash")
				console.log(fail);
			})

		}, (no)=>{console.log("no")})
})


$(".restaurar").on("click",function(){

	var id_p = $(this).attr("data-id")

	console.log(id_p)

	
	ajax.peticion("normal",{restaurar_producto:true,id_p:id_p},"views/ajax/gestorProductos.php")
		.then((data)=>{
			console.log(data)
			if (data.status == "ok") {														
				util.alertSuccess("restaurado","trash")
				
			}
		},(fail)=>{
			console.log("fallo");
			console.log(fail);
		})

})


$(".set_primary").on("click",function(){

	var id = $(this).attr("accesskey")
	var id_p = $(this).attr("data-p")

	
	ajax.peticion("normal",{set_primary:true,id_file: id,id_p:id_p},"views/ajax/gestorProductos.php")
		.then((data)=>{
			console.log(data)
			if (data.status == "ok") {														
				util.alertSuccess("actualizado")
				window.location.href = "edit_" + id_p 
			}
		},(fail)=>{
			console.log("fallo");
			console.log(fail);
		})

})

$(".borrar_img_producto").on("click",function(){

	var id = $(this).attr("accesskey")

	util.alertConfirm("¿seguro de borrar este arichvo?")
		.then((go)=>{
			
			ajax.peticion("normal",{borrar_file:true,id_file: id},"views/ajax/gestorProductos.php")
			.then((data)=>{
				console.log(data)
				if (data.status == "ok") {											
					$("#"+id).remove()
					util.alertSuccess("borrada")

				}
			},(fail)=>{
				console.log("fallo");
				$("#"+id).remove()
				util.alertSuccess("borrada")
				console.log(fail);
			})

		}, (no)=>{console.log("no")})
})

$("#guardar_files_producto").on("click",function(){

	var formData1 = new FormData(document.getElementById("form_add_files"));

	var error = false;
	var id_p = $("#id_producto_hidden").html()
	var total_size = 0;
	
	formData1.forEach((item, i, ob)=>{
		if (i == "files_product[]") {
			total_size += item.size		
		}	
	});

	var mb = (total_size / 1024) / 1024

	console.log(mb)
	
	if (mb > 15) {
		error = "Los archivos superan el límite de subida ( 15MB )";
	}

	if (!error) {

		if (total_size > 0) {
			formData1.append('add_files_product',true)
			formData1.append('id_p',id_p)

			ajax.mostrarProgreso(function(prog){
	            console.log(prog)
	            $(".progress_bar_product .line_progress").css("width", prog + "%")
	        })
			ajax.peticion("formData",formData1,"views/ajax/gestorProductos.php")
			.then((data)=>{
				console.log(data)
				if (data.status == "ok") {				
					$(".progress_bar_product .line_progress").css("width", "100%")
					util.alertSuccess("agregado")
					window.location.href = "edit_" + id_p
				}

			},(fail)=>{
				console.log("fallo");
				console.log(fail);
			})
		}


			
		

	}else{
		$("#error_add_files").html(`
			<div class="alert alert-danger" role="alert" style="color: #721c24 !important; background-color: #f8d7da !important; border-color: #f5c6cb !important;">
               ${error}
            </div>
		`)
		util.alertError(error)
	}

})


$(".actualizar_campo").on("blur",function(){

	var id = $(this).attr("data-id")
	var key = $(this).attr("data-key")
	var value = $(this).val()
	

	OptionsAjax.data = {
		update_field: true,
		key: key,
		value: $(this).val(),
		id_p: id
	}
	OptionsAjax.url = "views/ajax/gestorProductos.php"
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


var categoria = $("#categoria_hidden")

if (categoria.length != 0) {
	$(".categorias_editar").val(categoria.html())
}