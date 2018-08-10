<!DOCTYPE >
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<script src="libraries/jquery-1.10.2.min.js"></script>
		 <script src="js/principal.js"></script>

</head>

<body>
	<br>
	<div class="panel panel-default col-md-10 col-md-offset-1"><br>
	<button id="" onclick="javascript:window.location='index.php?c=Peliculas&f=inicio'" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
Volver</button>
	<br><br>
	<div style="overflow: scroll;">
		<table style="color:#686464" >
			<tr>
				<th rowspan="3"> 
					<div class="col-md-3" style="">
						<img src="poster/aqua.jpeg" style="display:block;" scale="0">
					</div>
				</th>
				<th>AQUAMAN</th>
				
			</tr>
			<tr>
				<th>FECHA</th>
			</tr>
			<tr>
				<th>
					<div class="col-md-3" style="">
					algo de sonopsisisiosa sdlsmldksaS ESFDSFF
					</div>
					</th>
			</tr>
			
			
		</table>
	</div>
	<br>
	<div class="col-md-10" style="color: #686464">
	resena SEIREO DOS llsjakd asdijseodjsldjmsld  e rer e re tre tre t 
	</div>
	<br><br>
	<h3 style=""><b>COMENTARIOS</b></h3>
	<hr>
	
	<table style="color:#686464" >
		<tr>
			<th rowspan="2"> 
				<div class="col-md-3" style="" >
					<img src="poster/user.png"  style="display:block;" scale="0">
				</div>
			</th>
			<th>usuario 1</th>
			
		</tr>
		<tr bordercolor="">
			<th>comentario cla bla cbalaa</th>
		</tr>
	</table>
	<hr>
	<button id="" onclick="agregarComentario('idpeli')" class="btn btn-primary btn-sm" data-loading-text="<i class='fa fa-refresh fa-spin '></i>" type="button">
	 Agregar Comentario </button>
		
	
</body>
<div id="modelcomentario" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content panel-success">
            <div class="modal-header panel-heading">
                <h4 id="modal-label" id="">Agregar Comentario</h4>
            </div>
            <div class="modal-body" id="comentario">
               <textarea id="addcome" class="form-control" placeholder="Escribe aquí el comentario..." maxlength="500"></textarea>
               <label style="font-size: 10px;color: red">Max. 500 caracteres</label>
            </div>
             <div class="modal-footer">
             	 <button type="button" class="btn btn-primary" data-dismiss="modal">
			        <span class="glyphicon"></span>
			        <span class="hidden-xs">Enviar</span>
			    </button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">
			        <span class="glyphicon glyphicon-remove"></span>
			        <span class="hidden-xs">Cerrar</span>
			    </button>
			
			</div>
        </div>
    </div> 
</div> 
</div>
<script>
	function agregarComentario(){
		
		<?php if(isset($_COOKIE['iduser'])){ ?>
				$("#modelcomentario").modal('show');
		<?php }else{?>
				alert("Debes iniciar sesion para comentar");
				window.location = 'index.php?c=Peliculas&f=user';
		<?php } ?>
	
       

 }
</script>
</html>