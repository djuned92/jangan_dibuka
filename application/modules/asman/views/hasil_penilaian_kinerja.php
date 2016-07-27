<?php
	foreach ($data as $r) {
		// echo $r->bobot_nilai.'<br/>';
		$evaluasi = array($r->bobot_nilai * $r->bobot);
	}
	echo array_sum($evaluasi);
?>