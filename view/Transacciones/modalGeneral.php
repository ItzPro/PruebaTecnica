<!-- Modal -->
<!---------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="modalGeneral" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<form method="POST" name="nuevogeneral_form" id="nuevogeneral_form" enctype="multipart/form-data">
							<!---------------------------------------------------------------------------------------------------------------------------------------->

							<!---------------------------------------------------------------------------------------------------------------------------------------->
							<!--Parte del modal----------------------------------------------------------------------------------------------------------------------->


							<!--tbl_combo_general-->
							<div class="form-group">
								<fieldset class="form-group">
									<label class="form-label " for="tbl_combo_general"><i class="bi bi-person-rolodex"></i><B>Motivo de la transacción
											<FONT COLOR="red">*</FONT>
										</B>: </label>
									<select class="select2 limpiarSelect" id="tbl_combo_general" name="tbl_combo_general" required>
									</select>
								</fieldset>
							</div>

							<!--tbl_combo_generaluno-->
							<div class="form-group">
								<fieldset class="form-group">
									<label class="form-label " for="tbl_combo_generaluno"><i class="bi bi-person-rolodex"></i><B> Agencia
											<FONT COLOR="red">*</FONT>
										</B>: </label>
									<select class="select2 limpiarSelect" id="tbl_combo_generaluno" name="tbl_combo_generaluno" required>
									</select>
								</fieldset>
							</div>

							<!--tbl_combo_general2-->
							<div class="form-group2">
								<fieldset class="form-group">
									<label class="form-label " for="tbl_combo_general2"><i class="bi bi-person-rolodex"></i><B> Cliente
											<FONT COLOR="red">*</FONT>
										</B>: </label>
									<select class="select2 limpiarSelect" id="tbl_combo_general2" name="tbl_combo_general2" required>
									</select>
								</fieldset>
							</div>




							<!--montoTransaccion-->
							<div class="form-group">
								<label for="montoTransaccion"><i class="bi bi-person-rolodex"></i>
									<b> Monto de la transacción <FONT COLOR="red">*</FONT>:</b>
								</label>
								<input type="text" class="form-control" id="montoTransaccion" name="montoTransaccion" placeholder="Monto de la transacción">
							</div>





							<!---------------------------------------------------------------------------------------------------------------------------------------->
							<!--Hidens-------------------------------------------------------------------------------------------------------------------------------->
							<div class="form-group">
								<input type="hidden" id="idTransaccion" name="idTransaccion" /> <!-- Este cambia por el id actual -->
								<input type="hidden" id="sidusuario" name="sidusuario" value="<?php echo $_SESSION["idUsuario"] ?>" /> <!-- Usuario Logueado -->

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