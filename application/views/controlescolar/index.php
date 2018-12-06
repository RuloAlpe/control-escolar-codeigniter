<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<br>
<br>
<div class="container">
	<div class="contenido">
		<h2>Registro de alumnos</h2>

		<form id="js-form-registro">
			<div class="form-group">
				<label for="matricula">Matricula</label>
				<input type="text" class="form-control js-input-matricula" name="matricula" id="matricula" placeholder="Ingresa tu matricula">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control js-input-nombre" name="nombre" id="nombre" placeholder="Ingresa tu nombre">
			</div>

			<button class="btn btn-primary js-btn-registro">Guardar</button>
		</form>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Matricula</th>
					<th>Nombre</th>
					<th width="220px">Opciones</th>
				</tr>
			</thead>

			<tbody class="js-body-tabla">
				<?php foreach ($alumnos as $item) { ?>      
					<tr>
						<td><?php echo $item->matricula; ?></td>
						<td><?php echo $item->nombre; ?></td>          
						<td>
							
						</td>     
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><!-- /.container -->

<script>
$(document).ready(function(){
	$('.js-btn-registro').on('click', function(e){
		e.preventDefault();

		var data = $('#js-form-registro').serialize();

		$.ajax({
			url: 'controlescolar/registroalumno',
			type: 'POST',
			dataType:'json',
			data: data,
			success: function(resp){
				if(resp.status == 'success'){
					console.log('success');
					$(".js-body-tabla").html(resp.template);
					$(".js-input-matricula").val('');
					$(".js-input-nombre").val('');
				}else{
					console.log('error');					
				}
			}
		});
	});
});
</script>