<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($topic['title']) ?></title>
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
        p {
            color: #666;
        }
        h2, h3 {
            color: #333;
        }
        .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            border-radius: 5px;
        }
        .comment p {
            margin: 0;
        }
        .comment small {
            color: #999;
        }
        .comment form {
            margin-top: 10px;
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
    <h1><?= htmlspecialchars($topic['title']) ?></h1>
    <p>Dibuat pada: <?= $topic['created_at'] ?> oleh User <?= $topic['user_id'] ?></p>
    
    <h2>Komentar</h2>
    <?php if(!empty($comments)): ?>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                <small>Oleh User <?= $comment['user_id'] ?> pada <?= $comment['created_at'] ?></small>
                <?php

                    $voteCounts = $this->forumService->getVoteCounts($comment['id']);
                ?>
                <p>Upvote: <?= $voteCounts['upvotes'] ?> | Downvote: <?= $voteCounts['downvotes'] ?></p>
                <a href="index.php?controller=comment&action=edit&id=<?= $comment['id'] ?>">Edit</a> |
                <a href="index.php?controller=comment&action=delete&id=<?= $comment['id'] ?>" onclick="return confirm('Yakin ingin menghapus komentar ini?')">Hapus</a>
                <form method="POST" action="index.php?controller=vote&action=vote" style="margin-top:10px;">
                    <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                    <button type="submit" name="vote_type" value="up">Upvote</button>
                    <button type="submit" name="vote_type" value="down">Downvote</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Belum ada komentar.</p>
    <?php endif; ?>

    <h3>Tambahkan Komentar</h3>
    <form method="POST" action="">
        <textarea name="content" rows="5" cols="50" required></textarea><br/><br/>
        <button type="submit">Kirim Komentar</button>
    </form>
    <p><a href="index.php">Kembali ke Daftar Topik</a></p>
</body>
</html>
