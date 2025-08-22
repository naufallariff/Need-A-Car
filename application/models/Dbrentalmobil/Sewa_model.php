<?php
    class Sewa_model extends CI_Model {
        // Mendefinisikan ke nama table database nya.
        private $table = 'sewa';

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
            $sql= "INSERT INTO sewa (id, tanggal_mulai, tanggal_akhir, tujuan, noktp, users_id, mobil_id) VALUES (default,?,?,?,?,?,?)";
            $this->db->query($sql, $data);
        }
        public function update($data) {
            $sql = "UPDATE sewa SET tanggal_mulai = ?, tanggal_akhir = ?, tujuan = ?, noktp = ?, mobil_id = ?, users_id = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        public function resetId($data) {
            $sql = "UPDATE sewa SET id = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }

        public function delete($id) {
            $sql = "DELETE FROM sewa WHERE id = ?";
            $this->db->query($sql, $id);
        } 

        public function autoInc() {
            $sql = "ALTER TABLE sewa AUTO_INCREMENT = 0";
            $this->db->query($sql);
        }
    }
?>