<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style -->
    <link href="{{ asset('css/diploma_style.css') }}" rel="stylesheet"/>
    <title>details of diploma</title>
    <style>
    </style>
</head>
<body>

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>{{ $diploma->name }}</h3>
                                <form>
                                    <button type="submit" class="btn btn-outline-danger py-1 px-2">
                                        <i class="fas fa-trash-alt m-0"></i></button>
                                    <a href="">
                                        <button type="button" class="btn btn-success">حجز مجموعه جديده</button>
                                    </a>
                                </form>
                            </div>
                        </header>
                        <div class="card-body">
                            <!-- diploma view -->
                            <div class="card   mb-3" style="max-width: 100%; ">
                                </span>
                                <div class="row ">
                                    <div class="col">
                                        <div class="card-body">
                                            <!-- details -->
                                                <div class="view-courses-title">
                                                    <h5 class="card-title text-primary">تفاصيل الدبلومه</h5>
                                                    <div class="dropdown-divider"></div>

                                                    <a href="{{ route('diplomas.edit', $diploma->id) }}" class=" btn btn-outline-primary  py-1 px-2"><i
                                                                class="fas fa-edit m-0 "></i> </a>

                                                </div>
                                                <div class="card-text clearfix ">
                                                    <div><span class="  text-primary"> محتوي الدبلومه:</span></div>
                                                    <div class="mb-1">
                                                        @foreach($diploma->courses as $course)
                                                            <span class=" text-secondary pl-5  ">{{ $course->name }}</span>
                                                        @endforeach
                                                    </div>
                                                    <span class="  text-primary"> عن الدبلومه :  </span>
                                                    <div class="pr-5">{{ $diploma->description }}</div>
                                                </div>
                                                <br>
                                                <div class="mb-1  d-inline">
                                                    <span class="text-success px-5"> السعر: <span class=" text-secondary pl-2  ">{{ $diploma->cost }} جنيه</span></span>
                                                    <span class="text-success px-5"> عدد المحاضرات:<span class=" text-secondary pl-2 ">{{ $diploma->number_of_lectures }} محاضره</span></span>
                                                    <span class="text-success px-5"> عدد الساعات:  <span class=" text-secondary  pl-2">{{ $diploma->duration }} ساعه</span></span>
                                                </div>

                                            <fieldset>
                                                <div class="view-courses-title">
                                                    <h5 class="card-title text-primary">تفاصيل الحجز</h5>
                                                    <div class="dropdown-divider"></div>
                                                        <a href="" class=" btn btn-outline-primary  py-1 px-2"><i
                                                                    class="fas fa-edit m-0 "></i> </a>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <span class="w-50 p-3  text-primary"> اسم المدرس :</span>
                                                            محمد علي
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div><span class="w-50 p-3  text-primary"> القاعه :</span>
                                                            قاعه رقم 10
                                                        </div>
                                                    </div>
                                                </div>

                                                <fieldset>
                                                <div class="form-row days">
                                                    <header class="full-width"><h6> مواعيد الدبلومه </h6></header>
                                                    <div class="col-sm-4 form-group">
                                                        <div>
                                                            <span class="w-50 p-3  text-warning"> تاريخ البدايه :</span>
                                                            20/1/2020
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div>
                                                            <span class="w-50 p-3  text-warning"> بدايه المحاضره :</span>
                                                          الساعه:2
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <div>
                                                            <span class="w-50 p-3  text-warning">نهايه المحاضره :</span>
                                                           الساعه:5
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            </fieldset>
                                            <!-- othet register -->
                                            <fieldset>
                                                <div class="view-courses-title">
                                                    <h5 class="card-title text-primary">تفاصيل الحجز</h5>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="" class=" btn btn-outline-primary  py-1 px-2"><i
                                                                class="fas fa-edit m-0 "></i> </a>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <span class="w-50 p-3  text-primary"> اسم المدرس :</span>
                                                            احمد ابراهيم
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div><span class="w-50 p-3  text-primary"> القاعه :</span>
                                                            قاعه رقم 5
                                                        </div>
                                                    </div>
                                                </div>
                                                <fieldset>
                                                    <div class="form-row days">
                                                        <header class="full-width"><h6> مواعيد الدبلومه </h6></header>
                                                        <div class="col-sm-4 form-group">
                                                            <div>
                                                                <span class="w-50 p-3  text-warning"> تاريخ البدايه :</span>
                                                                20/1/2020
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <div>
                                                                <span class="w-50 p-3  text-warning"> بدايه المحاضره :</span>
                                                                الساعه:5
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <div>
                                                                <span class="w-50 p-3  text-warning">نهايه المحاضره :</span>
                                                                الساعه:8
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </fieldset>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <br>
                            <!--  end diploma view -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- script -->
        @include('footer')
    </div>
</div>
<!-- script-->
@include('script')
</body>
</html>
