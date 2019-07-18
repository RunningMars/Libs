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


//查询可结算金额
function calculateSelfSettle(){

    global  $private_key;
    global $yop_public_key;
    global $merchantNo;


    $request = new YopRequest($merchantNo, $private_key, "https://open.yeepay.com/yop-center",$yop_public_key);


    //加入请求参数
    $request->addParam("ppMerchantNo",$merchantNo);
    $request->addParam("settleTime", $_REQUEST['settleTime']); 
    $request->addParam("settleProduct", $_REQUEST['settleProduct']);
 

	
	
    $response = YopClient3::post("/rest/v1.0/payplus/user/calculateSelfSettle", $request);
	//  var_dump($response);
    if($response->validSign==1){
        echo "返回结果签名验证成功!\n";
    }
    //取得返回结果
    $data=object_array($response);
 
    return $data;
    
 }
  $array=calculateSelfSettle();  
  
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
<title> 查询可结算金额 </title>
</head>
	<body>
		<br /> <br />
		<table width="70%" border="0" align="center" cellpadding="5" cellspacing="0" style="border:solid 1px #107929">
			<tr>
		  		<th align="center" height="30" colspan="5" bgcolor="#6BBE18">
    查询可结算金额
</th>
		  	</tr>
	        <tr >
				<td width="25%" align="left">&nbsp;请求返回码</td>
				<td width="5%"  align="center"> : </td>
				<td width="55"  align="left"> <?php echo $result['code'];?> </td>
                <td width="5%"  align="center"> - </td>
                <td width="20%" align="left">code</td>
            </tr>

        <tr>
            <td width="25%" align="left">&nbsp;请求返回信息</td>
            <td width="5%"  align="center"> : </td>
            <td width="55%" align="left"> <?php echo  $result['message'];?> </td>
            <td width="5%"  align="center"> - </td>
            <td width="20%" align="left">message</td>
        </tr>
        <tr >
            <td width="25%" align="left">&nbsp;商户编号</td>
            <td width="5%"  align="center"> : </td>
            <td width="55"  align="left"> <?php echo $result['ppMerchantNo'];?> </td>
            <td width="5%"  align="center"> - </td>
            <td width="20%" align="left">ppMerchantNo</td>
        </tr>

       
        <tr >
            <td width="25%" align="left">&nbsp;待结算金额</td>
            <td width="5%"  align="center"> : </td>
            <td width="55"  align="left"> <?php echo $result['settleAmount'];?> </td>
            <td width="5%"  align="center"> - </td>
            <td width="20%" align="left">settleAmount</td>
        </tr>

     
        <tr>
            <td width="25%" align="left">&nbsp;手续费</td>
            <td width="5%"  align="center"> : </td>
            <td width="55%" align="left"> <?php echo  $result['settleFee'];?> </td>
            <td width="5%"  align="center"> - </td>
            <td width="20%" align="left">settleFee</td>
        </tr>
             
        <tr >
            <td width="25%" align="left">&nbsp;实际打款金额</td>
            <td width="5%"  align="center"> : </td>
            <td width="55"  align="left"> <?php echo $result['remitAmount'];?> </td>
            <td width="5%"  align="center"> - </td>
            <td width="20%" align="left">remitAmount</td>
        </tr>

     
        <tr>
            <td width="25%" align="left">&nbsp;打款手续费类型</td>
            <td width="5%"  align="center"> : </td>
            <td width="55%" align="left"> <?php echo  $result['feeType'];?> </td>
            <td width="5%"  align="center"> - </td>
            <td width="20%" align="left">feeType</td>
        </tr>

      </table>
    </body>
</html>
