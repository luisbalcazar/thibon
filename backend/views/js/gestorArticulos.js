$("#save-article").on("click",function(){
    
  	$("#article-form").submit();

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

$(".delete-prom").on("click", (e)=>{
	e.preventDefault();
	var boton = e.target.id;
	var id = $(this).attr("data-id");
	console.log(boton)

	Swal.fire({
	  title: '¿Esta seguro de borrar este articulo?',
	  text: "¡Se movera a la papelera!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, borralo!'
	}).then((result) => {

	  	if (result.value) {
		    OptionsAjax.data = {
				eliminarArticulo: boton
			};
			ajax.setData(OptionsAjax);
			OptionsAjax.url = "views/ajax/gestorArticulos.php";
			ajax.ejecutar()	
			.then((data)=>{
					if (data == "ok") {
						Swal.fire(
						  'Ok!',
						  '¡El articulo ha sido transladado a la papelera con éxito!',
						  'success'
						)
						.then((result) => {
							if (result) {
								window.location = "trashArticulo"
							}else{
								window.location = "trashArticulo"
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

$(".restaurar-prom").on("click", (e)=>{
	e.preventDefault();
	var boton = e.target.id;

	console.log(boton)

	OptionsAjax.data = {
		restaurarArticulo: boton
	};
	ajax.setData(OptionsAjax);
	OptionsAjax.url = "views/ajax/gestorArticulos.php";
	ajax.ejecutar()	
	.then((data)=>{
					if (data == "ok") {
						Swal.fire(
						  'Ok!',
						  '¡El articulo ha sido restaurado a la papelera con éxito!',
						  'success'
						)
						.then((result) => {
							if (result) {
								window.location = "editor"
							}else{
								window.location = "editor"
							}
						}) 
					}

			},(fail)=>{
				console.log("fallo");
				console.log(fail);
			})

})

$(".realDelete-prom").on("click", (e)=>{
	e.preventDefault();
	var boton = e.target.id;
	var id = $(this).attr("data-id");
	console.log(boton)

	Swal.fire({
	  title: '¿Esta seguro de borrar este articulo?',
	  text: "¡Se eliminara permanentemente!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, borralo!'
	}).then((result) => {

	  	if (result.value) {
		    OptionsAjax.data = {
				eliminarRealArticulo: boton
			};
			ajax.setData(OptionsAjax);
			OptionsAjax.url = "views/ajax/gestorArticulos.php";
			ajax.ejecutar()	
			.then((data)=>{
					if (data == "ok") {
						Swal.fire(
						  'Ok!',
						  '¡El articulo ha sido eliminado con éxito!',
						  'success'
						)
						.then((result) => {
							if (result) {
								window.location = "trashArticulo"
							}else{
								window.location = "trashArticulo"
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