<?php

namespace App\Controllers;
use App\View;
use App\Model;
use App\Controller;
use App\Request;
use App\Session;


class UserController extends Controller implements View,Model{
    
    public function __construct(Request $request, Session $session){
        parent::__construct($request,$session);
    }

    
    public function index(){
        $dataview=['title'=>'home'];
        $this->render($dataview,'home');
    }
    public function dashboard(){
        $dataview=['title'=>'dashboard'];
        $this->render($dataview,'dashboard');
    }
    public function dashaction(){
        $desc=filter_input(INPUT_POST,'descripcion');
        $title=filter_input(INPUT_POST,'title');
        $user=$_SESSION['uname'];
        $db=$this->getDB();
        $insertpost=$db->insertpost($db,$desc,$user,$title);
        $dataview=['title'=>'dashboard'];
        $this->render($dataview,'dashboard');
    }

    public function deldashaction(){
        $title_post=filter_input(INPUT_POST,'title_post');
        $date_post=filter_input(INPUT_POST,'date_post');
        $user=$_SESSION['uname'];
        $db=$this->getDB();
        $deletepost=$db->delpost($db,$title_post,$date_post,$user);
        $dataview=['title'=>'dashboard'];
        $this->render($dataview,'dashboard');
    }

    public function modytitledashaction(){
        $title_post=filter_input(INPUT_POST,'title_post');
        $titleold_post=filter_input(INPUT_POST,'titleold_post');
        $date_post=filter_input(INPUT_POST,'date_post');
        $user=$_SESSION['uname'];
        $db=$this->getDB();
        $deletepost=$db->modytitle($db,$titleold_post,$title_post,$date_post,$user);
        $dataview=['title'=>'dashboard'];
        $this->render($dataview,'dashboard');
    }
    public function modycontdashaction(){
        $title_post=filter_input(INPUT_POST,'title_post');
        $cont_post=filter_input(INPUT_POST,'cont_post');
        $date_post=filter_input(INPUT_POST,'date_post');
        $user=$_SESSION['uname'];
        $db=$this->getDB();
        $deletepost=$db->modycont($db,$cont_post,$title_post,$date_post,$user);
        $dataview=['title'=>'dashboard'];
        $this->render($dataview,'dashboard');
    }

    public function data(){
        $db = $this->getDB();
        $lookdata=$db->lookdata($db);
        return $lookdata;
    } 
    public function addcomment(){
        $db = $this->getDB();
        $post_id=filter_input(INPUT_POST,'post_id');
        $comment=filter_input(INPUT_POST,'addcomment');
        $user=$_SESSION['uname'];
        $addcomment=$db->addcomment($db,$post_id,$comment,$user);
        $dataview=['title'=>'home'];
        $this->render($dataview,'home');
        
    }

    public function comment(){
        $db = $this->getDB();
        $lookdata=$db->lookcomments($db);
        return $lookdata;
    } 
   
}