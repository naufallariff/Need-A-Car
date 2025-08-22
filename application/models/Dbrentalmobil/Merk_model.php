<?php
    class Merk_model extends CI_Model {
        // Mendefinisikan ke nama table database nya.
        private $table = 'merk';

        public function getAll() {
            $query = $this->db->get($this->table);
            return $query->result();
        }

        public function findById($id) {
            $this->db->where('id', $id);
            $query = $this->db->get($this->table);
            return $query->row();
        }

        public function save($data) {
            $sql="INSERT INTO merk (id, nama, produk) VALUES (default,?,?)";
            $this->db->query($sql, $data);
        }
        public function update($data) {
            $sql = "UPDATE merk SET nama = ?, produk = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        public function resetId($data) {
            $sql = "UPDATE merk SET id = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }

        public function delete($id) {
            $sql = "DELETE FROM merk WHERE id = ?";
            $this->db->query($sql, $id);
        } 

        public function autoInc() {
            $sql = "ALTER TABLE merk AUTO_INCREMENT = 0";
            $this->db->query($sql);
        }
    }
?>