<?php

//namespace dpmDataShard;

class UploadSingleImage {

    public $hostUserId;
    private $fileFieldName;
    private $imageName;  
    private $imageExt;
    private $isRestaurant;
    
    //phase 2
    private $target_dir;
    private $target_file;

    //phase 3
    public $dirCreation;
    public $imageUploaded;
    
    
    // constructor --------------------------
    public function __construct($hostUserId,$fileFieldName,$imageName,$imageExt,$isRestaurant) {
        $this->$hostUserId = $hostUserId;
        $this->$fileFieldName = $fileFieldName;
        $this->$imageName = $imageName;
        $this->$imageExt = $imageExt;
        $this->$isRestaurant = $isRestaurant;


        echo "fileFieldName: " . $this->$fileFieldName . "<br>";
        echo "imgName: " . $this->$imageName . "<br>";
        echo "imgExt: " . $this->$imageExt . "<br>";
        echo "hostUserId: " . $this->$hostUserId . "<br>";
        echo "isRestaurant: " . $this->$isRestaurant . "<br>";
        
    }



    // Getters and setters -----------------------------
    public static function getImageName() {
        return $imageName;
    }

    public static function getImageExt() {
        return $imageExt;
    }

    public function getHostUserId() {
        return $hostUserId;
    }


    public function setImageName($imageName) {
        $this -> $imageName = $imageName;
    }

    public function setImageExt($imageExt) {
        $this -> $imageExt = $imageExt;
    }

    public function setHostUserId($hostUserId) {
        $this -> $hostUserId = $hostUserId;
    }



    // Methods ---------------------------------------------------------------


    public function ImageUploader(){
        
        echo "fileFieldName: " . $this->$fileFieldName . "<br>";
        echo "imgName: " . $this->$imageName . "<br>";
        echo "imgExt: " . $this->$imageExt . "<br>";
        echo "hostUserId: " . $this->$hostUserId . "<br>";
        echo "isRestaurant: " . $this->$isRestaurant . "<br>";


        echo "---------- checking image data -----------";
        $result = checkImage();
        if($result){
            createTargetDirAndFile();
            // $result = uploadToDir();
            // if($result){
                
            // }else{
            //     echo "---------- ERROR uploading to directory -----------";
            // }
        }else{
            echo "---------- ERROR image check failed -----------";
        }
    }







    // phase 1   -- check image data ---
    public function checkImage() {

        $uploadOk = true; //create our check variable


        //define used to set size for bytes
        define('KB', 1024);
        define('MB', 1048576);
        define('GB', 1073741824);
        define('TB', 1099511627776);

        // only allow certain file formats
        if ($this->$imageFileExt != ".jpg" && $this->$imageFileExt != ".png" && $this->$imageFileExt != ".jpeg" && $this->$imageFileExt != ".gif"){
            echo "sorry, only jpg, jpeg and png file types are allowed";
            $uploadOk = false;
        }

        // if image is an actural image or a fake image
        if(isset($POST["submit"])){
            $check = getimagesize($_FILES[$this->$fileFieldName]["tmp_name"]);
            if($check !== false){
                echo "file is an image.";
            }else{
                echo "file is not an image.";
                $uploadOk = false;
            }
        }

        return $uploadOk;
    }



    //phase 2 -- target directory creation
    public function createTargetDirAndFile() {
        // create image name with the generatedId and add the file type to the end
        $imgStringFull = $hostUserId . "DisplayImg" . $imageExt;                

        

        //use project id to create project file folders and insert projectMainImage.extension

                        // target dir / how we are going to save it 
                            // projectMainImg with whatever img extesion 
                            // later we will not upload anything but jpg jpeg and png's
        $target_dir = "../../userImage/";
        echo "<br> targetDir: " . $target_dir;

        $target_file = "../../userImage/". $imgStringFull;
        echo "<br> targetFile: " . $target_file;

    }
   

    
    //phase 3 -- upload image to directory
    public function uploadToDir() {
        //upload image file within folder structure 

        //make sure directories exits if not create
        if (!file_exists($target_dir)){
            if(mkdir($target_dir,0777,true)){  //$target dir, 0777 means widest possible access rights and final true allows for folders within folders
                echo "directory creation successfull <br>";
                $dirCreation = true;
            }else{
                echo "directory creation failed <br>";
                $dirCreation = false;
            }
        }else{
            echo "directory already exists <br>";
            $dirCreation = true;
        }
        

        // try and upload file
        if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)){
            echo "The file " . htmlspecialchars( basename($_FILES["imageToUpload"]["name"])) . " has been uploaded as " . $imgStringFull;
            $imageUploaded = true;
        }else{
            echo "Sorry, their was an issue uploading your file.  <br>";
            $imageUploaded = false;
        }   

        if($imageUploaded && $dirCreation){
            return true;
        }else{
            return false;
        }
   }



   //phase 4 --- update user firestore with img data -------
   public function updateUserFirestore() {
        if ($dirCreation and $imageUploaded){
                    
        //inline javascript within php
        // echo    '<script type="text/JavaScript">
        //             db.collection('users').doc('. $hostUserId .').update({
        //                 iconImgExt: '$imageName',
        //                 iconImgPath: '$imageExt',
        //             })    
        //             .then((docRef) => {
        //                 console.log("Document successfully updated!");
        //                 //reload page getting new data 
        //                 window.location.href = 'userProfileSettings.php';
        //             })
        //             .catch((error) => {
        //                 // The document probably was not created.
        //                 console.log("Error updating firestore document: ", error);
        //             });
        //         </script>';
        echo "update firestore";
        }else{
            echo "error with dirCreation or ImageUploaded";
        }
   }
   
    

    
}

//update using userId doc
// db.collection('users').doc(userId).update({
//     iconImgExt: x,
//     iconImgPath: y,
//
// })    
// .then((docRef) => {
//     console.log("Document successfully updated!");
//     //reload page getting new data 
//     window.location.href = 'userProfileSettings.php';
// })
// .catch((error) => {
//     // The document probably was not created.
//     console.log("Error updating firestore document: ", error);
// });







?>





