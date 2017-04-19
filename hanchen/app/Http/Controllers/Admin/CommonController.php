<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //加载图片
    public function upload(){
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }
        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );       //获取变量的整数值
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }
        @set_time_limit(5 * 60);
        $targetDir = 'upload_tmp';      //文件名
        $uploadDir = 'upload';          //文件名

        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }

        //获取上传过来的文件的名字
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;       //DIRECTORY_SEPARATOR 目录分割符
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
        // 判断是否用了chunk保护
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;

        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "打开临时文件失败."}, "id" : "id"}');
            }
            while (($file = readdir($dir)) !== false) {     //readdir() 返回目录中下一个文件的文件名
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
                // 如果当前文件是临时文件
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }
                // 如果它大于当前时间并且不是当前文件，删除临时文件
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {        //preg_match() 执行一条正则表达式
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }
        // 打开临时文件
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {     //fopen打开文件或url
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {   // 判断文件是否是通过 HTTP POST 上传的
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "删除上传文件失败."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "打开输入流失败."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "打开输入流失败."}, "id" : "id"}');
            }
        }
        //将文件写入到临时文件
        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }
        @fclose($out);
        @fclose($in);
        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }
                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }
                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }
                flock($out, LOCK_UN);
            }
            @fclose($out);
        }
    }

    //将图片存入到本地
    public function uploadImg($path,$file,$tempFile){
        $new_file_name = time() . mt_rand(10000, 99999) . strrchr($file, '.');
        if (!file_exists($path)) {
            @mkdir($path);
        }
        $url = $path.DIRECTORY_SEPARATOR.$new_file_name;
        move_uploaded_file($tempFile, $path .DIRECTORY_SEPARATOR.$new_file_name);
        return $url;
    }
}
