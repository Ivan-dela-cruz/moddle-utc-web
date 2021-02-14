<!DOCTYPE html>
<html lang="en">
<head>
    <title>UTC CLASSROMS</title>
   
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets2/images/favicon.ico')}}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">
    
    

</head>
<!-- [ offline-ui ] start -->
<div class="auth-wrapper maintance">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">
                    <img src="{{asset('assets2/images/maintance/404.png')}}" alt="" class="img-fluid">
                    <h5 class="text-muted my-4">Lo siento! No se encontro a página!</h5>
                   
                        <a href="{{route('dashboard')}}" class=" text-white btn waves-effect waves-light btn-primary mb-4"><i class="feather icon-refresh-ccw mr-2"></i>Regresar</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ offline-ui ] end -->
<!-- Required Js -->
<script src="{{asset('assets2/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets2/js/plugins/bootstrap.min.js')}}"></script>


</body>
</html>
