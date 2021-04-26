<?php 


    include "../phpClasses/UploadSingleImage.php";
    include "../phpClasses/Fruit.php";
    //use dpmDataShard\UploadSingleImage;


    // 0 == false    (always forget which way round this goes)
    // 1 == true     ( for userTypIsRestaurant)

    $isRestaurant = $_POST["userTypeIsRestaurant"];
    $userId = $_POST["uid"];

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
    echo "-------- testing basic class -----------------";
    echo "<br>";
    $apple = new Fruit();
    $name = "apple";
    $apple->set_name($name);
    echo "the name of my fruit is: " . $apple->get_name();


    echo "<br>";
    echo "<br>";
    echo "-------- testing page fields -----------------";
    echo "<br>";
    echo "fileFieldName: " . $fileFieldName . "<br>";
    echo "imgName: " . $imageFileName . "<br>";
    echo "imgExt: " . $imageFileType . "<br>";
    echo "hostUserId: " . $userId . "<br>";
    echo "isRestaurant: " . $isRestaurant . "<br>";



    echo "<br>";
    echo "<br>";
    echo "------------ Create object ------------------";
    echo "<br>";
            //__construct($hostUserId,$fileFieldName,$imageName,$imageExt,$isRestaurant)
    $imgHandler = new UploadSingleImage($userId,$fileFieldName,$imageFileName,$imageFileType,$isRestaurant);


    echo "<br>";
    echo "------------Run class methods------------------";
    echo "<br>";
    $imgHandler->setHostUserId("jdflkajsdlifdasfdsaf99299");
    echo "get hostUserId: " . $imgHandler->getHostUserId();

    

?>


    