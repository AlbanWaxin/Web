<?php
require_once(APP_ROOT . "/librairies/Controller.php");

class Patients extends Controller
{
    private $PatientModel;

    public function __construct()
    {
        $this->PatientModel = $this->loadModel('Patient');

        if (!isLoggedIn()) {
            redirect('');
        }
    }

    public function index()
    {
        $patients = $this->PatientModel->getByDoctor($_SESSION['doctor_id']);


        $this->render('index', ['patients' => $patients]);
    }

    public function add()
    {
        $data = [
            "name" => "",
            "email" => "",
            "phone" => "",
            "health_condition" => "",
            "error" => []
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
                $newPatient = $this->PatientModel->create([
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

    public function show()
    {
    }

    public function edit()
    {
    }
}
