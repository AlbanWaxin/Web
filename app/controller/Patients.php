<?php

require_once(APPROOT . "/librairies/Controller.php");

Class Patients extends Controller{
    
    private $patientModel;
    private $doctorModel;
    
    public function __construct()
    {
        if (!isLoggedIn()){
            redirect("doctors/login");
        }
        $this->patientModel = $this->loadModel("Patient");
        $this->doctorModel = $this->loadModel("Doctor");
    }

    public function index()
    {
        $patients = $this->patientModel->getPatients();
        $data = ['patients' => $patients];
        $this->render('index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'doctor_id' => $_SESSION['doctor_id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'health_condition' => $_POST['health_condition']
            ];
            if ($this->patientModel->addPatient($data)){
                flash("patient_message","Patient Added Successfully");
                redirect("patients");
            }else{
                die("Something went wrong");
            }
        }else{
            $data = [
                'name' => '',
                'email' => '',
                'phone' => '',
                'health_condition' => ''
            ];
            $this->render('add', $data);
        }
    }
    
}