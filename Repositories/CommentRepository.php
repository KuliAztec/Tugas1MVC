<?php
namespace Repositories;

use Config\Database;

class CommentRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getCommentsByTopicId($topic_id) {
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE topic_id = ? ORDER BY created_at ASC");
        $stmt->execute([$topic_id]);
        return $stmt->fetchAll();
    }

    public function getCommentById($id) {
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function createComment($topic_id, $user_id, $content) {
        $stmt = $this->db->prepare("INSERT INTO comments (topic_id, user_id, content, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$topic_id, $user_id, $content]);
        return $this->db->lastInsertId();
    }

    public function updateComment($id, $content) {
        $stmt = $this->db->prepare("UPDATE comments SET content = ? WHERE id = ?");
        return $stmt->execute([$content, $id]);
    }

    public function deleteCommentById($id) {
        $stmt = $this->db->prepare("DELETE FROM comments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
