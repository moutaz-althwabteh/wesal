<?php
// Website Setting
    function getSetting(){
        $webName=\App\Setting::first();
        return $webName;
    }
    function getWepSiteName(){
        return getSetting()->title_ar;
    }

 // Websit Navs
    function Navs(){
       $navs= \App\Navs::where('show_flag','1')->where('is_deleted','0')->where('parent_id','0')
       ->orderBy('order_num')->get();
       return $navs;
    }


    function isParent($pageName){
        $pageName=removeAdmin($pageName);
        $child=\App\Navs::where('page_view',$pageName)->first();

        return $child->parent_id;


    }
    function getChildNavs($id){
        $nav=\App\Navs::where('parent_id',$id)->where('is_deleted','0')->get();
        return $nav;
    }
function getChildNavsShow($id){
    $nav=\App\Navs::where('parent_id',$id)->where('is_deleted','0')->where('show_flag','1')->get();
    return $nav;
}



    function removeAdmin($str){
        $str=str_replace("admin.","",$str);
       return $str;
    }
    //where('show_flag','1')->


?>