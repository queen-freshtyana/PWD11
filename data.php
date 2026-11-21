<?php
// PWD pertemuan 11
require_once "koneksi.php";

$versi_server = mysqli_get_server_info($koneksi);

$sql = "SELECT * from anggota";

$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows ($hasil);
echo "Jumlah data Anggota : ".$jumlah; 

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota Perpustakaan</title>
</head>
<body>
    <table border="1" cellspacing="0">
        <tr>
            <th>Id</th>
            <th>No Anggota</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Jenis Anggota</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($baris = mysqli_fetch_assoc($hasil)) { ?> 
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($baris["no_anggota"]); ?></td>
                <td><?php echo htmlspecialchars($baris["nama_lengkap"]); ?></td>
                <td><?php echo htmlspecialchars($baris["email"]); ?></td>
                <td><?php echo htmlspecialchars($baris["no_hp"]); ?></td>
                <td><?php echo htmlspecialchars($baris["jenis_anggota"]); ?></td>
                <td><?php echo htmlspecialchars($baris["alamat"]); ?></td>
                <td>
                    <a href="detail.php?id=<?php echo (int) $baris["id"]; ?>">Detail</a>
                    <form class="inline" action="hapus.php" method="post"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        <input type="hidden" name="id" value="<?php echo (int) $baris["id"]; ?>">
                        <button type="submit">Hapus</button>   
                    </form>
                </td>
            </tr>
    <?php } ?>
    </table>
    <?php mysqli_free_result($hasil);?>
</body>
</html>