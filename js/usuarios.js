function nuevoUser(){
	$("#registro").modal('show');
	
	$('#contenido').empty();
	$('#contenido').load('ajax.php?c=Peliculas&f=vistaRegistro');
       

 }
 
 $(document).ready(function(){
     
$("#loginuser").on('click', function() { 
		var btnguardar = $(this);
      	btnguardar.button("loading");
      	
      	$.post("ajax.php?c=Peliculas&f=validauser",{
      		usuario:$("#usuario").val(),
      		clave:$("#clave").val()
      	},function(r){ 
      		if(r==0){
      			alert("Usuario o clave incorrectos!");
      		}else{
      			window.location ="http://localhost/IAinteractive3/index.php?c=Peliculas&f=verpeli";
      		}
      		btnguardar.button('reset');
     	 });


     });
	$("#crearuser").on('click', function() { 
		var btnguardar = $(this);
      	btnguardar.button("loading");
      	
      	$.post("ajax.php?c=Peliculas&f=registroUsuario",{
      		usuario:$("#usuario").val(),
      		clave:$("#clave").val(),
      		correo:$("#correo").val()
      	},function(r){
      		if(r==0){
      			alert("Usuario registrado!");
      		}else{
      			window.location ="index.php?c=Peliculas&f=user&clave="+$("#clave").val()+"&correo="+$("#correo").val();
      		}
      		btnguardar.button('reset');
     	 });


     });
});
 