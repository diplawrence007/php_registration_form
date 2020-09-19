<?php
session_start();
$error;
$success;
 if(isset($_SESSION['flash']['required'])){
     $error=$_SESSION['flash']['required'];
     unset($_SESSION['flash']);
 }
 else if(isset($_SESSION['flash']['success'])){
      $success=$_SESSION['flash']['success'];
      unset($_SESSION['flash']['success']);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <link rel="stylesheet" href="./assets/library/css/bootstrap.min.css">
    <!-- Font Icon -->
    <!-- Main css -->
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <h2 class="mt-0 pt-0 d-flex justify-content-center text-white" >SARA BANGLA 88</h2>
    <div class="container">
    <header class=" d-flex  justify-content-end">
            <div >
                        <h5>Register now </h5>
                        <p class="bg-primary text-white">while seats are available !</p>
                    </div>
        </header>
    </div>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <!-- <div class="signup-img">
                    <img style="height:99.45%" src="images/form-img.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>Register now </h2>
                        <p>while seats are available !</p>
                    </div>
                </div> -->
                <div class="signup-form">
                    <form method="POST" class="register-form" id="sara_bangla_88" action="Submit.php"  enctype="multipart/form-data">
                    <?php if(isset($error)){ ?>
                        <div class="alert alert-danger my-2">
                        <?php echo $error; ?>
                        </div>
                        <?php } ?>
                        <?php if(isset($success)){ ?>
                        <div class="alert alert-success my-2">
                        <?php echo $success; ?>
                        </div>
                        <?php } ?>
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label class="required" for="cName"><span>&#9733;</span>Full Name:</label>
                                    <input type="text" style="padding: 26px 20px;" class="form-control" name="cName" aria-describedby="emailHelp" placeholder="Full Name">
                                </div>
                                <div class="form-input">
                                    <label for="cPhoto" class="required"><span>&#9733;</span>Photo</label>
                                    <input type="file" style="border:none" accept="image/*" class="form-control" name="cPhoto" placeholder="upload your image">
                                </div>
                                <div id="previewContainer">
                                </div>
                                <div class="form-input">
                                <input type="checkbox" name="nPhotoShare" class="form-check-input" id="nPhotoShare">
                                <label class="form-check-label" for="nPhotoShare">share photo</label>
                                </div>
                                <div class="form-input">
                                    <label for="cDoB" class="required"><span>&#9733;</span>Date Of Birth:</label>
                                    <input type="date" name="cDoB" placeholder="cDoB"
                                        value="2018-07-22"
                                        min="1900-01-01" max="2020-12-31">
                                </div>
                                <div class="form-input">
                                    
                                    <input type="checkbox" name="nBirthDateShare" class="form-check-input" id="nBirthDateShare">
                                    <label class="form-check-label" for="nBirthDateShare">Share birthDate</label>
                                </div>
                                <div class="form-input">
                                    <label for="nDistrictId" class="required"><span>&#9733;</span>District Name Of Your School</label>
                                    <select name="nDistrictId" style="box-sizing: border-box;padding-top: 18px;padding-bottom: 18px;border-radius: 5px;border: 1px solid #ebebeb;width: 100%;padding-left: 24px;#font-family: 'Poppins'">
                                        <option value="">select District Name Of Your School<span>&#11206;</span></option>
                                        
                                      </select>
                                </div>
                                <div class="form-input">
                                    <label for="nSchoolId" class="required"><span>&#9733;</span>Name Of School Passed SSC:</label>
                                    <select name="nSchoolId" style="box-sizing: border-box;padding-top: 18px;padding-bottom: 18px;border-radius: 5px;border: 1px solid #ebebeb;width: 100%;padding-left: 24px;#font-family: 'Poppins'">
                                        <option value="">Select your school<span>&#11206;</span></option>
                                      </select>
                                </div>
                                <h3 style="color:black"><span>&#9733;</span>Present Address</h3>
                                <div class="form-input">
                                    <label class="required">Country</label>
                                    <select name="nPresentCountry" style="box-sizing: border-box;padding-top: 18px;padding-bottom: 18px;border-radius: 5px;border: 1px solid #ebebeb;width: 100%;padding-left: 24px;#font-family: 'Poppins'">
                                        <option value="">Select Country<span>&#11206;</span></option>
                                      </select>
                                </div>
                                <div class="form-input">
                                    <label class="required"><span>&#9733;</span>District/State:</label>
                                    <select name="nPresentDistrict" style="box-sizing: border-box;padding-top: 18px;padding-bottom: 18px;border-radius: 5px;border: 1px solid #ebebeb;width: 100%;padding-left: 24px;#font-family: 'Poppins'">
                                        <option value="">Select District/State<span>&#11206;</span></option>
                                      </select>
                                </div>
                                <div class="form-input">
                                    <label class="required"><span>&#9733;</span>Address:</label>
                                    <input type="text" name="cAddress" placeholder="Address"/>
                                </div>
                                <div class="form-input">
                                    <input type="checkbox" name ="cAddressShare" class="form-check-input" id="cAddressShare">
                                    <label class="form-check-label" for="cAddressShare">Share Address</label>
                                </div>
                                <div class="form-input">
                                    <label class="required"><span>&#9733;</span>Contract NO:</label>
                                    <input type="text" name="cContactNo" placeholder="Contract NO"/>
                                </div>
                                <div class="form-input">
                                    <label class="required"><span>&#9733;</span>Password:</label>
                                    <input type="password" name="cPassword" placeholder="Password"/>
                                </div>
                                <div class="form-input">
                                    <label class="required"><span>&#9733;</span>Gmail:</label>
                                    <input type="gmail" name="cEmailId" placeholder="Gmail"/>
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="form-input">
                                    <label class="required"><span>&#9733;</span>Facebook ID:</label>
                                    <input type="text" name="cFbId" placeholder="Facebook ID"/>
                                </div>
                             
                                <div class="form-input">
                                    <label for="email" class="required"><span>&#9733;</span>Blood Group:</label>
                                    <select name="cBloodGroup" style="box-sizing: border-box;padding-top: 18px;padding-bottom: 18px;border-radius: 5px;border: 1px solid #ebebeb;width: 100%;padding-left: 24px;#font-family: 'Poppins'">
                                        <option value="">Select Blood Group<span>&#11206;</span></option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB-">AB-</option>
                                      </select>
                                </div>
                                <div class="form-input">
                                    <label for="nProfessionCategory" class="required"><span>&#9733;</span>Prosession Category:</label>
                                    <select name="nProfessionCategory" style="box-sizing: border-box;padding-top: 18px;padding-bottom: 18px;border-radius: 5px;border: 1px solid #ebebeb;width: 100%;padding-left: 24px;#font-family: 'Poppins'">
                                        <option value="">Select Prosession Category<span>&#11206;</span></option>
                                      </select>
                                </div>
                                <div class="form-input">
                                    <label for="nProfessionSubCategory" class="required"><span>&#9733;</span>Prosession sub Category:</label>
                                    <select name="nProfessionSubCategory" style="box-sizing: border-box;padding-top: 18px;padding-bottom: 18px;border-radius: 5px;border: 1px solid #ebebeb;width: 100%;padding-left: 24px;#font-family: 'Poppins'">
                                        <option value="">Select Prosession sub Category<span>&#11206;</span></option>
                                      </select>
                                </div>
                                <div class="form-input">
                                    <label for="cProfession" class="required"><span>&#9733;</span>Detall Of Profession:</label>
                                    <input type="text" name="cProfession" placeholder="Detall Of Profession"/>
                                </div>
                                <div class="form-input">
                                    <label for="cSpeciality" class="required"><span>&#9733;</span>Speciality:</label>
                                    <input type="text" name="cSpeciality"  placeholder="Speciality"/>
                                </div>
                                <div class="form-input">
                                    <label for="CHobby" class="required"><span>&#9733;</span>Hobby:</label>
                                    <input type="text" name="CHobby"  placeholder="Hobby"/>
                                </div>
                                <div class="form-input">
                                    <label for="cWantToServe" class="required">Are u interested to do anything voluntarily?</label>
                                    <input type="text" name="cWantToServe"  placeholder="Are u interested to do anything voluntarily?"/>
                                </div>
                                <div class="form-input">
                                    <label for="cWantToHelp" class="required">are u seeking for cooperation?</label>
                                    <input type="text" name="cWantToHelp" placeholder="Are u seeking for cooperation?"/>
                                </div>
                                <div class="form-input">
                                    <label for="cComment" class="required"><span>&#9733;</span>Comment:</label>
                                    <input type="text" name="cComment" placeholder="Comment"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                            
                            <button type="reset" class="submit" >Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
<!-- js script  -->

<script>
 window.addEventListener('DOMContentLoaded', (event) => {
    var baseUrl= !window.location.href.includes("index.php")?window.location.href:window.location.href.replace("/index.php","");
    var form = document.forms.namedItem('sara_bangla_88');
    var photo= form.querySelector("[name='cPhoto']");
    var country= form.querySelector("[name='nPresentCountry']");
    var presentDistrict= form.querySelector("[name='nPresentDistrict']");
    var districtAll= form.querySelector("[name='nDistrictId']");
    var schools= form.querySelector("[name='nSchoolId']");
    var profession= form.querySelector("[name='nProfessionCategory']");
    var subProfession= form.querySelector("[name='nProfessionSubCategory']");
    var countryUrl=baseUrl+"/ajax/getCountry.php";
    var professionUrl=baseUrl+"/ajax/getprofessioncategory.php";
    var subProfessionUrl=baseUrl+"/ajax/getprofessionsubcategory.php";
    var districtUrlAll=baseUrl+"/ajax/getDistrict.php";
    var schoolsUrl= baseUrl+"/ajax/getSchool.php";
    // form reset event
    // reset form and remove image preview;
    form.addEventListener("reset",function(event){
        let userResponse =confirm('are you sure to reset the form?');
        if(!userResponse){
           event.preventDefault();
           return;
        }
            var output = document.getElementById('previewContainer');
            output.innerHTML ="";
    })
    //fetching on load;
    fetchAndInsertToDom(countryUrl,'countries',country);
    fetchAndInsertToDom(professionUrl,'professionCategories',profession);
    fetchAndInsertToDom(districtUrlAll,'districts',districtAll);
    onChangeSelect(schoolsUrl,districtAll,schools,"schools");
    onChangeSelect(districtUrlAll,country,presentDistrict,"districts");
    onChangeSelect(subProfessionUrl,profession,subProfession,"professionSubCategories");
    function onChangeSelect(url,changeElement,processElement,responseField){
        changeElement.addEventListener("change",(event)=>{
            let queryStringName=event.target.name;
            let id = event.target.value;
            if(!name&&!id){
                alert("please select a valid value");
                while (processElement.children.length > 1) {
                processElement.removeChild(processElement.lastElementChild);
            }
        return;
            }
            let finalUrl= url+"?"+queryStringName+"="+id;
            fetchAndInsertToDom(finalUrl,responseField,processElement);
        });
    }
    photo.addEventListener("change",imagePreview);
    //imge preview function
    function imagePreview(event) {
      var output = document.getElementById('previewContainer');
      output.innerHTML ="";
      var allFiles= event.target.files;
      for(var i=0;i<allFiles.length;i++){
        var img = document.createElement("img");
        img.width="280";
        img.height="200";
        img.classList.add="m-2";
        img.src = URL.createObjectURL(allFiles[i]);
        output.append(img);
        img.onload = function() {
        URL.revokeObjectURL(img.src); // free memory
        }
      }
  };
    //ajax and dom manipulat
    function fetchAndInsertToDom(url,field,element){
        while (element.children.length > 1) {
        element.removeChild(element.lastElementChild);
            }
        fetch(url)
    .then(res=>res.json())
    .then(res=>{
      console.log(res);
      if(!Array.isArray(res[field])) return;
            res[field].forEach((value)=>{
                element.insertAdjacentHTML('beforeend',
                    `<option value=${value.id}>${value.name}</option>`
                );
            });
    }).catch(function(error){
      console.log(error);
    });
    }
    
});
</script>
<!-- end js script -->
</body>
</html>