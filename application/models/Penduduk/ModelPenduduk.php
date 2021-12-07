<?php
class ModelPenduduk extends CI_Model {
    public function RawQuery($string = ""){
        $this->db->query($string);
    }
    public function GetPenduduk($filter = array()){
        $query = $this->db->get_where('t_master_penduduk', $filter);
        
        return $query->result();
    }
    
    public function GetPengguna($nik = 0){
        $filter = "<>";
        if($nik != 0){
            $filter = "=";
        }
        $q = $this->db->query("SELECT B.*, A.master_pengguna_email, A.master_pengguna_device, A.status, A.master_pengguna_hp FROM t_master_pengguna A LEFT JOIN t_master_penduduk B ON A.master_penduduk_nik = B.master_penduduk_nik WHERE A.master_penduduk_nik {$filter} '{$nik}'");
        
        return $q->result();
    }
    
    public function RemovePengguna($id){
        $this->db->query("DELETE FROM t_master_pengguna WHERE master_penduduk_nik = '{$id}'");
    }

    public function UpdatePengguna($id, $data = array()){
        $this->db->where("master_penduduk_nik", $id);
        $this->db->update("t_master_pengguna", $data);
    }

    public function JumlahPenduduk(){
        return $this->db->get_where('t_master_penduduk', array())->num_rows();
    }

    public function PaginationPenduduk($start, $limit, $order, $dir, $search = ""){
        $filterSearch = "";
        $filterOrder = "";
        if ($search != "") {
            $filterSearch = "AND master_penduduk_nik LIKE '%" . $search . "%' OR 
            master_penduduk_nama LIKE '%" . $search . "%' OR 
            master_penduduk_status LIKE '%" . $search . "%' OR 
            master_penduduk_agama LIKE '%" . $search . "%' OR 
            master_penduduk_pendidikan LIKE '%" . $search . "%' OR 
            master_penduduk_pekerjaan LIKE '%" . $search . "%' OR 
            master_penduduk_agama LIKE '%" . $search . "%'";
        }
        switch ($order) {
            case 0:
                $filterOrder = "ORDER BY master_penduduk_nik " . $dir;
                break;
            case 1:
                $filterOrder = "ORDER BY master_penduduk_nama " . $dir;
                break;

            case 2:
                $filterOrder = "ORDER BY master_penduduk_status " . $dir;
                break;

            case 3:
                $filterOrder = "ORDER BY master_penduduk_pekerjaan " . $dir;
                break;

            case 4:
                $filterOrder = "ORDER BY master_penduduk_pendidikan " . $dir;
                break;

            case 5:
                $filterOrder = "ORDER BY master_penduduk_agama " . $dir;
                break;

            default:
                $filterOrder = "ORDER BY updated_at DESC";
                break;
        }
        $qall = $this->db->query("SELECT * FROM t_master_penduduk WHERE master_kk_nomor <> '' " . $filterSearch);
        $query = $this->db->query("SELECT * FROM t_master_penduduk WHERE master_kk_nomor <> '' " . $filterSearch . " " . $filterOrder . " LIMIT $start,$limit");
        
        return array('data' => $query->result_array(), 'total' => $qall->num_rows(), 'filter' => $qall->num_rows());
    }
}
?>