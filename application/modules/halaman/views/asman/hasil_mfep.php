<table>
	<?php $i = 1; 
	foreach($nilai as $r):
		$perkalian = $r->bobot_nilai * $r->bobot;
		$total += $perkalian;
	?>
		<tr>
			<th>#</th>
			<th>Id Nilai Pegawai</th>
			<th>Bobot Nilai</th>
			<th>Bobot</th>
			<th>Perkalian</th>
		</tr>
		<tr>
			<td><?=$i++?></td>
			<td><?=$r->id_nilai_pegawai?></td>
			<td><?=$r->bobot_nilai?></td>
			<td><?=$r->bobot?></td>
			<td><?=$perkalian?></td>
		</tr>
	<?php endforeach; ?>
		<tr>
			<td colspan="3">Total</td>
			<td><?=$total?></td>
		</tr>
</table>