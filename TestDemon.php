<?php
/**
 * Created by RDG
 * Date: 2017/9/11 0011
 * Time: 15:28
 * 测试demon
 */
include("code/beikelinSdk/BeikelinSdk.php");
$obj = new BeikelinSdk();


////下单数据
//$data = [];
//$data['cmd_id'] = 14;#请求的方法代号 14-代表支付。12-代表查询付款状态。16-获取门店支付方式。13-发起退款....
//$data['pos_code'] = 'abcdefg';#pos机的机器编号 .测试的时候 此编号，请保留不变
//$data['out_no'] = '54f1hsdsd1fs44013';#商户自己的订单号。不能相同，每次请求 请修改
//$data['pmt_tag'] = "WeixinBERL";#支付方式标签 支付宝：AlipayCS 微信： WeixinBERL
//$data['pmt_name'] = "自定义的支付方式13";
//$data['original_amount'] = "1";#原始交易金额（以分为单位，没有小数点）
//$data['trade_amount'] = "1";#实际交易金额（以分为单位，没有小数点）
//$data['ord_name'] = "购买物品订单名称13";#订单名称（描述）
//$data['auth_code'] = "134652732601832803";#pos机扫到的一串数字，此参数为空则为被扫模式，否则为主扫模式
//$data['notify_url'] = "http://test.beikelin.com/callbacktest";#商户自己接收回调通知的url地址。必须是外网地址




//查询订单明细(out_no ,ord_no二选一)
//$data = [];
//$data['cmd_id'] = 11;
//$data['pos_code'] = 'abcdefg';
//$data['ord_no'] = '9150511540109955951211613';#商户自己的订单号
/*
 *   [errcode] => 0
    [timestamp] => 1505116875
    [data] => Array
        (
            [pmt_tag] => WeixinBERL
            [pmt_name] => 微信支付(测试)
            [diy_pmt_name] => 微信支付(测试)
            [scr_id] => 0
            [scr_true_name] => unknown
            [scr_user_name] => unknown
            [ord_no] => 9150511540109955951211613
            [ord_type] => 1
            [ord_mct_id] => 28156
            [ord_shop_id] => 27988
            [ord_name] => 购买物品订单名称9
            [add_time] => 2017-09-11 15:36:41
            [trade_account] => CFT
            [trade_amount] => 1
            [trade_time] => 2017-09-11 15:37:18
            [trade_no] => 4000752001201709111502963822
            [trade_no2] =>
            [trade_code] =>
            [trade_qrcode] => weixin://wxpay/bizpayurl?pr=AcTmoja
            [trade_pay_time] => 2017-09-11 15:37:17
            [remark] =>
            [status] => 1
            [original_amount] => 1
            [discount_amount] => 0
            [ignore_amount] => 0
            [trade_discout_amount] => 0
            [original_ord_no] =>
            [trade_result] => {"return_code":"SUCCESS","return_msg":"OK","appid":"wxa8d0b58cefc18eb2","mch_id":"1900008721","sub_mch_id":"27126621","nonce_str":"J8xn7ngE3Un2FVNQ","sign":"E52CEC57295C72D0AABCF2D966800B39","result_code":"SUCCESS","openid":"objz71W3xLzQksEwd1E5mDIz-9Ic","is_subscribe":"N","trade_type":"NATIVE","bank_type":"CFT","total_fee":"1","fee_type":"CNY","transaction_id":"4000752001201709111502963822","out_trade_no":"9150511540109955951211613","attach":"bank_mch_name=\u6d4b\u8bd5\u5546\u62375&bank_mch_id=880000096","time_end":"20170911153717","trade_state":"SUCCESS","cash_fee":"1","version":"1.0","promotion_detail":[]}
            [currency] => CNY
            [currency_sign] => ¥
            [out_no] => 54f1hsdsd1fs44009
            [tml_no] =>
            [tml_name] =>
            [shop_no] => 880000096
            [shop_name] => 测试商户5
            [shop_full_name] => 测试商户5
            [related_order] => Array
                (
                )

            [app_list] =>
        )
 * */

