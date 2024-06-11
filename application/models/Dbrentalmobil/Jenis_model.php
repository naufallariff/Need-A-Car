<?php
    class Jenis_model extends CI_Model {
        // Mendefinisikan ke nama table database nya.
        private $table = 'jenis_perawatan';

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
            $sql="INSERT INTO jenis_perawatan (id, nama, harga) VALUES (default,?,?)";
            $this->db->query($sql, $data);
        }
        public function update($data) {
            $sql = "UPDATE jenis_perawatan SET nama = ?, harga = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        public function resetId($data) {
            $sql = "UPDATE jenis_perawatan SET id = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }

        public function delete($id) {
            $sql = "DELETE FROM jenis_perawatan WHERE id = ?";
            $this->db->query($sql, $id);
        } 

        public function autoInc() {
            $sql = "ALTER TABLE jenis_perawatan AUTO_INCREMENT = 0";
            $this->db->query($sql);
        }
    }
?>