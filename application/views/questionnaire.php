<!DOCTYPE html>



<head>
  <title>Questionnaire</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      html{
        scroll-behavior: auto!important;
      }

  /* REMOVE NUMBER INPUT ARROWS */
      /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}


  @media (max-width: 800px){
    .form-card{
      width:600px!important;

    }
    .form-container{
      width:400px!important;

    }
    .title-text{
      width:600px!important;
    }
    .alcohol-card{
      width:600px!important;
    }
  }

  @media (max-width: 600px){
    .form-card{
      width:400px!important;

    }
    .form-container{
      width:300px!important;

    }
    .title-text{
      width:400px!important;
    }
  }
</style>

<script>


  const blurAllInputs = () => {
    let elements = document.getElementsByTagName("input");
    Array.from(elements).forEach(function(element) {
      element.focus();
      element.blur();
    });

  }

  const removeErrorMsgEle = (inputElement, errorMsgClass) =>{
    // clear any existing error msg
    if(inputElement.nextSibling.className == "errorMsgs"){
      const errorContainer = inputElement.nextSibling;

    let child = errorContainer.firstChild;
    while(child){
      if(child.className==errorMsgClass){
      child.remove();
      };
      //value is null if no next sibling
      child = child.nextSibling;
    }
    
    // delete error container if no more error msgs
    if(errorContainer.children.length==0){
    errorContainer.remove();  
  }
  }
  }

  // VALIDATION FUNCTIONS

  const textRequired = (event, fieldName)=>{

    let element;
    if(event.tagName){
      //is an element object
      console.log(event.tagName);
      element = event;
    }
    else{
      element = event.currentTarget;
    }
  
     // clear any existing error msg
    removeErrorMsgEle(element, "requiredError");
    let errorContainerEle = null;



    if((element.value.trim())==("")){

      if(element.nextSibling.className != "errorMsgs"){
      const errorsContainer = document.createElement("div");
      errorsContainer.className = "errorMsgs";
      element.after(errorsContainer);
    }

    errorContainerEle = element.nextSibling;
      let p = document.createElement("p");
      p.innerHTML = "<b>" + fieldName + " is required." + "</b>";
      p.style="color:red;"
      p.className ="requiredError";
      // insert ele after input ele
      errorContainerEle.appendChild(p);
    }
  }

  const minInput = (event, n)=>{
    const element = event.currentTarget;
    removeErrorMsgEle(element, "minLengthError");

    let errorContainerEle = null;


    if(element.value.length < n && element.value.length > 0){
      if(element.nextSibling.class !== "errorMsgs"){
  const errorsContainer = document.createElement("div");
  errorsContainer.className = "errorMsgs";
  element.after(errorsContainer);
}

errorContainerEle = element.nextSibling;
      let p = document.createElement("p");
      p.innerHTML = "<b>" + "Must be at least " + n + " characters." + "</b>";
      p.style="color:red;"
      p.className ="minLengthError";
      // insert ele after input ele
      errorContainerEle.appendChild(p);
    }
  };

  const maxInput = (event, n)=>{
    const element = event.currentTarget;
    removeErrorMsgEle(element, "maxLengthError");

    let errorContainerEle = null;




    if(element.value.length > n){
      if(element.nextSibling.class !== "errorMsgs"){
  const errorsContainer = document.createElement("div");
  errorsContainer.className = "errorMsgs";
  element.after(errorsContainer);
}

errorContainerEle = element.nextSibling;
      let p = document.createElement("p");
      p.innerHTML = "<b>" + "Must be less than " + n + " characters." + "</b>";
      p.style="color:red;"
      p.className ="maxLengthError";
      // insert ele after input ele
      errorContainerEle.appendChild(p);
    }
  };

  //checks for event listners
  // const isEmpty = (element){

  // }


const setValidation = (event, name, required, minLen, maxLen) => {
  if (required){
    textRequired(event, name);
  }
  if (typeof minLen !== 'undefined'){
    minInput(event, minLen);
  }
    if (typeof maxLen !== 'undefined'){
    maxInput(event, maxLen);
}
  
}

