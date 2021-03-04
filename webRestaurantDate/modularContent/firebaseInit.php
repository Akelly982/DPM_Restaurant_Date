<script>
    
        //----which firebase firestore we are connecting to----------
        
        //firebase RestrauntDateDPM
    
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later,measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyCihIIvEtMFr-kvkZMLtjNV3cGEbozFLNs",
            authDomain: "restrauntdatedpm.firebaseapp.com",
            projectId: "restrauntdatedpm",
            storageBucket: "restrauntdatedpm.appspot.com",
            messagingSenderId: "669725481849",
            appId: "1:669725481849:web:278bfd25fd0251b6076da8",
            measurementId: "G-TNMCJ1QLT9"
          };

    
        //----Initialize connection----------
    
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        // variable we are going to use in our scripts to reference the firebase firestore db
        const db = firebase.firestore();

        // stops us from getting errors in the console.
        db.settings({ timestampsInSnapShots: true}); 
    
    
</script>