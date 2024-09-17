
<?php

class NewUser{

  public $username, $name, $lastName, $password;

 public function __construct(string $username="",string $name="",string $lastName="",$password="") {
    $this->username = $username;
    $this->name = $name;
    $this->lastName=$lastName;
    $this->password=$password;
  
}




}

?> 
