<?php
class autobusModel extends Model
{

    private static $b = [];
    public function __construct()
    {
        parent::__construct();
        if (isset($_POST['token'])) {
            self::$b            = Auth::getData($_SESSION['token']);
            $_SESSION['id']     = self::$b->id;
            $_SESSION['cuenta']  = self::$b->cuenta;
            $_SESSION['cobrador'] = self::$b->cobrador;
        }

    }

    public function getClientesPrestamos()
    {
     if (self::$b->id == $_SESSION['id']) {
        $items = [];
        $cobradorId=self::$b->cobrador;
        try {
            $sql   = "call getClientesAll(:cobrador);";
            $query = $this->db->conectar()->prepare($sql);
            $query->bindParam(':cobrador', $cobradorId);       
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOEception $e) {
            return [];
        }

    }

    }

    public function getBuscarClientesPrestamos($bus)
    {
        if (self::$b->id == $_SESSION['id']) {
            $items = [];
            $cobradorId=self::$b->cobrador;
            try {
                $sql   = "call buscarClientesAll(:cobrador,:bus);";
                $query = $this->db->conectar()->prepare($sql); 
                $query->bindParam(':cobrador', $cobradorId);
                $query->bindParam(':bus', $bus);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOEception $e) {
                return [];
            }
        }
    }

}
