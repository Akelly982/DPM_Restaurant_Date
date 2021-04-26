<?php 


    // phase 1   -- check image data ---
    function checkImage($imageFileExt) {

        $uploadOk = true; //create our check variable

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
    function updateUserFirestore($hostUserId,$imageStringCSV) {

        include "../../modularContent/header.php";

        include "../../modularContent/firebaseInit.php";

        //inline javascript within php
        echo    '<script type="text/JavaScript">
                    db.collection("users").doc(\''. $hostUserId .'\').update({
                        galleryCSV: \''.$imageStringCSV.'\',
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
    
    //define used to set size for bytes
    define('KB', 1024);
    define('MB', 1048576);
    define('GB', 1073741824);
    define('TB', 1099511627776);

    // 0 == false    (always forget which way round this goes)
    // 1 == true     ( for userTypIsRestaurant)

    $isRestaurant = $_POST["userTypeIsRestaurant"];
    $hostUserId = $_POST["uid"];

    $fileFieldName = "galleryImagesToUpload";

    $fileCounter = 0;

    echo "<br>";
    echo "<br>";
    echo "-------- testing page fields -----------------";
    echo "<br>";
    echo "fileFieldName: " . $fileFieldName . "<br>";
    echo "hostUserId: " . $hostUserId . "<br>";
    echo "isRestaurant: " . $isRestaurant . "<br>";

    echo "<br>";
    echo "<br>";
    echo "-------- Images we are trying to upload -----------------";
    echo "<br>";
    // Testing show keys and values
    foreach($_FILES[$fileFieldName]["name"] as $key => $name){
        echo "key: ". $key;
        echo " -  name: ". $name;
        echo "<br>";
    }





    echo "<br>";
    echo "<br>";
    echo "---------- checking image data -----------";
    echo "<br>";
    $checkResult = true;
    
    foreach($_FILES[$fileFieldName]["name"] as $key => $name){
        echo "key: ". $key;
        echo " -  name: ". $name;
        echo "<br>";

        echo "------------Get Image data ------------------";
        //basename comes with extension attached
        $currentImageFileName = basename($_FILES[$fileFieldName]["name"][$key]);
        echo "<br> recievedFileName: " . $currentImageFileName;

        //use the name to get the extention by itself
        //dont forget to add the dot for extension
        $currentImageFileType =  "." . strtolower(pathinfo($currentImageFileName,PATHINFO_EXTENSION));
        echo "<br> imageFileType: " . $currentImageFileType;


        $tempResult = checkImage($currentImageFileType);
        if(!$tempResult){  //if current $tempResult == false update else all good
            $result = false;
        }
    }

    if($checkResult){  // passed checks

        echo "<br>";
        echo "<br>";
        echo "-------- create target Dir -----------------";
        echo "<br>";

        $target_dir = "../../userImage/";
        echo "<br> targetDir: " . $target_dir;




        //get CSV string for db 
        //upload img files
        
        $imgStringForDb = "";
        $fileCounter = 0;  //reset counter
        
        $fileResult = true;
        foreach($_FILES[$fileFieldName]["name"] as $key =>$name ){
            $fileCounter += 1;
            
            // $initFileName = $_FILES["galleryImagesToUpload"]["name"][$key];
            // echo "<br> initFileName: " . $initFileName;

            // //use the name to get the extention by itself
            // //dont forget to add the dot for extension
            // $currentImageFileType =  "." . strtolower(pathinfo($initFileName,PATHINFO_EXTENSION));
            
            // echo "<br> imageFileType: " . $currentImageFileType;

            echo "<br>";
            echo "------------Get Image data ------------------";
            echo "<br>";
            //basename comes with extension attached
            $currentImageFileName = basename($_FILES[$fileFieldName]["name"][$key]);
            echo "<br> recievedFileName: " . $currentImageFileName;

            //use the name to get the extention by itself
            //dont forget to add the dot for extension
            $currentImageFileType =  "." . strtolower(pathinfo($currentImageFileName,PATHINFO_EXTENSION));
            echo "<br> imageFileType: " . $currentImageFileType;
            
            
            // create image name as hostUserId + Img_fileCounter.extension 
            $currentImgString = $hostUserId. "Img" . $fileCounter . $currentImageFileType;  
            echo "<br> upload file name: " . $currentImgString;
            
            
            echo "<br>";
            echo "------------upload Image data ------------------";
            echo "<br>";
            
            
            //upload img with connected file name to target_dir
            $target_file = $target_dir . $currentImgString;
            echo "<br> targetFile: " . $target_file;


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
            if (move_uploaded_file($_FILES[$fileFieldName]["tmp_name"][$key], $target_file)){
                echo "The file " . htmlspecialchars( basename($_FILES[$fileFieldName]["name"][$key])) . " has been uploaded as " . $currentImgString;
                $imageUploaded = true;
            }else{
                echo "Sorry, their was an issue uploading your file.  <br>";
                $imageUploaded = false;
            }   
            
            // add current image to db img string comma sperated
            $imgStringForDb .= $currentImgString;
            $imgStringForDb .= ",";
            echo "<br>";

            if(!$imageUploaded && !$dirCreation){
                $fileResult = false;
                echo "#### ERROR ####";
                echo "The file " . htmlspecialchars( basename($_FILES[$fileFieldName]["name"][$key])) . " has had an error on file definition and upload";
            }
        }



        echo "<br>";
        echo "<br>";
        echo "-------- path ready for db -----------------";
        echo "<br>";
        echo "CSVpath: ". $imgStringForDb;
        if($fileResult){
            
            echo "<br>";
            echo "<br>";
            echo "-------- upload new img path to user db data -----------------";
            echo "<br>";
            updateUserFirestore($hostUserId,$imgStringForDb);




        }else{
            echo "---------- ERROR uploading to directory and or getting file data -----------";
        }

    }else{
        echo "---------- ERROR image check failed one or more images may be causeing issues.-----------";
    }

    

?>


    