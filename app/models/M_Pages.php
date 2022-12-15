
<?php
class M_Pages{//'M' represent Model (to easily reorganize this is a model )
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function getUsers(){
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();

    }

}