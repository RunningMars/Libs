<?php
require_once 'saveImg.class.php';

pushFromStream();


//接收
function pushFromStream()
{
    header("Access-Control-Allow-Origin: *"); # 跨域处理

    try {

        //数据输入
        $request = json_decode(file_get_contents('php://input'), true) ?: $_POST;

        //必要参数
        if (empty($request['img'])) throw new Exception('', 110);

        //js编码的base64带有前缀
        $request['img'] = trim($request['img'], 'base64,');

        $imgClient = new saveImg();

        $file = $imgClient->save($request['img']);

        exit('上传成功');

    } catch (Exception $e) {
        print_r($e->getCode());
    }
}


//储存