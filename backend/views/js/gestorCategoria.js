$("#category-button").on("click",(e)=>{
	e.preventDefault();
	
	var formData = new FormData(document.getElementById("category-form"));
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
		ajax.setDataForm(OptionsAjax);
		OptionsAjax.url = "views/ajax/gestorCategorias.php";
		ajax.ejecutar()	
		.then((data)=>{
			if (data == "ok") {
					Swal.fire(
					  'Ok!',
					  '¡La categoria ha sido ingresado correctamente!',
					  'success'
					)
					.then((result) => {
						if (result) {
							window.location = "category"
						}else{
							window.location = "category"
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

/*$("a.editCategoria").on("click",(e)=>{
	e.preventDefault();
	
	var boton = $(".editCategoria");
	console.log(boton)

	var id = boton.id;

	var button = id.split("-");
	var enviar = button[1];
	

	var error = false;

	if (!error) {

		OptionsAjax.data = {
			id: enviar
		}
		ajax.setData(OptionsAjax);
		ajax.ejecutar()	
		.then((data)=>{
			console.log(data)
			$("#div-edit").html('<form class="md-form" id="edit-form"><div class="file-field"><div class="mb-4"><img style="width: 170px; height: 156px; display: block; margin-left: auto;margin-right: auto;" src="'+data[0]["foto"]+'" class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar"></div><div class="d-flex justify-content-center"><div class="btn btn-mdb-color btn-rounded float-left"><span>Añadir foto</span><input type="file" id="edit-photo" name="edit-photo"></div></div></div><div class="form-group"><label for="recipient-name" class="form-control-label">Nombre:</label><input type="text" class="form-control" id="recipient-name" value="'+data[0]["nombre"]+'"/></div><div class="form-group"><label for="message-text" class="form-control-label">Descripcion:</label><textarea class="form-control" id="message-text">'+data[0]["descripcion"]+'</textarea></div></form>');



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

})*/
var  contenedor = $("#container-edit").children()


$("#edit-photo").on("change", (e)=>{
	var foto = $("#edit-photo");
	console.log("hola")
})

$(".save-edit").on("click",(e)=>{
	e.preventDefault();
	var modal = $("div.show")[0];
	var formulario = modal.getElementsByTagName("form");
	
	var formData = new FormData(document.getElementById(formulario[0].id));
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
		ajax.setDataForm(OptionsAjax);
		OptionsAjax.url = "views/ajax/gestorCategorias.php";
		ajax.ejecutar()	
		.then((data)=>{
				if (data == "ok") {
					util.alertSuccess("Categoria actualizada!")
					$(".modal").hide();
					window.location = "category"

					//window.location.href = "category"


					// var table = $("#category-table").fnReloadAjax();
					//table.draw();

					// Swal.fire(
					//   'Ok!',
					//   '¡La categoria ha sido editada correctamente!',
					//   'success'
					// )
					// .then((result) => {
						// if (result) {
						// 	window.location = "category"
						// }else{
						// 	window.location = "category"
						// }

					// }) 
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

$(".borrar-button").on("click", (e)=>{
	e.preventDefault();
	var boton = e.target.id;
	var id = boton.split("-");
	console.log(id)

	Swal.fire({
	  title: '¿Esta seguro de borrar esta categoria?',
	  text: "¡Se borrara permanentemente!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, borralo!'
	}).then((result) => {

	  	if (result.value) {
		    OptionsAjax.data = {
				eliminar: id[1]
			};
			ajax.setData(OptionsAjax);
			OptionsAjax.url = "views/ajax/gestorCategorias.php";
			ajax.ejecutar()	
			.then((data)=>{
					if (data == "ok") {
						Swal.fire(
						  'Ok!',
						  '¡La categoria ha sido eliminada con éxito!',
						  'success'
						)
						.then((result) => {
							if (result) {
								window.location = "category"
							}else{
								window.location = "category"
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

