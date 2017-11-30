<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th style="text-align: left">{{ $blog->title }}</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td> {{ $blog->body }} </td>
    </tr>
    </tbody>
</table>
<p>Thank you for choosing TheBlogger.</p>
</body>
</html>