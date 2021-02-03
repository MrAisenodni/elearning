<?php
$title = 'Laporan Guru Mata Pelajaran';
require_once('../config/koneksi.php');
require_once('../vendor/autoload.php');

$sqlipa = mysqli_query($con,"SELECT * FROM tbl_mapel a INNER JOIN tbl_kelas b ON b.id_kelas = a.id_kelas INNER JOIN tbl_user c ON c.id_user = a.id_user WHERE b.jurusan = 'ipa' ORDER BY b.tingkat ASC, b.kelas ASC");
$sqlips = mysqli_query($con,"SELECT * FROM tbl_mapel a INNER JOIN tbl_kelas b ON b.id_kelas = a.id_kelas INNER JOIN tbl_user c ON c.id_user = a.id_user WHERE b.jurusan = 'ips' ORDER BY b.tingkat ASC, b.kelas ASC");
$mpdf = new \Mpdf\Mpdf();
$html = '
<html>
    <head>
        <title>Laporan Mata Pelajaran</title>
        <style>
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            td, th {
              border: 1px solid #000000;
              text-align: center;
              height: 20px;
              margin: 8px;
            }

            p, h2 {
                font-family: Times New Roman;
                text-align: center;
            }

            hr {
                margin-top: -2px;
            }
        </style>
    </head>
    <body>
        <h2><b>Laporan Mata Pelajaran</b></h2>
        <p>
            <b>SMA Negeri 1 Megamendung</b><br>Jl. Cikopo Sel. No.15, Sukamaju, Kec. Megamendung, Bogor, Jawa Barat 16770
        </p>
        <hr>
        <h5>Jurusan : Ilmu Pengetahuan Alam (Sains)</h5>
        <table cellpadding="6" >
            <tr>
                <th class="border-top-0">No</th>
                <th class="border-top-0">Mata Pelajaran</th>
                <th class="border-top-0">Kelas</th>
                <th class="border-top-0">Guru Pengajar</th>
            </tr>';
$i = 1;
foreach ($sqlipa as $dataipa) {
    $html .= '
            <tr>
                <td>'. $i++ .'</td>
                <td>'. $dataipa['mapel'] .'</td>
                <td>'. $dataipa['tingkat']." ".strtoupper($dataipa['jurusan'])." ".$dataipa['kelas'] .'</td>
                <td>'. $dataipa['nama'] .'</td>
            </tr>';
}
$html .= '</table>
        <hr>
        <h5>Jurusan : Ilmu Pengetahuan Sosial</h5>
        <table cellpadding="6" >
            <tr>
                <th class="border-top-0">No</th>
                <th class="border-top-0">Mata Pelajaran</th>
                <th class="border-top-0">Kelas</th>
                <th class="border-top-0">Guru Pengajar</th>
            </tr>';
$no = 1;
while ($dataips = mysqli_fetch_array($sqlips)) {
    $html .= '
            <tr>
                <td>'. $no .'</td>
                <td>'. $dataips['mapel'] .'</td>
                <td>'. $dataips['tingkat']." ".strtoupper($dataips['jurusan'])." ".$dataips['kelas'] .'</td>
                <td>'. $dataips['nama'] .'</td>
            </tr>';
}
$html .= '
        </table>
    </body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
?>
<?php require_once('footer-laporan.php');?>