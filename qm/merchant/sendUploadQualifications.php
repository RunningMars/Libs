<?php
include '../conf/conf.php';
require_once ("../lib/YopClient3.php");

function object_array($array) { 
    if(is_object($array)) { 
        $array = (array)$array; 
     } if(is_array($array)) { 
         foreach($array as $key=>$value) { 
             $array[$key] = object_array($value); 
             } 
     } 
     return $array; 
}



function uploadQualifications(){
	
       global $merchantNo;
	   global $private_key;
	   global $yop_public_key;
	   
	   
	$image = $_REQUEST['file']; 
	 
    $base64_image = base64_encode(file_get_contents($image));  
    $request = new YopRequest($merchantNo, $private_key, "https://open.yeepay.com/yop-center",$yop_public_key);
     
    $request->addParam("ledgerNo", $_REQUEST['ledgerNo']); 
  
     $request->addParam("qualificationType", $_REQUEST['qualificationType']);
     $request->addParam("imgBase64Buffer", $base64_image);

     $response = YopClient3::post("/rest/v1.0/payplus/merchant/uploadQualifications", $request);
	   
    if($response->validSign==1){
        echo "返回结果签名验证成功!\n";
    }
    //取得返回结果
    $data=object_array($response);
    
    return $data;
    
 }
  $array=uploadQualifications();  
  
 if( $array['result'] == NULL)
 {
 	echo "error:".$array['error'];
  return;}
 else{
 $result= $array['result'] ;
  // var_dump($result);
}
?> 


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>分账方资质上传结果</title>
</head>
	<body>	
		<br /> <br />
		<table width="70%" border="0" align="center" cellpadding="5" cellspacing="0" style="border:solid 1px #107929">
			<tr>
		  		<th align="center" height="30" colspan="5" bgcolor="#6BBE18">
					分账方资质上传结果
				</th>
		  	</tr>

				<tr >
				<td width="25%" align="left">&nbsp;分账方编号</td>
				<td width="5%"  align="center"> : </td> 
				<td width="45"  align="left"> <?php echo $result['ledgerNo'];?> </td>
				<td width="5%"  align="center"> - </td> 
				<td width="30%" align="left">ledgerNo</td> 
			</tr>

				<tr >
				<td width="25%" align="left">&nbsp;返回码</td>
				<td width="5%"  align="center"> : </td> 
				<td width="45"  align="left"> <?php echo $result['code'];?> </td>
				<td width="5%"  align="center"> - </td> 
				<td width="30%" align="left">code</td> 
			</tr>

			<tr>
				<td width="25%" align="left">&nbsp;返回信息</td>
				<td width="5%"  align="center"> : </td> 
				<td width="35%" align="left"> <?php echo $result['message'];?> </td>
				<td width="5%"  align="center"> - </td> 
				<td width="30%" align="left">message</td> 
			</tr>

				 
 

		</table>

	</body>
</html>