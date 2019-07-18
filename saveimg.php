<?php
$mime_arr = array(
    "image/gif"  => "gif",
    "image/jpg"  => "jpg",
    "image/jpeg" => "jpeg",
    "image/png"  => "png"
);
//file_put_contents('./testlog.txt','32132132138888866',FILE_APPEND);
require("FileUpload.class.php");
$sub_path = "images/".date("Ym").'/';

//这里实例化后赋值为数组，数组的下标要对应类中属性的值，否则不能传递值，可以不分先后但是必须一致
file_put_contents('testlog.txt',print_r($_FILES,TRUE),FILE_APPEND);

$return = [];
$ar = array_keys($_FILES['file']['name']);
//file_put_contents('testlog.txt',print_r($ar,TRUE),FILE_APPEND);
foreach($ar as $key){
    $up = null;
    $extension = $_FILES['file']['type'][$key];
    $extension = isset($mime_arr[$extension]) ? $mime_arr[$extension] : '';
    if(!$extension){
        $return[$key]['msg'] = '没有获取到MIME类型';
        $return[$key]['status'] = 1;
        $return[$key]['path'] = '';
        continue;
    }
    $up = new FileUpload(array('israndname'=>'true','filetype' => $extension,"filepath"=>__DIR__."/",'allowtype'=>array('jpeg', 'png', 'gif', 'jpg'),"maxsize"=>5 * 1024 * 1024));
    if($up -> uploadFile($key)){
        $return[$key]['path']   = $sub_path . $up -> getNewFileName();
        $return[$key]['status'] = 0;
        $return[$key]['msg']    = '上传成功!';
    }else{
        $return[$key]['path']   = '';
        $return[$key]['status'] = 1;
        $return[$key]['msg']    = $up -> getErrorMsg();
    }
}
//file_put_contents('./testlog.txt',print_r($return,TRUE),FILE_APPEND);
exit(json_encode($return));

?>
