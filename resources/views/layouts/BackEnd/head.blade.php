<head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        {!! Html::favicon('BackEnd/assets/images/favicon.png') !!}
        <title>@yield('title')</title>
        <!-- Bootstrap Core CSS -->
        {!! Html::style('BackEnd/assets/node_modules/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('BackEnd/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css') !!}
        <!-- This page CSS -->
        <!-- chartist CSS -->
        {!! Html::style('BackEnd/assets/node_modules/morrisjs/morris.css') !!}
        <!--c3 CSS -->
        {!! Html::style('BackEnd/assets/node_modules/c3-master/c3.min.css') !!}
        <!--Toaster Popup message CSS -->
        {!! Html::style('BackEnd/assets/node_modules/toast-master/css/jquery.toast.css') !!}
        <!-- Custom CSS -->
        {!! Html::style('BackEnd/main/css/style.css') !!}
        <!-- Dashboard 1 Page CSS -->
        {!! Html::style('BackEnd/main/css/dashboard1.css') !!}
        <!-- You can change the theme colors from here -->
        {!! Html::style('BackEnd/main/css/default.css') !!}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    .sidebar-nav>ul>li>a.active {
    background: #ffffff;}
    .sidebar-nav ul li a.active {
    color: #20aee3;
}
    </style>
</head>