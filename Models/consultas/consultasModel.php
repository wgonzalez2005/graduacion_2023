<?php
class consultasModel extends Model
{

    private static $b = [];
    public function __construct()
    {
        parent::__construct();
      

    }


    
        public function getAutobuses()
        {
            $items = [];
           
            try {
                $sql   = "call getAutobuses();";
                $query = $this->db->conectar()->prepare($sql);                 
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOEception $e) {
                return [];
            }
        }

        public function getParticipantesAutobus()
        {
            $items = [];
           
            try {
                $autobusId = $_POST["id"];

                $sql   = "call getGraduandoAutobus(:autobusId);";
                $query = $this->db->conectar()->prepare($sql);  
                $query->bindParam(':autobusId', $autobusId);               
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOEception $e) {
                return [];
            }
        }


        

    public function UpdateEntregar()
    {
    
            $items = [];
           
            try {
                $graduandoId = $_POST["id"];
                $autobusId = $_POST["autobusId"];
          
                $sql   = "call UpdateEntregado(:autobusId,:graduandoId);";
                $query = $this->db->conectar()->prepare($sql);                 
                $query->bindParam(':autobusId', $autobusId);
                $query->bindParam(':graduandoId', $graduandoId);                
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);


            } catch (PDOEception $e) {
                return [];
            }
        }


        public function UpdateEntregar2()
        {
        
                $items = [];
               
                try {
                    $graduandoId = $_POST["id"];
                    $bus = "%".$_POST["bus"]."%";
              
                    $sql   = "call UpdateEntregado2(:bus,:graduandoId);";
                    $query = $this->db->conectar()->prepare($sql);                 
                    $query->bindParam(':bus', $bus);
                    $query->bindParam(':graduandoId', $graduandoId);                
                    $query->execute();
                    return $query->fetchAll(PDO::FETCH_ASSOC);
    
    
                } catch (PDOEception $e) {
                    return [];
                }
            }
    public function BuscarGraduandos($bus)
    {
    
            $items = [];
           
            try {
                $sql   = "call getBuscarGraduandosAll(:bus);";
                $query = $this->db->conectar()->prepare($sql);                 
                $query->bindParam(':bus', $bus);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);


            } catch (PDOEception $e) {
                return [];
            }
        }
        
    //     /*ASISTENCIA */
    //     public function getDatosAsistencia()
    //     {
        
    //             $items = [];
               
    //             try {
    //                 $sql   = "call getGraduandoPresentes();";
    //                 $query = $this->db->conectar()->prepare($sql);                 
    //                 $query->execute();
    //                 return $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    //             } catch (PDOEception $e) {
    //                 return [];
    //             }
    //         }
        

    //         public function BuscarGraduandosPresentes($bus)
    //         {
            
    //                 $items = [];
                   
    //                 try {
    //                     $sql   = "call getBuscarGraduandoPresente(:bus);";
    //                     $query = $this->db->conectar()->prepare($sql);                 
    //                     $query->bindParam(':bus', $bus);
    //                     $query->execute();
    //                     return $query->fetchAll(PDO::FETCH_ASSOC);
        
        
    //                 } catch (PDOEception $e) {
    //                     return [];
    //                 }
    //             }


    //             /*OCUPACION */

    //             public function getDatosOcupacion()
    //             {                
    //                     $items = [];
                       
    //                     try {
    //                         $sql   = "call getEstadisticasOcupacion();";
    //                         $query = $this->db->conectar()->prepare($sql);                 
    //                         $query->execute();
    //                         return $query->fetchAll(PDO::FETCH_ASSOC);           
    //                     } catch (PDOEception $e) {
    //                         return [];
    //                     }
    //                 }


    //                 public function getDatosOcupacionId($id)
    //                 {                    
    //                         $items = [];                           
    //                         try {
    //                             $sql   = "call getGraduandosIdOcupacion(:id);";
    //                             $query = $this->db->conectar()->prepare($sql);                 
    //                             $query->bindParam(':id', $id);
    //                             $query->execute();
    //                             return $query->fetchAll(PDO::FETCH_ASSOC);               
    //                         } catch (PDOEception $e) {
    //                             return [];
    //                         }
    //                 }

                    
    //             /*FAMILIAS */

    //             public function getDatosFamilias()
    //             {                
    //                     $items = [];
                       
    //                     try {
    //                         $sql   = "call getEstadisticasFamilias();";
    //                         $query = $this->db->conectar()->prepare($sql);                 
    //                         $query->execute();
    //                         return $query->fetchAll(PDO::FETCH_ASSOC);           
    //                     } catch (PDOEception $e) {
    //                         return [];
    //                     }
    //                 }


    //                 public function getDatosFamiliasId($id)
    //                 {                    
    //                         $items = [];                           
    //                         try {
    //                             $sql   = "call getGraduandosIdFamilia(:id);";
    //                             $query = $this->db->conectar()->prepare($sql);                 
    //                             $query->bindParam(':id', $id);
    //                             $query->execute();
    //                             return $query->fetchAll(PDO::FETCH_ASSOC);               
    //                         } catch (PDOEception $e) {
    //                             return [];
    //                         }
    //                 }
                  
                    

                    
        

}