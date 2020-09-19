<?php
    session_start();
    include_once "Db.php";
  
   
    function input_prepare($data) {
        if(isset($_POST[$data])){
          $data = trim($_POST[$data]);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        return null;
      }
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
        $file = isset($_FILES['cPhoto'])?$_FILES['cPhoto']['tmp_name']:'';
        if($file && filesize($file)>(300*1000)){
          $_SESSION['flash']['required']="file size is big insert under 300kb image";
          header("Location:index.php");
          return;
        }
        $cName=input_prepare("cName");
        $cPhoto=base64_encode(file_get_contents(addslashes($file)));
        $nPhotoShare=input_prepare("nPhotoShare") !=null?1:0;
        $cDoB=input_prepare("cDoB");
        $nyearDoB=intval(date('Y',strtotime($cDoB)));
        $nBirthDateShare=input_prepare("nBirthDateShare")!=null?1:0;
        $nDistrictId=input_prepare("nDistrictId");
        $nSchoolId=input_prepare("nSchoolId");
        $nPresentCountry=input_prepare("nPresentCountry");
        $nPresentDistrict=input_prepare("nPresentDistrict");
        $cAddress=input_prepare("cAddress");
        $cAddressShare=input_prepare("cAddressShare")!=null?1:0;
        $cContactNo=input_prepare("cContactNo");
        $cEmailId=input_prepare("cEmailId");
        $cPassword=input_prepare("cPassword");
        $cFbId=input_prepare("cFbId");
        $cBloodGroup=input_prepare("cBloodGroup");
        $nProfessionCategory=input_prepare("nProfessionCategory");
        $nProfessionSubCategory=input_prepare("nProfessionSubCategory");
        $cProfession=input_prepare("cProfession");
        $cSpeciality=input_prepare("cSpeciality");
        $CHobby=input_prepare("CHobby");
        $cWantToServe=input_prepare("cWantToServe");
        $cWantToHelp=input_prepare("cWantToHelp");
        $cComment=input_prepare("cComment");
        // var_dump(filesize($_FILES['cPhoto']['tmp_name']));
        // return;
        if(
          $cName&&$cPhoto&&$cDoB&&$cPassword&&
            $nyearDoB&&$nDistrictId&&
            $nSchoolId&&$nPresentCountry&&$nPresentDistrict&&
            $cAddress&&$cContactNo&&$cEmailId&&
            $cFbId&&$cBloodGroup&&$nProfessionCategory&&$nProfessionSubCategory&
            $cProfession&&$cSpeciality&&$CHobby&&
            $cComment
        )
        {
          $sql = "insert into tblmemberdetailpublic (
            cName,cPhoto,nPhotoShare,cDoB
            ,nyearDoB,nBirthDateShare,nDistrictId
            ,nSchoolId,nPresentCountry,nPresentDistrict
            ,cAddress,cAddressShare,cContactNo,cEmailId
            ,cFbId,cBloodGroup,nProfessionCategory,nProfessionSubCategory
            ,cProfession,cSpeciality,CHobby,cWantToServe,cWantToHelp,cComment,cPassword) 
            values( '$cName','$cPhoto','$nPhotoShare','$cDoB'
            ,'$nyearDoB','$nBirthDateShare','$nDistrictId'
            ,'$nSchoolId','$nPresentCountry','$nPresentDistrict'
            ,'$cAddress','$cAddressShare','$cContactNo','$cEmailId'
            ,'$cFbId','$cBloodGroup','$nProfessionCategory','$nProfessionSubCategory'
            ,'$cProfession','$cSpeciality','$CHobby','$cWantToServe','$cWantToHelp'
            ,'$cComment','$cPassword')";
            $db= db();
            if ($db->con->query($sql) === TRUE) {
              $_SESSION['flash']['success']="Insert data successfully";
                header("Location:index.php");
              } else {
                $_SESSION['flash']['required']=$db->con->error;
                  header("Location:index.php");
              }
              $db->close();
        }
        else{
         
          $_SESSION['flash']['required']="please fill all the required field";
            header("Location:index.php");
        }
        
        }
        else{
            echo "method not found";
        }
        


    
    
        
    function db(){
        $db = Db::getDb();
        return $db;
    }
     