<div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
	<p>Data telah tersimpan.</p>
	</div>
</div>
<div id="dRowAmount" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myRowAmountLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
	<p>Banyaknya baris per halaman : 
	<select>
		<?php for($c=1;$c<=10;$c++){?>
		<option><?php echo $c;?></option>
		<?php }?>
	</select>
	</p>
	<button class="btn" id="saverowamount">OK</button>
	</div>
</div>