<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Topik</title>
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
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Edit Topik</h1>
    <form method="POST" action="index.php?controller=topic&action=edit&id=<?= $topic['id'] ?>">
        <label>Judul:</label><br/>
        <input type="text" name="title" value="<?= htmlspecialchars($topic['title']) ?>" required/><br/><br/>
        <button type="submit">Update Topik</button>
    </form>
    <p><a href="index.php">Kembali ke Daftar Topik</a></p>
</body>
</html>
