<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pegawai.xls");
    ?>

	<center>
		<h1>Laporan Data Mahasiswa Aktif<br/> Universitas Nasional PASIM</h1>
	</center>

	<table border="1">
        <tr>
            <th>Nim</th>
            <th>Nama Mahasiswa</th>
            <th>Prodi</th>
            <th>Kelas</th>
            <th>Status</th>                                    
            <th>Agama</th>                                    
            <th>Tanggal Lahir</th>                                    
            <th>Tempat Lahir</th>                                    
            <th>Jenis Kelamin</th>
            <th>Tahun Angkatan</th>
            <th>Alamat</th>                                    
        </tr>
		<?php $no=1; foreach($data as $item):?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $item['nim']?></td>
            <td><?= $item['nama_mahasiswa']?></td>
            <td><?= $item['nama_program_studi']?></td>
            <td></td>
            <td><?= $item['nama_status_mahasiswa']?></td>
            <td><?= $item['nama_agama']?></td>
            <td><?= $item['tanggal_lahir']?></td>
            <td></td>
            <td><?= $item['jenis_kelamin'] == "L" ? "Laki-laki" : "Perempuan" ?></td>
            <td><?= $item['nama_periode_masuk']?></td>
        </tr>
		<?php endforeach;?>
	</table>
</body>
</html>