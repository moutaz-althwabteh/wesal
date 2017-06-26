<?php
/**
 * Created by PhpStorm.
 * User: Moutaz
 * Date: 6/25/2017
 * Time: 8:20 PM
 */
function adminTrans($file , $word)
{
    return trans($file.'.'.$word);
}
if (! function_exists('trans')) {
    /**
     * Translate the given message.
     *
     * @param  string  $id
     * @param  array   $replace
     * @param  string  $locale
     * @return \Illuminate\Contracts\Translation\Translator|string
     */
    function trans($id = null, $replace = [], $locale = null)
    {

        if (is_null($id)) {
            return app('translator');
        }
        return app('translator')->trans($id, $replace, $locale);
    }
}

function encodeJson($value)
{
    return json_encode($value , JSON_UNESCAPED_UNICODE);
}

function getCurrentLang()
{
    return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
}

function concatenateLangToUrl($url)
{
    return url(getCurrentLang().'/'.$url);
}

function getAvLang()
{
    return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales();
}

//getDirection
function getDir()
{
    return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection();
}

function getDirection()
{
    $cD = getDir();
    return $cD == 'rtl' ? 'right' : 'left';
}

function getReverseDirection()
{
    $cD = getDir();
    return $cD == 'rtl' ? 'left' : 'right';
}
