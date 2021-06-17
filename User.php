<?php
class User {
    private $id;
    private $fullname;
    private $email;
    private $password;
    private $username;
    private $contact;
    private $password_request;

    public function setId($id) {
        $this->id = $id;
    }
    public function setFullname($fullname) {
        $this->fullname = $fullname;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function setContact($contact) {
        $this->contact = $contact;
    }
    public function setPasswordRequest($password_request) {
        $this->password_request = $password_request;
    }

    public function getId() {
        return $this->id;
    }
    public function getFullname() {
        return $this->fullname;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getContact() {
        return $this->contact;
    }
    public function getPasswordRequest() {
        return $this->password_request;
    }
}

?>