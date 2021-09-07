<?php
class EmailController extends EmailModel {
    public function addUsers($email, $checked) {
        $this->setUsers($email, $checked);
    }
    public function removeUsers($email_id) {
        $this->deleteUsers($email_id);
    }
}
