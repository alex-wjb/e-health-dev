<!DOCTYPE html>
<header>
    <title>Questionnaire</title>
    <h2>
        Questionnaire
    </h2>
</header>

<body>

<?php echo validation_errors();?>
    <!-- applicant details form-->
    <form method ="post" action="<?php echo base_url('index.php/submitQuestionnaire');?>">
        <label for="title">Title*:</label>
        <input type="text" name="title" id="title" value="<?php echo set_value('title');?>" minlength= "1" maxlength="20" required ></input>

        <label for="names">Name(s)*:</label>
        <input type="text" name="firstname" id="names" value="<?php echo set_value('firstname');?>" minlength= "1" maxlength="30" required></input>

        <label for="surname">Surname*:</label>
        <input type="text" name="surname" id="surname" value="<?php echo set_value('surname');?>" minlength= "1" maxlength="30" required></input>
        <br>
        <label for="dob">Date of Birth*:</label>
        <input type="date" name="dob" id="dob" value="<?php echo set_value('dob');?>" required></input>
        
        <?php  
        //ensures the correct option is still selected if validation error on submit and redirected to view
 
        $marital = array();
        $marital['Single'] = false;
        $marital['Married'] = false;
        $marital['Divorced'] = false;
        $marital['Civil Partnership'] = false;
        $marital['Other'] = false;
        $marital[set_value('marital_status')] = true;
        ?>

        <label for="marital">Marital Status*:</label>
        <select name="marital_status" id="marital" value="<?php echo set_value('marital_status');?>" required>
            <option value="Single" <?php echo set_select('marital','Single',$marital['Single']);?>>Single</option>
            <option value="Married" <?php echo set_select('marital','Married',$marital['Married']);?>>Married</option>
            <option value="Divorced" <?php echo set_select('marital','Divorced',$marital['Divorced']);?>>Divorced</option>
            <option value="Civil Partnership" <?php echo set_select('marital','Civil Partnership',$marital['Civil Partnership']);?>>Civil Partnership</option>
            <option value="Other" <?php echo set_select('marital','Other',$marital['Other']);?>>Other</option>
        </select>

        <label for="address">Address*:</label>
        <input type="text" name="address" id="address" value="<?php echo set_value('address');?>" minlength= "5" maxlength="100" required></input>
        <br>
        <label for="postcode">Postcode*:</label>
        <input type="text" name="postcode" id="postcode" value="<?php echo set_value('postcode');?>" minlength= "5" maxlength="20" required></input>

        <label for="mobile">Mobile*:</label>
        <input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile');?>" minlength= "10" maxlength="11" required></input>

        <label for="hometele">Home Telephone*:</label>
        <input type="text" name="home_telephone" id="hometele" value="<?php echo set_value('home_telephone');?>" minlength= "10" maxlength="11" required></input>
        <br>
        <p>Would you like to recieve contact via SMS?</p>

        <?php  
        
        ?>
        <div>
            <input type="radio" id="yes" name="SMS_YN" value="Y" <?php echo set_radio('SMS_YN','Y');?> checked>
            <label for="yes">Yes</label>
        </div>
        <div>
            <input type="radio" id="no" name="SMS_YN" value="N" <?php echo set_radio('SMS_YN','N');?>>
        <label for="no">No</label>
        </div>

        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" value="<?php echo set_value('email');?>" minlength= "3" maxlength="50"></input>

        <label for="occupation">Occupation*:</label>
        <input type="text" name="occupation" id="occupation" value="<?php echo set_value('occupation');?>" minlength= "2" maxlength="100" required></input>

        <p>If you have supplied an email address, please confirm if you would be happy to recieve email communications from us:</p>
    
        <div>
            <input type="radio" id="yes" name="email_yn" value="Y" <?php echo set_radio('email_yn','Y');?>
            checked>
            <label for="yes">Yes</label>
        </div>
        <div>
            <input type="radio" id="no" name="email_yn" value="N" <?php echo set_radio('email_yn','N');?>>
            <label for="no">No</label>
        </div>

        <?php  
        //ensures the correct option is still selected if validation error on submit and redirected to view
        $gender = array();
        $gender['Female'] = false;
        $gender['Male'] = false;
        $gender['Non-Binary'] = false;
        $gender['Other'] = false;
        $gender[set_value('gender')] = true;
        ?>

        <label for="gender">Gender*:</label>
        <select name="gender" id="gender" required>
            <option value="Female" <?php echo set_select('gender','Female',$gender['Female']);?>>Female</option>
            <option value="Male" <?php echo set_select('gender','Male',$gender['Male']);?>>Male</option>
            <option value="Non-Binary" <?php echo set_select('gender','Non-Binary',$gender['Non-Binary']);?>>Non-Binary</option>
            <!-- TODO: add JS for if other logic -->
            <option value="Other" <?php echo set_select('gender','Other',$gender['Other']);?>>Other</option>
        </select>

        <label for="height">Height*:</label>
        <input type="number" min="0" name="height" id="height" value="<?php echo set_value('height');?>" minlength= "1" maxlength="5" required></input>

        <label for="weight">Weight*:</label>
        <input type="number" min="0" name="weight" id="weight" value="<?php echo set_value('weight');?>" minlength= "1" maxlength="5" required></input>

        <div>
            <p>Next of Kin:*</p>
            <label for="name">Name:</label>
            <input type="text" name="kin_name" id="name" value="<?php echo set_value('kin_name');?>" minlength= "1" maxlength="30" required></input>

            <label for="relationship">Relationship:</label>
            <input type="text" name="kin_relationship" id="relationship" value="<?php echo set_value('kin_relationship');?>" minlength= "1" maxlength="30" required></input>

            <label for="telephone">Telephone:</label>
            <input type="text" name="kin_telephone" id="telephone" value="<?php echo set_value('kin_telephone');?>" minlength= "10" maxlength="11" required></input>
        </div>

        <!-- TODO: add js logic for options to appear if answer is yes -->
        <p>Medication*<p>
        <p>Are you currently taking any medication?</p>
        <div>
            <input type="radio" id="yes" name="Medication_YN" value="Y" <?php echo set_radio('Medication_YN','Y');?> checked>
            <label for="yes">Yes</label>
        </div>
        <div>
            <input type="radio" id="no" name="Medication_YN" value="N" <?php echo set_radio('Medication_YN','N');?>>
        <label for="no">No</label>
        </div>

        <!-- TODO: add js logic for options to appear if answer is current smoker -->
        <p>Smoking Status*:</p>
        <div>
            <input type="radio" id="currentsmoke" name="smoke_status" value="current smoker" <?php echo set_radio('smoke_status','current smoker');?>
            checked>
            <label for="currentsmoke">Current Smoker</label>
        </div>
        <div>
            <input type="radio" id="exsmoke" name="smoke_status" value="ex smoker" <?php echo set_radio('smoke_status','ex smoker');?>>
            <label for="exsmoke">Ex-Smoker</label>
        </div>
        <div>
            <input type="radio" id="neversmoke" name="smoke_status" value="never smoked" <?php echo set_radio('smoke_status','never smoked');?>>
            <label for="neversmoke">Never Smoked</label>
        </div>

        <div>
            <h3>Alcohol Use (AUDIT)</h3>

            <!-- Alcohol Questions table-->
            <table>
                <tr>
                    <th>Questions</th>
                    <th colspan="5">Scoring System</th>
                </tr>
                <tr>
                    <th></th><th>0</th><th>1</th><th>2</th><th>3</th><th>4</th>
                </tr>
                <?php
                $responses = array();
                foreach($query->result() as $row)
                {
                    //add question to table
                    echo "<tr><div><td>".$row->Question."</td>";
                    $qNo = $row->QuestionID;

                    //create array of responses for that section
                    $responses['response0']=$row->response0;
                    $responses['response1']=$row->response1;
                    $responses['response2']=$row->response2;
                    $responses['response3']=$row->response3;
                    $responses['response4']=$row->response4;

                    //populate table with responses
                    foreach($responses as $key => $response)
                    {
                        if($response != "")//response is present
                        {
                            //remebers which choices were selected if validation error elsewhere in form
                            $radioSelect = set_radio($qNo,$key);
                            //create radio button entry in table 
                            echo <<<_END
                            <td>
                            <input type="radio" id="{$qNo}.{$key}" name="{$qNo}" value="{$key}" {$radioSelect} >
                            <label for="{$qNo}.{$key}">{$response}</label>
                            </td>
                            _END;
                        }
                        else //blank value - no response
                        {
                            echo "<td></td>";
                        }
                    }
                echo "</div></tr>";
                }
                ?>
            </table>
        </div>
        <div>
            <h3>Family Medical History</h3>
            <p>Do any of your close family (grandparents, parents, brothers, sisters) suffer from or have had, any of the
            following?</p>

            <p>Heart Disease(heart attacks, angina)<p>
            <input type="radio" id="yes" name="has_heart_disease" value="Y" <?php echo set_radio('has_heart_disease','Y');?> >
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="has_heart_disease" value="N" <?php echo set_radio('has_heart_disease','N');?> >
            <label for="no">No</label>

            <p>Cancer<p>
            <input type="radio" id="yes" name="has_cancer" value="Y"  <?php echo set_radio('has_cancer','Y');?>>
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="has_cancer" value="N" <?php echo set_radio('has_cancer','N');?> >
            <label for="no">No</label>

            <p>Stroke<p>
            <input type="radio" id="yes" name="has_stroke" value="Y"  <?php echo set_radio('has_stroke','Y');?>>
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="has_stroke" value="N" <?php echo set_radio('has_stroke','N');?> >
            <label for="no">No</label>

            <!--TODO:use js to make 'other' specify text box only appear on yes selection --> 
            <p>Other<p>
            <input type="radio" id="yes" name="has_other" value="Y"  <?php echo set_radio('has_other','Y');?>>
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="has_other" value="N" <?php echo set_radio('has_other','N');?> >
            <label for="no">No</label>
            <label for="other_details">(If yes, please specify):</label>
            <input type="text" id="other_details" name="other_details" value="<?php echo set_value('other_details');?>"></input>
        </div>

        <div>
            <h3>Allergies*</h3>
            <p>Are you allergic to any medicines, substances or foods?<p>
            <input type="radio" id="yes" name="allergy" value="Y" <?php echo set_radio('allergy','Y');?> >
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="allergy" value="N"  <?php echo set_radio('allergy','N');?>>
            <label for="no">No</label>
            <label for="allergy_details">(If yes, please give details):</label>
            <input type="text" id="allergy_details" name="allergy_details" value="<?php echo set_value('allergy_details');?>"></input>
        </div>

        <div>
            <div>
                <h3>Lifestyle</h3>
                <p>Do you take regular exercise?<p>
                <input type="radio" id="yes" name="exercise" value="Y" <?php echo set_radio('exercise','Y');?> checked>
                <label for="yes">Yes</label>
                <input type="radio" id="no" name="exercise" value="N" <?php echo set_radio('exercise','N');?>>
                <label for="no">No</label><br>
            </div>

            <div>
                <label for="exercise_mins">How long do you exercise for in one session?</label>
                <input type="number" min="0" id="exercise_mins" name="exercise_minutes" value="<?php echo set_value('exercise_minutes');?>" minlength= "1" maxlength="10" required></input>
                <label for="exercise_mins">minutes</label><br>
            </div>

            <div>
                <label for="exercise_days">How long do you exercise for in a typical week?</label>
                <input type="number" min="0" id="exercise_days" name="exercise_days" value="<?php echo set_value('exercise_days');?>" minlength= "1" maxlength="1" required></input>
                <label for="exercise_days">days</label><br>
            </div>


            <?php  
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
            ?>
            <div>
                <label for="diet">Which of the following best describes your diet?*:</label>
                <select name="diet" id="diet">
                <option value="Good" <?php echo set_select('diet','Good',$diet['Good']);?>>Good</option>
                <option value="Average" <?php echo set_select('diet','Average',$diet['Average']);?>>Average</option>
                <option value="Poor" <?php echo set_select('diet','Poor',$diet['Poor']);?>>Poor</option>
                <option value="Vegetarian" <?php echo set_select('diet','Vegetarian',$diet['Vegetarian']);?>>Vegetarian</option>
                <option value="Vegan" <?php echo set_select('diet','Vegan',$diet['Vegan']);?>>Vegan</option>
                <option value="Low fat" <?php echo set_select('diet','Low fat',$diet['Low fat']);?>>Low fat</option>
                <option value="Low salt" <?php echo set_select('diet','Low salt',$diet['Low salt']);?>>Low salt</option><br>
                </select>
            </div>
        </div>

        <div>
            <h3>Declaration*</h3>
            <p>Upon submitting this form you confirm that the given information is correct to the best of your knowledge.</p>
            <!--submit button records current date for records-->
            <button type="submit" name="submit" value="<?php echo date('Y/m/d');?>">Submit</button>
        </div>
    </form>
</body>
</html>