const validateEmail = (event, inputValue)=> {
  const element = event.currentTarget;
    removeErrorMsgEle(element, "emailError");

    let errorContainerEle = null;

  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(inputValue) == false){
    if(element.nextSibling.class !== "errorMsgs"){
  const errorsContainer = document.createElement("div");
  errorsContainer.className = "errorMsgs";
  element.after(errorsContainer);
}

errorContainerEle = element.nextSibling;
      let p = document.createElement("p");
      p.innerHTML = "<b>" + "Please enter a valid email address."+ "</b>";
      p.style="color:red;"
      p.className ="emailError";
      // insert ele after input ele
      errorContainerEle.appendChild(p);

  }
};


const validateInput = (event) => {

  const inputEle = event.currentTarget;

  if(inputEle.type=="email" && inputEle.value!==""){
    validateEmail(event, inputEle.value);
  }

  //sets required, minLen, maxLen for inputs
  switch(inputEle.name){
    case "title":
      setValidation(event, "Title", true, 1, 20);
      break;
    case "firstname":
      setValidation(event, "Name", true, 2, 30);
      break;
    case "surname":
      setValidation(event, "Surname", true, 2, 30);
      break;
    case "dob":
      setValidation(event, "Date of Birth", true);
      break;
    case "address":
      setValidation(event, "Address", true, 5, 100);
      break;
    case "postcode":
      setValidation(event, "Postcode", true, 5, 20);
      break;
    case "mobile":
      setValidation(event, "Mobile", true, 10, 11);
      break;
    case "home_telephone":
      setValidation(event, "Home Telephone", true, 10, 11);
      break;
    case "email":
      setValidation(event, "Email", false, 3, 50);
      break;
    case "occupation":
      setValidation(event, "Occupation", true, 1, 20);
      break;
    case "height":
      setValidation(event, "Height", true, 1, 5);
      break;
    case "weight":
      setValidation(event, "Height", true, 1, 5);
      break;
    case "kin_name":
      setValidation(event, "Name", true, 1, 30);
      break;
    case "kin_relationship":
      setValidation(event, "Relationship", true, 1, 30);
      break;
    case "kin_telephone":
      setValidation(event, "Telephone", true, 10, 11);
      break;
    case "exercise_minutes":
      setValidation(event, "Minutes", false, 1, 10);
      break;
    case "exercise_days":
      setValidation(event, "Days", false, 1, 2);
      break;
  }
}

const checkRadioSelected = () => {
  const radioRows = Array.from(document.getElementsByClassName("alcoholRadioRow"));
  console.log("CHECK1");
    
    radioRows.forEach((ele)=>{
      if(ele.previousElementSibling.className=="errorMsgs"){
        ele.previousElementSibling.remove();
      }
      const radioEles =  Array.from(ele.getElementsByClassName("alcoholRadio"));
      let checked  = false;
      
      radioEles.forEach((ele)=>{

        console.log(ele.checked);
        
        if(ele.checked){
          checked = true;
        }
      
      })
    
      if(!checked){
        console.log("radio required");
        let p = document.createElement("p");
      p.innerHTML = "<b>" + "Selection Required" + "</b>";
      p.style="color:red;"
      p.className ="errorMsgs";
      // insert ele after input ele
      ele.before(p);
      }
      
    })
}

  const checkValid = (event) =>{
    checkRadioSelected();
    blurAllInputs();
   
    const errorElements = document.getElementsByClassName("errorMsgs");
   
    
    if(errorElements){
     
      // scroll to first error input and focus
      errorElements[0].previousElementSibling.scrollIntoView();
      console.log(errorElements[0].previousElementSibling);
      errorElements[0].previousElementSibling.focus();
      // brings input label into view also
      window.scrollBy(0,-35);
      // prevents form submission to server
      event.preventDefault();
    }



  }

  </script>
  </head>

