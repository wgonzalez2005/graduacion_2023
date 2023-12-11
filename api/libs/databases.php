<?php
class Databases
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    const SALT = 'EstoEsUnSalt';

    public function __construct()
    {
        $this->host     = constant('HOST');
        $this->user     = constant('USER');
        $this->password = constant('PASSWORD');
        $this->db       = constant('DB');
        $this->charset  = constant('CHARSET');
    }

    public function conectar()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options    = [
                PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        } catch (PDOExeption $e) {
            print_r('Error Conection' . $e . getMessage());
        }
    }

    public function hash($password)
    {
        return hash('sha512', self::SALT . $password);
    }
    public function verify($password, $hash)
    {
        return ($hash == self::hash($password));
    }
}
