<?php
//declare(strict_types=1);
if(defined('SITE_ROOT')){
    include_once SITE_ROOT . 'api/Loader.php';

}else{
    die('CONFIG IS NOT INCLUDED');
}


class BaseModel
{
    public $tablename = '';
    public $primary_key = 'id';

    protected $con ;
    protected $sql;
    public function __construct($tablename = '',$primaryKey='id')
    {
        $this->tablename = $tablename;
        $this->primary_key = $primaryKey;
        $this->con = (new DbInstance())->con;
    }


    public function insertRec(array $data){
        if(is_array($data)){
            $keys = $this->getInsertKeysString($data);
            $values = $this->getInsertValuesString($data);
            $sql = "insert into `$this->tablename`($keys) VALUES ($values) ";

        }else{
            $sql = $data;
        }
        try{
            echo $sql;
           $insert = $this->con->query($sql);
           return $this->con->insert_id;
        }catch (Exception $e){
            echo 'Error Occured : '. $e->getMessage();
            return $e;
        }
    }



    public function UpdateRec(array $whereData = [], array $setData = []){
        if(is_array($whereData)){
            $wherestr = $this->getWhereParamAndString($whereData);
            $setstr = $this->getUpdateParamString($setData);
            $sql = "update `$this->tablename` SET  $setstr WHERE $wherestr ";

        }else{
            $sql = $whereData;
        }
        try{
            $update = $this->con->query($sql);
            return $this->con->affected_rows;
        }catch (Exception $e){
            echo 'Error Occured : '. $e->getMessage();
            return false;
        }
    }

    protected function getInsertKeysString($data){
        $insertString = "";
        foreach($data as $key=>$val){
            if(is_array($val)){
                foreach ( $val as $col=>$dt){
                        $insertString .= ", `$key`.`$col`";
                }
            }else{
                $insertString .= ", `$key` ";
            }
        }
        return $this->cleanupStrings($insertString);
    }

    protected function getInsertValuesString($data){
        $insertString = "";
        foreach($data as $key=>$val){
            if(is_array($val)){
                foreach ( $val as $col=>$dt){
                    if($dt == null || strtoupper($dt) == 'NULL'){
                        $insertString .= ", NULL";
                    }else{
                        $insertString .= ", '$dt'";
                    }
                }
            }else{
                $insertString .= ", '$val' ";
            }
        }
        return $this->cleanupStrings($insertString);
    }

    protected function getUpdateParamString($data){
        $insertString = "";
        foreach($data as $key=>$val){
            if(is_array($val)){
                foreach ( $val as $col=>$dt){
                    if($dt == null || strtoupper($dt) == 'NULL'){
                        $insertString .= ", `$key`.`$col` = NULL";
                    }else{
                        $insertString .= ", `$key`.`$col` = '$dt'";
                    }
                }
            }else{
                if($val == null || strtoupper($val) == 'NULL'){
                    $insertString .= ", `$key` = NULL";
                }else{
                    $insertString .= ", `$key` = '$val'";
                }
            }
        }
        return $this->cleanupStrings($insertString);
    }

    protected function getWhereParamAndString($data){
        $insertString = "";
        foreach($data as $key=>$val){
            if(is_array($val)){
                foreach ( $val as $col=>$dt){
                    if($dt == null || strtoupper($dt) == 'NULL'){
                        $insertString .= "AND `$key`.`$col` = NULL";
                    }else{
                        $insertString .= "AND `$key`.`$col` = '$dt'";
                    }
                }
            }else{
                if($val == null || strtoupper($val) == 'NULL'){
                    $insertString .= "AND `$key` = NULL";
                }else{
                    $insertString .= "AND `$key` = '$val'";
                }
            }
        }
        return $this->cleanupStrings($insertString);
    }


    protected function getWhereParamOrString($data){
        $insertString = "";
        foreach($data as $key=>$val){
            if(is_array($val)){
                foreach ( $val as $col=>$dt){
                    if($dt == null || strtoupper($dt) == 'NULL'){
                        $insertString .= "OR `$key`.`$col` = NULL";
                    }else{
                        $insertString .= "OR `$key`.`$col` = '$dt'";
                    }
                }
            }else{
                if($val == null || strtoupper($val) == 'NULL'){
                    $insertString .= "OR `$key` = NULL";
                }else{
                    $insertString .= "OR `$key` = '$val'";
                }
            }
        }
        return $this->cleanupStrings($insertString);
    }

    private function is_multi_array( $arr ) {
        rsort( $arr );
        return isset( $arr[0] ) && is_array( $arr[0] );
    }


    private function cleanupStrings($str){
        return trim( ltrim($str, ',') );
    }

}