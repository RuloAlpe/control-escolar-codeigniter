<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<br>
<br>
<div class="container">
	<div class="contenido">
		<h2>Registro de alumnos/materias</h2>

		<form id="js-form-registro">
			<div class="form-group">
				<label for="alumno">Alumno</label>
                <select class="form-control js-select-alumno" id="alumno" name="alumnos">
                    <option>Seleciona una opcion</option>
                    <?php
                    foreach($alumnos as $alumno){
                    ?>
                        <option value="<?= $alumno->matricula ?>"><?= $alumno->nombre ?></option>
                    <?php
                    }
                    ?>
                </select>
			</div>
			<div class="form-group">
				<label for="materia">Materia</label>
                <select class="form-control js-select-materia" id="materia" name="materias">
                    <option>Seleciona una opcion</option>
                    <?php
                    foreach($materias as $materia){
                    ?>
                        <option value="<?= $materia->clave_materia ?>"><?= $materia->nombre ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

			<button class="btn btn-primary js-btn-registro">Guardar</button>
		</form>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Matricula</th>
					<th>Nombre alumno</th>
					<th>Clave materia</th>
					<th>Nombre materia</th>
					<th width="220px">Opciones</th>
				</tr>
			</thead>

			<tbody class="js-body-tabla">
				<?php foreach ($asignaciones as $asignacion) { ?>      
					<tr>
                        <td><?php echo $asignacion->MATRICULAA; ?></td>
						<td><?php echo $asignacion->NOMBREA; ?></td>          
						<td><?php echo $asignacion->CLAVEM; ?></td>          
						<td><?php echo $asignacion->NOMBREM; ?></td>          
						<td>
                            <button type="button" class="btn btn-default js-eliminar-asignacion" data-mat="<?php echo $asignacion->MATRICULAA; ?>" data-clave="<?php echo $asignacion->CLAVEM; ?>">
                                <span class='glyphicon glyphicon-remove'></span>Eliminar
                            </button>
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
			url: 'registroasignacion',
			type: 'POST',
			dataType:'json',
			data: data,
			success: function(resp){
				if(resp.status == 'success'){
					console.log('success');
					$(".js-body-tabla").html(resp.template);
					$("#alumno").val('');
					$("#materia").val('');
				}else{
					console.log('error');					
				}
			}
		});
	});
});

$(document).on({
    'click': function(){
        var mat = $(this).data('mat');
        var clave = $(this).data('clave');

        $.ajax({
            url: 'eliminarasignacion',
            data:{
                mat: mat,
                clave: clave
            },
            success:function(resp){
                if(resp.status == 'success'){
					console.log('success');
					$(".js-body-tabla").html(resp.template);
					$("#alumno").val('');
					$("#materia").val('');
				}else{
					console.log('error');					
				}
            }
        });
    }
}, ".js-eliminar-asignacion");
</script>