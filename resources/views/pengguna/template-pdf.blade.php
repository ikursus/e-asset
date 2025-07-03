<!DOCTYPE html>
<html>
<head>
    <title>Senarai Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Senarai Pengguna Sistem</h2>
        <p>Tarikh: {{ now()->format('d/m/Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Bil</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. KP</th>
                <th>No. Kakitangan</th>
                <th>Phone</th>
                <th>Bahagian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($senaraiPengguna as $key => $pengguna)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $pengguna->name }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->no_kp }}</td>
                <td>{{ $pengguna->no_kakitangan }}</td>
                <td>{{ $pengguna->phone }}</td>
                <td>{{ $pengguna->bahagian->nama ?? 'Tiada' }}</td>
                <td>{{ ucfirst($pengguna->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Laporan dijana melalui Sistem e-Asset</p>
    </div>
</body>
</html>
