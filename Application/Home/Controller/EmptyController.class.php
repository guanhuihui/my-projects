<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends CommonController {
	function _initialize() {
        parent::_initialize();
    }
    function _empty(){
        header("HTTP/1.0 404 Not Found");
        $this->display('Public:404');
    }
    function index(){
        header("HTTP/1.0 404 Not Found");
        $this->display('Public:404');
    }
}