<?php
    session_start();
    include('connection.php');
    include('HelperClass.php');
    
    class UserModel {
        public $connection;
        

        // function name: checkAccount
        // purpose: to check if there is an existing account
        // returns: integer
        public function checkAccount($email, $password){
            $query = "SELECT * FROM user WHERE email_address = '".$email."' AND password = '".$password."'";
            
            $result = mysqli_query($this->connection, $query);

            return mysqli_num_rows($result);
        }

        // function name: getLogin
        // purpose: to verify the login credentials
        // returns: void
        public function getLogin($email, $password)
        {
            $this->connection = DB::connection();
            if($this->checkAccount($email, $password) == 1) {
                echo "Successfully logged in!";
                $_SESSION['id'] = $rows['user_id'];
            } else {
                echo 'wrong!';
            }
        }

        // function name: isPasswordsMatching
        // purpose: to check if the input in the password and the retype password fields match
        // returns: boolean
        public function isPasswordsMatching($password, $retype){
            if(strcmp($password, $retype) == 0){
                return true;
            }
            return false;
        }

        // function name: createSuffixedAccount
        // purpose: to create an account if the user defined his/her suffix
        // returns: void
        public function createSuffixedAccount($firstName, $middleName, $lastName, $suffix, $email, $password, $retype, $currency){
            $this->connection = DB::connection();
            // check if account exists
            if($this->checkAccount($email, $password) == 1) {
                echo "Account already exists!";
            }else{
                if(isPasswordsMatching($password, $retype)){
                    $query = "INSERT INTO user (email_address, password, currency) VALUES ('".$email."', '".$password."', '".$currency."')";
                    if(mysqli_query($this->connection, $query)){
                        // get last ID inserted
                        $last_id = mysqli_insert_id($this->connection);

                        // create name
                        $query = "INSERT INTO name (user_id, first_name, middle_name, last_name, suffix) VALUES ('".$last_id."', '".$firstName."', '".$middleName."', '".$lastName."', '".$suffix."')";
                        
                        if(mysqli_query($this->connection, $query)){
                            // save id, link to prompt
                            $_SESSION['id'] = $last_id;
                        }else{
                            echo "Error adding to the database!";
                        }
                    }else{
                        echo "Error adding to the database!";
                    }
                }else{
                    echo "Passwords don't match!";
                }
            }
        }
        
        // function name: createAccount
        // purpose: to create an account if the user did not define his/her suffix
        // returns: void
        public function createAccount($firstName, $middleName, $lastName, $email, $password, $retype, $currency){
            $this->connection = DB::connection();
            // check if account exists
            if($this->checkAccount($email, $password) == 1) {
                echo "Account already exists!";
            }else{
                if($this->isPasswordsMatching($password, $retype)){
                    $query = "INSERT INTO user (email_address, password, currency) VALUES ('".$email."', '".$password."', '".$currency."')";
                    if(mysqli_query($this->connection, $query)){
                        // get last ID inserted
                        $last_id = mysqli_insert_id($this->connection);

                        // create name
                        $query = "INSERT INTO name (user_id, first_name, middle_name, last_name) VALUES ('".$last_id."', '".$firstName."', '".$middleName."', '".$lastName."')";
                        
                        if(mysqli_query($this->connection, $query)){
                            // save id, link to prompt
                            $_SESSION['id'] = $last_id;
                        }else{
                            echo "Error adding to the database!";
                        }
                    }else{
                        echo "Error adding to the database!";
                    }
                }else{
                    echo "Passwords don't match!";
                }
            }
        }

        // function name: addIncomeBudget
        // purpose: to create a record for the income and budget linked to the newly created account
        // returns: void
        public function addIncomeBudget($income, $budget){
            $this->connection = DB::connection();

            $query = "INSERT INTO income (user_id, amount_earned, income_date) VALUES (".$_SESSION['id'].", ".$income.", CURRENT_TIMESTAMP)";
                echo $query;

            if(mysqli_query($this->connection, $query)){
                $query = "INSERT INTO budget (user_id, budget_name, amount_allocated, budget_date) VALUES (".$_SESSION['id'].", 'Main', ".$budget.", CURRENT_TIMESTAMP)";
                if(mysqli_query($this->connection, $query)){
                    // link to the main view
                    echo $query;
                    echo "Done with Registration and Prompt!";
                }else{
                    echo "Error adding to the database!";
                }
            }else{
                echo "Error adding to the database!";
            }
        }
    }
?>