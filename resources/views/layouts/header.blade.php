    <!-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css ') }}"> -->

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css ') }}">
    <!-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css') }}"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('plugins/jquery.steps-1.1.0/jquery.steps.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('css/font-awesome/css/fontawesome-all.css') }}"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-material-datetimepicker-gh-pages/css/bootstrap-material-datetimepicker.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <!-- Styles -->
  <style type="text/css">
    body{box-shadow:0 0 5px #AAA; background:#234181 linear-gradient(#639ACA,#6095C4 20%,#3368A0 60%,#234181 100%) !important}
    /* Shrinking the sidebar from 250px to 80px and center aligining its content*/
    #sidebar.active {
        min-width: 80px;
        max-width: 80px;
        text-align: center;
    }

    body {
      font-family: "Lato", sans-serif;
  }

  .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #ffff;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
  }

  .sidenav a {
      padding: 8px 10px 8px 6px;
      text-decoration: none;
      font-size: 1rem;
      color: #818181;
      display: block;
      transition: 0.3s;
  }

  .sidenav a:hover {
      color: #000;
  }

  .sidenav .closebtn {
      position: absolute;
      top: -19px;
      right: 0px;
      font-size: 36px;
      margin-left: 50px;
  }

  #main {
      transition: margin-left .5s;
      padding: 16px;
  }

  @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
  }
</style>
@yield('styles_additional')
