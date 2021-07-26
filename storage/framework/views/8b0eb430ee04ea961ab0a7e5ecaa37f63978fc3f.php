<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <head>
        <meta charset="utf-8">  
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('Images/icon.png')); ?>">
        <link rel="shortcut icon" href="<?php echo e(asset('Images/icon.png')); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo e(asset('Images/icon.png')); ?>" type="image/x-icon">
        <title>Diamond Insurance Broker</title>
        <!-- This page CSS -->
        <!-- This page CSS -->

        <link href="<?php echo e(asset('elitedesign/assets/node_modules/morrisjs/morris.css')); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <!--                 <link rel="stylesheet" href="<?php echo e(asset('css/dibstyle.css')); ?>">-->
        <link href="<?php echo e(asset('elitedesign/dist/css/style.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/customstyle.css')); ?>" rel="stylesheet">


        <link rel="stylesheet" href="<?php echo e(asset('elitedesign/assets/node_modules/jqueryui/jquery-ui.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('elitedesign/assets/node_modules/jqueryui/jquery-ui.theme.min.css')); ?>" />
          <link href="<?php echo e(asset('elitedesign/assets/node_modules/select2/dist/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- Dashboard 1 Page CSS -->




        <?php echo $__env->yieldContent('customcss'); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body class="skin-blue fixed-layout" >
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Loading...</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header" >
                        <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">
                            <!-- Logo icon --><b>
                               <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
<!--                                <img src="<?php echo e(asset('elitedesign/assets/images/logo-icon.png')); ?>" alt="homepage" class="dark-logo" />-->
                                <!-- Light Logo icon -->
                                <!-- <img src="<?php echo e(asset('elitedesign/assets/images/logo-light-icon.png')); ?>" alt="homepage" class="light-logo" /> -->
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text --><span>
                                <!-- dark Logo text -->

                                <!-- Light Logo text -->    
                                <img src="<?php echo e(asset('elitedesign/assets/images/whitelogo.png')); ?>" class="light-logo" alt="homepage" style='height:60px'/></span> </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                            <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <li class="nav-item">

                            </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== -->
                             <?php if(count($navbarValues['notificationDetails'])>0): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                    <ul>
                                        <li>
                                            <div class="drop-title">Notifications</div>
                                        </li>
                                       
                                        <li>
                                            
                                            <div class="message-center">
                                                <!-- Message -->
                                                <?php $__currentLoopData = $navbarValues['notificationDetails']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="javascript:void(0)">
                                                     <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                    <?php if($notification->message_type =='policy'): ?>
                                                     <div class="mail-contnet">
                                                        <h5>New policy:</h5> <span class="mail-desc"><?php echo e($notification->message); ?></span> <span class="time"><?php echo e(date('d.m.Y',strtotime($notification->created_date))); ?></span> </div>
                                                    <?php elseif($notification->message_type =='quote'): ?>
                                                     <div class="mail-contnet">
                                                        <h5>New quote:</h5> <span class="mail-desc"><?php echo e($notification->message); ?></span> <span class="time"><?php echo e(date('d.m.Y',strtotime($notification->created_date))); ?></span> </div>
                                                    <?php elseif($notification->message_type =='endorsement'): ?>
                                                     <div class="mail-contnet">
                                                        <h5>New endorsement:</h5> <span class="mail-desc"><?php echo e($notification->message); ?></span> <span class="time"><?php echo e(date('d.m.Y',strtotime($notification->created_date))); ?></span> </div>
                                                    <?php else: ?>
                                                     <div class="mail-contnet">
                                                        <h5>New :</h5> <span class="mail-desc"><?php echo e($notification->message); ?></span> <span class="time"><?php echo e(date('d.m.Y',strtotime($notification->created_date))); ?></span> </div>
                                                    <?php endif; ?>
                                                   
                                                    
                                                </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                       
                                            </div>
                                        </li>
                                  
                                        
                                    </ul>
                                </div>
                            </li>
                            <?php endif; ?>
                            <!-- ============================================================== -->
                            <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- mega menu -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- End mega menu -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- User Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown u-pro">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo e(asset('Images/avatar.jpg')); ?>" alt="<?php echo e(Auth::user()->name); ?>" class=""> <span class="hidden-md-down"><?php echo e(Auth::user()->name); ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                    <!-- text-->
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                    <!-- text-->

                                    <!-- text-->
                                    <div class="dropdown-divider"></div>
                                    <!-- text-->
                                    <a href="/changePassword" class="dropdown-item"><i class="ti-settings"></i> Change password</a>
                                    <!-- text-->
                                    <div class="dropdown-divider"></div>
                                    <!-- text-->
                                    <a href="<?php echo e(route('mainlogout')); ?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                    <!-- text-->
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End User Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            
                           
                             
                             
                            <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?php echo e(asset('Images/avatar.jpg')); ?>" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo e(Auth::user()->name); ?></span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>                             

