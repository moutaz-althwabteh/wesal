<!DOCTYPE html>
<html lang="ar" class="no-js">
<!-- start: HEAD -->
<head>
    <title>تسجيل الدخول</title>
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="assets\global\plugins\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\global\plugins\font-awesome\css\font-awesome.min.css" />

    <link rel="stylesheet" href="css\main.css">
    <link rel="stylesheet" href="css\main-responsive.css">
    <link rel="stylesheet" href="css\bootstrap-colorpalette.css">
    <link rel="stylesheet" href="css\perfect-scrollbar.css">
    <link rel="stylesheet" href="css\theme_light.css" type="text/css" id="skin_color">
    <link href="css\rtl-version.css" rel="stylesheet" />
    <!--[if IE 7]>
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

    <style>

        .ar{
            font-family: 'Droid Arabic Kufi', sans-serif;
        }
    </style>
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body class="login example1" dir="rtl" >
<div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
    <div class="logo">
        <img src="images/logo.png"/>
    </div>
    <!-- start: LOGIN BOX -->
    <div class="box-login">
        <h3>
            تسجيل الدخول إلى حسابك</h3>
        <p>
            يرجى إدخال اسم المستخدم/ البريد الالكتروني وكلمة المرور
        </p>

            {!! Form::open(['url'=>'/login','class'=>'form-login','id'=>'form1']) !!}
        @if(session('error'))
                   <div class="errorHandler alert alert-danger" runat="server" id="divMsg">
                        {{session('error')}}
                   </div>

               @endif
            <fieldset>
                <div class="form-group">
                    <span class="input-icon input-icon-left">

                        <input type="email" name="email" class="form-control error">

                        <i class="fa fa-user"></i></span>
                    <!-- To mark the incorrectly filled input, you must add the class "error" to the input -->
                    <!-- example: <input type="text" class="login error" name="login" value="Username" /> -->
                </div>
                <div class="form-group form-actions">
                    <span class="input-icon input-icon-left">
                         <input type="password" name="password" class="form-control error">

                        <i class="fa fa-lock"></i></span>
                </div>

               <div class="form-group">
                       <label>تذكرني</label>
                       <input type="checkbox" name="remmber_me">
                    </div>
                 <div>
                        <a href="/forget_password">هل نسيت كلمة السر</a>
                    </div>
                <div class="form-actions">
                       <button type="submit" class="btn btn-yellow pull-left ar" runat="server" onserverclick="btnLogin_Click"
                            id="btnLogin">
                        تسجيل دخول <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>
            </fieldset>
       {!! Form::close() !!}
    </div>
    <!-- end: LOGIN BOX -->
    <!-- start: COPYRIGHT -->
    <div class="copyright">
        شركة أكسس لاين للاستثمار التكنولوجي &copy; 2016
    </div>
    <!-- end: COPYRIGHT -->
</div>

<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<!--<![endif]-->
<script src="js\jquery-ui-1.10.2.custom.min.js"></script>
<script src="js\bootstrap.min.js"></script>
<script src="assets\global\plugins\bootstrap-hover-dropdown\bootstrap-hover-dropdown.min.js"></script>
<script src="assets\global\plugins\jquery.blockui.min.js"></script>
<script src="js\jquery.icheck.min.js"></script>
<script src="js\jquery.mousewheel.js"></script>
<script src="js\perfect-scrollbar.js"></script>
<script src="js\less-1.5.0.min.js"></script>
<script src="js\jquery.cookie.js"></script>
<script src="js\bootstrap-colorpalette.js"></script>
<script src="assets\global\plugins\jquery-file-upload\js\main.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
</body>
<!-- end: BODY -->
</html>
