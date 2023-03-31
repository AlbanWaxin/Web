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

            if (!$newPatient) {
                array_push($data['error'], "An error occured. Try again later");
            } else {
                redirect("patients");
            }
        }


        $this->render('add', $data);
    }

    public function show($id)
    {
        $data = $this->PatientModel->findByID($id);
        $this->render("show", $data);
    }

    public function edit($patient_id)
    {
        $patient = $this->PatientModel->findByID($patient_id);

        $data = [
            "id" => $patient['id'],
            "doctor_id" => $patient["doctor_id"],
            "name" => $patient["name"],
            "email" => $patient["email"],
            "phone" => $patient["phone"],
            "health_condition" => $patient["health_condition"],
            "error" => []
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($data as $key => $value) {
                if (in_array($key, ["id", "doctor_id", "error"]))
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
                $newPatient = $this->PatientModel->update(
                    $patient_id,
                    $_SESSION["doctor_id"],
                    $data["name"],
                    $data["email"],
                    $data["phone"],
                    $data["health_condition"]
                );
            }

            if (!$newPatient) {
                array_push($data['error'], "An error occured. Try again later");
            } else {
                redirect("patients");
            }
        }

        $this->render('edit', $data);
    }

    public function delete($id)
    {
        $this->PatientModel->delete($id);
        redirect("patients");
    }
}