<body>
  <h1 style="width:800px;"class="title-text text-center p-3 mx-auto"> Questionnaire </h1> 
  <!-- displays any server side validation error messages -->
  <?php echo validation_errors(); ?>
  <!-- applicant details form-->
  <form method="post" action="<?php echo base_url('index.php/submitQuestionnaire'); ?>">
    <!-- PERSONAL DETAILS -->
    <div class="form-card mx-auto card shadow mb-5 p-3" style="width:800px;">
      <h3 class="text-center">Personal Information</h3>
      <div class="form-container mx-auto mb-3" style="width:600px;">
        <label class="form-label" for="title">Title*:</label>
        <input id="title" class="requiredText form-control mb-3" type="text" name="title" id="title" value="<?php echo set_value('title'); ?>"onblur="validateInput(event)"></input>

        <label class="form-label" for="names">Name(s)*:</label>
        <input class="form-control mb-3" type="text" name="firstname" id="names"
          value="<?php echo set_value('firstname'); ?>" onblur="validateInput(event)"></input>
        <label class="form-label" for="surname">Surname*:</label>
        <input class="form-control mb-3" type="text" name="surname" id="surname"
          value="<?php echo set_value('surname'); ?>" onblur="validateInput(event)"></input>
        <label class="form-label" for="dob">Date of Birth*:</label>
        <input class="form-control mb-3" type="date" name="dob" id="dob" value="<?php echo set_value('dob'); ?>"
           onblur="textRequired(event, 'Date of Birth')"onblur="validateInput(event)"></input> <?php
//ensures the correct option is still selected if validation error on submit and redirected to view

$marital = array();
$marital['Single'] = false;
$marital['Married'] = false;
$marital['Divorced'] = false;
$marital['Civil Partnership'] = false;
$marital['Other'] = false;
$marital[set_value('marital_status')] = true;
?> <label class="form-label" for="marital">Marital Status*:</label>
        <select class="form-select mb-3" name="marital_status" id="marital"
          value="<?php echo set_value('marital_status'); ?>" required>
          <option value="Single" <?php echo set_select('marital', 'Single', $marital['Single']); ?>>Single</option>
          <option value="Married" <?php echo set_select('marital', 'Married', $marital['Married']); ?>>Married</option>
          <option value="Divorced" <?php echo set_select('marital', 'Divorced', $marital['Divorced']); ?>>Divorced
          </option>
          <option value="Civil Partnership"
            <?php echo set_select('marital', 'Civil Partnership', $marital['Civil Partnership']); ?>>Civil Partnership
          </option>
          <option value="Other" <?php echo set_select('marital', 'Other', $marital['Other']); ?>>Other</option>
        </select>
        <label class="form-label" for="address">Address*:</label>
        <input class="form-control mb-3" type="text" name="address" id="address"
          value="<?php echo set_value('address'); ?>"onblur="validateInput(event)"></input>
        <label class="form-label" for="postcode">Postcode*:</label>
        <input class="form-control mb-3" type="text" name="postcode" id="postcode"
          value="<?php echo set_value('postcode'); ?>" onblur="validateInput(event)"></input>
        <label class="form-label" for="mobile">Mobile*:</label>
        <input class="form-control mb-3 numberInput" type="number" name="mobile" id="mobile"
          value="<?php echo set_value('mobile'); ?>" onblur="validateInput(event)"></input>
        <label class="form-label" for="hometele">Home Telephone*:</label>
        <input class="form-control mb-3 numberInput" type="number" name="home_telephone" id="hometele"
          value="<?php echo set_value('home_telephone'); ?>" onblur="validateInput(event)"></input>
          <div class="mb-3">
        <p>Would you like to recieve contact via SMS?</p>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="yes" name="SMS_YN" value="Y"
            <?php echo set_radio('SMS_YN', 'Y'); ?> checked>
          <label class="form-label" for="yes">Yes</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="no" name="SMS_YN" value="N"
            <?php echo set_radio('SMS_YN', 'N'); ?>>
          <label class="form-label" for="no">No</label>
        </div>
        </div>
        <label class="form-label" for="email">Email Address:</label>
        <input class="form-control mb-3" type="email" name="email" id="email" value="<?php echo set_value('email'); ?>"
          onblur="validateInput(event)"></input>
        <label class="form-label" for="occupation">Occupation*:</label>
        <input class="form-control mb-3" type="text" name="occupation" id="occupation"
          value="<?php echo set_value('occupation'); ?>" onblur="validateInput(event)"></input>
          <div class="mb-3">
        <p>If you have supplied an email address, please confirm if you would be happy to recieve email communications
          from us:</p>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="yes" name="email_yn" value="Y"
            <?php echo set_radio('email_yn', 'Y'); ?> checked>
          <label class="form-label" for="yes">Yes</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="no" name="email_yn" value="N"
            <?php echo set_radio('email_yn', 'N'); ?>>
          <label class="form-label" for="no">No</label>
        </div>
        </div> <?php
