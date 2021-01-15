<?php

namespace App;

class DB extends \PDO{
    static $instance;
    protected  $config;

    static function singleton(){
        if(!(self::$instance instanceof self)){
            self::$instance=new self();
        }
        return self::$instance;
    }

    public function __construct(){
        parent::__construct(DSN,USR,PWD);
    }


    public function login($db, $uname, $passwd){
        try{
            $stmt=$db->prepare('SELECT * FROM user WHERE username=:uname LIMIT 1');
            $stmt->execute([':uname'=>$uname]);
            $count=$stmt->rowCount();
            
            $row=$stmt->fetchAll(\PDO::FETCH_ASSOC);
    
            if($count==1){
                $user=$row[0];
                $res=password_verify($passwd,$user['passwd']);
    
                if($res){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }catch(PDOExcetion $e){
            return false;
        }
    }
    function insertSchema($db,$email,$uname,$passwd){ 
        $command="
        INSERT INTO user(username,email,passwd)
        VALUES ('$uname','$email', '$passwd')";
        try{
            $db->exec($command);
            echo 'Usuario Creado correctamente...';
            Header('Location:'.BASE.'login');
           // return True;
        }catch(PDOExeception $e){
           // return False;
           die($e->getMessage());
        }
    }
    function insertpost($db,$desc,$user,$title){
        $command="
    INSERT INTO post(title,cont,user,createdate)
    VALUES ('$title','$desc','$user', NOW())";

    try{
        $db->exec($command);
    
    }catch(PDOExeception $e){
       die($e->getMessage());
   
    }
}   
    function delpost($db,$title_post,$date_post,$user){
        $command="
        DELETE FROM post WHERE title='$title_post' AND createdate='$date_post' AND user='$user'";
    try{
        $db->exec($command);
    }catch(PDOExeception $e){
       die($e->getMessage());
    }
    }  

    function lookdata($db){
    try{ 
        $sql="SELECT * FROM post ORDER BY createdate DESC;";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;  
    }catch(PDOExeception $e){
       die($e->getMessage());
    }
    } 

    function modytitle($db,$titleold_post,$title_post,$date_post,$user){
        $command="
        UPDATE post SET title='Mody:$title_post' WHERE title='$titleold_post' AND createdate='$date_post' AND user='$user';";
    try{
        $db->exec($command);
    }catch(PDOExeception $e){
       die($e->getMessage());
    }
    }


    function modycont($db,$cont_post,$title_post,$date_post,$user){
        $command="
        UPDATE post SET cont='Mody:$cont_post' WHERE title='$title_post' AND createdate='$date_post' AND user='$user';";
    try{
        $db->exec($command);
    }catch(PDOExeception $e){
       die($e->getMessage());
    }
    }

    function addcomment($db,$post_id,$comment,$user){
        $command="
    INSERT INTO comments(comment,user,post)
    VALUES ('$comment','$user','$post_id')";
    try{
        $db->exec($command);
    
    }catch(PDOExeception $e){
       die($e->getMessage());
   
    }
    }

    function lookcomments($db){
        try{ 
            $sql="SELECT * FROM comments ORDER BY post DESC;";
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $rows;  
        }catch(PDOExeception $e){
           die($e->getMessage());
        }
        } 


}