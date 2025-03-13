<?php
namespace Repositories;

use Config\Database;

class VoteRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createVote($comment_id, $user_id, $vote_type) {
        
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM votes WHERE comment_id = ? AND user_id = ?");
        $stmt->execute([$comment_id, $user_id]);
        if ($stmt->fetchColumn() > 0) {
            return false; 
        }

        $stmt = $this->db->prepare("INSERT INTO votes (comment_id, user_id, vote_type) VALUES (?, ?, ?)");
        return $stmt->execute([$comment_id, $user_id, $vote_type]);
    }

    public function getVotesByCommentId($comment_id) {
        $stmt = $this->db->prepare("SELECT SUM(CASE WHEN vote_type = 'up' THEN 1 WHEN vote_type = 'down' THEN -1 ELSE 0 END) as total_votes FROM votes WHERE comment_id = ?");
        $stmt->execute([$comment_id]);
        return $stmt->fetch();
    }
    
    public function getVoteCountsByCommentId($comment_id) {
        $stmt = $this->db->prepare("SELECT 
            COALESCE(SUM(CASE WHEN vote_type = 'up' THEN 1 ELSE 0 END), 0) AS upvotes,
            COALESCE(SUM(CASE WHEN vote_type = 'down' THEN 1 ELSE 0 END), 0) AS downvotes
            FROM votes
            WHERE comment_id = ?");
        $stmt->execute([$comment_id]);
        return $stmt->fetch();
    }
    
    public function createOrUpdateVote($comment_id, $user_id, $vote_type) {
        $stmt = $this->db->prepare(
            "INSERT INTO votes (comment_id, user_id, vote_type)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE vote_type = VALUES(vote_type)"
        );
        return $stmt->execute([$comment_id, $user_id, $vote_type]);
    }

}
?>
