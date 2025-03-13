<?php
namespace Controllers;

use Services\ForumService;

class VoteController {
    private $forumService;

    public function __construct() {
         $this->forumService = new ForumService();
    }

    public function vote() {
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $comment_id = $_POST['comment_id'];
         $vote_type = $_POST['vote_type'];

         $user_id = 1;
         
         $this->forumService->addOrUpdateVote($comment_id, $user_id, $vote_type);
     }
     header('Location: ' . $_SERVER['HTTP_REFERER']);
     exit;
 }
 
}
?>
