<?php
 
require_once ("../lib/YopClient.php");
require_once ("../lib/YopClient3.php");
require_once ("../lib/Util/YopSignUtils.php");
require_once("../conf/conf.php");

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


//批量转账查询
function batchQuery(){

    global  $private_key;
    global $yop_public_key;
    global $merchantNo;


    $request = new YopRequest($merchantNo, $private_key, "https://open.yeepay.com/yop-center",$yop_public_key);


    //加入请求参数
	$request->addParam("ppMerchantNo",$merchantNo);
    $request->addParam("batchNo",$_REQUEST['batchNo']);
  

    $response = YopClient3::post("/rest/v1.0/payplus/transfer/batchQuery", $request);
	//var_dump($response);
    if($response->validSign==1){
        echo "返回结果签名验证成功!\n";
    }
    //取得返回结果
    $data=object_array($response);
 
    return $data;
    
 }
  $array=batchQuery();  
  
 if( $array['result'] == NULL)
 {
 	echo "error:".$array['error'];
  return;}
 else{
 $result= $array['result'] ;
 //var_dump($result);
}
 
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> 批量转账查询 </title>
</head>
<body>
<br /> <br />
<table width="70%" border="0" align="center" cellpadding="5" cellspacing="0" style="border:solid 1px #107929">
    <tr>
        <th align="center" height="30" colspan="5" bgcolor="#6BBE18">
            批量转账查询--返回参数
        </th>
    </tr>
	    <tr >
        <td width="25%" align="left">&nbsp;批次号</td>
        <td width="5%"  align="center"> : </td>
        <td width="45"  align="left"> <?php echo $result['batchNo'];?> </td>
        <td width="5%"  align="center"> - </td>
        <td width="30%" align="left">batchNo</td>
       </tr>
 			<td width="35%" align="left">&nbsp;批次详情</td>
				<td width="5%"  align="center"> : </td> 
				<td width="45"  align="left"><textarea cols="70" rows="10">  <?php  if (empty($result['transferList'])) {echo "";} else {echo preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", json_encode($result['transferList'])), "\n";  }?>  </textarea></td>
				 
				 <td width="5%"  align="center"> - </td> 
				<td width="20%" align="left">transferList</td> 
			</tr>

	     
    <tr >
        <td width="25%" align="left">&nbsp;请求返回码</td>
        <td width="5%"  align="center"> : </td>
        <td width="45"  align="left"> <?php echo $result['code'];?> </td>
        <td width="5%"  align="center"> - </td>
        <td width="30%" align="left">code</td>
    </tr>

    <tr>
        <td width="25%" align="left">&nbsp;请求返回信息</td>
        <td width="5%"  align="center"> : </td>
        <td width="35%" align="left"> <?php echo  $result['message'];?> </td>
        <td width="5%"  align="center"> - </td>
        <td width="30%" align="left">message</td>
    </tr>

     
</table>
</body>
</html>
