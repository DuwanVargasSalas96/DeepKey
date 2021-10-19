<?php
    class LoginC
    {
        public function login()
        {
            //Catch data
            if (isset($_POST["loginUser"]) && isset($_POST["loginPassword"]) && filter_var($_POST["loginUser"], FILTER_VALIDATE_EMAIL) && preg_match("/^[\w\d\s.!¡@#$%&()\[\]]{4,32}$/", $_POST["loginPassword"])) {
                //Declare
                $data = array("user" => strtolower($_POST["loginUser"]), "password" => sha1($_POST["loginPassword"]));
                $response = LoginM::login($data);
                //Response control
                if ($data["user"] == $response["Email"] && $data["password"] == $response["Password"]) {
                    //Session
                    session_start();
                    $_SESSION["user"] = $response["Email"];
                    $_SESSION["password"] = $response["Password"];
                    $_SESSION["state"] = true;
                    //Redirect to page
                    header("location:index.php?kb=home");
                } else {
                    //Toast
                    echo "<script>$(document).ready(function() {
                        $('.toast').toast('show')
                        $('.toast .toast-body').addClass('bg-danger').text('Login incorrecto')
                        $('#loginUser, #loginPassword').addClass('is-invalid')
                    })</script>";
                }
            }
        }
    }
?>
