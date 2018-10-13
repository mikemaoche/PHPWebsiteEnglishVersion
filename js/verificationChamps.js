const form = document.getElementById("formInscription")
const size = {email:0,name:4,pwd:9}
let array = [] // contains all fields

form.onkeyup= function (e){
	let id = e.target.id
	let val = e.target.value
	let name = e.target.name
	
	param =  name === "name" ? size.name : 
	name === "email" ? size.email : 
 	name === "password1" || name === "password2" ? size.pwd : param

	array[name] = borderColor({id:id,val:val},param)

	if(array["name"] && array["email"] && array["password1"] && array["password2"])
		document.getElementById('idInscrire').disabled = false
	else
		document.getElementById('idInscrire').disabled = true
}

function borderColor(elem,size){
	let field = document.getElementById(elem.id)
	let reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	console.log(reg.test(elem.val))
	if(elem.val.length >= size && size != 0){
		field.style.outline = "3px green solid";
		$(field).notify("Field has been successfully completed",{className: 'success', position: 'right',autoHide:false,showDuration: 0})
		return true
	}
	else if(size == 0){
		if(reg.test(elem.val)){
			field.style.outline = "3px green solid";
			$(field).notify("Field has been successfully completed",{className: 'success', position: 'right',autoHide:false,showDuration: 0})
			return true;
		}
		field.style.outline = "3px red solid";
		$(field).notify("Field needs to be this format: example@gmail.com",{className: 'error', position: 'right',autoHide:false,showDuration: 0})
		return false;
	
			
	}
	else{
		field.style.outline = "3px red solid";
		$(field).notify("Field required minimum " + (size - elem.val.length) + " characters",{className: 'error', position: 'right',autoHide:false,showDuration: 0})
		return false
	}
}