//查询付款状态(out_no ,ord_no二选一)
//$data = [];
//$data['cmd_id'] = 12;
//$data['pos_code'] = 'abcdefg';
//$data['ord_no'] = '9150511540109955951211613';#商户自己的订单号

/*[errcode] => 0
    [timestamp] => 1505117149
    [data] => Array
(
    [ord_no] => 9150511540109955951211613
            [ord_type] => 1
            [ord_mct_id] => 28156
            [ord_shop_id] => 27988
            [ord_name] => 购买物品订单名称9
[add_time] => 2017-09-11 15:36:41
            [trade_account] => CFT
[trade_amount] => 1
            [trade_time] => 2017-09-11 15:37:18
            [trade_no] => 4000752001201709111502963822
            [trade_qrcode] => weixin://wxpay/bizpayurl?pr=AcTmoja
            [trade_pay_time] => 2017-09-11 15:37:17
            [remark] =>
            [status] => 1
            [original_amount] => 1
            [discount_amount] => 0
            [ignore_amount] => 0
            [trade_discout_amount] => 0
            [original_ord_no] =>
            [trade_result] => {"return_code":"SUCCESS","return_msg":"OK","appid":"wxa8d0b58cefc18eb2","mch_id":"1900008721","sub_mch_id":"27126621","nonce_str":"J8xn7ngE3Un2FVNQ","sign":"E52CEC57295C72D0AABCF2D966800B39","result_code":"SUCCESS","openid":"objz71W3xLzQksEwd1E5mDIz-9Ic","is_subscribe":"N","trade_type":"NATIVE","bank_type":"CFT","total_fee":"1","fee_type":"CNY","transaction_id":"4000752001201709111502963822","out_trade_no":"9150511540109955951211613","attach":"bank_mch_name=\u6d4b\u8bd5\u5546\u62375&bank_mch_id=880000096","time_end":"20170911153717","trade_state":"SUCCESS","cash_fee":"1","version":"1.0","promotion_detail":[]}
            [currency] => CNY
[currency_sign] => ¥
[out_no] => 54f1hsdsd1fs44009
[pmt_tag] => WeixinBERL
[pmt_name] => 微信支付(测试)
[tag] =>
            [scr_id] => 0
            [shop_no] => 880000096
        )*/

//获取门店支付方式
$data = [];
$data['cmd_id'] = 16;
$data['pos_code'] = 'abcdefg';
$data['pmt_type'] = '0,1,2';#支付类型

/*
 *    [errcode] => 0
    [timestamp] => 1505116875
    [data] => Array
        (
            [pmt_tag] => WeixinBERL
            [pmt_name] => 微信支付(测试)
            [diy_pmt_name] => 微信支付(测试)
            [scr_id] => 0
            [scr_true_name] => unknown
            [scr_user_name] => unknown
            [ord_no] => 9150511540109955951211613
            [ord_type] => 1
            [ord_mct_id] => 28156
            [ord_shop_id] => 27988
            [ord_name] => 购买物品订单名称9
            [add_time] => 2017-09-11 15:36:41
            [trade_account] => CFT
            [trade_amount] => 1
            [trade_time] => 2017-09-11 15:37:18
            [trade_no] => 4000752001201709111502963822
            [trade_no2] =>
            [trade_code] =>
            [trade_qrcode] => weixin://wxpay/bizpayurl?pr=AcTmoja
            [trade_pay_time] => 2017-09-11 15:37:17
            [remark] =>
            [status] => 1
            [original_amount] => 1
            [discount_amount] => 0
            [ignore_amount] => 0
            [trade_discout_amount] => 0
            [original_ord_no] =>
            [trade_result] => {"return_code":"SUCCESS","return_msg":"OK","appid":"wxa8d0b58cefc18eb2","mch_id":"1900008721","sub_mch_id":"27126621","nonce_str":"J8xn7ngE3Un2FVNQ","sign":"E52CEC57295C72D0AABCF2D966800B39","result_code":"SUCCESS","openid":"objz71W3xLzQksEwd1E5mDIz-9Ic","is_subscribe":"N","trade_type":"NATIVE","bank_type":"CFT","total_fee":"1","fee_type":"CNY","transaction_id":"4000752001201709111502963822","out_trade_no":"9150511540109955951211613","attach":"bank_mch_name=\u6d4b\u8bd5\u5546\u62375&bank_mch_id=880000096","time_end":"20170911153717","trade_state":"SUCCESS","cash_fee":"1","version":"1.0","promotion_detail":[]}
            [currency] => CNY
            [currency_sign] => ¥
            [out_no] => 54f1hsdsd1fs44009
            [tml_no] =>
            [tml_name] =>
            [shop_no] => 880000096
            [shop_name] => 测试商户5
            [shop_full_name] => 测试商户5
            [related_order] => Array
                (
                )

            [app_list] =>
        )*/


