<?php
namespace Controllers;

use Services\ForumService;

class CommentController {
    private $forumService;

    public function __construct() {
        $this->forumService = new ForumService();
    }

    public function edit() {
        $commentId = $_GET['id'];
        $comment = $this->forumService->getCommentById($commentId);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];
            $this->forumService->updateComment($commentId, $content);
            header("Location: index.php?controller=topic&action=view&id=" . $comment['topic_id']);
            exit;
        }

        include 'views/comments/edit.php';
    }

    public function delete() {
        $commentId = $_GET['id'];
        $comment = $this->forumService->getCommentById($commentId);
        $this->forumService->deleteComment($commentId);
        
        header("Location: index.php?controller=topic&action=view&id=" . $comment['topic_id']);
        exit;
    }
}
?>
