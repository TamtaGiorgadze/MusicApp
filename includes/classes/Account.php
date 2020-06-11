<?php 

    class Account {

        private $errorArray;

        public function __construct() {
            $this->errorArray = array();
        }

        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
            $this->validateUsername($un);
            $this->validateFirstname($fn);
            $this->validateLastname($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);

            if(empty($this->errorArray)) {
                //Insert into DB
                return true;
            } else {
                return false;
            }
        }

        private function validateUsername($un) {
            if(strlen($un) > 15 || strlen($un) < 2) {
                array_push($this->errorArray, "Username must be between 2 and 15 characters");
                return;
            }

            //TODO: check if username exists
        }
    
        private function validateFirstname($fn) {
            if(strlen($fn) > 20 || strlen($fn) < 2) {
                array_push($this->errorArray, "First Name must be between 2 and 20 characters");
                return;
            }
        }
    
        private function validateLastname($ln) {
            if(strlen($ln) > 20 || strlen($ln) < 2) {
                array_push($this->errorArray, "Last Name must be between 2 and 20 characters");
                return;
            }
        }
    
        private function validateEmails($em, $em2) {
            if($em != $em2) {
                array_push($this->errorArray, "Provided Emails don't match");
                return;
            }

            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, "Email format is invalid");
                return;
            }

            //TODO: check if email exists in DB
        }
    
        private function validatePasswords($pw, $pw2) {
            if($pw != $pw2) {
                array_push($this->errorArray, "Provided Passwords don't match");
                return;
            }

            if(strlen($pw) < 8) {
                array_push($this->errorArray, "Your Password must be at least 8 characters long");
                return;
            }
        }
    }