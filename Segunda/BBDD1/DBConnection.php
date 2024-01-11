<?php

class DBConnection {

  public $dsn;
  public $user;
  public $password;
  public $connection;
  public $db;

  public $name;

  public function __construct($configFile) {
    $config = json_decode(file_get_contents($configFile), TRUE);
    $this->dsn = "{$config['DBType']}:dbname={$config['DBName']};host={$config['Host']}";;
    $this->user = "{$config['User']}";
    $this->db = "{$config['DBType']}:host={$config['Host']}";
    $this->password = "{$config['Password']}";
    $this->name = "{$config['DBName']}";
  }

    function dbConnect() {
      try {
        $this->connection = new PDO($this->dsn, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $this->connection;
      } catch (PDOException $error) {
        echo "<h2>No existe la base de datos, creándola</h2>";
        echo $error;
        $connection = new PDO($this->db, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $query = $connection->prepare("CREATE DATABASE IF NOT EXISTS $this->name COLLATE utf8_spanish_ci");
        $query->execute();

        if($query){
      		$use_db = $connection->prepare("USE $this->name");
      		$use_db->execute();
        }
       return $connection;
      }
    }

    function CrearDB($rutaArchivo){
   
      $sql = file_get_contents($rutaArchivo);
      // Ejecutar las consultas SQL
      $this->connection->exec($sql);
    }

    function dbClose() {
       $this->connection = null;
    }

}

?>
