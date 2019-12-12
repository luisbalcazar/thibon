class Util{

	alertSuccess(mensaje, direccion){
		var notification = alertify.notify(`<div><i class='icon-checkbox-marked-circle text-success'></i>&nbsp &nbsp  ${mensaje}</div>`, 'success', 2, function(){
			if (direccion) {
				window.location = direccion	
			}
        });
	}
	alertError(mensaje){
		var notification = alertify.notify(" "+mensaje, 'error', 4);
	}
	alertWarning(mensaje, direccion){
		swal({
			type: 'warning',
            title: "¡ Atención !",
            text: `¡ ${mensaje} !`
            
        })
        .then((confirm) => {
			if (direccion) {
        		if (confirm) {
					window.location = direccion
				}else{
					window.location = direccion
				}
        	}
		}) 
	}
	alertConfirm(q){
		return new Promise((resolve, reject)=>{
        	
			alertify.confirm(`<h4>${q}</h4>`,()=>{
		        resolve()
		    },()=>{
		        reject()
		    })
		    $(".ajs-header").html("Ecommerce-admin")		    
    	})
			
	}

	c(mensaje){
		console.log(mensaje)
	}
}

let util = new Util()

let c = util.c