//ensures the correct option is still selected if validation error on submit and redirected to view
$gender = array();
$gender['Female'] = false;
$gender['Male'] = false;
$gender['Non-Binary'] = false;
$gender['Other'] = false;
$gender[set_value('gender')] = true;
?> <label class="form-label" for="gender">Gender*:</label>
        <select class="form-select mb-3" name="gender" id="gender">
          <option value="Female" <?php echo set_select('gender', 'Female', $gender['Female']); ?>>Female</option>
          <option value="Male" <?php echo set_select('gender', 'Male', $gender['Male']); ?>>Male</option>
          <option value="Non-Binary" <?php echo set_select('gender', 'Non-Binary', $gender['Non-Binary']); ?>>Non-Binary
          </option>
          <!-- TODO: add JS for if other logic -->
          <option value="Other" <?php echo set_select('gender', 'Other', $gender['Other']); ?>>Other</option>
        </select>
        <label class="form-label" for="height">Height (cm)*:</label>
        <input class="form-control mb-3" type="number" min="0" name="height" id="height"
          value="<?php echo set_value('height'); ?>" onblur="validateInput(event)"></input>
        <label class="form-label" for="weight">Weight (kg)*:</label>
        <input class="form-control mb-3" type="number" min="0" name="weight" id="weight"
          value="<?php echo set_value('weight'); ?>" onblur="validateInput(event)"></input>
        <div>
          <p><b>Next of Kin:</b></p>
          <label class="form-label" for="name">Name*:</label>
          <input class="form-control mb-3" type="text" name="kin_name" id="name"
            value="<?php echo set_value('kin_name'); ?>" onblur="validateInput(event)" autocomplete="off"></input>
          <label class="form-label" for="relationship">Relationship*:</label>
          <input class="form-control mb-3" type="text" name="kin_relationship" id="relationship"
            value="<?php echo set_value('kin_relationship'); ?>" onblur="validateInput(event)"></input>
          <label class="form-label" for="telephone">Telephone*:</label>
          <input class="form-control mb-3 numberInput" type="number" name="kin_telephone" id="telephone"
            value="<?php echo set_value('kin_telephone'); ?>" onblur="validateInput(event)"></input>
        </div>
      </div>
    </div>
    <!-- MEDICATION AND SMOKING -->
    <!-- TODO: add js logic for options to appear if answer is yes -->
    <div class="form-card mx-auto card shadow mb-5 p-3" style="width: 800px;">
      <h3 class="text-center">Medication and Smoking</h3>
      <div class="form-container mx-auto" style="width: 600px;">
      <div class="mb-3">
        <p class="fw-bold">Medication*
        <p>
        <p>Are you currently taking any medication?</p>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="yes" name="Medication_YN" value="Y"
            <?php echo set_radio('Medication_YN', 'Y'); ?>>
          <label class="form-label" for="yes">Yes</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="no" name="Medication_YN" value="N" checked
            <?php echo set_radio('Medication_YN', 'N'); ?>>
          <label for="no">No</label>
        </div>
      </div>
      <!-- TODO: add js logic for options to appear if answer is current smoker -->
      <p class="fw-bold">Smoking Status*</p>
      <div class="form-check">
        <input class="form-check-input" type="radio" id="currentsmoke" name="smoke_status" value="current smoker"
          <?php echo set_radio('smoke_status', 'current smoker'); ?> >
        <label class="form-label" for="currentsmoke">Current Smoker</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" id="exsmoke" name="smoke_status" value="ex smoker"
          <?php echo set_radio('smoke_status', 'ex smoker'); ?>>
        <label class="form-label" for="exsmoke">Ex-Smoker</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" id="neversmoke" name="smoke_status" value="never smoked" checked
          <?php echo set_radio('smoke_status', 'never smoked'); ?>>
        <label class="form-label" for="neversmoke">Never Smoked</label>
      </div>
    </div>
