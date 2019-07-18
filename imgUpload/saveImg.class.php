<?php

class saveImg
{
    /**
     * 存储图片
     * @param $stream  [base_64编码后的文件流]
     * @return array
     * @throws Exception
     */
    function save($stream)
    {
        //验证文件流
        if (($typeImg = $this->isImgForBase64($stream)) === false) {
            throw new Exception('', 7000);
        }

        $stream = base64_decode($stream);

        $fileName = md5(uniqid() . time()) . ".$typeImg";

        //文件绝对路径
//        $absDir = 'C:\Users\Administrator\Desktop';

        //文件相对路径
//        $dir = '\testImg\\';
        $sub_path = "images/".date("Ym").'/';
        $path = $this->checkFilePath(__DIR__."/" . $sub_path);
        //解析图片
        if (file_put_contents($path . $fileName, $stream) === false) {
            throw new Exception('', 7001);
        }

        //获取缩略图名称
        $thumbFileName = $this->getThumbFileName($fileName,$typeImg);

        //生成缩略图
        $thumbStrem = $this->thumbNail($stream, 'image/jpg', 296, 195);

        //解析缩略图片
        if (file_put_contents($path . $thumbFileName, $thumbStrem) === false) {
            throw new Exception('', 7001);
        }
        //返回文件 一级目录+文件名 以及 url访问地址
        print_r([
            'name' => $path . $fileName,
            //'accessUrl' => API_IMG . $preDir . $fileName,
        ]);die;
    }

    private function checkFilePath($filepath){
        if(empty($filepath)){
            return false;
        }
        if(!file_exists($filepath) || !is_writable($filepath)){
            if(!@mkdir($filepath,0755)){
                return false;
            }
        }
        return true;
    }
    /**
     * 生成缩略图
     * @param $stream bin二进制
     * @parm $mimetype mime 类型
     * @Parma $thumbnailHeight 压缩高度 大于原图不压缩
     * @Parma quility 压缩质量
     */
    public function thumbNail($stream, $mimetype, $thumbnailWidth = 200, $thumbnailHeight = 200, $quility = 75)
    {
//        if ($mimetype != 'image/jpeg' ||
//            $mimetype != 'image/pjpeg' ||
//            $mimetype != 'image/gif'  ||
//            $mimetype != 'image/png' || $mimetype != 'image/jpg')
//        {
//            throw new Exception('不支持图片格式',189);
//        }
        $ret = '';
        $imageType = substr($mimetype, 6);
        $image = imagecreatefromstring($stream);

        $width = imagesx($image);
        $height = imagesy($image);

        // 保持原图比例
        if ($height > $thumbnailHeight) {
            $factor = $thumbnailHeight / $height;
            $targetWidth = round($factor * $width);
            $imageNew = imagecreatetruecolor($targetWidth, $thumbnailHeight);
            imagecopyresampled($imageNew, $image, 0, 0, 0, 0, $targetWidth, $thumbnailHeight, $width, $height);

        } else if ($width > $thumbnailWidth) {
            $factor = $thumbnailWidth / $width;
            $targetHeight = round($factor * $width);
            $imageNew = imagecreatetruecolor($thumbnailWidth, $targetHeight);
            imagecopyresampled($imageNew, $image, 0, 0, 0, 0, $thumbnailWidth, $targetHeight, $width, $height);
        } else {
            //原图保持
            $factor = 1;
            $targetHeight = round($factor * $width);
            $imageNew = imagecreatetruecolor($width, $height);
            imagecopyresampled($imageNew, $image, 0, 0, 0, 0, $width, $height, $width, $height);
        }
        ob_start();

        switch ($imageType) {
            case 'jpg' :
                imagejpeg($imageNew, null, $quility);
                break;
            case 'jpeg' :
                imagejpeg($imageNew, null, $quility);
                break;
            case 'pjpeg' :
                imagejpeg($imageNew, null, $quility);
                break;
            case 'gif'  :
                imagegif($imageNew, null);
                break;
            case 'png'  :
                imagepng($imageNew, null, $quility / 10);
                break;
            default:
                throw new Exception('', 7000);
                break;
        }

        imagedestroy($imageNew);
        $ret = ob_get_clean();
        return $ret;
    }


    /**
     * @param $fileNmae
     * @param $imgType
     * @return string
     */
    function getThumbFileName($fileNmae,$imgType)
    {
        $ext = substr(strrchr($fileNmae, '.'), 1);
        $thumbFileName = basename($fileNmae, "." . $ext);
        return $thumbFileName . "_s.$imgType";
    }

    /**
     * 获取大图文件地址
     * @path 原图地址
     */
    public function getOrgImgPath($fileNmae)
    {

    }

    /**
     * 获取小图地址
     * @path 原图地址
     */
    public function getThumbImgPath($fileNmae)
    {

    }


    /** 判断是否是图片
     * @param $base64 [base64图片流]
     * @return bool [true/false]
     */
    public function isImgForBase64($base64)
    {
        if (!empty($base64)) {
            if (strcmp($base64, base64_encode(base64_decode($base64))) == 0 && strlen($base64) > 100) {
                $arr = [
                    //  1 => 'gif',
                    2 => 'jpg',
//                    3 => 'png',
                ];

                $rs = getimagesize("data://text/plain;base64," . $base64);

                if (array_key_exists($rs[2], $arr) === false) return false;

                return $arr[$rs[2]];
            }
        }
        return false;
    }


}