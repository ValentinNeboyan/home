<?php

class RegistrationForm
{
    private $email;
    private $username;
    private $password;
    private $passwordConfirm;


    function __construct(array $data)
    {
        $this->email = isset($_POST['email']) ? $_POST['email'] : null;
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
        $this->password = isset($_POST['password']) ? $_POST['password'] : null;
        $this->passwordConfirm = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : null;
    }

    public function passwordsMatch()
    {
        return $this->password == $this->passwordConfirm;
    }

    public function validate()
    {
        return !empty($this->email) && !empty($this->username) && !empty($this->password) && !empty($this->passwordConfirm) && $this->passwordsMatch();
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPasswordConfirm()
    {
        return $this->passwordConfirm;
    }


    public function setPasswordConfirm($passwordConfirm)
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username)
    {
        $this->username = $username;
    }


}


