<?php 


    // phase 1   -- check image data ---
    function checkImage($imageFileExt,$fileFieldName) {

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
    function uploadToDir($target_dir,$target_file,$imgStringFull,$fileFieldName) {
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
        if (move_uploaded_file($_FILES[$fileFieldName]["tmp_name"], $target_file)){
            echo "The file " . htmlspecialchars( basename($_FILES[$fileFieldName]["name"])) . " has been uploaded as " . $imgStringFull;
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
    function updateUserFirestore($hostUserId,$imageName,$imageExt,$isRestaurant,$isHero) {

        include "../../modularContent/header.php";

        include "../../modularContent/firebaseInit.php";

        $collectionName;
        $returnFile;
        // console.log("isREs:" . $isRestaurant);
        // console.log("isREs:" . $isHero);
        if($isRestaurant){
            $collectionName = "restaurants";
            $returnFile = "restaurantProfileSettings.php";
        }else{
            $collectionName = "users";
            $returnFile = "userProfileSettings.php";
        }

        $imgPathFieldName;
        $imgExtFieldName;
        if($isHero){
            $imgPathFieldName = "heroImgPath";
            $imgExtFieldName = "heroImgExt";
        }else{
            $imgPathFieldName = "iconImgPath";
            $imgExtFieldName = "iconImgExt";
        }


        //inline javascript within php
        echo    '<script type="text/JavaScript">
                    db.collection(\'' .$collectionName. '\').doc(\''. $hostUserId .'\').update({
                        '. $imgPathFieldName .': \''.$imageName.'\',
                        '. $imgExtFieldName .': \''.$imageExt.'\',
                    })    
                    .then((docRef) => {
                        console.log("User path Documents successfully updated!");
                        window.location.href = "../../'. $returnFile .'";
                    })
                    .catch((error) => {
                        console.log("Error updating firestore document: ", error);
                    });
                </script>';
   }



//window.location.href = "../../userProfileSettings.php";






    //===============================================================================
    //=============================// START HERE         ============================
    //===============================================================================
    //===============================================================================
    
 


    // 0 == false    (always forget which way round this goes)
    // 1 == true     ( for userTypIsRestaurant)

    $isRestaurant = $_POST["userTypeIsRestaurant"];
    $hostUserId = $_POST["uid"];
    $isHero = $_POST["isHero"];

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
    echo "isHeroImage: " . $isHero . "<br>";




    echo "<br>";
    echo "<br>";
    echo "---------- checking image data -----------";
    echo "<br>";
    $result = checkImage($imageFileType,$fileFieldName);
    if($result){



        echo "<br>";
        echo "<br>";
        echo "-------- create target Dir and File -----------------";
        echo "<br>";

        $imageTypeStrInsert;
        if($isHero){
            $imageTypeStrInsert = "Hero";
        }else{
            $imageTypeStrInsert = "DI";
        }

        // create image name with the generatedUserId and add the file type to the end
        // DI added in between for Display Image / Icon Image same thing....
        $imgStringFull = $hostUserId . $imageTypeStrInsert . $imageFileType;    

        $imgString = $hostUserId . $imageTypeStrInsert;            
        echo "<br> imgString: " . $imgString;

        $target_dir = "../../userImage/";
        echo "<br> targetDir: " . $target_dir;

        $target_file = "../../userImage/". $imgStringFull;
        echo "<br> targetFile: " . $target_file;

        


        echo "<br>";
        echo "<br>";
        echo "-------- upload image to dir -----------------";
        echo "<br>";
        $result = uploadToDir($target_dir, $target_file, $imgStringFull,$fileFieldName);
        if($result){
            
            echo "<br>";
            echo "<br>";
            echo "-------- upload new img path to user db data -----------------";
            echo "<br>";
            updateUserFirestore($hostUserId,$imgString,$imageFileType,$isRestaurant,$isHero);




        }else{
            echo "---------- ERROR uploading to directory -----------";
        }

    }else{
        echo "---------- ERROR image check failed -----------";
    }

    

?>


    