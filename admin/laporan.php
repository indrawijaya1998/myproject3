<?php
// memanggil library FPDF
require('fpdf181/fpdf.php');
$pdf=new FPDF('P',
    'cm'
    ,'A4'); $pdf->SetMargins(4,4,3);
class PDF extends FPDF
{
// Page header
    function Header()
    {
        $this->Image('logokampus.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(90);
        $this->Cell(30,10,'SEKOLAH TINGGI ILMU HUKUM DAMARICA PALOPO',0,0,'C');
        $this->Ln(14);

        $this->SetFont('Arial', '', 12);
        $this->Cell(100);
        $this->Cell(30,2,'Jln. DR. Ratulangi KM 3. No 08 Bukit Balandai, Telepon (0471) 22303',0,0,'C');
        $this->Ln(5);

        // $this->SetFont('Arial', '', 12);
        // $this->Cell(100);
        // $this->Cell(30,2,'Jl. Sultan Alauddin. Tamalanrea Makassar Telepon 0411-586 345',0,0,'C');
        // $this->Ln(7);

        $this->Line(11,35,198,35, 10);
        $this->Ln(7);
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(10,7,'',0,1);
$pdf->Ln(6);
$pdf->SetFont('Arial','BU', 14);
$pdf->Text( 100, 45, 'Data Calon Mahasiswa');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,6,'No',1,0, 'C');
$pdf->Cell(25,6,'Nama Lengkap',1,0, 'C');
$pdf->Cell(45,6,'Nomor Induk Siswa ',1,0, 'C');
$pdf->Cell(35,6,'Jenis Kelamin',1,0, 'C');
$pdf->Cell(65,6,'Status',1,1, 'C');
$pdf->Cell(65,6,'Tempat Lahir',1,1, 'C');
$pdf->Cell(65,6,'Tanggal Lahir',1,1, 'C');
$pdf->Cell(65,6,'Provinsi Asal',1,1, 'C');
$pdf->Cell(65,6,'Kota Asal',1,1, 'C');
$pdf->Cell(65,6,'Alamat',1,1, 'C');
$pdf->Cell(65,6,'Agama',1,1, 'C');
$pdf->Cell(65,6,'Kewarganegaraan',1,1, 'C');
$pdf->Cell(65,6,'Tahun Lulus SMA',1,1, 'C');
$pdf->Cell(65,6,'Nama Ayah',1,1, 'C');
$pdf->Cell(65,6,'Nama Ibu',1,1, 'C');
$pdf->Cell(65,6,'Provinsi Orang Tua',1,1, 'C');
$pdf->Cell(65,6,'Kota Orang Tua',1,1, 'C');
$pdf->Cell(65,6,'Alamat Orang Tua',1,1, 'C');
$pdf->Cell(65,6,'Kode Pos',1,1, 'C');
$pdf->Cell(65,6,'Nomor Telepon Orang Tua',1,1, 'C');
$pdf->Cell(65,6,'Pekerjaan Ayah',1,1, 'C');
$pdf->Cell(65,6,'Pekerjaan Ibu',1,1, 'C');
$pdf->Cell(65,6,'Penghasilan Orang Tua',1,1, 'C');
$pdf->Cell(65,6,'Jumlah Saudara',1,1, 'C');
$pdf->Cell(65,6,'Sumber Informasi',1,1, 'C');
$pdf->Cell(65,6,'Foto',1,1, 'C');


$pdf->SetFont('Arial','',10);
$kon = mysqli_connect( "localhost", "root", "", "pendaftaran" );
$dosen = mysqli_query($kon, "SELECT * from mahasiswa");
$no = 1;
while ($row = mysqli_fetch_array($dosen)){
    $iduser = $row['id_user'];
    $jurusan= mysqli_fetch_array(mysqli_query( $kon, "SELECT nm_lengkap FROM mahasiswa WHERE id_user='$iduser'"))[0];
    $pdf->Cell(15,6,$no ,1,0, 'C');
    $pdf->Cell(25,6,$row['nm_lengkap'],1,0, 'C');
    $pdf->Cell(45,6,$row['nis'],1,0, 'C');
    $pdf->Cell(45,6,$row['jk'],1,0, 'C');
    $pdf->Cell(45,6,$row['status'],1,0, 'C');
    $pdf->Cell(45,6,$row['tempat_lahir'],1,0, 'C');
    $pdf->Cell(45,6,$row['tgl_lahir'],1,0, 'C');
    $pdf->Cell(45,6,$row['asal_prov'],1,0, 'C');
    $pdf->Cell(45,6,$row['kota_asal'],1,0, 'C');
    $pdf->Cell(45,6,$row['alamat'],1,0, 'C');
    $pdf->Cell(45,6,$row['agama'],1,0, 'C');
    $pdf->Cell(45,6,$row['kwr'],1,0, 'C');
    $pdf->Cell(45,6,$row['tahun_lulus_sma'],1,0, 'C');
    $pdf->Cell(45,6,$row['nm_ayah'],1,0, 'C');
    $pdf->Cell(45,6,$row['nm_ibu'],1,0, 'C');
    $pdf->Cell(45,6,$row['prov_ortu'],1,0, 'C');
    $pdf->Cell(45,6,$row['kota_ortu'],1,0, 'C');
    $pdf->Cell(45,6,$row['alamat_ortu'],1,0, 'C');
    $pdf->Cell(45,6,$row['kode_pos'],1,0, 'C');
    $pdf->Cell(45,6,$row['no_hp_ortu'],1,0, 'C');
    $pdf->Cell(45,6,$row['pekerjaan_ayah'],1,0, 'C');
    $pdf->Cell(45,6,$row['pekerjaan_ibu'],1,0, 'C');
    $pdf->Cell(45,6,$row['penghasilan_ortu'],1,0, 'C');
    $pdf->Cell(45,6,$row['jumlah_saudara'],1,0, 'C');
    $pdf->Cell(45,6,$row['sumber_informasi'],1,0, 'C');
    $pdf->Cell(45,6,$row['foto'],1,0, 'C');
    $no++;
}
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
$tDate=date('d M Y');
$pdf->Text(10, 200, 'Makassar,: '.$tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Text(10, 205, 'POLITEKNIK INFORMATIKA NASIONAL');
$pdf->SetFont('Arial','BU', 10);
$pdf->Text(10, 240, 'Muh. Faizal Jufry,. S.Kom');
$pdf->SetFont('Arial','', 10);
$pdf->Text(10, 245, 'Kabag. Pendidikan');
$pdf->Output();
?>
?>