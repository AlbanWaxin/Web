<?php
require_once(APP_ROOT . "/librairies/Database.php");

class Patient
{

    private $db;
    private $table = "patient";
    public $id;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create($data)
    {
        $sql = "INSERT INTO $this->table (doctor_id,name ,email, phone, health_condition) VALUES (:doctor_id,:name ,:email, :phone, :health_condition)";
        $this->db->query($sql);
        return $this->db->execute($data);
    }

    public function update($id, $doctor_id, $name, $email, $phone, $health_condition)
    {

        $sql = "UPDATE $this->table SET doctor_id = :doctor_id ,name = :name ,email = :email, phone = :phone, health_condition = :health_condition WHERE id = :id";
        $this->db->query($sql);

        return $this->db->execute([
            "id" => $id,
            "doctor_id" => $doctor_id,
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "health_condition" => $health_condition
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($sql);
        return $this->db->execute(["id" => $id]);
    }


    public function findByID($id)
    {
        $sql = "SELECT * FROM $this->table  WHERE id = :id";
        $this->db->query($sql);
        $this->db->execute(['id' => $id]);

        return $this->db->single();
    }

    public function getByDoctor($doctorId)
    {
        $sql = "SELECT * FROM $this->table WHERE doctor_id = :doctor_id";
        $this->db->query($sql);
        $this->db->execute(['doctor_id' => $doctorId]);

        return $this->db->resultSet();
    }
}
