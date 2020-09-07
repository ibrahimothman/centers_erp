<!DOCTYPE html>
<html lang="ar">
<head>
    @include('library')
    <!-- Bootstrap CSS & js -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/instructor_style.css">

    <title>overview instructor</title>
</head>
@inject('Constants', 'App\helper\Constants')
<body class="bg-light" id="page-top">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
<!-- Begin Page Content -->
        <section>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img class=" img-circle img-thumbnail"src="{{$instructor->image}}" >
                        </div></hr><br>
                        <p>تاريخ الاضافه : {{$instructor->created_at}}</p>
                        @can('update', $instructor)
                            <a href="{{ route('instructors.edit', ['instructor' => $instructor->id]) }}" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> تعديل الملف الشخصى  </a>
                        @endcan
                        <br>
                        {{-- courses--}}
                        <div class="card  border-info mb-3 user-course">
                            <div class="card-header">courses <i class="fa fa-link fa-1x"></i></div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span>name</span>
                                            <div class="progress progress_sm">
                                                <div class="progress-bar bg-danger" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                                            </div>
                                        </li>
                                    <li class="list-group-item">
                                        <a href="#" class="btn btn-primary btn-xs"> المزيد  </a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- end--}}

                    </div>


                    <div class="col-sm-9">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" >
                                <br>
                                <div class="col-md-12">
                                    <!--Table-->
                                    <table class="table table-striped table-responsive mb-0"  id="printTable">
                                        <!--Table head-->
                                        <thead>
                                        <tr>
                                            <div class="print-btn">
                                                <button class="btn btn-primary hidden-print" onclick="printData();">
                                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>

                                            </div>

                                        </tr>
                                        </thead>
                                        <!--Table head-->

                                        <!--Table body-->
                                        <tbody>
                                        <tr class="table-danger profile" >

                                            <td>الاسم </td>
                                            <td>{{$instructor->nameAr}}</td>
                                            <td>{{$instructor->nameEn}}


                                        </tr>
                                        <tr >

                                            <td>التليفون</td>
                                            <td>{{$instructor->phoneNumber}}</td>
                                            <td>{{$instructor->phoneNumberSec}}</td>

                                        </tr>
                                        <tr>

                                            <td>البريد الالكترونى </td>
                                            <td colspan="2">{{$instructor->email}}</td>



                                        </tr>
                                        <tr>

                                            <td>العنوان</td>
                                            <td colspan="2">
                                                <span>{{$instructor->address->state}} - </span>
                                                <span>ا{{$instructor->address->city}} - </span>
                                                <span>{{$instructor->address->address}}</span>
                                        </tr>

                                        <tr>

                                            <td>رقم جواز السفر  </td>
                                            <td colspan="2">{{$instructor->passportNumber}}</td>

                                        </tr>
                                        <tr>


                                            <td>الرقم القومى   </td>
                                            <td colspan="2">{{$instructor->idNumber}}</td>


                                        </tr>

                                        @if($instructor->job)
                                            <tr>

                                                <td>الوظيفه</td>
                                                <td colspan="2">{{$instructor->job->name}}</td>


                                            </tr>
                                        @endif

                                        <tr>

                                            <td>نظام المحاسبه</td>
                                            <td colspan="2">{{$instructor->payment_model['model']}}</td>


                                        </tr>

                                        @foreach(json_decode($instructor->payment_model_meta_data, true) as $key => $value)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td colspan="2">{{$value}}</td>


                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <!--Table body-->
                                    </table>
                                    <!--Table-->
                                </div>    </div>


                        </div>


                    </div><!--/col-9-->
                </div>
            </div>
        </section>
{{--<section>--}}
    {{--<!-- data -->--}}
    {{--<div class="container  text-right" style="background-color: #fff;">--}}
        {{--<br>--}}
        {{--<div class="row">--}}
            {{--<div class="  col-lg-4">--}}

                {{--<img class="profilePhoto" src="{{$instructor->image}}" style="">--}}
            {{--</div>--}}
            {{--<div class="  col-lg-8">--}}
                {{--<br>--}}
                {{--<br>--}}
                {{--<h5>{{$instructor->nameAr}}</h5>--}}
                {{--<p>{{$instructor->nameEn}}</p>--}}
                {{--<a href="#">السيره الذاتيه</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<hr>--}}
        {{--<div class="row">--}}
            {{--<div class="col">--}}

            {{--<h2 class="text-primary">نبذه عن</h2>--}}
            {{--<p>{{$instructor->bio}}</p>--}}


            {{--</div>--}}
        {{--</div>--}}

        {{--<hr>--}}
        {{--<!-- start courses -->--}}
        {{--<div class="row">--}}
            {{--<div class="col">--}}
                {{--<h2 class="text-primary">الكورسات </h2>--}}
            {{--</div>--}}
        {{--</div>--}}

{{--<!-- motion -->--}}

    {{--<!-- dishes -->--}}

                {{--<div class="spldishes-grids">--}}
                    {{--<!-- Owl-Carousel -->--}}
                    {{--@for($i=0;$i<count($courses);$i+=3)--}}
                    {{--<div class="row pb-4">--}}

                        {{--@for($j=$i;$j<$i+3;$j++)--}}
                            {{--@if($j==count($courses))--}}
                                {{--@break--}}
                                {{--@endif--}}
                        {{--<div class="col-lg-4">--}}
                    {{--<div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">--}}
                        {{--<div class="item g1" style="padding-right: 10px;">--}}
                            {{--<img src="{{count($courses[$j]->images)>0?$courses[$j]->images[0]->url:$Constants->getCoursePlaceholderImage()}}" style="height:400px;width: 100%" class="lazyOwl">--}}
                            {{--<div class="agile-dish-caption">--}}
                                {{--<h5 style="color: #007bff">{{$courses[$j]->name}} </h5>--}}
                                {{--<p style="height:100px; width: 100%; color: #fff">--}}
                                    {{--{{$courses[$j]->description}}--}}
                                {{--</p>--}}
                                {{--<a href="/courses/{{$courses[$j]->id}}">قراءه المزيد</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                            {{--<br>--}}
                        {{--</div>--}}
                        {{--@endfor--}}


                        {{--<br>--}}

                    {{--</div>--}}
                        {{--@endfor--}}

                {{--</div>--}}
                {{--<br>--}}

            {{--</div>--}}

{{--</section>--}}
    <!-- end container  -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<script>
    function printData()
    {
        var divToPrint=document.getElementById("printTable");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>
</body>

</html>
