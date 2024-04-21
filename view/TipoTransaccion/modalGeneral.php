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
				<p style="text-transform: capitalize;"> <strong>Nota: </strong> Los campos que tengan el asterico color rojo(<B>
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

							<!--codigoTipoMovimiento-->
							<div class="form-group">
								<label for="codigoTipoMovimiento"><i class="bi bi-person-rolodex"></i>
									<b style="text-transform: capitalize;"> Codigo Tipo De Movimiento <FONT COLOR="red">*</FONT>:</b>
								</label>
								<input type="text" class="form-control" id="codigoTipoMovimiento" name="codigoTipoMovimiento" placeholder="Codigo Tipo De Movimiento">
							</div>

							<!--codigoTipoTransaccion-->
							<div class="form-group">
								<label for="codigoTipoTransaccion"><i class="bi bi-person-rolodex"></i>
									<b style="text-transform: capitalize;"> Codigo Del Tipo De Transaccion <FONT COLOR="red">*</FONT>:</b>
								</label>
								<input type="text" class="form-control" id="codigoTipoTransaccion" name="codigoTipoTransaccion" placeholder="Codigo Del Tipo De Transaccion">
							</div>

							<!--nombreTipoTransaccion-->
							<div class="form-group">
								<label for="nombreTipoTransaccion"><i class="bi bi-person-rolodex"></i>
									<b style="text-transform: capitalize;"> Nombre del Tipo de Transaccion <FONT COLOR="red">*</FONT>:</b>
								</label>
								<input type="text" class="form-control" id="nombreTipoTransaccion" name="nombreTipoTransaccion" placeholder="Nombre del Tipo de Transaccion">
							</div>


							<!---------------------------------------------------------------------------------------------------------------------------------------->
							<!--Hidens-------------------------------------------------------------------------------------------------------------------------------->
							<div class="form-group">
								<input type="hidden" id="idTipoTransaccion" name="idTipoTransaccion" /> <!-- Este cambia por el id actual -->
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