<?php
namespace Services;

use Repositories\TopicRepository;
use Repositories\CommentRepository;
use Repositories\VoteRepository;

class ForumService {
    private $topicRepo;
    private $commentRepo;
    private $voteRepo;

    public function __construct() {
        $this->topicRepo = new TopicRepository();
        $this->commentRepo = new CommentRepository();
        $this->voteRepo = new VoteRepository();
    }

    public function getAllTopics() {
        return $this->topicRepo->getAllTopics();
    }

    public function getTopic($id) {
        return $this->topicRepo->getTopicById($id);
    }

    public function createTopic($title, $user_id) {
        return $this->topicRepo->createTopic($title, $user_id);
    }

    public function updateTopic($id, $title) {
        return $this->topicRepo->updateTopic($id, $title);
    }

    public function deleteTopic($id) {
        return $this->topicRepo->deleteTopicById($id);
    }

    public function getCommentsByTopic($topic_id) {
        return $this->commentRepo->getCommentsByTopicId($topic_id);
    }

    public function getCommentById($id) {
        return $this->commentRepo->getCommentById($id);
    }

    public function addComment($topic_id, $user_id, $content) {
        return $this->commentRepo->createComment($topic_id, $user_id, $content);
    }

    public function updateComment($id, $content) {
        return $this->commentRepo->updateComment($id, $content);
    }
    
    public function deleteComment($id) {
        return $this->commentRepo->deleteCommentById($id);
    }

    public function addVote($comment_id, $user_id, $vote_type) {
        return $this->voteRepo->createVote($comment_id, $user_id, $vote_type);
    }

    public function addOrUpdateVote($comment_id, $user_id, $vote_type) {
        return $this->voteRepo->createOrUpdateVote($comment_id, $user_id, $vote_type);
    }

    public function getVoteCounts($comment_id) {
        return $this->voteRepo->getVoteCountsByCommentId($comment_id);
    }
    
    
   
}
?>
