<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Xin chào mọi người</h1>
    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Major</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($sinhvien as $value):?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['age'] ?></td>
                    <td><?= $value['major'] ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>