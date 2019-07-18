<?php
try {

    header("Access-Control-Allow-Origin: *"); # 跨域处理

    $data = $_POST;

    if (empty($data['files'])) {
        exit(json_encode(['code' => 0, 'msg' => '缺少必要参数files']));
    }

    if (empty($data['caseNum'])) {
        exit(json_encode(['code' => 0, 'msg' => '缺少必要参数caseNum']));
    }
    $newPath = 'wz/' .'case' . date('Ym') . '/' . $data['caseNum'];

   if(!file_exists($newPath) || !is_writable($newPath)){
        if(!@mkdir($newPath,0755,true)){
            exit(json_encode( [
                'code' => 0,
                'msg' => '创建文件夹失败!',
            ]));
        }
    }
    $data['files'] = json_decode($data['files'],1);
    $fileArr = copyFiles($data['files'], $newPath);

    exit(json_encode([
        'code' => 1,
        'msg' => '文件复制成功',
        'caseNum' => $data['caseNum'],
        'files' => $fileArr,
    ]));

} catch (Exception $e) {

    exit(json_encode([
        'code' => 0,
        'msg' => $e->getMessage(),
    ]));
}

/**
 * 复制单个文件到指定案件编号文件夹
 * @param $filePath
 * @param $caseNum
 * @return array
 */
function copySingleFile($filePath, $newPath )
{
    $fileName = substr($filePath, strrpos($filePath, '/') + 1);
    $newFileName = $newPath . '/' . $fileName;
    if (file_exists($filePath)) {
        if(copy($filePath, $newFileName)) {
            $returnData = [
                'code' => 1,
                'msg' => '文件复制成功',
                'path' => '/' . $newFileName,
                'url' => 'http://imgtest.beikelin.com/' . $newFileName
            ];
        } else {
            $returnData = [
                'code' => 0,
                'msg' => '文件复制失败,请重新再试' . $filePath,
            ];
        }
    } else {
        $returnData = [
            'code' => 0,
            'msg' => '不存在该文件' . $filePath,
        ];
    }
    return $returnData;
}

/**
 * 拷贝多个文件到指定案件编号文件夹
 * @param $fileArr
 * @param $newPath
 * @return array
 * @throws Exception
 */
function copyFiles($fileArr, $newPath )
{
    if (!is_array($fileArr)) throw new Exception('files不是数组');

    foreach ($fileArr as $key => $file) {
        #material多个文件
        if ($key == 'material' && (strpos($file, ',') !== false)) {
            $files = explode(',', $file);
            $paths = '';
            $urls = '';
            foreach ($files as $oneFile) {
                $result = copySingleFile($oneFile, $newPath);
                if ($result['code'] == 0) {
                    deleteDir($newPath);
                    throw new Exception($result['msg']);
                }
                $paths .= $result['path'];
                $urls .= $result['url'];
            }
            $fileArr[$key] = ['filePath' => $paths, 'url' => $urls];
        }
        if ($file) {
            $result = copySingleFile($file, $newPath);
            if ($result['code'] == 0) {
                deleteDir($newPath);
                throw new Exception($result['msg']);
            }
            $fileArr[$key] = $result;
        }
    }
    return $fileArr;
}

/**
 * 删除目标文件夹
 * @param $path
 */
function deleteDir($path){
    $path = './' . $path;
    //如果是目录则继续
    if(is_dir($path)){
        //扫描一个文件夹内的所有文件夹和文件并返回数组
        $p = scandir($path);
        foreach($p as $val){
            //排除目录中的.和..
            if($val !="." && $val !=".."){
                //如果是目录则递归子目录，继续操作
                if(is_dir($path.$val)){
                    //子目录中操作删除文件夹和文件
                    deleteDir($path.$val.'/');
                    //目录清空后删除空文件夹
                    @rmdir($path.$val.'/');
                }else{
                    //如果是文件直接删除
                    unlink($path.$val);
                }
            }
        }
    }
}

