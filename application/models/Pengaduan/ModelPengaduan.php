<?php
class ModelPengaduan extends CI_Model {
    protected $table_name = "trans_aduan";
    public function getData(array $conditions){
        $this->db->where($conditions);
        $this->db->from($this->table_name);
        return $this->db->get()->result();
    }

    public function insertData(array $data){
        $this->db->insert($this->table_name, $data);
    }
}
?>