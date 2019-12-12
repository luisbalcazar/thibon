var id = [];

var string_global = ""
var precio_promo_global = 0;

$("#modal-promo").on("hidden.bs.modal", function(){
	id = [];
	var contenedor = document.getElementById("contenedor-prom");
	contenedor.innerHTML = "";
	$(".product-table tbody .checkbox-product").prop('checked', false);
	var photo =  $("#prom-pic").attr('src', 'https://mdbootstrap.com/img/Photos/Others/placeholder.jpg');
	document.getElementById("promo-photo").value = "";

	// console.log($("#promo-photo").val())
	

	
}) 

$("#promocion-button").on("click",(e)=>{
	e.preventDefault();

		//var checkbox = $(".check input[type=checkbox]:checked");
		console.log(id);

		OptionsAjax.data = {
			idPromo: id
		};
		ajax.setData(OptionsAjax);
		OptionsAjax.url = "views/ajax/gestorPromocion.php";
		ajax.ejecutar()	
		.then((data)=>{	
			console.log(data)
			$("#modal-promo").modal("show");

			var string = ""
			var arr_str = []

			for (var i = 0; i < data.length; i++) {
				console.log(data[i][0])
				var aux_arr = {
					inv: data[i][0]["inventario"],
					id_p_promo:data[i][0]["id"]
				}

				arr_str.push(aux_arr)

				if (i == data.length - 1) {
					string += data[i][0]["id"] + "#" + data[i][0]["inventario"] 				
				}else {
					string += data[i][0]["id"] + "#" + data[i][0]["inventario"] + "-"
				}
				

				document.getElementById("contenedor-prom").innerHTML += "<div class='container-prom'><div class='form-group'><h4>"+data[i][0]["nombre"]+"</h4><input type='hidden' name='name-"+data[i][0]["id"]+"' value='"+data[i][0]["nombre"]+"'><label class='form-control-label' >Cantidad disponible</label><input type='number' name='promo-quantity' class='form-control cantidad-promo' data-id='"+data[i][0]["id"]+"' data-index='"+i+"' value='"+data[i][0]["inventario"]+"' min='1' max='"+data[i][0]["inventario"]+"'><input type='hidden' name='id-promo' value='"+data[i][0]["id"]+"'></div></div>";
			}

			console.log(string)
			string_global = string

			$(".cantidad-promo").on("change",function(){

				var id_promo = $(this).attr("data-id")
				var index = $(this).attr("data-index")
				
				arr_str[index].inv = $(this).val()			

				string = ""
				for (var i = 0; i < arr_str.length; i++) {
					if (i == arr_str.length - 1) {
						string += arr_str[i]["id_p_promo"] + "#" + arr_str[i]["inv"] 				
					}else {
						string += arr_str[i]["id_p_promo"] + "#" + arr_str[i]["inv"] + "-"
					}					
				}
				
				string_global = string

			})

		},(fail)=>{
			console.log("fallo");
			console.log(fail);
		})
			

})


$(".checkbox-product").on("click", function(e){
	
	if ($(this)[0].checked) {
		var id_p = $(this).attr("data-id");
		id.push(id_p);
	}else if(!$(this)[0].checked){
		var pos = id.indexOf($(this)[0]);
		id.splice(pos, 1)
	}
	
})

$("#guardar-promo").on("click",(e)=>{
	e.preventDefault();

	var precio = $("#price-prom").val();
	var foto = $("#promo-photo").val();
	var alias = $("#alias-prom").val();
	var descripcion = $("#descripcion-prom").val();

	var formData = new FormData(document.getElementById("form-prom"));
	var error = false;
	
		formData.forEach((item, i, ob)=>{
			if (item == "") {
				$("#"+i).addClass('is-invalid');
				$("#"+i).css('background-color', '#ff000021');
				error = "Llene todos los campos";
				$(".error_insert text-danger").html(error);
			}
		});

		//formData.append('ingreso',"true");

	if (!error) {

		OptionsAjax.data = {
			datos: string_global,
			price: precio,
			photo: foto,
			alias: alias,
			descripcion: descripcion,
		};
		ajax.setData(OptionsAjax);
		OptionsAjax.url = "views/ajax/gestorPromocion.php";
		ajax.ejecutar()	
		.then((data)=>{
			if (data == "ok") {
					Swal.fire(
					  'Ok!',
					  '¡La promocion ha sido ingresado correctamente!',
					  'success'
					)
					.then((result) => {
						if (result) {
							window.location = "promociones"
						}else{
							window.location = "promociones"
						}
					}) 
			}

			},(fail)=>{
				console.log("fallo");
				console.log(fail);
			})
		

	}else{
		$(".error_insert text-danger").html(`
			<div class="alert alert-danger" role="alert" style="color: #721c24 !important; background-color: #f8d7da !important; border-color: #f5c6cb !important;">
               ${error}
            </div>
		`)
	}
})

$(".guardar-edit-prom").on("click",(e)=>{
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
		OptionsAjax.url = "views/ajax/gestorPromocion.php"
		ajax.setDataForm(OptionsAjax);
		ajax.ejecutar()	
		.then((data)=>{
				if (data == "ok") {
					Swal.fire(
					  'Ok!',
					  '¡La promocion ha sido editada correctamente!',
					  'success'
					)
					.then((result) => {
						if (result) {
							window.location = "promociones"
						}else{
							window.location = "promociones"
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

$(".delete-button-prom").on("click",function(e){
	e.preventDefault();
	var boton = $(this);
	
	var id = boton[0].id.split("-");
	var pag = $(this).attr('data-pag');

	Swal.fire({
	  title: '¿Esta seguro de borrar esta promocion?',
	  text: "¡Se borrara permanentemente!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, borralo!'
	}).then((result) => {

	  	if (result.value) {
		    OptionsAjax.data = {
				id_promE: id[1]
			};
			OptionsAjax.url = "views/ajax/gestorPromocion.php"
			ajax.setData(OptionsAjax);
			ajax.ejecutar()	
			.then((data)=>{
					if (data == "ok") {
						Swal.fire(
						  'Ok!',
						  '¡El Producto ha sido eliminado con éxito!',
						  'success'
						)
						.then((result) => {
							if (result) {
								window.location = "promociones"
							}else{
								window.location = "promociones"
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

$("#promo-photo").on("change", (e)=>{
	e.preventDefault();

	var foto = $("#foto");
	console.log(foto)
	let reader = new FileReader();
	reader.readAsDataURL(e.target.files[0]);
	reader.onload = function(){
    	let preview = document.getElementById('prom-preview'),
            image = document.getElementById('prom-pic');

	    image.src = reader.result;

	    preview.innerHTML = '';
	    preview.append(image);
	    $("img#foto").css("width", "300px");
	};
	console.log(foto)

})
	


