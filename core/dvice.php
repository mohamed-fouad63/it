<?php
class Dvice{
    //db stuff
    private $conn;
    private $table = 'dvice';

    //post properties
    public $id;
    public $office_name;
    public $dvice_type;
    public $dvice_name;


 function __construct($db){
$this->conn = $db;
}
// creat query
  function read(){
    $query = 'SELECT * FROM dvice ORDER BY office_name';

    // prepare statment
$stmt = $this->conn->prepare($query);
//execte query
$stmt ->execute();

return $stmt;
}

}
?>