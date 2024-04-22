<!-- Modal -->
<!---------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<!---------------------------------------------------------------------------------------------------------------------------------------->
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title text-center" id="mdltitulo"></h3>

				<!---------------------------------------------------------------------------------------------------------------------------------------->
				<!---------------------------------------------------------------------------------------------------------------------------------------->
				<p> <strong>Nota: </strong> Los campos que tengan el asterico color rojo(<B>
						<FONT COLOR="red">*</FONT>
					</B>) son campos obligatorios que deben ser llenados. </p>
			</div>

			<!---------------------------------------------------------------------------------------------------------------------------------------->
			<!---------------------------------------------------------------------------------------------------------------------------------------->

			<div class="modal-body">
				<section class="card">
					<div class="card-block">
						<!---------------------------------------------------------------------------------------------------------------------------------------->
						<form method="POST" name="nuevoUsuario_form" id="nuevoUsuario_form" enctype="multipart/form-data">
							<!---------------------------------------------------------------------------------------------------------------------------------------->

							<!---------------------------------------------------------------------------------------------------------------------------------------->
							<!--Parte del modal----------------------------------------------------------------------------------------------------------------------->

							<!--codigoUsuario-->
							<div class="form-group">
								<label for="codigoUsuario"><i class="bi bi-person-rolodex"></i>
									<b style="text-transform: capitalize;"> Código <FONT COLOR="red">*</FONT>:</b>
								</label>
								<input type="text" class="form-control" id="codigoUsuario" name="codigoUsuario" placeholder="Código de usuario">
							</div>

							<!--nombreUsuario-->
							<div class="form-group">
								<label for="nombreUsuario"><i class="bi bi-person-rolodex"></i>
									<b style="text-transform: capitalize;"> Nombre <FONT COLOR="red">*</FONT>:</b>
								</label>
								<input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre de usuario">
							</div>

							<!--passwordUsuario-->
							<div class="form-group">
								<label for="passwordUsuario"><i class="bi bi-input-cursor-text"></i>
									<b style="text-transform: capitalize;"> Contraseña <FONT COLOR="red">*</FONT>:</b>
								</label>
								<input type="text" class="form-control" id="passwordUsuario" name="passwordUsuario" placeholder="Contraseña del usuario">
							</div>

							<!--isActivo-->
							<div class="form-group">
								<label for="isActivo"><i class="bi bi-person-rolodex"></i>
									<b style="text-transform: capitalize;"> Estado <FONT COLOR="red">*</FONT>:</b>
								</label>
								<input type="text" class="form-control" id="isActivo" name="isActivo" placeholder="Estado del usuario">
							</div>


							<!---------------------------------------------------------------------------------------------------------------------------------------->
							<!--Hidens-------------------------------------------------------------------------------------------------------------------------------->
							<div class="form-group">
								<input type="hidden" id="idUsuario" name="idUsuario" />
								<input type="hidden" id="sidusuario" name="sidusuario" value="<?php echo $_SESSION["idUsuario"] ?>" />

							</div>
							<!---------------------------------------------------------------------------------------------------------------------------------------->
							<!---------------------------------------------------------------------------------------------------------------------------------------->

							<div class="modal-footer">
								<button type="button" class="btn  btn-secondary" data-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
								<input type="hidden" name="operacion" id="operacion">
								<button type="submit" name="action" id="#" value="add" class="btn btn-primary"><i class="bi bi-file-earmark-plus-fill"></i> Guardar </button>

								<input type="hidden" id="idusuario" name="idusuario" value="<?php echo $_SESSION["idUsuario"] ?>" />
							</div>

						</form>
					</div>
			</div><!-- modal-body -->
		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal fade -->