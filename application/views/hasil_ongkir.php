<?php if(!empty($costs)): ?>
	<div style="margin: 20px 0;"></div>
	<div class="table-responsive">
		<table class="table table-bordered">
	        <tr>
	            <th>No</th>
	            <th>Jenis Pengiriman</th>
	            <th>Harga</th>
	            <th>Waktu Pengiriman (estimasi)</th>
	        </tr>
	        <?php $i=1; foreach ($costs as $c): ?>
				<tr>
					<td><?=$i?></td>
					<td><?=$c['service']?></td>
					<td>Rp<?=number_format($c['cost'][0]['value'], 0, ".", ".")?></td>
					<td><?=$c['cost'][0]['etd']?></td>
				</tr>
			<?php $i++; endforeach; ?>
	    </table>
	</div>
<?php endif; ?>