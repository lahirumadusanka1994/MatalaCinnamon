<?php


class ResponseHelper
{
    public static function respond($id=200,$data = '',$resData = []){

        http_response_code($id);
        echo json_encode([
            'ID'=>$id,
            'DATA'=>$data,
            'resData'=>$resData
        ]);
        exit();
    }
}