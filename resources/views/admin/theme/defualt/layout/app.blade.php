
<html lang="en" dir="{{getDir()}}">
<head>
    <meta charset="utf-8"/>
    <title>{{getSetting('title_ar')}}
        @yield('title')
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
<?php
header("Content-Type: text/javascript; charset=utf-8");
?>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
{!!Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
{!!Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
@if(getDir()=='rtl')
    {!!Html::style('assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') !!}
    {!!Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') !!}
    {!!Html::style('assets/global/css/components-rtl.min.css') !!}

    {!!Html::style('assets/global/css/plugins-rtl.min.css') !!}
    <!-- BEGIN THEME LAYOUT STYLES -->
    {!!Html::style('assets/layouts/layout/css/layout-rtl.min.css') !!}
    {!!Html::style('assets/layouts/layout/css/themes/darkblue-rtl.min.css') !!}
    {!!Html::style('assets/layouts/layout/css/custom-rtl.min.css') !!}
@else
    {!!Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!!Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
    {!!Html::style('assets/global/css/components.min.css') !!}

    {!!Html::style('assets/global/css/plugins.min.css') !!}
    <!-- BEGIN THEME LAYOUT STYLES -->
    {!!Html::style('assets/layouts/layout/css/layout.min.css') !!}
    {!!Html::style('assets/layouts/layout/css/themes/darkblue.min.css') !!}
    {!!Html::style('assets/layouts/layout/css/custom.min.css') !!}
    {!!Html::style('cus/dataTables.bootstrap.min.css') !!}
    {!!Html::style('cus/css/style.css') !!}
@endif

{!!Html::style('assets/global/plugins/jquery-notific8/jquery.notific8.min.css') !!}

{!!Html::style('/cus/sweetalert.css') !!}
<!-- END GLOBAL MANDATORY STYLES -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <!-- Page Style -->
    @yield('header')
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="{{ asset('assets/layouts/layout/img/logo.png') }}" alt="logo" class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> <?php
                            countNotification();
                            ?> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold">12 pending</span> notifications</h3>
                            <a href="page_user_profile_1.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">

                                <?php $notifications=Notification()  ?>
                                @foreach($notifications as $notification)
                                    <li >
                                        <a href="javascript:;">
                                            <span class="time">{{$notification->created_at}}</span>
                                            <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> {{$notification->data['title']}} </span>
                                        </a>
                                    </li>

                                @endforeach




                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default"> 4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>You have
                                <span class="bold">7 New</span> Messages</h3>
                            <a href="app_inbox.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/assets/layouts/layout/img/avatar3_small.jpg"
                                                         class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/assets/layouts/layout/img/avatar3_small.jpg"
                                                         class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
                                                </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/assets/layouts/layout/img/avatar3_small.jpg"
                                                         class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
                                                </span>
                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/assets/layouts/layout/img/avatar3_small.jpg"
                                                         class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
                                                </span>
                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/assets/layouts/layout/img/avatar3_small.jpg"
                                                         class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
                                                </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-default"> 3 </span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li class="external">
                            <h3>You have
                                <span class="bold">12 pending</span> tasks</h3>
                            <a href="app_todo.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success"
                                                          aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Application deployment</span>
                                                    <span class="percent">65%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger"
                                                          aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">65% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile app release</span>
                                                    <span class="percent">98%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 98%;" class="progress-bar progress-bar-success"
                                                          aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">98% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Database migration</span>
                                                    <span class="percent">10%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning"
                                                          aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">10% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Web server upgrade</span>
                                                    <span class="percent">58%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 58%;" class="progress-bar progress-bar-info"
                                                          aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">58% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile development</span>
                                                    <span class="percent">85%</span>
                                                </span>
                                        <span class="progress">
                                    we                <span style="width: 85%;" class="progress-bar progress-bar-success"
                                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">85% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New UI release</span>
                                                    <span class="percent">38%</span>
                                                </span>
                                        <span class="progress progress-striped">
                                                    <span style="width: 38%;"
                                                          class="progress-bar progress-bar-important" aria-valuenow="18"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">38% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <img alt="" class="img-circle" src="/assets/layouts/layout/img/avatar3_small.jpg"/>
                        <span class="username username-hide-on-mobile"> Nick </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        {{--<li>--}}
                            {{--<a href="page_user_profile_1.html">--}}
                                {{--<i class="icon-user"></i> My Profile </a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="app_calendar.html">--}}
                                {{--<i class="icon-calendar"></i> My Calendar </a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="app_inbox.html">--}}
                                {{--<i class="icon-envelope-open"></i> My Inbox--}}
                                {{--<span class="badge badge-danger"> 3 </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="app_todo.html">--}}
                                {{--<i class="icon-rocket"></i> My Tasks--}}
                                {{--<span class="badge badge-success"> 7 </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"></li>--}}
                        {{--<li>--}}
                            {{--<a href="page_user_lock_1.html">--}}
                                {{--<i class="icon-lock"></i> Lock Screen </a>--}}
                        {{--</li>--}}
                        <li>
                            <a  onclick="document.getElementById('logout-form').submit()">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<form action="/logout" method="post" id="logout-form">
    {{ csrf_field() }}
</form>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <li class="heading">

                    <h3 class="uppercase">{{$view_name}}</h3>
                </li>
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler"></div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <?php  $page_breadcrumb='';
                $page_title=''; ?>
                <?php $myNavs=Navs(); ?>
                @foreach($myNavs as $nav)
                    <?php  $page_id=isParent($view_name);?>
                    @if($page_id==$nav->id)
                        <li class="nav-item start active open">
                        <?php $page_breadcrumb="<li><a>$nav->name</a><i class='fa fa-circle'></i></li>";
                        $page_title =$nav->name;
                        ?>
                    @elseif(strtolower($view_name)==strtolower('admin.'.$nav->page_view))
                        <li class="nav-item start active">
                        <?php
                        $page_breadcrumb="<li><a>$nav->name</a><i class='fa fa-circle'></i></li>";
                        $page_title =$nav->name;
                        ?>
                    @else
                        <li class="nav-item start">
                            @endif
                            <a href='/{{$nav->page_rout}}' class="nav-link nav-toggle">
                                <i class='{{$nav->icon}}'></i>
                                <span class="title">{{$nav->name}} </span>
                                <span class="selected"></span>
                                <?php
                                $ChildNavs = getChildNavs($nav->id);
                                $ChildNavsShow=getChildNavsShow($nav->id);
                                ?>
                                @if(count($ChildNavsShow)!=0)
                                    <span class="arrow open"></span>
                                @endif
                            </a>
                            @if(count($ChildNavsShow)!=0)
                                <ul class="sub-menu">
                                    @foreach($ChildNavs as $childNvs)
                                        @if(strtolower($view_name)==strtolower('admin.'.$childNvs->page_view))
                                            <?php
                                            $page_breadcrumb.="<li><span>$childNvs->name</span></li>";
                                            $page_title =$childNvs->name;
                                            ?>
                                        @endif
                                        @if($childNvs->show_flag==1)
                                            @if(strtolower($view_name)==strtolower('admin.'.$childNvs->page_view))
                                                <li class="nav-item start active">
                                            @else
                                                <li class="nav-item start ">
                                                    @endif
                                                    <a href='/{{$childNvs->page_rout}}' class="nav-link ">
                                                        <i class='{{$childNvs->icon}}'></i>
                                                        <span class="badge badge-success">1</span>
                                                        <span class="title">{{$childNvs->name}}</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @endforeach
                                </ul>
                            @else

                                @foreach($ChildNavs as $childNvs)
                                    @if(strtolower($view_name)==strtolower('admin.'.$childNvs->page_view))
                                        <?php
                                        $page_breadcrumb.="<li><span>$childNvs->name</span></li>";
                                        $page_title =$childNvs->name;
                                        ?>
                                    @endif
                                @endforeach
                            @endif
                        </li>
                        @endforeach
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <div class="page-bar">
                <ul class="page-breadcrumb">

                    <?php
                    echo $page_breadcrumb;
                    ?>
                </ul>
                <div class="page-toolbar">
                    <div class="col-md-12">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true">
                                {{adminTrans('home','language')}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider" style="min-width:80px; ">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>

                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">
                {{$page_title}}
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row">
                @yield('content')

            </div>

            <!-- END DASHBOARD STATS 1-->

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->


    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2014 &copy; Metronic by keenthemes.
        <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes"
           title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase
            Metronic!</a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<!-- END FOOTER -->


<div id="static2" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
    <div class="modal-body">
        <p>
            هل تريد بالتأكيد حذف هذا السجل؟
        </p>
    </div>
    <div class="modal-footer ar">
        <button type="button" data-dismiss="modal" class="btn btn-light-grey">
            إلغاء الأمر
        </button>
        <a class="OK btn btn-danger">تأكيد
        </a>
    </div>
</div>
<!--[if lt IE 9]>
{!!Html::script('assets/global/plugins/respond.min.js') !!}
{!!Html::script('assets/global/plugins/excanvas.min.js') !!}

<![endif]-->
<!-- BEGIN CORE PLUGINS -->
{!!Html::script('assets/global/plugins/jquery.min.js') !!}
{!!Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!!Html::script('assets/global/plugins/js.cookie.min.js') !!}
{!!Html::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}
{!!Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!!Html::script('assets/global/plugins/jquery.blockui.min.js') !!}

{!!Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!!Html::script('assets/global/plugins/moment.min.js') !!}
{!!Html::script('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') !!}
{!!Html::script('assets/global/plugins/morris/morris.min.js') !!}
{!!Html::script('assets/global/plugins/morris/raphael-min.js') !!}
{!!Html::script('assets/global/plugins/counterup/jquery.waypoints.min.js') !!}
{!!Html::script('assets/global/plugins/counterup/jquery.counterup.min.js') !!}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
{!!Html::script('assets/global/scripts/app.min.js') !!}
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!!Html::script('assets/pages/scripts/dashboard.min.js') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
{!!Html::script('assets/layouts/layout/scripts/layout.min.js') !!}
{!!Html::script('assets/layouts/layout/scripts/demo.min.js') !!}
{!!Html::script('assets/layouts/global/scripts/quick-sidebar.min.js') !!}
{!!Html::script('/cus/sweetalert.min.js') !!}
{!!Html::script('/cus/sweetalert-dev.js') !!}

{!!Html::script('/assets/pages/scripts/ui-notific8.min.js') !!}
{!!Html::script('/assets/global/plugins/jquery-notific8/jquery.notific8.min.js') !!}
{!!Html::script('/assets/global/plugins/jquery-notific8/jquery.notific8.min.js') !!}
{!!Html::script('/assets/global/plugins/bootbox/bootbox.min.js') !!}
{!!Html::script('/assets/pages/scripts/ui-bootbox.min.js') !!}

{!!Html::script('/assets/global/plugins/datatables/datatables.min.js') !!}
{!!Html::script('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}

@include('/admin/f-mesage');
<!--
<script type="text/javascript">
    $(function () {
        setTimeout(function(){
            $("#nots").hide('blind',{},500)
        },5000);
    });
</script>
@if(Session::has('status'))
    <script type="text/javascript">

        swal({
            title: "{{Session::get('flash_message')}}",
        text: "",
        timer: 2000,
        showConfirmButton: false
    });
</script>-->
@endif

<!-- END THEME LAYOUT SCRIPTS -->
<input type="hidden" name="_method" value="patch">
</body>
@yield('footer')
<script>
    bootbox.setDefaults("locale","ar");

    swal({
            title: "{{adminTrans('home','alert_title')}}",
            text: "{{adminTrans('home','alert_text')}}",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "{{adminTrans('home','alert_confirmButtonText')}}",
            cancelButtonText:"{{adminTrans('home','alert_cancelButtonText')}}",
            closeOnConfirm: false
        },
        function(){
            window.location = link;
        });

    $(document).on("click", ".Confirm", function () {
//        e.preventDefault();
        var rout=$(this).attr("href");
        bootbox.confirm({
            cancel : 'الغاء',
            size: "mediam",

            message: '<div class="text-center page-title">هل تريد بالتأكيد حذف هذا السجل؟</div>',
            onEscape:false,
            buttons: {
                confirm: {
                    label: 'نعم',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'لا',
                    className: 'btn-success'
                }},
            callback: function(result){
                if(result) {
                    alert(rout);
                    window.location = rout;
                }
                /* result is a boolean; true = OK, false = Cancel*/ }
        })
        return false;
    });

    bootbox.setDefaults("locale","ar");
    $(document).on("click", ".ConfirmAjax", function () {
//        e.preventDefault();
        var rout=$(this).attr("href");

        var id=$(this).attr("name");

        bootbox.confirm({
            cancel : 'الغاء',
            size: "mediam",

            message: '<div class="text-center page-title">هل تريد بالتأكيد حذف هذا السجل؟</div>',
            onEscape:false,
            buttons: {
                confirm: {
                    label: 'نعم',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'لا',
                    className: 'btn-success'
                }},
            callback: function(result){
                if(result) {
                    $.ajax({
                        type: 'get',
                        url: rout,
                        datatype: 'json',
                        data: {"id": id},
                        success: function (result) {
                            var status = result.status;
                            var msg = result.msg;

                            readByAjax();

                            notify(status, msg);

                        }


                    });
                }
                /* result is a boolean; true = OK, false = Cancel*/ }
        })
        return false;
    });
    function notify($stu, $msg) {
        $.notific8($msg, {
            life: 5000,
            // heading: '<a href="http://www.jqueryscript.net/tags.php?/Notification/">Notification</a> Heading',
            theme: $stu == "s" ? "teal" : "ruby",
            sticky: false,
            horizontalEdge: 'bottom',
            verticalEdge: 'right',
            zindex: 1500,
            icon: true,
            closeText: 'close',
            onInit: null,
            onCreate: null,
            onClose: null

        });
    }


</script>
<style>
    .dataTables_wrapper .dataTables_processing{
        position:absolute;
        top:50%;

        height:40px;

        font-size:1.2em;
        background-color:white}
</style>
</html>