</div>
<!-- ALCOHOL USE -->
    <div class="alcohol-card mx-auto card shadow p-3 mb-5" style="width: 800px;">
      <h3 class="text-center">Alcohol Use (AUDIT)</h3>
      <!-- Alcohol Questions table-->
      <table class="table">
        <tr>
          <th>Questions</th>
          <th colspan="5">Scoring System</th>
        </tr>
        <tr>
          <th></th>
          <th>0</th>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
        </tr> <?php
$responses = array();
foreach ($query->result() as $row) {
    //add question to table
    echo "<tr valign='top' class='mb-5 alcoholRadioRow'><td><div class='mb-3'>" . $row->Question . "</div></td>";
    $qNo = $row->QuestionID;

    //create array of responses for that section
    $responses['response0'] = $row->response0;
    $responses['response1'] = $row->response1;
    $responses['response2'] = $row->response2;
    $responses['response3'] = $row->response3;
    $responses['response4'] = $row->response4;

    //populate table with responses
    foreach ($responses as $key => $response) {
        if ($response != "")
        {
        //remembers which choices were selected if validation error elsewhere in form
        $radioSelect = set_radio($qNo, $key);
        //create radio button entry in table
        echo <<<_END
                            <td>
                            <div class="mx-3">

                            <input class="form-check-input alcoholRadio" type="radio" id="{$qNo}.{$key}" name="{$qNo}" value="{$key}" {$radioSelect}>
                            <div><label for="{$qNo}.{$key}">{$response}</label></div>
                            </div>
                            </td>
                            _END;
    } else //blank value - no response
    {
        echo "<td></td>";
    }
}
echo "</tr>";
}
    ?>
      </table>
    </div>
    <!-- FAMILY MEDICAL HISTORY -->
    <div class="form-card mx-auto card shadow mb-5 p-3" style="width: 800px;">
      <h3 class="text-center">Family Medical History</h3>
      <div class="form-container mx-auto" style="width: 600px;">
      <p>Do any of your close family (grandparents, parents, brothers, sisters) suffer from or have had, any of the
        following?</p>
      <div class="mb-3">
        <p class="fw-bold">Heart Disease (e.g: Heart Attacks, Angina)</p>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="yes" name="has_heart_disease" value="Y"
            <?php echo set_radio('has_heart_disease', 'Y'); ?>>
          <label class="form-label" for="yes">Yes</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="no" name="has_heart_disease" value="N" checked
            <?php echo set_radio('has_heart_disease', 'N'); ?>>
          <label class="form-label" for="no">No</label>
        </div>
      </div>
      <div class="mb-3">
        <p class="fw-bold">Cancer</p>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="yes" name="has_cancer" value="Y"
            <?php echo set_radio('has_cancer', 'Y'); ?>>
          <label class="form-label" for="yes">Yes</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="no" name="has_cancer" value="N" checked
            <?php echo set_radio('has_cancer', 'N'); ?>>
          <label class="form-label" for="no">No</label>
        </div>
      </div>
      <div class="mb-3">
        <p class="fw-bold">Stroke</p>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="yes" name="has_stroke" value="Y"
            <?php echo set_radio('has_stroke', 'Y'); ?>>
          <label class="form-label" for="yes">Yes</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="no" name="has_stroke" value="N" checked
            <?php echo set_radio('has_stroke', 'N'); ?>>
          <label class="form-label" for="no">No</label>
        </div>
      </div>
      <!--TODO:use js to make 'other' specify text box only appear on yes selection -->
      <div>
        <p class="fw-bold">Other</p>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="yes" name="has_other" value="Y"
            <?php echo set_radio('has_other', 'Y'); ?>>
          <label class="form-label" for="yes">Yes</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="no" name="has_other" value="N" checked
            <?php echo set_radio('has_other', 'N'); ?>>
          <label class="form-label" for="no">No</label>
        </div>
      </div>

        <label class="form-label" for="other_details">(If yes, please specify):</label>
        <input class="form-control mb-3" type="text" id="other_details" name="other_details"
          value="<?php echo set_value('other_details'); ?>"onblur="validateInput(event)"></input>

    </div>
