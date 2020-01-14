<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!--//fonts-->
    <title>overview instructor</title>
    <style>
        img[class="profilePhoto"] {
            max-width: 200px;
            max-height: 200px;
            border-radius: 50%;
            overflow: hidden;
            border: double 4px transparent;
            background-image: linear-gradient(white, white), radial-gradient(circle at top left, #007bff, #fff);
            background-origin: border-box;
            background-clip: content-box, border-box;

        }

        a:hover {
            text-decoration: none;
        }

        body {

            margin-top: 50px;
            direction: rtl;
            font-family: 'GESSTwoLight-Light' !important;
        }

        /*-- //card --*/

        .g1 {
            position: relative;
            display: block;
        }

        .agile-dish-caption {
            position: absolute;
            width: 100%;
            bottom: 0px;
            z-index: 999;
            background: rgba(5, 5, 3, 0.78);
            padding: 2em 2em;
            transition: all 0.8s;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            -o-transition: all 0.8s;
            -ms-transition: all 0.8s;
            transform-style: preserve-3d;
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -o-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
        }

        .g1:hover .agile-dish-caption {
            display: block;
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -o-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
        }

        #owl-demo .item img {
            width: 100%;
        }

        @media (max-width: 480px) {
            .agile-dish-caption {
                padding: 0.5em;
            }

            .agile-dish-caption span {
                font-size: 0.8em;
            }
        }


    </style>
</head>
@inject('Constants', 'App\helper\Constants')
<body class="bg-light">
<!-- Begin Page Content -->
<section>
    <!-- data -->
    <div class="container  text-right" style="background-color: #fff;">
        <br>
        <div class="row">
            <div class="  col-lg-4">

                <img class="profilePhoto" src="{{$instructor->image}}" style="">
            </div>
            <div class="  col-lg-8">
                <br>
                <br>
                <h5>{{$instructor->nameAr}}</h5>
                <p>{{$instructor->nameEn}}</p>
                <a href="#">السيره الذاتيه</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">

            <h2 class="text-primary">نبذه عن</h2>
            <p>{{$instructor->bio}}</p>


            </div>
        </div>

        <hr>
        <!-- start courses -->
        <div class="row">
            <div class="col">
                <h2 class="text-primary">الكورسات </h2>
            </div>
        </div>
<<<<<<< HEAD

<!-- motion -->

    <!-- dishes -->

                <div class="spldishes-grids">
                    <!-- Owl-Carousel -->
                    @php($courses=$instructor->courses)
                    @for($i=0;$i<count($courses);$i+=3)
                    <div class="row pb-4">

                        @for($j=$i;$j<$i+3;$j++)
                            @if($j==count($courses))
                                @break
                                @endif
                        <div class="col-lg-4">
                    <div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
                        <div class="item g1" style="padding-right: 10px;">
                            <img src="{{count($courses[$j]->images)>0?$courses[$j]->images[0]->url:$Constants->getCoursePlaceholderImage()}}" style="height:400px;width: 100%" class="lazyOwl">
                            <div class="agile-dish-caption">
                                <h5 style="color: #007bff">{{$courses[$j]->name}} </h5>
                                <p style="height:100px; width: 100%; color: #fff">
                                    {{$courses[$j]->description}}
                                </p>
                                <a href="/courses/{{$courses[$j]->id}}">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>
                            <br>
                        </div>
                        @endfor


                        <br>

                    </div>
                        @endfor

                </div>
                <br>
            </div>
        </div>
        <!-- end cards  -->
    </div>

    <!-- end container  -->
</section>
<script type="text/javascipt" src="/js/jQuery.js"></script>
<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>

</html>
