<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>ICARUS-SOFTWARE</title>
{{--    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />--}}
{{--    <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />--}}
{{--    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>--}}

    <title>ICARUS-SOFTWARE</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">--}}

    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@100&display=swap" rel="stylesheet">
    <style>
        .sidebar{
            transition: all .3s ease-out;
            /*overflow: scroll;*/
            -webkit-overflow-scrolling: touch;
            position: right;
            bottom: 0;
            height: auto;
        }
        input{
            border-radius: 0px !important;
            border: 1px solid #00000047 !important;
        }
        .card{
            border-radius:0px !important;
        }
        .card-header{
            border-radius:0px !important;
        }
        select{
            border-radius:0px !important;
        }
        /*table.dataTable tbody th, table.dataTable tbody td {*/
        /*    padding: 0px 10px;*/
        /*}*/
        table.dataTable tbody th, table.dataTable tbody td {
            padding: 5px 10px;
            vertical-align: middle;
        }
        table{
            color:black !important;
            /*font-weight:bold !important;*/
        }
        .btn-success {
            background-color: green;
            border-radius:0px;
        }
        .btn-danger{
            background-color: red;
            border-radius:0px;
        }
        .btn-warning{
            border-radius:0px;
        }
        .form-control{
            height:36px !important;
        }
        b{
            font-size: large !important;
        }
        th{
            text-align:center;
        }
        tr{
            background: #FFFFFF !important;
        }
        .dataTables_wrapper .dataTables_length {
            float: left;
            margin-top: 15px;
        }
    </style>

</head>
<body>
@if (Auth::check())
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => true,
            'user' => Auth::user()
        ])!!}
    </script>
@else
    <script>
        window.Laravel = {!!json_encode([
                'isLoggedin' => false
            ])!!}
    </script>
@endif
<div id="app"></div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
<script src="{{asset('backend/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('backend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('backend/assets/js/jquery.slimscroll.min.js')}}"></script>--}}
<!-- Datatable JS -->
{{--<script src="{{asset('backend/assets/js/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/assets/js/dataTables.bootstrap4.min.js')}}"></script>--}}
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script src="{{asset('backend/assets/js/app.js')}}"></script>
<script>
    $(function(){
        $('.toggle-menu').click(function(e){
            e.preventDefault();
            $('.sidebar').toggleClass('toggled');
        });
    });
</script>
</body>
</html>
