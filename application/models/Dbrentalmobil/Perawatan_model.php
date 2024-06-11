<?php
    class Perawatan_model extends CI_Model {
        // Mendefinisikan ke nama table database nya.
        private $table = 'perawatan';

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
            $sql="INSERT INTO perawatan (id, tanggal, km_mobil, deskripsi, mobil_id, jenis_perawatan_id) VALUES (default,?,?,?,?,?)";
            $this->db->query($sql, $data);
        }
        public function update($data) {
            $sql = "UPDATE perawatan SET tanggal = ?, km_mobil = ?, deskripsi = ?, mobil_id = ?, jenis_perawatan_id = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        public function resetId($data) {
            $sql = "UPDATE perawatan SET id = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }

        public function delete($id) {
            $sql = "DELETE FROM perawatan WHERE id = ?";
            $this->db->query($sql, $id);
        } 

        public function autoInc() {
            $sql = "ALTER TABLE perawatan AUTO_INCREMENT = 0";
            $this->db->query($sql);
        }
    }
?>