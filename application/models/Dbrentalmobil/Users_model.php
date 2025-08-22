<?php
    class Users_model extends CI_Model {
        // Mendefinisikan ke nama table database nya.
        private $table = 'users';

        public function getAll() {
            $query = $this->db->get($this->table);
            return $query->result();
        }
        public function findById($id) {
            $query = $this->db->get_where('users', ['id' => $id]);
            return $query->row_array();
        }
        public function login($email) {
            $query = $this->db->get_where('users', ['email' => $email]);
            return $query->row_array();
        }
        public function lastLogin($data) {
            $sql = "UPDATE users SET last_login = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        public function updateFoto($data) {
            $sql = "UPDATE users SET foto = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        public function ubah($data) {
            $sql = "UPDATE users SET status = ?, role = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        
        public function save($data) {
            $sql="INSERT INTO users (id, username, password, email, created_at, last_login, status, role, foto) VALUES (default,?,?,?,?,?,?,?,?)";
            $this->db->query($sql, $data);
        }
        public function update($data) {
            $sql = "UPDATE users SET username = ?, email = ?, status = ?, role = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        public function resetId($data) {
            $sql = "UPDATE users SET id = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }

        public function delete($id) {
            $sql = "DELETE FROM users WHERE id = ?";
            $this->db->query($sql, $id);
        } 

        public function autoInc() {
            $sql = "ALTER TABLE users AUTO_INCREMENT = 0";
            $this->db->query($sql);
        }
    }
?>