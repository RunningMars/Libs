<?php

    const DEBUG = true;
    const open_url = "http://etest.cgnb.cn:8903/tianfupay/";

    $partner = '12038387';
    $subpartner = '12038698';
    $key = 'f7d16bef35c740c4884ffc4b9a89ab91';

//签名
    function make_sign($array, $signKey)
    {
        if (empty($array)) return '';
        ksort($array);
        //$string = http_build_query($array);

        $arr_temp = array();
        foreach ($array as $key => $val) {
            $val !== '' && $arr_temp[] = $key . '=' . $val;
        }
        $string = implode('&', $arr_temp);
        $string = $string . $signKey;
        //echo $string;die;
        #先sha256签名 再md5签名
        $sign_str = md5($string);
        return $sign_str;
    }

        $url = "http://etest.cgnb.cn:8903/tianfupay/pay/frontPay";
        $data['partner'] = $partner;    //商户号由天府支付统一分配的正整数(120XXXXXXX)
        $data['service'] = 'pay_service';
        $data['service_version'] = 1.1;
        $data['input_charset'] = 'UTF-8';
        $data['fee_type'] = 1;
        $data['trans_pattern'] = 0;
        $data['qr_return_type'] = 1;
        $data['spbill_create_ip'] = '127.0.0.1';
        $data['biz_type'] = '0001';
        $data['show_url'] = 'http://index.beikelin.com/';
        $data['notify_url'] = 'http://index.beikelin.com/';
        $data['return_url'] = 'http://index.beikelin.com/';
        $data['store_id'] = '1';//使用支付宝 扫描pos机的时候 此字段必传
        //以下为用户传过来的变量
        $data['subpartner'] = $subpartner; //二级商户号，二级商户支付时必须送一级商户号和二级商户号
        $data['out_trade_no'] = '1212323423553453';//商户内部的订单号
        $data['subject'] = '商品名称'; //商品名称
        $data['body'] = '商品描述'; //对一笔交易的具体描述信息,商品描述字符串累加传给body
        $data['auth_code'] = 'alipay_qr_a';//wx_qr_a，alipay_qr_a
        $data['trans_channel'] = 'alipay_qr_p';//wx_qr_a -扫别人手机上的条码支付，wx_qr_p 别人扫pos alipay_qr_a alipay_qr_p
        $data['total_fee'] = 0.01;//总金额,单位元
        $data['sign'] = make_sign($data, $key);
        $data['sign_type'] = 'MD5';

            $return = http($url, json_encode($data));
            echo '<pre />';
            print_r(json_decode($return, true));


    //退款接口
//    [refund_status] => 1
//    [retcode] => 1011
//    [retmsg] => 该笔订单是二级商户订单，特约商户不允许退款
//    [service] => refund_service
//    [service_version] => 1.0
//    [input_charset] => UTF-8
//    [sign_type] => MD5
//    [sign] => 102c2d338938e9993596c21a68aa8cdd
//    [returnSerNo] => 20170921174022124990
//    [retCode] => 0000
//    [retMsg] => 成功
################# 再次退款 ########################
//[refund_status] => 1
//[retcode] => 1002
//[retmsg] => 无【0-成功】状态的原订单，或者存在多笔【0-成功】状态的原订单
//[service] => refund_service
//[service_version] => 1.0
//[input_charset] => UTF-8
//[sign_type] => MD5
//[sign] => d25698d3c329981b6a4a3ca285aa4104
//[returnSerNo] => 20170922142626958864
//[retCode] => 0000
//[retMsg] => 成功
    function refund()
    {
        $url = 'http://etest.cgnb.cn:8903/tianfupay/pay/frontRefund';
        $data['service'] = 'refund_service';
        $data['service_version'] = '1.0';
        $data['input_charset'] = 'UTF-8';
        $data['partner'] = $this->partner;
        //以下为此接口有关的用户传过来的变量
        $data['subpartner'] = $this->subpartner;
        $data['out_trade_no'] = '1199e37dbe79750108a5b5f92011f23e';//商户订单号
        $data['transaction_id'] = '20170921241099';//平台订单号
        $data['out_refund_no'] = '1556153321213';//商户退款单号
        $data['total_fee'] = '0.01';
        $data['refund_fee'] = '0.01';
        $data['refund_reason'] = '退款原因';
        $data['trans_channel'] = 'alipay_qr_p';
        $data['sign'] = $this->make_sign($data, $this->key);
        $data['sign_type'] = 'MD5';

            $return = http($url, json_encode($data));
            echo '<pre />';
            print_r(json_decode($return, true));
    }
#使用curl post,get 的传输
    function http($url,$params,$post=true){
        //启动一个CURL会话
        $ch = curl_init();
        // 设置curl允许执行的最长秒数
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        //忽略证书
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        // 获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        if($post){
            curl_setopt($ch, CURLOPT_URL,$url);
            //发送一个常规的POST请求。
            curl_setopt($ch, CURLOPT_POST, 1);
            //curl_setopt($ch, CURLOPT_POSTFIELDS,$data);//只接受1维数组
            curl_setopt($ch, CURLOPT_POSTFIELDS, is_array($params)? http_build_query($params):$params);//可post多维数组
        }else{
            curl_setopt($ch, CURLOPT_URL, $url.'?'.is_array($params)? http_build_query($params):$params);
        }
        curl_setopt($ch, CURLOPT_HEADER,0);//是否需要头部信息（否）
        // 执行操作
        $result = curl_exec($ch);
        curl_close($ch);
        #返回数据
        return $result;
    }


