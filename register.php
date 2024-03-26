<?php
include './dbconfigur.php';
$error = "";
if (isset($_POST['btnsubmit'])) {    
    
    extract($_POST);    

   
    if (empty($txtfirstname)) {
        $error .= "Please enter your first name.<br/>";
    }
    if (empty($txtlastname)) {
        $error .= "Please enter your last name.<br/>";
    }

    if (empty($txtemail)) {
        $error .= "Please enter your email.<br/>";
    }

    if (empty($txtmobile)) {
        $error .= "Please enter your mobile no.<br/>";
    }

    if (empty($txtpassword)) {
        $error .= "Please enter your password.<br/>";
    }

    if (empty($txtconfirm)) {
        $error .= "Please enter your confirm password.<br/>";
    }
    if (empty($error)) {

        $sql_query = "INSERT INTO register(fname,lname,email,contact,password,user_type,adding_date)" . "VALUES('" . $txtfirstname . "','" . $txtlastname . "','" . $txtemail . "','" . $txtmobile . "','" . $txtpassword . "','user','" . date('Y-m-d h:i:s') . "')";
        $result = mysql_query($sql_query);
        if ($result) {
            header("location:register.php?reg=success");
        } else {
            $error = "Data has not been saved.";
        }
    }
}
?>
<!DOCTYPE HTML>
<script type="text/javascript">
                //function for balnk field
                function validate(){
                    var  img = document.getElementById('fileimage');
                    if(img.value.trim() == ""){
                        alert('Please select image.!!');
                        img.focus();
                        return false;
                    }
                }


  </script>
   <script type="text/javascript">
            function validate(){

                var name = document.getElementById("txt_name").value;
                if(name == ""){
                    alert('Name field cannot be blank.');
                    return false;
                }
                var dob = document.getElementById("txt_dob").value;
                if(dob == ""){
                    alert('Please Enter Your Date Of Birth.');
                    return false;
                }
                var gender = document.getElementById("txt_gndr").value;
                if(gender=="na")
                {
                    alert('Please select a gender');
                    return false;
                }
                var phone = document.getElementById("txt_phone").value;
                if(phone == ""){
                    alert('Please Enter Your Contact Number.');
                    return false;
                }
                var Contact_as = document.getElementById("txt_cntas").value;
                if(Contact_as == ""){
                    alert('Please Select Contact As.');
                    return false;
                }
                var Email = document.getElementById("txt_eml").value;
                if(Email  == ""){
                    alert('Please Enter Your Email.');
                    return false;
                }
                var a = document.getElementById("txt_pass").value;
                if(a == ""){
                    alert('Password field cannot be blank.');
                    return false;
                }
                var b = document.getElementById("txtcpass").value;
                if(b == ""){
                    alert('Confirm Password field cannot be blank.');
                    return false;
                }
                if(a != b){
                    alert('Confirm password does not matched.');
                    return false;
                }
            }

            //check for Integer
            function checkInteger(i)
            {
                if(i.value.length>0)
                {
                    i.value = i.value.replace(/[^\d]+/g, '');


                }

            }
        </script>
 <script type="text/javascript" src="js/scw.js"></script>
   <script type="text/javascript">
            function contact(i)
            {
                if(i.value.length>0)
                {
                    i.value = i.value.replace(/[^\d]+/g, '');

                }
            }
            function CheckForAlphabets(elem)
            {
                var alphaExp = /^[a-z A-Z]+$/;
                if(elem.value.match(alphaExp)){
                    return true;
                }else{
                    alert("give alphabatic name ");
                    return false;
                }
            }
            function mob()
            {
                var rl=document.getElementById("txt_phone").value;
                if(rl.toString().length<10)
                {
                    alert("Contact No. should be of ten digits");
                    return false;
                }

            }
        </script>
        <script type="text/javascript">
            function valid() {
                //alert('calling');
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                // var address = document.forms[form_id].elements[txtemail_id].value;
                var address = document.getElementById('txt_eml').value;
                if(reg.test(address) == false) {
                    alert('Invalid Email Address');
                    return false;
                }
            }
        </script>
          <script type="text/javascript">

                 function pin()
            {
                var rl=document.getElementById("txtpwd").value;
                if(rl.toString().length<6)
                {
                    alert("Pin Number should be of Six digits");
                    return false;
                }

            }

        </script>
<html>
    <head>
        <title>Register - Easy Cab-Register</title>
        <?php include './title.php'; ?>
    </head>
    <body>
        <!--  start-wrap -->

        <?php include './header.php'; ?>
        <!--  end-header -->
        <?php include './rightbar.php'; ?>
        <div style="float:left;" class="gallery">
            <h4>Register</h4>
            <form name="registration" action="register.php" method="post" enctype="multipart/form-data"> 
                <?php
                if (!empty($error)) {
                    echo '<div class="indv_fields"><label class="error">' . $error . '</label></div>';
                }
                if (isset($_GET['reg']) && $_GET['reg'] == "success") {
                    echo '<div class="indv_fields"><label class="success">You have been successfully registered.</label></div>';
                }
                ?>
                <div class="clear"> </div>
                <fieldset class="indv" style="width: 95%;">	
                    
                    <div class="indv_fields ">
                        <label for="name">First Name<span class="red">*</span></label>
                        <input type="text" name="txtfirstname" id="firstname" value="" placeholder="Please enter your first name" maxlength="100"onblur="CheckForAlphabets(this)"/>
                    </div>
                    <div class="indv_fields ">
                        <label for="name">Last Name<span class="red">*</span></label>
                        <input type="text" name="txtlastname" id="lastname" value="" placeholder="Please enter your last name" maxlength="100" /> 
                    </div>

                    <div class="indv_fields ">
                        <label for="email">Email<span class="red">*</span></label> 
                        <input type="email" name="txtemail" id="email" value=""  placeholder="Your email" maxlength="100" onblur="valid()"/>
                    </div>
                    <div class="indv_fields ">
                        <label for="phone">Mobile<span class="red">*</span></label> 
                        <input type="text" name="txtmobile" id="mobile" maxlength="10" placeholder="Your Mobile number" onkeyup="contact(this,value)" onblur="mob()" />
                    </div>
                    <div class="indv_fields ">
                        <label for="password">Password<span class="red">*</span></label> 
                        <input type="password" name="txtpassword" id="password" value="" placeholder="Your password" maxlength="25"/> 
                    </div>
                    <div class="indv_fields ">
                        <label for="confirm">Confirm Password<span class="red">*</span></label> 
                        <input type="password" name="txtconfirm" id="confirm" value=""  placeholder="Your confirm password" maxlength="25"/> 
                    </div>
                    <div class="indv_fields ">
                        &nbsp;
                    </div>
                    <div class="indv_fields ">

                    </div>
                    <div class="indv_fields" >

                        <label for="submit"></label> 
                        <input type="submit" name="btnsubmit" id="submit" value="Submit" onclick="return checkform();"/>
                    </div>
                </fieldset><!--end user-details-->

            </form>
            <div class="clear"> </div>
        </div>
        <?php include './footer.php'; ?>
        <div class="clear"> </div>
    </div>
</body>
</html>
