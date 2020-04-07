<!DOCTYPE html>
<html lang="ar">
<head>
@include('library')
<!-- Bootstrap CSS & js -->
 <link rel="stylesheet" href="/css/instructor_style.css">
    <title>overview instructor</title>
</head>
@inject('Constants', 'App\helper\Constants')
<body class="bg-light" id="page-top">
<!-- Page Wrapper -->
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header text-primary ">
                            <h3 class="float-left"> الملف الشخصي </h3>
                            <button type="button" class="btn btn-success float-right ">تعديل الملف الشخصي</button>
                        </div>
                        <div class="card-body">
                            <div class="container emp-profile">
                                <form>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-img">
                                                <img src="{{$instructor->image}}" alt=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-head">
                                                <h5>
                                                    {{$instructor->nameAr}}
                                                </h5>
                                                <h6>
                                                    {{$instructor->nameEn}}
                                                </h6>
                                                <p class="proile-rating">يعمل <span><i class="fa fa-check" aria-hidden="true"></i></span></p>
                                            </div>
                                        </div>
                                    </div>
                                                <div class="row">
                                                    <div class="profile-head">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                           href="#home" role="tab" aria-controls="home"
                                                           aria-selected="true">البيانات الشخصيه</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                           href="#profile" role="tab" aria-controls="profile"
                                                           aria-selected="false">بيانات اخري</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " id="course-tab" data-toggle="tab"
                                                           href="#course" role="tab" aria-controls="course"
                                                           aria-selected="true">الكورسات</a>
                                                    </li>
                                                </ul>
                                            </div>

                                                </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <!-- personal data -->
                                            <div class="tab-content profile-tab" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                     aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>الاسم باللغه العربيه</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>احمد محمد محمود</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>الاسم باللغه الانجليزيه</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Ahmed mohamed</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>الايميل</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Ahmed mohamed@ww</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>الرقم القومي</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>2562215662255</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>رقم التليفون</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>4555555555</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>نظام المحاسبه</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>ساعه</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end personal-->
                                                <!-- data -->
                                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>تليفون اخر</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>555555555555</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>رقم جواز السفر</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>888888888888</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>البلد</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>مصر</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>المدينه</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>منصوره</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>العنوان</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>المشايه</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>نبذه عن</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{$instructor->bio}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end data -->
                                                <!--course -->
                                                <div class="tab-pane" id="course" role="tabpanel"
                                                     aria-labelledby="course-tab">
                                                    <div class="spldishes-grids">
                                                        <!-- Owl-Carousel -->
                                                        @for($i=0;$i<count($courses);$i+=3)
                                                        <div class="row pb-4">
                                                            @for($j=$i;$j<$i+3;$j++)
                                                                @if($j==count($courses))
                                                                    @break
                                                                @endif
                                                            <div class="col-lg-4">
                                                                <div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
                                                                    <div class="item g1" style="">
                                                                        <img src="{{count($courses[$j]->images)>0?$courses[$j]->images[0]->url:$Constants->getCoursePlaceholderImage()}}" style="height:300px;width: 100%" class="lazyOwl">
                                                                        <div class="agile-dish-caption">
                                                                            <h5 style="color: #007bff">{{$courses[$j]->name}}  </h5>
                                                                            <p style="color: #fff">
                                                                                {{$courses[$j]->description}}
                                                                            </p>
                                                                            <a href="" class=" btn btn-outline-primary  py-1 px-2 m-1">
                                                                                <i  class="fas fa-edit m-0 "></i> </a>
                                                                            <a href="/courses/{{$courses[$j]->id}}" class="btn btn-outline-success  py-1 px-2 m-1"><i class="fas fa-eye m-0"></i></a>
                                                                            <button type="submit" class="btn btn-outline-danger py-1 px-2 m-1">
                                                                                <i class="fas fa-trash-alt m-0"></i>
                                                                            </button>
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
                                                <!-- end course -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
</body>
</html>