//发起退款
//$data = [];
//$data['cmd_id'] = 13;
//$data['pos_code'] = 'abcdefg';
//$data['refund_way'] = '1';#退款方式，1为撤销 2为退货
//$data['out_no'] = "54f1hsdsd1fs44012";
//$data['refund_out_no'] = time();#新退款订单的开发者流水号，同一门店内唯一
//$data['refund_ord_name'] = "退款0003";#退款订单名称
//$data['refund_amount'] = "1";#退款金额

/*
 *  [errcode] => 1
    [timestamp] => 1505118543
    [data] => 当日订单无法退货

    [errcode] => 1
    [timestamp] => 1505119082
    [data] => 非当日订单无法撤销

    [errcode] => 1
    [timestamp] => 1505118574
    [data] => 请求退款金额大于支付金额
 *
 *  [errcode] => 1
    [timestamp] => 1505119252
    [data] => 此订单尚未支付

 *  退款成功
 *  [errcode] => 0
    [timestamp] => 1505118866
    [data] => Array
        (
            [ord_no] => 9150511886567197450319316
            [trade_amount] => 1
            [trade_no] => 4000752001201709111502963822
            [original_ord_no] => 9150511540109955951211613
            [status] => 1
        )
//  相同订单再次退款
    [errcode] => 8021
    [timestamp] => 1505119112
    [data] => 退款金额大于支付金额，当前订单有其它退款记录
 * */

//获取订单列表
//$data = [];
//$data['cmd_id'] = 10;
//$data['pos_code'] = 'abcdefg';
//$data['ord_type'] = 2;#交易方式1消费，2辙单/退货
//$data['page'] = 1;#交易方式1消费，2辙单/退货
//$data['pagesize'] = 10;#交易方式1消费，2辙单/退货


