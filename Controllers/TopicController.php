<?php
namespace Controllers;

use Services\ForumService;

class TopicController {
    private $forumService;

    public function __construct() {
        $this->forumService = new ForumService();
    }

    public function index() {
        $topics = $this->forumService->getAllTopics();
        include 'views/topics/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $user_id = 1; 
            $this->forumService->createTopic($title, $user_id);
            header('Location: index.php');
            exit;
        }
        include 'views/topics/create.php';
    }

    public function view() {
        $topic_id = $_GET['id'];
        $topic = $this->forumService->getTopic($topic_id);
        $comments = $this->forumService->getCommentsByTopic($topic_id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];
            $user_id = 1; 
            $this->forumService->addComment($topic_id, $user_id, $content);
            header("Location: index.php?controller=topic&action=view&id=" . $topic_id);
            exit;
        }

        include 'views/topics/view.php';
    }

    public function edit() {
        $topic_id = $_GET['id'];
        $topic = $this->forumService->getTopic($topic_id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $this->forumService->updateTopic($topic_id, $title);
            header('Location: index.php');
            exit;
        }

        include 'views/topics/edit.php';
    }

    public function delete() {
        $topic_id = $_GET['id'];
        $this->forumService->deleteTopic($topic_id);
        header('Location: index.php');
        exit;
    }
}
?>