<!--                                    <li><a href="/changePassword"><i class="ti-settings"></i> Change password</a></li>-->
                                    <li><a href="<?php echo e(route('mainlogout')); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </li>
                              <?php if(in_array('ROLE_MANAGEMENT_ADMIN', Auth::user()->roles)): ?>
                               <li> <a class="waves-effect waves-dark" href="<?php echo e(route('managementpolicy')); ?>" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Dashboard</span></a></li>
                              <?php else: ?>
                             
                              <li> <a class="waves-effect waves-dark" href="<?php echo e(route('dashboard')); ?>" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Dashboard</span></a></li>
                             <?php endif; ?>
                            <?php if(in_array('ROLE_SALES_MANAGER', Auth::user()->roles) || in_array('ROLE_SALES', Auth::user()->roles)): ?>  
                            
                            <?php echo $__env->make('layouts.sales-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                             <?php elseif(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_TECHNICAL', Auth::user()->roles)): ?>
                             
                                <?php echo $__env->make('layouts.technical-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                              <?php elseif(in_array('ROLE_OPERATION_MANAGER', Auth::user()->roles) || in_array('ROLE_OPERATION', Auth::user()->roles) || in_array('ROLE_OPERATION_LEAD', Auth::user()->roles)): ?> 
                              
                               <?php echo $__env->make('layouts.operation-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                               
                                <?php elseif(in_array('ROLE_FINANCE_MANAGER', Auth::user()->roles) || in_array('ROLE_FINANCE', Auth::user()->roles)): ?>
                             
                                <?php echo $__env->make('layouts.finance-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                                
                                <?php else: ?> 
                             
                                <?php echo $__env->make('layouts.management-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                             <?php endif; ?>
                         
       
                            

                            <li><a class="waves-effect waves-dark" href="<?php echo e(route('appointmentlist')); ?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Appointments</span></a></li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="row page-titles">
                
                        <div class="col-md-12 align-self-center text-right">
                            <div class="d-flex justify-content-end align-items-center">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" style='color:#03a9f3;'>Home</a></li>
                                    <li class="breadcrumb-item middlemenu" ></li>
                                    <li class="breadcrumb-item active text-info breadcrum-last" ></i><a href="<?php echo e(route('dashboard')); ?>" id='breadcrumbBack' style='color:#03a9f3;text-transform: capitalize;'></a></li>
                                </ol>
                                <?php echo $__env->yieldContent('createnewbutton'); ?>

                            </div>
                        </div>
                         <?php echo $__env->yieldContent('overviewmenu'); ?>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Flash message box -->
                     <?php echo $__env->yieldContent('warningmessage'); ?>
                    <?php echo $__env->make('layouts.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- content box -->
                    <div class="row">
                             <div class="col-md-12 align-self-center">
                            <h3 class="text-themecolor" style='color:#e46a76'>
                                <?php echo $__env->yieldContent('headtitle'); ?>
                            </h3>
                        </div>
                        <div class="col-12">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>

                    </div>
                    <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Info box -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Info box -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Sales Chart and browser state-->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Sales Chart -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Feed and erning -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- Review -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Review -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Comment - chats -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- End Comment - chats -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- End Page Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <div class="right-sidebar">
                        <div class="slimscrollright">
                            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                            <div class="r-panel-body">
                                <ul id="themecolors" class="m-t-20">
                                    <li><b>With Light sidebar</b></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                    <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                <p>Copyright © <?php echo e(date('Y')); ?> &nbsp;  | &nbsp; Development: <a target="_blank" href="http://dbroker.com.sa">Diamond Insurance Broker</a> &nbsp; | &nbsp; Technical support: <a href="mailto:info@dbroker.com.sa">info@dbroker.com.sa</a></p>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->

            
        </div>

        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->


        <script src="<?php echo e(asset('elitedesign/assets/node_modules/jquery/jquery-3.2.1.min.js')); ?>"></script>

        <script src="<?php echo e(asset('js/global/Underscore.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elitedesign/assets/node_modules/jqueryui/jquery-ui.min.js')); ?>"></script>

        <!-- Bootstrap popper Core JavaScript -->
        <script src="<?php echo e(asset('elitedesign/assets/node_modules/popper/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elitedesign/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="<?php echo e(asset('elitedesign/dist/js/perfect-scrollbar.jquery.min.js')); ?> "></script>
        <!--Wave Effects -->
        <script src="<?php echo e(asset('elitedesign/dist/js/waves.js')); ?> "></script>
        <!--Menu sidebar -->
        <script src="<?php echo e(asset('elitedesign/dist/js/sidebarmenu.js')); ?>"></script>
        <!--Custom JavaScript -->
        <script src="<?php echo e(asset('elitedesign/dist/js/custom.js')); ?>"></script>
        <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('ckeditor/adapters/jquery.js')); ?>" type="text/javascript"></script>
        <!-- ============================================================== -->
        <?php echo $__env->yieldContent('customscript'); ?>




        <!-- This page plugins -->
        <!-- ============================================================== -->
        <!--Sky Icons JavaScript -->
        <script src="<?php echo e(asset('elitedesign/assets/node_modules/skycons/skycons.js')); ?>"></script>
        <!--morris JavaScript -->


        <script src="<?php echo e(asset('elitedesign/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')); ?>"></script>
         <script src="<?php echo e(asset('elitedesign/assets/node_modules/select2/dist/js/select2.full.min.js')); ?>" type="text/javascript"></script>
        <!-- Chart JS -->
<!--        <script src="<?php echo e(asset('elitedesign/dist/js/dashboard4.js')); ?>"></script>-->

<!--        <script src="<?php echo e(asset('js/global/jquery-ui.js')); ?>"></script>-->
        <script src="<?php echo e(asset('js/elitemain2.js')); ?>"></script>
        <script src="<?php echo e(asset('js/locale.js')); ?>"></script> 
        <script src="<?php echo e(asset('js/elitemain.js')); ?>"></script>
        <script src="<?php echo e(asset('js/global/jquery-dateformat.js')); ?>"></script>
       
        <script>
        
        $(function(){
             $(".middlemenu").hide();
             $(".breadcrum-last").hide();
           $(document).on('click','#sidebarnav li>a:not(".has-arrow")',function(){
      
               localStorage.setItem("currentclicked_menu_"+<?php echo e(Auth::user()->id); ?>,JSON.stringify({'name':$.trim($(this).text()),'url':$(this).attr('href'),'parentId':$(this).closest('ul').prev('a').text()}));
          }) 
          $(document).on('click','.breadcrumb-item',function(){
                   localStorage.removeItem("currentclicked_menu_"+<?php echo e(Auth::user()->id); ?>);
          })
          
          
           if (localStorage.hasOwnProperty("currentclicked_menu_"+<?php echo e(Auth::user()->id); ?>)) {
              var breadcumValues = jQuery.parseJSON(localStorage.getItem("currentclicked_menu_"+<?php echo e(Auth::user()->id); ?>));
              $("#breadcrumbBack").attr('href',breadcumValues.url);
              $("#breadcrumbBack").text(breadcumValues.name);
                $(".breadcrum-last").show();
              if(breadcumValues.parentId !='') {
               $(".middlemenu").html(breadcumValues.parentId);
                $(".middlemenu").show();
              }
          } 
            
        });
        
        
        </script>
        
        <?php echo $__env->yieldContent('pagescript'); ?>
        <?php echo $__env->yieldContent('innerpagescript'); ?>
        <style>
            .iframe-container {
                overflow: hidden;
                // Calculated from the aspect ration of the content (in case of 16:9 it is 9/16= 0.5625)
                padding-top: 56.25%!important ;
                position: relative!important;
                max-height:1750 !important;
                min-height:1000px !important;
            }

            .iframe-class {
                border: 0!important;
                height: 100%!important;
                left: 0!important;
                position: absolute!important;
                top: 0!important;
                width: 100%!important;
            }
            iframe{
                overflow:hidden;
            }
            body {

  font-size: 16px;
  font-weight: 400; }
        </style>

    </body>

</html><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/layouts/elite_fullwidth.blade.php ENDPATH**/ ?>