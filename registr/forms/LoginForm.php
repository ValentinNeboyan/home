<?php
class LoginForm
{
    private $username;
    private $password;

    public function __construct(array $data)
    {
        $this->username=isset($data['username']) ? $data['username'] : null;
        $this->password=isset($data['password']) ? $data['password'] : null;
    }

    public function validate()
    {
        return !empty($this->username) && !empty($this->password);
    }
}