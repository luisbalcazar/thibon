 function saveNewPositionMenu(){
            var positions = [];

            var list = $(".updated").length;
            // console.log(list)

            $(".updated").each(function(){
                positions.push([$(this).attr('data-index'), $(this).attr('data-position')])
                $(this).removeClass('updated');

                OptionsAjax.data = {
                    actualizar: 1,
                    positions: positions,
                   // actualizados: list
                };
                OptionsAjax.url = "views/ajax/gestorMenus.php";
                ajax.setData(OptionsAjax);
                ajax.ejecutar() 
                .then((data)=>{
                    console.log(data);
                    if (data=="ok") {
                         util.alertSuccess("Posicion actualizada!")

                        // function do_it(){
                        //     util.alertSuccess('Posicion actualizada!')     
                        // }

                        // window.addEventListener('load',do_it,false)
                    }

                },(fail)=>{
                    console.log("fallo");
                    console.log(fail);
                })
            })
        }


        $(document).ready(function() {
            $( "#menu-table tbody").sortable({
            update: function(event, ui){
                $(this).children().each(function(index){
                    $(".script-tag").each(function(){
                        $(this).remove()
                    })
                    if ($(this).attr('data-position') != (index+1)) {
                        $(this).attr('data-position', (index+1)).addClass('updated')
                    }
                })

                saveNewPositionMenu();
            }
            });

        });

$("#menu-button").on("click",(e)=>{
	e.preventDefault();
	
	var formData = new FormData(document.getElementById("menu-form"));
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
		OptionsAjax.url = "views/ajax/gestorMenus.php";
		ajax.ejecutar()	
		.then((data)=>{
			if (data == "ok") {
					Swal.fire(
					  'Ok!',
					  '¡El nuevo enlace ha sido ingresado correctamente!',
					  'success'
					)
					.then((result) => {
						if (result) {
							window.location = "menus"
						}else{
							window.location = "menus"
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

$("#edit-photo").on("change", (e)=>{
	var foto = $("#edit-photo");
	console.log("hola")
})

$(".save-edit-menu").on("click",(e)=>{
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
		OptionsAjax.url = "views/ajax/gestorMenus.php";
		ajax.ejecutar()	
		.then((data)=>{
				if (data == "ok") {
					Swal.fire(
					  'Ok!',
					  '¡EL menu ha sido editado con exito!',
					  'success'
					)
					.then((result) => {
						if (result) {
							window.location = "menus"
						}else{
							window.location = "menus"
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

$(".borrar-button-menu").on("click", (e)=>{
	e.preventDefault();
	var boton = e.target.id;
	var id = boton.split("-");
	console.log(id)

	Swal.fire({
	  title: '¿Esta seguro de borrar este item?',
	  text: "¡Se borrara permanentemente!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, borralo!'
	}).then((result) => {

	  	if (result.value) {
		    OptionsAjax.data = {
				eliminarMenu: id[1]
			};
			ajax.setData(OptionsAjax);
			OptionsAjax.url = "views/ajax/gestorMenus.php";
			ajax.ejecutar()	
			.then((data)=>{
					if (data == "ok") {
						Swal.fire(
						  'Ok!',
						  '¡El item ha sido eliminado con éxito!',
						  'success'
						)
						.then((result) => {
							if (result) {
								window.location = "menus"
							}else{
								window.location = "menus"
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

/*$("#parent-checkbox").on("click", function(){
	//console.log($(this))
	if ($(this)[0].checked) {
		$("#menu-padres").toggle();
	}else{
		$("#menu-padres").toggle();
	}
})*/
