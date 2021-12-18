<?php
class ModelPengaduan extends CI_Model {
    protected $table_name = "trans_aduan";
    public function getData(array $conditions){
        $this->db->where($conditions);
        $this->db->from($this->table_name);
        $this->db->join('master_media', 'trans_aduan.media_id = master_media.media_id');
        $this->db->join('master_pic', 'trans_aduan.pic_id = master_pic.pic_id');
        return $this->db->get()->result();
    }

    public function insertData(array $data){
        $this->db->insert($this->table_name, $data);
    }
}
?>