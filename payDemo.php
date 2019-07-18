<?php
/*
  * microsecond 微秒     millisecond 毫秒
  *返回时间戳的毫秒数部分 15位时间 171130093438276 
  */
function get_millisecond()
{
    list($usec, $sec) = explode(" ", microtime());
    $msec		= round($usec*1000);
	$msec		= str_pad($msec,3,'0',STR_PAD_RIGHT);
    $timePrefix	= date("ymdHis",$sec).$msec;
    return $timePrefix;
}
function build_order_no($lens=5){
    //return uniqid(). str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    $timePrefix    = get_millisecond();
    $chars = array(
        "0", "1", "2","3", "4", "5", "6", "7", "8", "9",
        "0", "1", "2","3", "4", "5", "6", "7", "8", "9",
        "0", "1", "2","3", "4", "5", "6", "7", "8", "9",
        "0", "1", "2","3", "4", "5", "6", "7", "8", "9",
        "0", "1", "2","3", "4", "5", "6", "7", "8", "9",
        "0", "1", "2","3", "4", "5", "6", "7", "8", "9");
    $charsLen = count($chars) - 1;
    shuffle($chars);
    $output = "";
    for ($i=0; $i< $lens; $i++)
    {
        $output .= $chars[mt_rand(0, $charsLen)];
    }
    return $timePrefix.$output;
}


include("BeikelinSdk.php");
$obj = new BeikelinSdk();



//付款 pos_code=abcdefg
//$data = [];
//$data['cmd_id']			= 25;#请求的方法代号 14-代表支付。12-代表查询付款状态。16-获取门店支付方式。13-发起退款....
//$data['pos_code']		= '10211220000001246';#pos机的机器编号 .测试的时候 此编号，请保留不变
//$data['pos_code']		= 'rdg1201';
//$data['operator_no']	= '123456';
//$data['out_no']			= build_order_no();#商户自己的订单号。不能相同，每次请求 请修改
//$data['subject']		= '飞机转弯灯';	#String(256)	商品名称
//$data['body']			= "歼20转弯灯";	#String(250)	商品描述
//$data['pmt_tag']		= "wx_qr_p";#['alipay_qr_p','alipay_qr_a','wx_qr_p','wx_qr_a'];支付类型-p主扫，a为被扫
//$data['auth_code']	='134597964396893882';
//$data['total_fee']		= "1";#原始交易金额（以分为单位，没有小数点）
//$data['auth_code']	= "134655288833240394";#pos机扫到的一串数字，此参数为空则为主扫模式，否则为被扫模式
//$data['notify_url'] = "http://test.beikelin.com/callbacktest";#商户自己接收回调通知的url地址。必须是外网地址
/*

//发起退款7.15
$data = [];
$data['cmd_id'] = 26;
$data['refund_out_no'] = build_order_no();#商户自己的订单号。不能相同，每次请求 请修改
$data['out_no'] = '17122210070845377832';	#原订单 商户退款单号
$data['pos_code'] = 'rdg1201';
$data['ord_no'] = '20171222666283190';	#原交易天府支付平台交易号
$data['refund_way'] = 1;#退款方式，1为撤销 2为退货
$data['total_fee'] = '1';		#原订单总金额
$data['refund_fee'] = '1';		#退款总金额
$data['pmt_tag'] = 'wx_qr_p';		#支付类型
#$data['refund_reason']		= 'tset';//退款原因，可选参数 String（256）,天府要求必穿

//查询付款订单状态
$data = [];
$data['cmd_id'] = 27;
$data['pos_code'] = 'rdg1201';
$data['out_no'] = '17121809223330025935';

//获取订单列表
$data = [];
$data['cmd_id'] = 28;
$data['pos_code'] = 'abcdefg';
$data['ord_type'] = 1;#交易方式1消费，2辙单/退货


//查询今日统计
$data = [];
$data['cmd_id'] = 29;
$data['pos_code'] = 'abcdefg';

*/


//静态二维码支付
$data = [];
$data['cmd_id']			= 30;#请求的方法代号 14-代表支付。12-代表查询付款状态。16-获取门店支付方式。13-发起退款....
$data['merchant_id']	= 285;#请求的方法代号 14-代表支付。12-代表查询付款状态。16-获取门店支付方式。13-发起退款....
$data['out_no']			= build_order_no();#商户自己的订单号。不能相同，每次请求 请修改
$data['total_fee']		= "1";#原始交易金额（以分为单位，没有小数点）
$data['notify_url'] = "http://test.beikelin.com/callbacktest";#商户自己接收回调通知的url地址。必须是外网地址


$res = $obj->api('tfpay',$data);
echo '<pre />';print_r($res);




















