<?php

namespace dpmDataShard;

class Database {


    private $userId;
    private $username;
    private $firstName;
    private $lastName;
    private $summary;
    private $imgName;
    private $imgExt;


    
    // constructors --------------------------
    protected function __construct() {
        
    }

    protected function __construct($userId,$username,$firstName,$lastName,$summary,$imgName,$imgExt) {
        $this -> userId = $userId;
        $this -> username = $username;
        $this -> firstName = $firstName;
        $this -> lastName = $lastName;
        $this -> summary = $summary;
        $this -> imgName = $imgName;
        $this -> imgExt = $imgExt;
    }



    // methods -----------------------------

    public static function getUserId() {
        return $userId;
    }

    public static function getUsername() {
        return $username;
    }

    public static function getFirstName() {
        return $firstName;
    }

    public static function getLastName() {
        return $lastName;
    }

    public static function getSummary() {
        return $summary;
    }

    public static function getImgName() {
        return $imgName;
    }

    public static function getImgExt() {
        return $imgExt;
    }


}


?>