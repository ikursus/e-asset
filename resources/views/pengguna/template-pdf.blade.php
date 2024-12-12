<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($senaraiPengguna as $pengguna)
            <tr>
                <td>{{ $pengguna->id }}</td>
                <td>{{ $pengguna->name }}</td>
                <td>{{ $pengguna->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
