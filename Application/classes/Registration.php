<?php 
namespace App;

 class Registration {
    
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function registerUser()
    {
        return $this->user->getNameUser();
    }
 }
?>