<?php
class autobusModel extends Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function getAutobus()
    {
  
        
        try {

            $sql   = "call getAutobuses();";
            $query = $this->db->conectar()->prepare($sql);          
            $query->execute();
            $re = $query->fetchAll(PDO::FETCH_ASSOC);
            return $re;
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function UpdateAutobus($id)
    {
        try {
            $sql   = "call UpdateAutobus(:id);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();
            $re = $query->fetchAll(PDO::FETCH_ASSOC);
            return $re;
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function getCoordinadores()
    {
        try {
            $sql   = "call getCoordinadores();";
            $query = $this->db->conectar()->prepare($sql);        
            $query->execute();
            $re = $query->fetchAll(PDO::FETCH_ASSOC);
            return $re;
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function BuscarCoordinadores($bus)
    {
        try {
            $sql   = "call BuscarAutobuses(:bus);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':bus', $bus);        
            $query->execute();
            $re = $query->fetchAll(PDO::FETCH_ASSOC);
            return $re;
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function getCantidad($autobusId)
    {
        try {
            $sql   = "call getCantidad(:autobusId);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':autobusId', $autobusId);        
            $query->execute();
            $re = $query->fetchAll(PDO::FETCH_ASSOC);
            return $re;
        } catch (PDOEception $e) {
            return [];
        }
    }
    

}
