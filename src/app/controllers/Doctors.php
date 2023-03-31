<?php
require_once(APP_ROOT . "/librairies/Controller.php");

class Doctors extends Controller
{
    private $DoctorModel;

    public function __construct()
    {
        $this->DoctorModel = $this->loadModel('Doctor');
    }

    public function register()
    {
        $data = [
            "name" => "",
            "email" => "",
            "password" => "",
            "password2" => "",
            "gender" => "",
            "specialist" => "",
            "error" => []
        ];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            foreach ($data as $key => $value) {
                if($key == "error")
                    continue;
                if(!isset($_POST[$key])){
                    array_push($data["error"], "Enter an $key");
                } else {
                    $data[$key] = $_POST[$key];

                    if($_POST[$key] == "")
                        array_push($data['error'], "$key can't be empty");

                }
            }

            if ( isset($_POST['password']) && isset($_POST['password2']) && $_POST['password'] != $_POST['password2'])
                array_push($data['error'], "password and password confirmation not equal");

            if(isset($_POST['email']) && $this->DoctorModel->findByEmail($_POST['email']))
                array_push($data['error'], "email ".$_POST['email']." already in use");


            if (count($data['error']) == 0) {
                $newDoctor = $this->DoctorModel->create([
                    "name" => $_POST["name"],
                    "email" => $_POST["email"], 
                    "password" => $_POST["password"],
                    "specialist" => $_POST["specialist"],
                    "gender" => $_POST["gender"]]);
                
                    if ($newDoctor) {
                        $this->createDoctorSession($newDoctor);
                } 
            }
        }

        $this->render("register", $data);
    }

    public function login(){
        $data = [
            "email" => "",
            "password" => "",
            "error" => []
        ];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['email'])) {
                array_push($data['error'], 'Enter an Email');
            } else {
                $data['email'] = $_POST['email'];
            }

            if (isset($_POST['email']) && $_POST['email'] == "")
                array_push($data['error'], "Email can't be ampty");


            if (!isset($_POST['password'])) {
                array_push($data['error'], 'Enter an Password');
            } else {
                $data['password'] = $_POST['password'];
            }

            if (isset($_POST['password']) && $_POST['password'] == "")
                array_push($data['error'], 'Password can\'t be empty');

            if (count($data['error']) == 0) {
                $loggedInDoctor = $this->DoctorModel->login($_POST['email'], $_POST['password']);
                // echo "BBBh";

                if ($loggedInDoctor) {
                    // echo "AAAh";
                    // var_dump($loggedInDoctor);

                    $this->createDoctorSession($loggedInDoctor);
                } else {
                    array_push($data['error'], 'Invalid Email or Password');
                }
            }
        }

        $this->render("login", $data);
    }

    public function logout()
    {
        session_destroy();
        redirect("pages/index");
    }

    public function patients()
    {
        if (!isLoggedIn())
            redirect("pages/index");

        $patients = $this->DoctorModel->getPatients($_SESSION['doctor_id']);



        $this->render('patients', ['patients' => $patients]);
    }

    public function createDoctorSession($doctor)
    {
        $_SESSION['doctor_id'] = $doctor['id'];
        $_SESSION['doctor_name'] = $doctor['name'];

        redirect('patients/index');
    }
}
