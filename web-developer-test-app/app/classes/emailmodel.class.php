<?php
class EmailModel extends Dbh {
    protected function getUsers($name) {
        $sql = "SELECT * FROM emails";
        $stmt = $this->connect()->query($sql);
        //executing predefined statements is safer
        $stmt->execute([$name]);
        $results = $stmt->fetchAll();
        return $results;
    }
    protected function getTable() {
        $sql = "SELECT * FROM emails ORDER BY dt ASC";
        $stmt = $this->connect()->query($sql);
        $stmt->execute([]);
        $results = $stmt->fetchAll();
        return $results;
    }
    protected function setUsers($email, $checked) {
        $_SESSION["error_code"] = "fast";
        $sql = "INSERT INTO emails(email_address) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $error = "";
        //email address validation before pushing it into database
        if (empty($email)) {
            session_start();
            //error code that's shown in case js is disabled
            $_SESSION["error_code"] = "Email address is required.";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                session_start();
                $_SESSION["error_code"] = "Please provide a valid e-mail address.";
            } else {
                $length = strlen(".co");
                if (substr_compare($email, ".co", -$length) === 0) {
                    session_start();
                    $_SESSION["error_code"] = "We are not accepting subscriptions from Colombia emails.";
                } else {
                    if (!$checked) {
                        session_start();
                        $_SESSION["error_code"] = "You must accept the terms and conditions.";
                    } else {
                        //session_unset($_SESSION["error_code"]);
                        if (isset($_SESSION["error_code"])) {
                            unset($_SESSION["error_code"]);
                        }
                        $stmt->execute([$email]);
                    }
                }
            }
        }
    }
    //method for delete button functionality
    protected function deleteUsers($email_id) {
        $sql = "DELETE FROM emails WHERE email_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email_id]);
    }
}
