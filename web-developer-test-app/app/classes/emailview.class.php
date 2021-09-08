<?php
class emailview extends emailmodel {
    public function showUsers($name) {
        $results = $this->getUser($name);
        echo $results['email_address'];
    }
    public function showTable() {
        $index = 0;
        $results = $this->getTable();
        //echoing entire table from database
        echo "<table id='emails_table' style='text-align: center position:absolute;
    margin: auto;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;'>";
        echo "<th>ch</th>";
        echo "<th>email_id</th>";
        echo "<th>email_address</th>";
        echo "<th>dt</th>";
        foreach ($results as $results) {
            echo "<tr>";
            echo "<td> <input id=" . $index . " type='checkbox' value='selected'> </td>";
            echo "<td>" . $results['email_id'] . "</td>";
            echo "<td>" . $results['email_address'] . "</td>";
            echo "<td>" . $results['dt'] . "</td>";
            echo "<td>
            <form id='myForm" . $results['email_id'] . "' action='../app/classes/delete.class.php' method='post'>
            <input type='hidden' name='session' value='" . $results['email_id'] . "' />
            <input type='submit' value='delete' />
            </form>
            </td>";
            echo "</tr>";
            $index = $index + 1;
        }
        echo "</table>";
    }
    public function showError() {
        $error_code = "";
        if (isset($_SESSION["error_code"])) {
            $error_code = $_SESSION["error_code"];
            unset($_SESSION["error_code"]);
        }
        echo $error_code;
    }
}