</div>
    <!-- ALLERGIES AND LIFESTYLE -->
    <div class="form-card mx-auto card shadow mb-5 p-3" style="width:800px;">
      <h3 class="text-center">Allergies and Lifestyle</h3>
      <div class="form-container mx-auto" style="width:600px;">
        <div class="mb-3">
          <h4>Allergies*</h4>
          <p>Are you allergic to any medicines, substances or foods?
          <p>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="yes" name="allergy" value="Y"
              <?php echo set_radio('allergy', 'Y'); ?>>
            <label class="form-label" for="yes">Yes</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="no" name="allergy" value="N" checked
              <?php echo set_radio('allergy', 'N'); ?>>
            <label class="form-label" for="no">No</label>
          </div>
          <label class="form-label" for="allergy_details">(If yes, please give details):</label>
          <input class="form-control mb-3" type="text" id="allergy_details" name="allergy_details"
            value="<?php echo set_value('allergy_details'); ?>"onblur="validateInput(event)"></input>
        </div>
        <div>
          <div class="mb-3">
            <h4>Lifestyle</h4>
            <p>Do you take regular exercise?
            <p>
            <div class="form-check">
              <input class="form-check-input" type="radio" id="yes" name="exercise" value="Y"
                <?php echo set_radio('exercise', 'Y'); ?> >
              <label class="form-label" for="yes">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" id="no" name="exercise" value="N" checked
                <?php echo set_radio('exercise', 'N'); ?>>
              <label class="form-label" for="no">No</label>
            </div>
            <label class="form-label" for="exercise_mins">How many <b>minutes</b> on average do you excercise for in one
              session?</label>
            <input class="form-control mb-3" type="number" min="0" id="exercise_mins" name="exercise_minutes"
              value="<?php echo set_value('exercise_minutes'); ?>" onblur="validateInput(event)"></input>
            <label class="form-label" for="exercise_days">How many <b>days</b> do you exercise on in a typical
              week?</label>
            <input class="form-control mb-3" type="number" min="0" id="exercise_days" name="exercise_days"
              value="<?php echo set_value('exercise_days'); ?>" onblur="validateInput(event)"></input>
          </div> <?php
//ensures the correct option is still selected if validation error on submit and redirected to view

    $diet = array();
    $diet['Good'] = false;
    $diet['Average'] = false;
    $diet['Poor'] = false;
    $diet['Vegetarian'] = false;
    $diet['Vegan'] = false;
    $diet['Low fat'] = false;
    $diet['Low salt'] = false;
    $diet[set_value('diet')] = true;
    ?> <div class="mb-3">
            <label class="form-label" for="diet">Which of the following best describes your diet?*:</label>
            <select name="diet" class="form-select" id="diet">
              <option value="Good" <?php echo set_select('diet', 'Good', $diet['Good']); ?>>Good</option>
              <option value="Average" <?php echo set_select('diet', 'Average', $diet['Average']); ?>>Average</option>
              <option value="Poor" <?php echo set_select('diet', 'Poor', $diet['Poor']); ?>>Poor</option>
              <option value="Vegetarian" <?php echo set_select('diet', 'Vegetarian', $diet['Vegetarian']); ?>>Vegetarian
              </option>
              <option value="Vegan" <?php echo set_select('diet', 'Vegan', $diet['Vegan']); ?>>Vegan</option>
              <option value="Low fat" <?php echo set_select('diet', 'Low fat', $diet['Low fat']); ?>>Low fat</option>
              <option value="Low salt" <?php echo set_select('diet', 'Low salt', $diet['Low salt']); ?>>Low salt
              </option><br>
            </select>
          </div>
        </div>
      </div>
</div>


      <div class="form-card mx-auto card shadow mb-5 p-3" style="width:800px">
        <div class="form-container mx-auto" style="width:600px">
        <h3>Declaration*</h3>
        <p>Upon submitting this form you confirm that the given information is correct to the best of your knowledge.
        </p>
        <!--submit button records current date for records-->
        <button class="btn btn-primary" id="patientFormSubmit" onclick="checkValid(event);" type="submit" name="submit" value="<?php echo date('Y/m/d'); ?>">Submit</button>
        </div>
      </div>
      </div>

  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>

