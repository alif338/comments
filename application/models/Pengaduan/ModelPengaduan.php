<?php
class ModelPengaduan extends CI_Model {
    protected $table_name = "trans_aduan";
    public function getData(array $conditions, array $order = [], string $select = "*", string $groupBy = ""){
        $this->db->select($select);
        $this->db->where($conditions);
        $this->db->from($this->table_name);
        $this->db->join('master_media', 'trans_aduan.media_id = master_media.media_id', 'left');
        $this->db->join('master_pic', 'trans_aduan.pic_id = master_pic.pic_id', 'left');

        if($groupBy != ""){
            $this->db->group_by($groupBy);
        }
        foreach($order as $key => $val){
            $this->db->order_by($key, $val);
        }
        return $this->db->get();
    }

    public function insertData(array $data){
        $this->db->insert($this->table_name, $data);
    }

    public function removeData(array $data){
        $this->db->delete($this->table_name, $data);
    }

    public function updateData($id, array $data = []){
        foreach ($data as $key => $value) {
            $this->db->set($key, $value);
        }
        $this->db->where('aduan_id', $id);
        $this->db->update($this->table_name);
    }
}
?>