<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Forum Topics</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Forum</h1>
    <a href="index.php?controller=topic&action=create" class="btn">Buat Topik Baru</a>
    <table id="topicsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>User ID</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topics as $topic): ?>
            <tr>
                <td><?= $topic['id'] ?></td>
                <td><?= htmlspecialchars($topic['title']) ?></td>
                <td><?= $topic['user_id'] ?></td>
                <td><?= $topic['created_at'] ?></td>
                <td>
                    <a href="index.php?controller=topic&action=view&id=<?= $topic['id'] ?>">Lihat</a> |
                    <a href="index.php?controller=topic&action=edit&id=<?= $topic['id'] ?>">Edit</a> |
                    <a href="index.php?controller=topic&action=delete&id=<?= $topic['id'] ?>" onclick="return confirm('Yakin ingin menghapus topik ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
    $(document).ready(function () {
        $('#topicsTable').DataTable();
    });
    </script>
</body>
</html>
