<?php
namespace Repositories;

use Config\Database;

class TopicRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllTopics() {
        $stmt = $this->db->query("SELECT * FROM topics ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function getTopicById($id) {
        $stmt = $this->db->prepare("SELECT * FROM topics WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function createTopic($title, $user_id) {
        $stmt = $this->db->prepare("INSERT INTO topics (title, user_id, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$title, $user_id]);
        return $this->db->lastInsertId();
    }

    public function updateTopic($id, $title) {
        $stmt = $this->db->prepare("UPDATE topics SET title = ? WHERE id = ?");
        return $stmt->execute([$title, $id]);
    }

    public function deleteTopicById($id) {
        $stmt = $this->db->prepare("DELETE FROM topics WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
