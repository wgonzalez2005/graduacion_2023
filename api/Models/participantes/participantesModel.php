<?php
class participantesModel extends Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function getParticipantes($bus)
    {        
        try {
            $sql   = "call getBuscarGraduando(:bus);";
            $query = $this->db->conectar()->prepare($sql); 
            $query->bindParam(':bus', $bus);             
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function InsertarParticipantes($bus,$autobusId,$participanteId)
    {        
        try {
            $sql   = "call InsertarParticipantes(:bus,:participanteId,:autobusId);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':bus', $bus); 
            $query->bindParam(':participanteId', $participanteId);   
            $query->bindParam(':autobusId', $autobusId);                 
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
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
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOEception $e) {
            return [];
        }
    }


    public function getParticipantesAutobus($autobusId)
    {        
        try {
            $sql   = "call getGraduandoAutobus(:autobusId);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':autobusId', $autobusId);                    
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function getQuitarGraduando($autobusId,$graduandoId)
    {        
        try {
            $sql   = "call QuitarGraduando(:autobusId,:graduandoId);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':autobusId', $autobusId);
            $query->bindParam(':graduandoId', $graduandoId);                        
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function getParticipantesEnAutobuses($bus)
    {        
        try {
            $sql   = "call getBuscarGraduandoAutobus(:bus);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':bus', $bus);                    
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOEception $e) {
            return [];
        }
    }
      
    public function getBuscarGraduandoEnAutobus($bus,$autobusId)
    {        
        try {
            $sql   = "call getBuscarGraduandoEnAutobus(:bus,:autobusId);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':bus', $bus); 
            $query->bindParam(':autobusId', $autobusId);                 
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function Presente($op,$autobusId,$graduandoId)
    {        
        try {
            $sql   = "call UpdatePresente(:op,:graduandoId,:autobusId);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':op', $op); 
            $query->bindParam(':graduandoId', $graduandoId); 
            $query->bindParam(':autobusId', $autobusId);                 
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOEception $e) {
            return [];
        }
    }

    public function getCantidadAll()
    {        
        try {
            $sql   = "call getCantidadAll();";
            $query = $this->db->conectar()->prepare($sql);                        
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOEception $e) {
            return [];
        }
    }

    
   
}
