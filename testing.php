<?php
    class testing{
        private $id;
        private $name;
        private $email;
        private $website;
        private $comment;

        public function __construct($name,$email,$website,$comment){
            $this->name = $name;
            $this->email = $email;
            $this->website = $website;
            $this->comment = $comment;
        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }

        public function getWebsite(){
            return $this->website;
        }
        public function setWebsite($website){
            $this->website = $website;
        }

        public function getComment(){
            return $this->comment;
        }
        public function setComment($comment){
            $this->comment = $comment;
        }
    }
?>