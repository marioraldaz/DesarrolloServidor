<?php
    namespace Segunda\books;
    
class Sale extends DBConnection {
    public $customer_id;
    public $id=null;
    public $date;

    public function __construct( $date, $customer_id) {
        $this->date = $date;
        $this->customer_id = $customer_id;
        parent::getConnection();
    }

    public function insert() {
        $query = DBConnection::$connection->prepare("INSERT INTO sale (customer_id, date) VALUES (:customer_id, :date)");
        $query->bindParam(':customer_id', $this->customer_id);
        $query->bindParam(':date', $this->date);
        $query->execute();
        $query2 = DBConnection::$connection->prepare("Select last_insert_id()");
        $query2->execute();
        $id=$query2->fetchAll();;
        $this->id=$id[0][0];
    }

    public static function getSalesByCostumerId($customerID) {
        $query = DBConnection::$connection->prepare("SELECT * FROM sale WHERE customer_id = :customerID");
        $query->bindParam(':customerID', $customerID);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}
