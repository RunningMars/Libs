<?php
require("upload.class.php");
//这里实例化后赋值为数组，数组的下标要对应类中属性的值，否则不能传递值，可以不分先后但是必须一致
$up = new FileUpload(array('israndname'=>'true',"filepath"=>"./images/".date("Ym"),'allowtype'=>array("gif","jpg","jpeg","png"),"maxsize"=>1000000));
//   echo '<pre />';
//   var_dump($_POST);
//   var_dump($_POST['extension']);
   if($up -> uploadFile("file")){
       print_r($up -> getNewFileName());
       echo json_encode($up -> getNewFileName());
   } else{
       echo json_encode($up -> getErrorMsg());
   }
