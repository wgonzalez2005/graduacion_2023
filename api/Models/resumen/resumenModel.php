<?php
class resumenModel extends Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function signup($usr, $pass)
    {
  
        
        try {

            $sql   = "call signup(:cuenta,:pass);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':cuenta', $usr);
            $query->bindParam(':pass', $pass);
            $query->execute();
            $re = $query->fetch(PDO::FETCH_ASSOC);
            return $re;
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function updateClientes($id)
    {
        try {
            $sql   = "call updateClientes(:id);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();
            //$re = $query->fetch(PDO::FETCH_ASSOC);
            return [];
        } catch (PDOEception $e) {
            return [];
        }
    }

}
