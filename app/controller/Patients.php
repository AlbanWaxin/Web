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
        //var_dump($patients);
        $data = ['patients' => $patients];
        $this->render('index', $data);
    }

    public function add()
    {
        $data = [
            "name" => "",
            "email" => "",
            "phone" => "",
            "health_condition" => "",
            "error" => [],
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($data as $key => $value) {
                if ($key == "error")
                    continue;
                if (!isset($_POST[$key])) {
                    array_push($data["error"], "Enter an $key");
                } else {
                    $data[$key] = $_POST[$key];

                    if ($_POST[$key] == "")
                        array_push($data['error'], "$key can't be empty");
                }
            }

            if (count($data['error']) == 0) {
                $newPatient = $this->patientModel->addPatient([
                    "doctor_id" => $_SESSION["doctor_id"],
                    "name" => $_POST["name"],
                    "email" => $_POST["email"],
                    "phone" => $_POST["phone"],
                    "health_condition" => $_POST["health_condition"],
                ]);
            }
        }


        $this->render('add', $data);
    }

    public function edit($id){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                "name" => "",
                "email" => "",
                "phone" => "",
                "health_condition" => "",
                "error" => [],
                "id" => $id
            ];
            foreach ($data as $key => $value) {
                if ($key == "error" || $key == "id")
                    continue;
                if (!isset($_POST[$key])) {
                    array_push($data["error"], "Enter an $key");
                } else {
                    $data[$key] = $_POST[$key];

                    if ($_POST[$key] == "")
                        array_push($data['error'], "$key can't be empty");
                    }
                }
                if (count($data['error']) == 0) {
                    $newPatient = $this->patientModel->updatePatient([
                        "doctor_id" => $_SESSION["doctor_id"],
                        "name" => $_POST["name"],
                        "email" => $_POST["email"],
                        "phone" => $_POST["phone"],
                        "health_condition" => $_POST["health_condition"],
                    ], $id);
                    redirect("patients/index");

                }
                $this->render('edit', $data);
        }
        else{
            $patient = $this->patientModel->getPatientById($id);
            $data = [
                "name" => $patient[0]["name"],
                "email" => $patient[0]['email'],
                "phone" => $patient[0]["phone"],
                "health_condition" => $patient[0]["health_condition"],
                "error" => [],
                "id" => $id
            ];
            $this->render('edit', $data);
        }
    }
    
    public function delete($id){
        $this->patientModel->deletePatient($id);
        redirect("patients/index");
    }

    public function show($id){
        $patient = $this->patientModel->getPatientById($id);
        
        $data = [
            "name" => $patient[0]["name"],
            "email" => $patient[0]['email'],
            "phone" => $patient[0]["phone"],
            "health_condition" => $patient[0]["health_condition"],
            "id" => $id
        ];
        $this->render('show', $data);
    }
}