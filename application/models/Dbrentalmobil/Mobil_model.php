<?php
    class Mobil_model extends CI_Model {
        // Mendefinisikan ke nama table database nya.
        private $table = 'mobil';

        public function getAll() {
            $query = $this->db->get($this->table);
            return $query->result();
        }
        public function findById($id) {
            $this->db->where('id', $id);
            $query = $this->db->get($this->table);
            return $query->row();
        }
        public function getByNopol($nopol) {
            $query = $this->db->get_where('mobil', ['nopol' => $nopol]);
            return $query->row_array();
        }
        public function updateFoto($data) {
            $sql = "UPDATE mobil SET foto = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        

        public function save($data) {
            $sql="INSERT INTO mobil (id, nopol, warna, biaya_sewa, deskripsi, cc, tahun, merk_id, foto) VALUES (default,?,?,?,?,?,?,?,?)";
            $this->db->query($sql, $data);
        }
        public function update($data) {
            $sql = "UPDATE mobil SET nopol = ?, warna = ?, biaya_sewa = ?, deskripsi = ?, cc = ?, tahun = ?, merk_id = ?, foto = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }
        public function resetId($data) {
            $sql = "UPDATE mobil SET id = ? WHERE id = ?";
            $this->db->query($sql, $data);
        }

        public function delete($id) {
            $sql = "DELETE FROM mobil WHERE id = ?";
            $this->db->query($sql, $id);
        } 

        public function autoInc() {
            $sql = "ALTER TABLE mobil AUTO_INCREMENT = 0";
            $this->db->query($sql);
        }
    }
?>