/*
 * [errcode] => 0
    [timestamp] => 1505119383
    [data] => Array
        (
            [page] => Array
                (
                    [page] => 1
                    [pagesize] => 10
                )

            [list] => Array
                (
                    [0] => Array
                        (
                            [pos_code] => abcdefg
                            [pmt_tag] => WeixinBERL
                            [ord_no] => 9150414426349658961159702
                            [out_no] => 54fbfaaaggoo
                            [trade_amount] => 1
                            [trade_qrcode] => weixin://wxpay/bizpayurl?pr=r3v3hJ8
                            [status] => 4
                            [notify_url] => http://test.beikelin.com/callbacktest
                            [created_at] => 1504144263
                        )

                    [1] => Array
                        (
                            [pos_code] => abcdefg
                            [pmt_tag] => WeixinBERL
                            [ord_no] => 9150414659707397296754501
                            [out_no] => 54fbfzdbfsggoo
                            [trade_amount] => 1
                            [trade_qrcode] => weixin://wxpay/bizpayurl?pr=sfXziZG
                            [status] => 4
                            [notify_url] => http://test.beikelin.com/callbacktest
                            [created_at] => 1504146597
                        )

                    [2] => Array
                        (
                            [pos_code] => abcdefg
                            [pmt_tag] => WeixinBERL
                            [ord_no] => 9150414737558754684876562
                            [out_no] => 5454545498798989
                            [trade_amount] => 1
                            [trade_qrcode] => weixin://wxpay/bizpayurl?pr=xZHVY9g
                            [status] => 4
                            [notify_url] => http://test.beikelin.com/callbacktest
                            [created_at] => 1504147376
                        )
    //获取支付订单列表 查询AlipayCS
    [errcode] => 0
    [timestamp] => 1505178586
    [data] => Array
        (
            [page] => Array
                (
                    [page] => 1
                    [pagesize] => 6
                )

            [list] => Array
                (
                    [0] => Array
                        (
                            [pos_code] => abcdefg
                            [pmt_tag] => AlipayCS
                            [ord_no] => 9150353768974075632203001
                            [out_no] => 54gregr7733
                            [trade_amount] => 2
                            [trade_qrcode] => https://qr.alipay.com/baxbiewbdsstgn1pf5
                            [status] => 2
                            [notify_url] => http://test.com
                            [created_at] => 1503537953
                        )

                    [1] => Array
                        (
                            [pos_code] => abcdefg
                            [pmt_tag] => AlipayCS
                            [ord_no] => 9150485669310868139734790
                            [out_no] => 20170908154452787492
                            [trade_amount] => 100
                            [trade_qrcode] => https://qr.alipay.com/baxnwevn71fvaemx5a
                            [status] => 2
                            [notify_url] =>
                            [created_at] => 1504856693
                        )

                )

        )
    //获取退款订单列表
    [errcode] => 0
    [timestamp] => 1505120934
    [data] => Array
        (
            [page] => Array
                (
                    [page] => 1
                    [pagesize] => 10
                )

            [list] => Array
                (
                    [0] => Array
                        (
                            [pos_code] => abcdefg
                            [pmt_tag] =>
                            [original_ord_no] => 9150474983886159932005337
                            [ord_no] => 9150474988825412161201855
                            [out_no] =>
                            [trade_amount] => 2
                            [status] => 1
                            [created_at] => 1504749889
                        )

                    [1] => Array
                        (
                            [pos_code] => abcdefg
                            [pmt_tag] =>
                            [original_ord_no] =>
                            [ord_no] =>
                            [out_no] => 54f1hs66ttt74gs780
                            [trade_amount] => 0
                            [status] => 0
                            [created_at] => 1504750314
                        )

                    [2] => Array
                        (
                            [pos_code] => abcdefg
                            [pmt_tag] =>
                            [original_ord_no] =>
                            [ord_no] =>
                            [out_no] => 54f1hs6633574g789
                            [trade_amount] => 0
                            [status] => 0
                            [created_at] => 1504750365
                        )


 * */


//取消订单
//$data = [];
//$data['cmd_id'] = 15;
//$data['pos_code'] = 'abcdefg';
//$data['out_no'] = '54f1hsdsd1fs44013';

/*  未支付订单取消成功
 *  [errcode] => 0
    [timestamp] => 1505120139
    [data] => Array
        (
            [ord_no] => 9150512010964779529375583
            [status] => 4
        )
    //取消已经退款的订单
    [errcode] => 8012
    [timestamp] => 1505120195
    [data] => 当前订单不能取消，如果已经付款，请使用退款功能
     //取消已经退款的订单
    [errcode] => 8012
    [timestamp] => 1505120195
    [data] => 当前订单不能取消，如果已经付款，请使用退款功能
    取消已付款订单
    [errcode] => 8012
    [timestamp] => 1505120471
    [data] => 当前订单不能取消，如果已经付款，请使用退款功能
 * */

//查询付款订单详情
//$data = [];
//$data['cmd_id'] = 17;
//$data['pos_code'] = 'abcdefg';
//$data['out_no'] = '54f1hsdsd1fs44012';


/**
 *      [errcode] => 0
        [timestamp] => 1505121174
        [data] => Array
        (
        [pos_code] => abcdefg
        [pmt_tag] => WeixinBERL
        [ord_no] => 9150512031322955030889062
        [out_no] => 54f1hsdsd1fs44011
        [trade_amount] => 1
        [trade_qrcode] => weixin://wxpay/bizpayurl?pr=yfdNhET
        [status] => 1
        [pay_time] => 20170911165907
        [notify_url] =>
        [shop_name] => 平安测试门店1
        [shop_full_name] => 平安测试门店1-测试商户1
        [shop_no] => 880007495
        [mct_name] => 平安测试商户1
        [mct_short_name] =>
        [mct_no] => 6666000000034021
        [save_at] => 1505121174
)
 */

$res = $obj->api('qrpay',$data);
echo "<pre />";var_dump($res);