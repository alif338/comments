<?php
class ModelKeluarga extends CI_Model {
    public function GetKeluarga($filter = array())
    {
        $query = $this->db->get_where('t_master_kk', $filter);

        return $query->result();
    }
    
    public function JumlahKeluarga()
    {
        return $this->db->get_where('t_master_kk', array())->num_rows();
    }
    
    public function PaginationKeluarga($start, $limit, $order, $dir, $search = ""){
        $filterSearch = "";
        $filterOrder = "";
        if ($search != "") {
            $filterSearch = "AND master_kk_nomor LIKE '%" . $search . "%' OR 
            master_kk_kepala_keluarga LIKE '%" . $search . "%' OR 
            master_kk_rt LIKE '%" . $search . "%' OR 
            master_kk_rw LIKE '%" . $search . "%'";
        }
        switch ($order) {
            case 0:
                $filterOrder = "ORDER BY master_kk_nomor " . $dir;
                break;

            case 1:
                $filterOrder = "ORDER BY master_kk_kepala_keluarga " . $dir;
                break;

            case 2:
                $filterOrder = "ORDER BY master_kk_rt " . $dir;
                break;

            case 3:
                $filterOrder = "ORDER BY master_kk_rw " . $dir;
                break;

            case 4:
                $filterOrder = "ORDER BY master_kk_mampu " . $dir;
                break;

            default:
                $filterOrder = "ORDER BY updated_at DESC";
                break;
        }
        $qall = $this->db->query("SELECT * FROM t_master_kk WHERE master_kk_nomor <> '' " . $filterSearch);
        $query = $this->db->query("SELECT * FROM t_master_kk WHERE master_kk_nomor <> '' " . $filterSearch . " " . $filterOrder . " LIMIT $start,$limit");

        return array('data' => $query->result_array(), 'total' => $qall->num_rows(), 'filter' => $qall->num_rows());
    }
}
