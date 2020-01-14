<!DOCTYPE html>
<html lang="ar">
<head>
    @include('library')
    <link rel="stylesheet" href="/css/instructor_style.css">

    <title>overview instructor</title>
    <style>

    </style>
</head>
@inject('Constants', 'App\helper\Constants')
<body class="bg-light">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
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
        @include('footer')
    </div>
</div>
<!-- script-->

@include('script')
</body>

</html>
