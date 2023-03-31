<?php

require_once(APPROOT."/librairies/Controller.php");

class Doctors extends Controller
{
    private $DoctorModel;

    public function __construct()
    {
        $this->DoctorModel = $this->loadModel("Doctor");
    }

    public function login()
    {
        if (isloggedIn()) {
            redirect("patients/index");
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "email_error" => "",
                "password_error" => "",
            ];
            if (empty($data['email'])) {
                $data['email_error'] = "Please enter email";
            } elseif (!$this->DoctorModel->findDoctorsbyEmails($data['email'])) {
                $data['email_error'] = "No user found";
            }
            if (empty($data['password'])) {
                $data['password_error'] = "Please enter password";
            }
            if (empty($data['email_error']) && empty($data['password_error'])) {
                $loggedInDoctor = $this->DoctorModel->login($data['email'], $data['password']);
                if ($loggedInDoctor) {
                    echo "success";
                    $this->createDoctorSession($loggedInDoctor);
                } else {
                    $data['password_error'] = "Password incorrect";
                    $this->render("login", $data);
                }
            } else {
                $this->render("login", $data);
            }
        } else {
            $data = [
                "email" => "",
                "password" => "",
                "email_error" => "",
                "password_error" => "",
            ];
            $this->render("login", $data);
        }
    }

    public function log_out(){
        echo "logout";
        unset($_SESSION['doctor_id']);
        unset($_SESSION['doctor_email']);
        unset($_SESSION['doctor_name']);
        session_destroy();
        redirect("index");
    }
    
    public function register(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                "name" => trim($_POST['name']),
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "confirm_password" => trim($_POST['confirm_password']),
                "specialist" => trim($_POST['specialist']),
                "gender" => trim($_POST['gender']),
                "name_error" => "",
                "email_error" => "",
                "password_error" => "",
                "confirm_password_error" => "",
            ];
            if (empty($data['name'])) {
                $data['name_error'] = "Please enter name";
            }
            if (empty($data['email'])) {
                $data['email_error'] = "Please enter email";
            } elseif ($this->DoctorModel->findDoctorsbyEmails($data['email'])) {
                $data['email_error'] = "Email is already taken";
            }
            if (empty($data['password'])) {
                $data['password_error'] = "Please enter password";
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = "Password must be at least 6 characters";
            }
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = "Please confirm password";
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_error'] = "Passwords do not match";
                }
            }
            if (empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->DoctorModel->create(["name" => $data['name'], 
                                                "password" => $data['password'],
                                                "email" => $data['email'],
                                                "speciality" => $data['specialist'],
                                                "gender" => $data['gender']])) {
                    echo "register_success", "You are registered and can log in";
                    redirect("doctors/login");
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->render("register", $data);
            }
        } else {
            $data = [
                "name" => "",
                "email" => "",
                "password" => "",
                "confirm_password" => "",
                "gender" => "",
                "speciality" => "",
                "name_error" => "",
                "email_error" => "",
                "password_error" => "",
                "confirm_password_error" => "",
            ];
            $this->render("register", $data);
        }
    }
    public function createDoctorSession($doctor){
        $_SESSION['doctor_id'] = $doctor['id'];
        $_SESSION['doctor_name'] = $doctor['name'];
        $_SESSION['doctor_email'] = $doctor['email'];
        redirect("patients/index");
    }
}

?>