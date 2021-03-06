<?php 

    class Account {

        private $con;
        private $errorArray;

        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();
        }

        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
            $this->validateUsername($un);
            $this->validateFirstname($fn);
            $this->validateLastname($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);

            if(empty($this->errorArray) == true) {
                //Insert into DB
                return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
            } else {
                return false;
            }
        }

        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function insertUserDetails($un, $fn, $ln, $em, $pw) {
            $encryptedPw = md5($pw);
            $profilePic = "assets/images/profile-pics/profile-pic.png";
            $date = date("Y-m-d");

            $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");

            return $result;
        }

        private function validateUsername($un) {
            if(strlen($un) > 15 || strlen($un) < 2) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            //TODO: check if username exists
        }
    
        private function validateFirstname($fn) {
            if(strlen($fn) > 20 || strlen($fn) < 2) {
                array_push($this->errorArray, Constants::$firtnameCharacters);
                return;
            }
        }
    
        private function validateLastname($ln) {
            if(strlen($ln) > 20 || strlen($ln) < 2) {
                array_push($this->errorArray, Constants::$lastnameCharacters);
                return;
            }
        }
    
        private function validateEmails($em, $em2) {
            if($em != $em2) {
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }

            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            //TODO: check if email exists in DB
        }
    
        private function validatePasswords($pw, $pw2) {
            if($pw != $pw2) {
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return;
            }

            if(strlen($pw) < 8) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }
        }
    }