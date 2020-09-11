<?php
function fail($font){
$arr=['font'=>$font,'code'=>2];
echo json_encode($arr);exit;
}
function successly($font){
$arr=['font'=>$font,'code'=>1];
echo json_encode($arr);exit;
}

