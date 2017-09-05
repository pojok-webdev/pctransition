<div id="dSetTSCabang" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<span class="isw-zoom" ></span>
		<h3 id="setTSCabangModalLabel" >&nbsp; Pencarian</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid withoutt-head">
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9">
							<?php for($i=1;$i<=count($branches);$i++){?>
								<input type="checkbox" value="<?php echo $i;?>" class="tsbranch"><?php echo $branches[$i];?>
							<?php }?>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn">Tutup</button>
		<button type="button" class="btn btn-primary" id="search">Cari</button>
	</div>
</div>
