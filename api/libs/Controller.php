<?php
class Controller
{
    public function __construct()
    {

        $model      = get_class($this);
        $this->view = new View();

        if (isset($_SESSION['ULTIMA_ACTIVIDAD']) && isset($_SESSION['MAX_SESSION_TIEMPO']) && ((time() - $_SESSION['ULTIMA_ACTIVIDAD']) > $_SESSION['MAX_SESSION_TIEMPO'])) {
            session_destroy();
            $uri = constant('RUTA') . "login/ValidarUsuario";
            header('location:' . $uri);
        }

        $_SESSION['ULTIMA_ACTIVIDAD'] = time();

        if (isset($_POST['token'])) {
            $_SESSION['token'] = $_POST['token'];
        }

        $url = "Models/" . $model . "/" . $model . "Model.php";
        if (file_exists($url)) {
            require $url;
            $modelName   = $model . "Model";
            $this->model = new $modelName;
        }
    }
    
    public function getUserDomain($user,$pass){
        $ldaprdn = trim($user).'@'.DOMINIO; 
        $ldappass = trim($pass); 
        $ds = DOMINIO; 
        $dn = DN;  
        $puertoldap = 389; 
        $ldapconn = ldap_connect($ds,$puertoldap);
        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION,3); 
        ldap_set_option($ldapconn, LDAP_OPT_REFERRALS,0); 
        $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass); 
        if ($ldapbind){
            $filter="(|(SAMAccountName=".trim($user)."))";
            $fields = array("SAMAccountName"); 
            $sr = @ldap_search($ldapconn, $dn, $filter, $fields); 
            $info = @ldap_get_entries($ldapconn, $sr); 
        $array = $info[0]["samaccountname"][0];
            $array = $info;
        }else{ 
                $array=0;
        } 
        ldap_close($ldapconn); 
        return $array;
    } 
}