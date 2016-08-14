<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(mfepChart); // chart mfep
  google.charts.setOnLoadCallback(wpChart); // chart wp
  
  function mfepChart() 
  {
    var data = google.visualization.arrayToDataTable([
      ["Element", "Density", { role: "style" } ],
      <?php foreach($_detail_nilai_pegawai as $r):?>
      ["<?=$r->nama?>", 
      <?php
        $hasil = 0;
        for($i=1; $i<=$total; $i++)
        {
         foreach ($detail_nilai_pegawai as $datas) 
         {
           if($datas->id_nilai_pegawai == $i)
           {
             $evaluasi = $datas->bobot * $datas->bobot_nilai;
             $hasil += $evaluasi;
           }
         }
         if($hasil !=0 and $r->id_nilai_pegawai == $i)
         { 
           echo $hasil;
         }
         $hasil = 0; // reset hasil
        }
      ?>, "opacity : 0,2"],
      <?php endforeach; ?>
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
      title: "Hasil Penilaian Kinerja MFEP",
      width: 500,
      height: 300,
      bar: {groupWidth: "80%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
    chart.draw(view, options);
  }

  function wpChart() 
  {
    var data = google.visualization.arrayToDataTable([
      ['Nama', 'Nilai'],
      <?php foreach ($_detail_nilai_pegawai as $r):?>
      ['<?=$r->nama?>',
        <?php
        $hasil = 0;
        for($i=1; $i<=$total; $i++)
        {
         foreach ($detail_nilai_pegawai as $datas) 
         {
           if($datas->id_nilai_pegawai == $i)
           {
             $evaluasi = $datas->bobot * $datas->bobot_nilai;
             $hasil += $evaluasi;
           }
         }
         if($hasil !=0 and $r->id_nilai_pegawai == $i)
         { 
           echo $hasil;
         }
         $hasil = 0; // reset hasil
        }
      ?>],
      <?php endforeach; ?>
    ]);

    var options = {
      title: 'Hasil Penilaian Kinerja WP',
      is3D: true,
      width: 500,
      height: 300,
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div_2'));
    chart.draw(data, options);
  }
</script>