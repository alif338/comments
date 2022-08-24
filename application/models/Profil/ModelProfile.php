<?php 
  class ModelProfile extends CI_Model {
    protected $table_name = 'profil';
    public function getProfil() {
      $this->db->from($this->table_name);
      return $this->db->get();
    }

    public function updateProfil($id, array $data = []) {
      foreach ($data as $key => $value) {
        $this->db->set($key, $value);
      }
      $this->db->where('id', $id);
      return $this->db->update($this->table_name);
    }
  }
?>