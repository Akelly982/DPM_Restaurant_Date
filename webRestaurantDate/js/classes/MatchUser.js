class MatchUser {

    //private
    #userId;
    #username;
    #firstName;
    #lastName;
    #imgName;
    #imgExt;
    #matchCounter;
    #summary;
    #birthday;
    #height;
    #smoker;
    #gender;

    //public
    newStrValueNull = "OG comment some data may be missing";
    newIntValueNull = null;  //cnat be found by an operation <




    
    constructor(userId,username,firstName,lastName,summary,imgName,imgExt,birthday,gender,height,smoker) {
        //OG properties
        this.#userId = userId;
        this.#username = username;
        this.#firstName = firstName;
        this.#lastName = lastName;
        this.#imgName = imgName;
        this.#imgExt = imgExt;
        this.#matchCounter = 1; //init with 1 becuase we matched here didnt we

        //New properites values may not exists in resComment
        //
        if(summary == undefined){   
            this.#summary = this.newStrValueNull;
        }else{
            this.#summary = summary;
        }
        
        if(birthday == undefined){
            this.#birthday = this.newStrValueNull;
        }else{
            this.#birthday = birthday;
        }

        if(gender == undefined){
            this.#gender = this.newStrValueNull;
        }else{
            this.#gender = gender;
        }

        if(height == undefined){
            this.#height = this.newIntValueNull;
        }else{
            this.#height = height;
        }

        if(smoker == undefined){
            this.#smoker = this.newStrValueNull;
        }else{
            this.#smoker = smoker;
        }   
      
      
    }


    //getters  -------------------------------------------
    getUserId() {
        return this.#userId;
    }

    getUsername() {
        return this.#username;
    }

    getFirstName() {
        return this.#firstName;
    }

    getLastName() {
        return this.#lastName;
    }

    getImgName() {
        return this.#imgName;
    }

    getImgExt() {
        return this.#imgExt;
    }

    getMatchCounter() {
        return this.#matchCounter;
    }

    getSummary() {
        return this.#summary;
    }

    getHeight() {
        return this.#height;
    }

    getBirthday() {
        return this.#birthday;
    }

    getGender() {
        return this.#gender;
    }
    getSmoker() {
        return this.#smoker;
    }





    // methods --------
    setMatchCounterPlusOne(){
        this.#matchCounter += 1;
    }



  }