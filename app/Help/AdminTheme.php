<?php
function layoutPath($file){
    return "admin.theme.".env('THEME').".".$file;
}
function layoutExtend(){
    return layoutPath("layout.app");
}
function layoutTable(){
    return layoutPath("layout.table");
}