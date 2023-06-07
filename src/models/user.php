<?php
    class User {
        private $id;
        private $surname;
        private $name;
        private $patronymic;
        private $dateOfBirth;
        private $passportId;
        private $passportSeries;
        private $street;
        private $house;
        private $apartment;
        private $login;
        private $password;
        private $roleId;
      
        public function __construct($id, $surname, $name, $patronymic, $dateOfBirth, $passportId, $passportSeries, $street, $house, $apartment, $login, $password, $roleId) {
          $this->id = $id;
          $this->surname = $surname;
          $this->name = $name;
          $this->patronymic = $patronymic;
          $this->dateOfBirth = $dateOfBirth;
          $this->passportId = $passportId;
          $this->passportSeries = $passportSeries;
          $this->street = $street;
          $this->house = $house;
          $this->apartment = $apartment;
          $this->login = $login;
          $this->password = $password;
          $this->roleId = $roleId;
        }
      
        public function getId() {
          return $this->id;
        }
      
        public function getSurname() {
          return $this->surname;
        }
      
        public function getName() {
          return $this->name;
        }
      
        public function getPatronymic() {
          return $this->patronymic;
        }
      
        public function getDateOfBirth() {
          return $this->dateOfBirth;
        }
      
        public function getPassportId() {
          return $this->passportId;
        }
      
        public function getPassportSeries() {
          return $this->passportSeries;
        }
      
        public function getStreet() {
          return $this->street;
        }
      
        public function getHouse() {
          return $this->house;
        }
      
        public function getApartment() {
          return $this->apartment;
        }
      
        public function getLogin() {
          return $this->login;
        }
      
        public function getPassword() {
          return $this->password;
        }
      
        public function getRoleId() {
          return $this->roleId;
        }
      
        public function setId($id) {
            $this->id = $id;
        }

        public function setSurname($surname) {
          $this->surname = $surname;
        }
      
        public function setName($name) {
          $this->name = $name;
        }
      
        public function setPatronymic($patronymic) {
          $this->patronymic = $patronymic;
        }
      
        public function setDateOfBirth($dateOfBirth) {
          $this->dateOfBirth = $dateOfBirth;
        }
      
        public function setPassportId($passportId) {
          $this->passportId = $passportId;
        }
      
        public function setPassportSeries($passportSeries) {
          $this->passportSeries = $passportSeries;
        }
      
        public function setStreet($street) {
          $this->street = $street;
        }
      
        public function setHouse($house) {
          $this->house = $house;
        }
      
        public function setApartment($apartment) {
          $this->apartment = $apartment;
        }
      
        public function setLogin($login) {
          $this->login = $login;
        }
      
        public function setPassword($password) {
          $this->password = $password;
        }
      
        public function setRoleId($roleId) {
          $this->roleId = $roleId;
        }
      
      }
?>