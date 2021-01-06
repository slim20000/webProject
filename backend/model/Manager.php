<?php
	class Manager{
		private ?int $id = null;
		private ?string $firstname = null;
        private ?string $lastname = null;
        private ?string $gender = null;
		private ?string $email = null;
        private ?string $password = null;
        private ?string $confirmpassword = null;
		
		function __construct(string $firstname, string $lastname,string $gender, string $email, string $password,string $confirmpassword){
			
			$this->firstname=$firstname;
            $this->lastname=$lastname;
            $this->gender=$gender;
			$this->email=$email;
            $this->password=$password;
            $this->confirmpassword=$confirmpassword;
		}
		
		function getId(): int{
			return $this->id;
		}
		function getFirstname(): string{
			return $this->firstname;
		}
		function getLastname(): string{
			return $this->lastname;
		}
		function getGender(): string{
			return $this->gender;
		}
		function getEmail(): string{
			return $this->email;
		}
		function getPassword(): string{
			return $this->password;
		}

    
    function getConfirmpassword(): string{
        return $this->confirmpassword;
    }
		function setFirstname(string $firstname): void{
			$this->firstname=$firstname;
		}
		function setLastname(string $lastname): void{
			$this->lastname;
		}
		function setGender(string $gender): void{
			$this->gender=$gender;
		}
		function setEmail(string $email): void{
			$this->email=$email;
		}
		function setPassword(string $password): void{
			$this->password=$password;
        }
    
    function setConfirmpassword(string $confirmpassword): void{
        $this->confirmpassword=$confirmpassword;
    
    }
}
?>