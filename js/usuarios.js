function nuevoUser(){
	$("#registro").modal('show');
	
	// $('#contenido').empty();
	// $('#contenido').load('index.php?c=Peliculas&f=vistaRegistro');
       

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
		var btnguardar2 = $(this);
      	btnguardar2.button("loading"); 
      	
      	$.post("ajax.php?c=Peliculas&f=insertauser",{
      		usuario:$("#newuser").val(),
      		clave:$("#newclave").val(),
      		correo:$("#correo").val()
      	},function(r){
      		if(r==1){
      			alert("Usuario registrado!");
      			window.location ="index.php?c=Peliculas&f=user&clave="+$("#newclave").val()+"&correo="+$("#correo").val();
      		}else{
      			alert("Error en registro");
      		}
      		btnguardar2.button('reset');
     	 });


     });
});
 