<?php
class DeleteModel extends CI_Model{

    // delete by id
    public function deleteById($table,$column,$val)
    {
        $this->db->where($column,$val);
        $del=$this->db->delete($table);
        if($del){
            return true;
        }
        else{
            return false;
        }
    }

    
}
?>