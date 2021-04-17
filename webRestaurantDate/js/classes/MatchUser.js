class MatchUser {
    #userId;
    #username;
    #firstName;
    #lastName;
    #summary;
    #imgName;
    #imgExt;
    #matchCounter;




    
    constructor(userId,username,firstName,lastName,summary,imgName,imgExt) {
      this.#userId = userId;
      this.#username = username;
      this.#firstName = firstName;
      this.#lastName = lastName;
      this.#summary = summary;
      this.#imgName = imgName;
      this.#imgExt = imgExt;
      this.#matchCounter = 1; //init with 1 becuase we matched here didnt we
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

    getSummary() {
        return this.#summary;
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

    setMatchCounterPlusOne(){
        this.#matchCounter += 1;
    }



  }