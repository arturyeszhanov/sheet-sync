<!DOCTYPE html>
<html>
<head>
    <title>Google Sheet Комментарии</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            font-family: sans-serif;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
        }
        th {
            background-color: #f7f7f7;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Строки с комментариями</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Комментарий</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td>{{ $row['id'] }}</td>
                    <td>{{ $row['comment'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
