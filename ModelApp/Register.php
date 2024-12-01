<?php
require_once '../admin/database.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nameUser']) ) {
            $db = new Database();
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $nameUser = $_POST['nameUser'];
            $register = new Index_Login;
			echo json_encode([
                        "Code" => 200,
                        "message" => $con
                ]);
            $CheckDangKi = $register->Register($con, $nameUser, $email, $password);
			
            if ($CheckDangKi) {
                    echo json_encode([
                        "Code" => 200,
                        "message" => "Register Sussess"
                ]);
            } else {
                echo json_encode([
                    "Code" => 401,
                    "message" => "Error"]);
            }
        } else {
            echo json_encode([
                "Code" => 401,
                "message" => "Error"]);
        }
        break;
    default:
    echo json_encode([
        "Code" => 401,
        "message" => "Error"]);
        break;
}
Class Index_Login{
    function Register($con,$name,$email,$password){
       $Checkemail = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
        if(mysqli_num_rows($Checkemail) > 0){
           return false;
        }else{
            mysqli_query($con, "INSERT INTO users(name,email,password) VALUES ('$name','$email','$password')");
            return true;
        }
    }
}
?>
