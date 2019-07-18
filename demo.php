<meta charset=utf-8><?php
/**
 * CURL模拟http请求方法
 * @param $url
 * @param array $params
 * @param bool $post
 * @return mixed
 */
function http($url,$params = [] ,$post=true){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    if($params){
        if($post){
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, 1);
            //curl_setopt($ch, CURLOPT_POSTFIELDS,$data);//只接受1维数组
            curl_setopt($ch, CURLOPT_POSTFIELDS, is_array($params)? http_build_query($params):$params);//可post多维数组
        }else{
            curl_setopt($ch, CURLOPT_URL, $url.'?'.(is_array($params)? http_build_query($params):$params));
        }
    }else{
        curl_setopt($ch, CURLOPT_URL, $url);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
 include('OpenSSLAES.php');


 $appId = '您的AppId ';
 $appSecret = '您的AppSecret';
 //AppId 和 AppSecret获取方式 http://open.api.beikelin.com
 //18602822598  123456

 
// $appId = '13025874136';
// $appSecret = 'QDLPI50R491T74Z2';

 $appId = '13530600106';
 $appSecret = '1H7V0T58E0OU5OLR';
 

 //提交数据接口请求地址
 //$api = 'http://daitest.beikelin.com/api/cater/merchant/add';
 
 
 
 
 
 /*
 //上传图片
 $api = 'http://daitest.beikelin.com/api/file/upload';
 //请求数据
 $data = [];//请求参数参照各个接口请求数据文档
 $data['file_content'] = base64_encode(file_get_contents(mb_convert_encoding('./dfg.gif', 'gbk', 'utf-8')));
 $data['file_md5'] = md5($data['file_content']);
 $data['file_ext'] = 'gif';
 */
 
 
 
 
 /*
  //新增车主资料
 $api = 'http://daitest.beikelin.com/api/credit/car_insurance/person/add';
 //请求数据
 $data = [];//请求参数参照各个接口请求数据文档

 $data['telephone'] = '13612365546';
 $data['id_no'] = '51390219840504858X';
 $data['name']='BB';
 $data['sex']='2';
 $data['marriage']='未婚';
 $data['education']='中学';
  $data['id_sdate']='2018-05-01';
   $data['id_edate']='2018-05-12';
 $data['residence']='四川省乐山监督管理局东立国际大驾光临大驾光临$%&#!@';
 $data['current_address']='四川省绵阳绝对路径噶都江两个的记录挂机了对方激光雷达法经过四川省綿陽絕對路徑噶都江兩個的記錄掛機了對方激光雷達法經過';
 $data['id_positive']='images/201806/824012891de76e3658aa7ffd168c13c0.gif';
  $data['id_back']='images/201806/824012891de76e3658aa7ffd168c13c0.gif';
 */
 
 
 
 /*
 //查询车主
$api = 'http://daitest.beikelin.com/api/credit/car_insurance/person/info';
 //请求数据
$data = [];//请求参数参照各个接口请求数据文档
$data['telephone'] = '13612365546';
$data['id_no']='51390219840504858X';
*/


 
 //修改车主
// $api = 'http://ddd.com/api/credit/car_insurance/person/modify';
// $data=[];
// $data['telephone'] = '13612365546';
// $data['id_no'] = '51390219840504858X';
//$data['name']='BB';
// $data['sex']='2';
// $data['marriage']='未婚';
//$data['education']='中学';
 // $data['id_sdate']='2018-05-01';
  // $data['id_edate']='2018-05-12';
 //$data['residence']='四川省乐山监督管理局东立国际大驾光临大驾光临$%&#!@';
 //$data['current_address']='四川省绵阳绝对路径噶都江两个的记录挂机了对方激光雷达法经过四川省綿陽絕對路徑噶都江兩個的記錄掛機了對方激光雷達法經過';
 //$data['id_positive']='images/201806/824012891de76e3658aa7ffd168c13c0.gif';
 // $data['id_back']='images/201806/824012891de76e3658aa7ffd168c13c0.gif';
 
 
 
 /*
 //新增车辆
 $api = 'http://daitest.beikelin.com/api/credit/car_insurance/car/add';
 $data=[];
 $data['telephone']='13685825800';
 $data['vin']='1235648/2De554455';
 $data['plate_no']='川A jljljl';
 */
 
 
 
 /*
 //新增房东资料
 $api='http://data.dai.beikelin.com/api/credit/rent_house/person/add';
 $data=[];
 $data['channel_tel']='13530600106';
 $data['telephone']='13000000001';
 $data['id_no']='513906198805073145';
 $data['name']='张学友';
 $data['sex']='1';
 
 */

 /*
  //新增餐饮商户
 $api='http://data.dai.beikelin.com/api/credit/cater/merchant/add';
 $data=[];
 $data['telephone']='13000000002';
 $data['business_license_number']='111111111111111123';
 $data['boss_name']='TT';
 $data['boss_phone']='13577747555';
 $data['boss_identity_card']='513906198805073125';
 */
 
 /*
//查询餐饮商户
 $api='http://data.dai.beikelin.com/api/credit/cater/merchant/info';
 $data=[];
 $data['telephone']='13000000001';
 $data['business_license_number']='111111111111111122';

 */
/*
 //修改餐饮商户
 $api='http://data.dai.beikelin.com/api/credit/cater/merchant/modify';
 $data=[];
 $data['telephone']='13000000002';
 $data['business_license_number']='111111111111111123';
 $data['name']='大蓉和';
 $data['short_name']='大蓉和';
 $data['supplier_tel']=['13854245888','13555525255'];
*/
/*
//新增门店
 $api='http://data.dai.beikelin.com/api/credit/cater/shop/add';
 $data=[];
 $data['merchant_tel']='13000000002';
 $data['telephone']='13555525299';
 $data['shop_no']='02';
*/

/*
//修改门店
 $api='http://data.dai.beikelin.com/api/credit/cater/shop/modify';
 $data=[];
 $data['merchant_tel']='13000000002';
 $data['telephone']='13555525299';
 $data['shop_no']='02';
 $data['name']='东门店';
 $data['open_hours']=['7:00-12:00','14:00-22:00'];
$data['shop_pic']='images/201806/c157439a6321a3a68280bc07e1513cb6.png';
*/

/*
//门店列表
 $api='http://data.dai.beikelin.com/api/credit/cater/shop/list';
 $data=[];
 $data['merchant_tel']='13000000002';
*/


/*
//新增供应商
 $api='http://data.dai.beikelin.com/api/credit/supplier/supplier/add';
 $data=[];
 $data['telephone']='13555525255';
 $data['business_license_number']='111111111112111850';
 $data['boss_name']='老参';
 $data['boss_phone']='13999999999';
 $data['boss_identity_card']='510104201309073145';
 $data['name']='餐具供应商';
 $data['short_name']='餐具供应商';
*/

/*
//修改供应商
 $api='http://data.dai.beikelin.com/api/credit/supplier/supplier/modify';
 $data=[];
 $data['telephone']='13555525255';
 $data['business_license_number']='111111111112111850';
 $data['boss_name']='老参啊';
 $data['boss_phone']='13999999999';
 $data['boss_identity_card']='510104201309073145';
 $data['name']='餐具供应商啊';
 $data['short_name']='餐具供应商啊';
*/
/*
//新增会员
 $api='http://data.dai.beikelin.com/api/credit/cater/member/add';
 $data=[];
 $data['merchant_tel']='13000000001';
 $data['id_no']='856111111112111850';
 $data['telephone']='13855485487';
 $data['name']='大力';

*/

/*
//新增房东
 $api='http://data.dai.beikelin.com/api/credit/rent_house/person/add';
 $data=[];
  $data['telephone']='13855485487';
 $data['id_no']='513902198206073158';
 $data['name']='万一';
 $data['sex']='1';
*/
 /*
//修改房东
 $api='http://data.dai.beikelin.com/api/credit/rent_house/person/modify';
 $data=[];
  $data['telephone']='13855485487';
 $data['sex']='2';
 $data['marriage']='已婚';
*/


/*
 //新增房源
 $api='http://data.dai.beikelin.com/api/credit/rent_house/house/add';
 $data=[];
  $data['property_right_no']='155521555222235';
 $data['property_right_phone']='13855485487';
 $data['property_right_id_no']='513902198206073158';
 $data['property_right_name']='万一';
 $data['property_right_bank_card']='1125455554488888888';
 $data['property_right_get_time']='2018-05-10';
*/
/*
//新增车主
 $api='http://data.dai.beikelin.com/api/credit/car_insurance/person/add';
 $data=[];
  $data['telephone']='13855485487';
 $data['id_no']='513902198206073158';
 $data['name']='万一';
 $data['sex']='1';
*/


//修改车主
// $api='http://data.dai.beikelin.com/api/credit/car_insurance/person/modify';
// $data=[];
//  $data['telephone']='13855485487';
// $data['residence']='四川省成都市武侯区省体育馆';
// $data['support_persons']=5;
// $data['attachment']=['images/201806/c157439a6321a3a68280bc07e1513cb6.png',];

/*
//新增车辆
 $api='http://data.dai.beikelin.com/api/credit/car_insurance/car/add';
 $data=[];
  $data['telephone']='13855485487';
 $data['vin']='11154455888877785';
 $data['plate_no']='川ACB198';

*/

//新增交易数据
 $api='http://ddd.com/api/credit/trading/record/add';
 $data=[];
 $data['industry_no']='1';
 $data['relative_table_tel']='13000000001';
 $data['trade_type']='1';
 $data['out_no']='11254487574534857458';
 $data['ord_no']='55588879654445487854';
 $data['trade_amount']=50001;
 $data['origin_amount']=50002;
 $data['deduct_amount']=50003;
 $data['trade_time']='1525104000';


 
 
 echo "<pre />";

 
 
 
 
 //加密请求数据

 $aes = new OpenSSLAES($appSecret);
 $string = json_encode($data);
 $string = $aes->encrypt($string);

 echo "请求参数：";
 print_r($data);
 
  echo "加密过后：<br />";
 echo $string;
 echo "<hr />";
 
 //发起请求

 $params['app_id'] = $appId;
 $params['data'] = $string;
 $params['timestamp'] = time();
$response = http($api,$params); // post 提交
  //$response = http($api,$params,false); // get 提交
 

 echo "密文返回：<br />";
 echo $response;
 echo "<hr />";

 //接收请求返回

 $result = json_decode($response,1);
 if(isset($result['error_code']) && $result['error_code']==0){
     //正常返回 - 到下一步解密返回数据

 }else{
     //错误信息
     print_r($result);
     exit();
 }


 //解密返回数据

 $response_data = $result['data'];//返回参数参照接口返回参数说明文档
 $string = $aes->decrypt($response_data);
 $response_array = json_decode($string,1);

  echo "解密过后：<br />";

 print_r($response_array);












