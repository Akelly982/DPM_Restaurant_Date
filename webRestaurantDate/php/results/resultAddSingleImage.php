<?php 


    // phase 1   -- check image data ---
    function checkImage($imageFileExt) {

        $uploadOk = true; //create our check variable


        //define used to set size for bytes
        define('KB', 1024);
        define('MB', 1048576);
        define('GB', 1073741824);
        define('TB', 1099511627776);

        // only allow certain file formats
        if ($imageFileExt != ".jpg" && $imageFileExt != ".png" && $imageFileExt != ".jpeg" && $imageFileExt != ".gif"){
            echo "sorry, only jpg, jpeg and png file types are allowed";
            $uploadOk = false;
        }

        // if image is an actural image or a fake image
        if(isset($POST["submit"])){
            $check = getimagesize($_FILES[$fileFieldName]["tmp_name"]);
            if($check !== false){
                echo "file is an image.";
            }else{
                echo "file is not an image.";
                $uploadOk = false;
            }
        }

        return $uploadOk;
    }

   

    
    //phase 3 -- upload image to directory
    function uploadToDir($target_dir,$target_file,$imgStringFull) {
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
    function updateUserFirestore($hostUserId,$imageName,$imageExt) {

        include "../../modularContent/header.php";

        include "../../modularContent/firebaseInit.php";

        //inline javascript within php
        echo    '<script type="text/JavaScript">
                    db.collection("users").doc(\''. $hostUserId .'\').update({
                        iconImgPath: \''.$imageName.'\',
                        iconImgExt: \''.$imageExt.'\',
                    })    
                    .then((docRef) => {
                        console.log("User path Documents successfully updated!");
                        window.location.href = "../../userProfileSettings.php";
                    })
                    .catch((error) => {
                        console.log("Error updating firestore document: ", error);
                    });
                </script>';
   }









    //===============================================================================
    //=============================// START HERE         ============================
    //===============================================================================
    //===============================================================================
    
 


    // 0 == false    (always forget which way round this goes)
    // 1 == true     ( for userTypIsRestaurant)

    $isRestaurant = $_POST["userTypeIsRestaurant"];
    $hostUserId = $_POST["uid"];

    $fileFieldName = "imageToUpload";

    echo "------------Get Image ------------------";
    //basename comes with extension attached
    $imageFileName = basename($_FILES[$fileFieldName]["name"]);
    echo "<br> recievedFileName: " . $imageFileName;

    //use the name to get the extention by itself
    //dont forget to add the dot for extension
    $imageFileType =  "." . strtolower(pathinfo($imageFileName,PATHINFO_EXTENSION));
    echo "<br> imageFileType: " . $imageFileType;
    

    echo "<br>";
    echo "<br>";
    echo "-------- testing page fields -----------------";
    echo "<br>";
    echo "fileFieldName: " . $fileFieldName . "<br>";
    echo "imgName: " . $imageFileName . "<br>";
    echo "imgExt: " . $imageFileType . "<br>";
    echo "hostUserId: " . $hostUserId . "<br>";
    echo "isRestaurant: " . $isRestaurant . "<br>";




    echo "<br>";
    echo "<br>";
    echo "---------- checking image data -----------";
    echo "<br>";
    $result = checkImage($imageFileType);
    if($result){



        echo "<br>";
        echo "<br>";
        echo "-------- create target Dir and File -----------------";
        echo "<br>";
        // create image name with the generatedUserId and add the file type to the end
        // DI added in between for Display Image / Icon Image same thing....
        $imgStringFull = $hostUserId . "DI" . $imageFileType;    

        $imgString = $hostUserId ."DI";            
        echo "<br> imgString: " . $imgString;

        $target_dir = "../../userImage/";
        echo "<br> targetDir: " . $target_dir;

        $target_file = "../../userImage/". $imgStringFull;
        echo "<br> targetFile: " . $target_file;

        


        echo "<br>";
        echo "<br>";
        echo "-------- upload image to dir -----------------";
        echo "<br>";
        $result = uploadToDir($target_dir, $target_file, $imgStringFull);
        if($result){
            
            echo "<br>";
            echo "<br>";
            echo "-------- upload new img path to user db data -----------------";
            echo "<br>";
            updateUserFirestore($hostUserId,$imgString,$imageFileType);




        }else{
            echo "---------- ERROR uploading to directory -----------";
        }

    }else{
        echo "---------- ERROR image check failed -----------";
    }

    

?>


    