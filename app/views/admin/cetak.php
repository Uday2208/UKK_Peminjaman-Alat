<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <link href="<?= BASE_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .header p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="header">
        <h2>Laporan Peminjaman Alat</h2>
        <p>Periode:
            <?= $data['periode']; ?>
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Peminjam</th>
                <th>Alat</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Denda</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data['peminjaman'] as $row): ?>
                <tr>
                    <td>
                        <?= $no++; ?>
                    </td>
                    <td>
                        <?= $row['nama_lengkap']; ?>
                    </td>
                    <td>
                        <?= $row['alat_pinjam']; ?>
                    </td>
                    <td>
                        <?= date('d/m/Y', strtotime($row['tanggal_pinjam'])); ?>
                    </td>
                    <td>
                        <?= date('d/m/Y', strtotime($row['tanggal_kembali_rencana'])); ?>
                    </td>
                    <td>
                        <?= ucfirst($row['status']); ?>
                    </td>
                    <td>
                        <?= number_format($row['denda'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        <?= $row['petugas_id'] ? $row['petugas_id'] : '-'; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 30px; text-align: right; margin-right: 50px;">
        <p>Mengetahui,</p>
        <br><br><br>
        <p>Admin APA</p>
    </div>

</body>

</html>