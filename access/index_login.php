<?php
session_start();
require_once('header.php');
?>


    <div class="breadcrumbs">
        <a href="../index.php"><span class="trangchu">Trang chủ</span></a>
        <span style="padding: 0 5px;">/</span>
        <span class="font-nomal">Đăng nhập</span>
    </div>

            <?php


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

                function Login($con, $email, $password){
                    function create_token($length = 30){
                        $charset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $CharacterLength = strlen($charset);
                        $CreToken = '';
                        for ($i = 0; $i < $length; $i++) {
                            $CreToken .= $charset[rand(0, $CharacterLength - 1)];
                        }
                        return $CreToken;
                    }
                    $CheckLogin = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
                    if($CheckLogin && mysqli_num_rows($CheckLogin) > 0){
                        $rowPass = mysqli_fetch_assoc($CheckLogin);
                        if(password_verify($password,$rowPass['password'])){
                            if($rowPass['rule'] == 1){
                                $_SESSION['admin'] = $rowPass['email'];
                                return "LoginAdmin";
                            }else{
                                $_SESSION['value'] = $rowPass['name'];
                                $_SESSION['emailUser'] = $rowPass['email'];
                                $token = create_token();
                                $insert_token = mysqli_query($con,"UPDATE users SET token = '$token' WHERE email = '$email'");
                                if($insert_token){
                                    $_SESSION['token'] = $token;
                                }
                                return "LoginUserSussess";
                            }
                        }else{
                            return "LoginUserFalse";
                        }
                    }else{
                        return "LoginUserFalse";
                    }
                }
            }
            ?>


    <div class="form-login">
        <div class="container_login" id="container">
            <div class="form-container sign-up">
                <form method="post">
                    <h1>Tạo tài khoản</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <span>hoặc sử dụng email của bạn để đăng ký</span>
                    <input type="text" name="nameUser" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="accsessRegister" value="Đăng kí">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                </form>
                <?php 
                    if(isset($_POST['accsessRegister'])){
                        $nameUser = $_POST['nameUser'];
                        $email = $_POST['email'];
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $register = new Index_Login;
                        $CheckDangKi = $register->Register($con, $nameUser, $email, $password);
                        if($CheckDangKi){
                            echo '<script type="text/javascript">
                                    $(document).ready(function() {
                                        toastr.success("Đăng ký thành công!");
                                    });
                                </script>';
                                echo '<script type="text/javascript">
                                setTimeout(function() {
                                    window.location.href = "index_login.php";
                                }, 1000 );
                              </script>';
                        }else{
                            echo '<script type="text/javascript">
                            $(document).ready(function() {
                                toastr.warning("Email chưa hơp lệ!");
                            });
                        </script>';
                        }
                    }
                ?>

            </div>




            <div class="form-container sign-in">
                <form method = "post">
                    <h1>Đăng nhập</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <span>Hoặc sử dụng mật khẩu email của bạn</span>
                    <input type="email" name="emailLogin" placeholder="Email" required>
                    <input type="password" name="passwordLogin" placeholder="Password" required>
                    <a href="#">Quên mật khẩu của bạn?</a>
                    <input type="submit" name="submitLogin" value="Login" required>
                </form>
                <?php
                if(isset($_POST['submitLogin'])){
                    $email = $_POST['emailLogin'];
                    $password = $_POST['passwordLogin'];
                    $Login = new Index_Login;
                    $checkLogin = $Login->Login($con,$email,$password);
                    if($checkLogin == "LoginAdmin"){
                        echo '<script type="text/javascript">
                                $(document).ready(function() {
                                    toastr.success("Đăng nhập quyền quản trị thành công!");
                                });
                            </script>';
                            echo '<script type="text/javascript">
                            setTimeout(function() {
                                window.location.href = "../admin/product_list.php";
                            }, 1000 );
                          </script>';
                    }else{if($checkLogin == "LoginUserSussess"){
                            echo '<script type="text/javascript">
                                    $(document).ready(function() {
                                        toastr.success("Đăng nhập thành công!");
                                    });
                                </script>';
                                echo '<script type="text/javascript">
                                setTimeout(function() {
                                    window.location.href = "../index.php";
                                }, 1000 );
                              </script>';
                        }else{
                            echo '<script type="text/javascript">
                            $(document).ready(function() {
                                toastr.warning("Email hoặc mật khẩu chưa hơp lệ!");
                            });
                        </script>';
                        }
                    }
                }
                ?>




            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Chào mừng trở lại!</h1>
                        <p>Nhập thông tin cá nhân của bạn</p>
                        <button class="hidden1" id="login">Đăng nhập</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Chào bạn!</h1>
                        <p>Đăng ký với thông tin cá nhân</p>
                        <button class="hidden1" id="register">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
    </div>
    <?php require_once('footer.php');?>