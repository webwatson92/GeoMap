@extends('partials/layouts_dash')
@section('style')
   <style> 
     h1, h2, form{
        font-family: "Arial";font-size: 13px;
    }
    h3{
        font-size: 20px;
    }
        body {
            font-size: 13px;
            color:black;
            background-color:rgb(150, 255, 128);
            background-image:url(public/img/font.png);
            font-family: "Arial";
            background-position: center;
            background-size: contain;   
            background-repeat: no-repeat;
            overflow: hidden;
        }
        #societariat{
                font-family: 'Arial';border-radius: 30px; margin-left: 22.5em;
        }

        #immo{
                font-family: 'Arial';border-radius: 30px; margin-top: 180px;margin-left: 455px;
        }

        #compta{
                font-family: 'Arial';border-radius: 30px; margin-top: 180px;margin-left: -255px;
        }

        #stock{
                font-family: 'Arial';border-radius: 30px; margin-top: 70px;margin-left: 390px;
        }

        #vente{
                font-family: 'Arial';border-radius: 30px; margin-top: 90px;margin-left: -140px;
        }

        @media (max-width: 575.98px) { 
            #societariat{
                background-color: red; margin-left: 4em;
            }
            #compta{
                background-color: red;margin-left: -6em;
            }
            #immo{
                background-color: red;margin-left: 4em;
            }
            #vente{
                background-color: red;margin-left: 1em;
            }
            #stock{
                background-color: red;margin-left: 1em;
            }
        }

        /*Small devices (landscape phones, less than 768px)*/
        @media (max-width: 767.98px) {
            #societariat{
                background-color: red; margin-left: 4em;
            }
            #compta{
                background-color: red;margin-left: -6em;
            }
            #immo{
                background-color: red;margin-left: 4em;
            }
            #vente{
                background-color: red;margin-left: 1em;
            }
            #stock{
                background-color: red;margin-left: 1em;
            }
        }

        /* Medium devices (tablets, less than 992px)*/
        @media (max-width: 991.98px) { 
            
        }

        /* Large devices (desktops, less than 1200px)*/
        @media (max-width: 1199.98px) { 
            #societariat{
                background-color: red;;
            }
        }

        a{color:#fff;}

    </style>
@endsection
@section('content')
    <script src="//unpkg.com/alpinejs" defer></script>
        <div class="grid-container">
            <div class="row" style="margin:15px;">
             <div class="row" style="margin:2vh">
                   <div class="col-sm-2 offset-5 col-md-12 col-xs-2 offset-5 col-lg-12">
                        <button id="societariat" class="btn btn-success"><a href="{{route('index.magso')}}">SOCIETARIAT</a></button>
                    </div>
             </div>  
        </div>
        <div class="row">
                    <div class="col-6">
                        <div class="col-xs-2 col-sm-2 col-md-12 col-lg-12">
                            <button id="stock" class="btn btn-success">STOCK</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-sm-2 offset-5 col-md-12 col-xs-2 offset-5 col-lg-12">
                            <button id="vente" class="btn btn-success">VENTE</button>
                        </div>
                    </div>
        </div>
        <div class="row">
                    <div class="col-6">
                        <div class="col-xs-2 col-sm-2 col-md-12 col-lg-12">
                            <button id="immo" class="btn btn-success">IMMOBILISITATION</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-sm-2 offset-5 col-md-12 col-xs-2 offset-5 col-lg-12">
                            <button id="compta" class="btn btn-success">COMPTABILITÉ</button>
                        </div>
                    </div>
        </div> 
        </div> 
@stop