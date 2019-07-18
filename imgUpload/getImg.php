<?php
//变成base64数据流
$base64 = base64_encode(file_get_contents('C:\Users\Administrator\Desktop\65.jpg'));

//发送
$rst = httpRequest('http://localhost/imgUpload/httpGetImg.php', json_encode(['img'=>$base64]));
print_r($rst);


/**
 *  远程请求
 * @param string $url
 * @param mixed $postFields 请求的数据
 * @param string $referer 来源网址
 * @param integer $timeOut 请求超时时间
 * @param array $header 头部文件
 * @return mixed 错误返回false，正确返回获取的字符串
 * @author fengxu
 * @throws Exception
 */
function httpRequest($url, $postFields = null, $referer = null, $timeOut = 300, $header = null, $buildQuery = false)
{
    if (empty($url) || !preg_match("#https?://[\w@\#$%*&=+-?;:,./]+#i", $url)) {
        return false;
    }
    $isPost = empty($postFields) ? false : true;

    $ch = curl_init();

    if (is_null($header)) {
        $header = array(
            'Pragma' => 'no-cache',
            'Accept' => 'application/json,text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png;',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36',
        );
    }

    $headers = array();
    foreach ($header as $k => $v) {
        $headers[] = $k . ': ' . $v;
    }

    curl_setopt($ch, CURLOPT_URL, $url);

    if ($isPost) {
        $postFields = $buildQuery == true ? http_build_query($postFields) : $postFields;
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    }
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeOut);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);

    if ($response === false) print_r(curl_error($ch));

    return $response;
}


