<?php
// Website Setting
    function getSetting($args=null){
        $webName=\App\Setting::first();
        return $webName->$args;
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
//        $child=\App\Navs::where('page_view',$pageName)->first();
        $child=\App\Navs::get()->first();

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

/////////////////////////////////////////////////////////////////////////////////////
//Notification

function countNotification(){
    $user=\Cartalyst\Sentinel\Laravel\Facades\Sentinel::check();
        $user=\App\User::find($user->id);
         echo $user->notifications()->count()==0?0:$user->notifications()->count();

}
function Notification(){
    $user=\Cartalyst\Sentinel\Laravel\Facades\Sentinel::check();
    $user=\App\User::find($user->id);
   return $user->notifications;


}


if (! function_exists('config')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function config($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('config');
        }

        if (is_array($key)) {
            return app('config')->set($key);
        }

        return app('config')->get($key, $default);
    }
}

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (strlen($value) > 1 && Str::startsWith($value, '"') && Str::endsWith($value, '"')) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}







////////////////////////////////////lang/////////////////////////////////////////

?>