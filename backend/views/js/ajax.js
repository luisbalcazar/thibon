class Ajax {
	constructor(){
		var progreso = false
		this.options = {
			type: "POST",
			dataType: "JSON"
		}
	}

	ejecutar(){
		return new Promise((resolve, reject)=>{
        	$.ajax(this.options).done(resolve).fail(reject)
    	})
	}

	setData(object){
		this.options = object
	}
	setDataForm(object){
		this.options = object;
		this.options.cache = false;
		this.options.contentType = false;
		this.options.processData = false;
	}
	peticion(tipo,data,url,opciones){

		if (opciones == false) {
			opciones = undefined
		}
		if (tipo == "formData" || tipo == "FormData" || tipo == 1) {
			// console.log(url)
			this.options.url = url;
			this.options.type = (opciones != undefined) ? opciones.type : "POST";
			this.options.dataType = (opciones != undefined) ? opciones.dataType : "JSON";
			this.options.data = data;
			this.options.cache = false;
			this.options.contentType = false;
			this.options.processData = false;
			this.options.xhr = ()=>{

				var myXhr = $.ajaxSettings.xhr();
				myXhr.upload.addEventListener('progress',(prog) =>{

					var value = ~~((prog.loaded / prog.total) * 100);

					if (this.progreso) {
						this.progreso(value)
					}
					
				}, false);
			
				return myXhr;
			}

		}else if (tipo == "normal" || tipo == 0) {


			this.options.url = url
			this.options.type = (opciones != undefined) ? opciones.type : "POST";
			this.options.dataType = (opciones != undefined) ? opciones.dataType : "JSON";
			this.options.data = data
			this.options.xhr = ()=>{

				var myXhr = $.ajaxSettings.xhr();
				myXhr.upload.addEventListener('progress',(prog) =>{

					var value = ~~((prog.loaded / prog.total) * 100);
					if (this.progreso) {
						this.progreso(value / 100)
					}
					
				}, false);
			
				return myXhr;
			}
		}

		return new Promise((resolve, reject)=>{
        	$.ajax(this.options).done(resolve).fail(reject)
    	})
	}

	mostrarProgreso(callback){
		
		this.progreso = callback
			
	}

}

let OptionsAjax = {
    url : "views/ajax/ajax.php",
    type : "POST",
    dataType : "JSON"
}

let ajax = new Ajax();
