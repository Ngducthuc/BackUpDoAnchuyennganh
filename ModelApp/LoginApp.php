<?php
require_once '../admin/config.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "SELECT * FROM users WHERE email = '$email'";
            $resultEmail = $con->query($query);
            if ($resultEmail && $resultEmail->num_rows > 0) {
                $rowPass = mysqli_fetch_assoc($resultEmail);
                if (password_verify($password, $rowPass['password'])) {
                    $token = create_token();
                    $insert_token = mysqli_query($con,"UPDATE users SET token = '$token' WHERE email = '$email'");
                    echo json_encode([
                        "code" => 200,
                        "token" => $token,
                        "message" => "Login Sussess"
                ]);
                } else {
                    http_response_code(401);
                    echo json_encode([
                        "code" => 401,
                        "message" => "Error"]);
                }
            } else {
                http_response_code(404);
                echo json_encode([
                    "code" => 401,
                    "message" => "Error"]);
            }
        } else {
            http_response_code(400);
            echo json_encode([
                "code" => 401,
                "message" => "Error"]);
        }
        break;
    default:
    echo json_encode([
        "code" => 401,
        "message" => "Error"]);
        break;
}
$con->close();
function create_token($length = 30){
    $charset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $CharacterLength = strlen($charset);
    $CreToken = '';
    for ($i = 0; $i < $length; $i++) {
        $CreToken .= $charset[rand(0, $CharacterLength - 1)];
    }
    return $CreToken;
}
?>
