<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Komentar</title>
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
        textarea {
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
    <h1>Edit Komentar</h1>
    <form method="POST" action="index.php?controller=comment&action=edit&id=<?= $comment['id'] ?>">
        <textarea name="content" rows="5" cols="50"><?= htmlspecialchars($comment['content']) ?></textarea><br/><br/>
        <button type="submit">Update Komentar</button>
    </form>
    <p><a href="index.php?controller=topic&action=view&id=<?= $comment['topic_id'] ?>">Kembali ke Topik</a></p>
</body>
</html>
