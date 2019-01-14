<?php
include_once "database.php";
$db = new database();
$kon = $db->connect();

$content = ob_get_clean();
$bl = date('m');
$bln = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
for($a=1; $a<=12; $a++)
{
  if($a==$bl)
  {
    $bulan = $bln[$a];
  }
}
$tanggal = date('d');
$tahun = date('Y');

$content = "
  <page>
    <h4 align=center>
        <table style='margin-left: 10px;' align='center'>
          <tr>
            <td><img src='img/kop_surat.png' height='65px;'></td>
            <br><br><br><br>
            <hr style='height:3px;background:black;'>
            <hr style='margin-top:-25px; background:black;'>
          </tr>
        </table><br>
    </h4>
    <h3 align=center>HASIL AKHIR</h3><br>
    <table border='1' align=center style='border-collapse:collapse;'>
      <thead style='font-weight: bold; font-size: 15px'>
        <tr style='background-color: #E18551; color: #fff'>
          <td align='center' style='width:40px;'>No</td>
          <td align='center' style='width:135px;'>Nama Pegawai</td>
          <td align='center' style='width:115px;'>Nilai Total Kapasitas Intelektual</td>
          <td align='center' style='width:100px;'>Nilai Total Sikap Kerja</td>
          <td align='center' style='width:90px;'>Nilai Total Perilaku</td>
          <td align='center' style='width:50px;'>Total</td>
          <td align='center' style='width:60px;'>Ranking</td>
        </tr>
      </thead>
    ";

        $qpersen    = $kon->query("SELECT distinct persentase FROM pm_aspek WHERE id_aspek = 'A001'");
        $dtpersen   = $qpersen->fetch_array();
        $persen     = $dtpersen['persentase'];

        $qpersen2   = $kon->query("SELECT distinct persentase FROM pm_aspek WHERE id_aspek = 'A002'");
        $dtpersen2  = $qpersen2->fetch_array();
        $persen2    = $dtpersen2['persentase'];

        $qpersen3   = $kon->query("SELECT distinct persentase FROM pm_aspek WHERE id_aspek = 'A003'");
        $dtpersen3  = $qpersen3->fetch_array();
        $persen3    = $dtpersen3['persentase'];

      $content.="
      <tr>
        <td colspan='2' style='text-align: center'><strong>Persentase</strong></td>
        <td style='text-align: center'>$persen %</td>
        <td style='text-align: center'>$persen2 %</td>
        <td style='text-align: center'>$persen3 %</td>
        <td colspan='2'></td>
      </tr>
      ";
      $query = "SELECT pm_pegawai.kdpegawai, pm_pegawai.namapegawai,
      pm_intelektual.nilai_tot_A1 as INTE, pm_sikap.nilai_tot_A2 as SK, pm_perilaku.nilai_tot_A3 as PR,
      (((pm_intelektual.nilai_tot_A1*20)/100)+((pm_sikap.nilai_tot_A2*30)/100)+((pm_perilaku.nilai_tot_A3*50)/100)) as Total
      FROM pm_pegawai
      LEFT JOIN pm_intelektual ON pm_pegawai.kdpegawai = pm_intelektual.kdpegawai
      LEFT JOIN pm_sikap ON pm_pegawai.kdpegawai = pm_sikap.kdpegawai
      LEFT JOIN pm_perilaku ON pm_pegawai.kdpegawai = pm_perilaku.kdpegawai
      ORDER BY Total DESC";
      $hasil = $kon->query("$query");

      $no = 1;
      while ($row = $hasil->fetch_array()) {
      $kdpegawai    = $row['kdpegawai'];
      $namapegawai  = $row['namapegawai'];

      $content.="
      <tr>
        <td style='text-align: center'>$no</td>
        <td>$namapegawai</td>
        <td style='text-align: center'>".$row['INTE']."</td>
        <td style='text-align: center'>".$row['SK']."</td>
        <td style='text-align: center'>".$row['PR']."</td>
        <td style='text-align: center'>".number_format((float)$row['Total'], 2, '.', '')."</td>
        <td style='text-align: center'>".$no."</td>
      </tr>
      ";
      $no++;
      }
      $content.="
    </table><br><br><br>
    <div style='padding-left:450px;'>
      Bandung, $tanggal $bulan $tahun<br>
      Divisi HRD<br><br><br><br><br>
      Kartika Diah
    </div>
    </page>
    ";

    require_once('html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(20, 10, 20, 20));
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('Laporan.pdf');

?>
