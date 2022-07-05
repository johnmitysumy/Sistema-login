
			<div class="modal fade" id="myModalmensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header-center">
							<center><h4 class="modal-title" id="myModalLabel"><?php echo $_SESSION['msg']; ?></h4></center>
						</div>
						<?php echo $_SESSION['msg2']; ?>
						<div class="modal-footer">							
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>				
					
			

<script>
				$(document).ready(function () {
					$('#myModalmensagem').modal('show');
				});
			</script>	

<?php 
unset($_SESSION['msg']);
unset($_SESSION['msg2']); ?>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>