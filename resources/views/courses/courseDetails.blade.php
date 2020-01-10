<!doctype html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Available Course</title>

            <!-- Custom fonts for this template-->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link href="/../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

            <!-- Custom styles for this template-->
            <link href="/../../../css/sb-admin-rtl.css" rel="stylesheet">
            <link href="/../../../css/course-details.css" rel="stylesheet">
            <link href="/../../../css/jquery-ui.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/58b9d7bcbd.js" crossorigin="anonymous"></script>
        </head>
        @inject('Constants', 'App\helper\Constants')

        <body>
            <div id="wrapper">
                @include('sidebar')
                <div id="content-wrapper" class="d-flex flex-column">
                    @include('operationBar')
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-10">
                                <div class="card mb-4 shadowed">
                                    <div class="card-body course-wrapper">
                                        <article>
                                            <div id="course-header" class="carousel slide course-header" data-ride="carousel" data-interval="false">
                                                <div class="carousel-inner">
                                                    @php($i = 0)
                                                    @if($course->images->isEmpty())
                                                        <div class="carousel-item active" >
                                                            <img class="d-block w-100" src="{{$Constants->getCoursePlaceholderImage()}}" alt="First slide">
                                                        </div>
                                                    @else
                                                        @foreach($course->images as $image)
                                                            <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                                                                <img class="d-block w-100" src="/uploads/courses/{{ $image->url }}" alt="First slide">
                                                            </div>
                                                            @php($i++)
                                                        @endforeach
                                                     @endif

                                                </div>
                                                <a class="carousel-control-prev" href="#course-header" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#course-header" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                                <h4>{{$course->name}}</h4>
                                            </div>
                                            <section class="logistics">
                                                <div class="course-logistics">
                                                    <div class="logistic-element">
                                                        <img src="{{url('img/location.svg')}}" alt="">
                                                        <p>المكان</p>
                                                        <p>{{$center->name}}</p>
                                                    </div>
                                                    <div class="logistic-element">
                                                        <img src="{{url('img/money.svg')}}" alt="">
                                                        <p>التكلفة</p>
                                                        <p>{{ $course->cost }}</p>
                                                    </div>
                                                    <div class="logistic-element">
                                                        <img src="{{url('img/startdate.svg')}}" alt="">
                                                        <p>المدة</p>
                                                        <p>{{ $course->duration }}ساعه </p>
                                                    </div>
                                                </div>
                                            </section>
                                            <div class="important-details-wrapper">
                                            <section class="about-course">
                                                <h5>عن الدورة</h5>
                                                <p>{{ $course->description }}</p>

                                            </section>
                                            <section class="course-teacher-wrapper">
                                                <header>
                                                <h5> المدرسون و المحتوى</h5>
                                                </header>
                                                <div class="course-teachers">
                                                @foreach($course->instructors as $instructor)
                                                    <div class="teacher">
                                                        <img src="{{$instructor->profile_img==null?$Constants->getInstructorPlaceholderImage():$instructor->profile_img}}" alt="">
                                                        <a href="#"></a>
                                                    </div>

                                                    @endforeach
                                                </div>
                                                <div id="accordion">
                                                    @php($i = 1)
                                                    @foreach(json_decode($course->content, true) as $content)
                                                        <h3>{{ $content['name'] }} </h3>
                                                        <div>
                                                            <p>{{ $content['description'] }}</p>
                                                        </div>
                                                        @php($i++)
                                                    @endforeach


                                                </div>
                                            </section>
                                            </div>
                                            <!-- <sction class="testmonials">
                                                <div id="course-testmonial" class="carousel slide course-testmonial" data-ride="carousel" data-interval="false">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                        <img class="d-block w-100" src="https://img-cdn.majarah.com/post/6916910457805268_4055220074079483_711907441144118_4332190458952274_Majarah_tech_.jpg" alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                        <img class="d-block w-100" src="https://1ook.com/wp-content/uploads/2017/11/php-1.jpg" alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                        <img class="d-block w-100" src="https://www.fortunetechnologyindia.com/wp-content/uploads/2019/06/PHP_1_1.jpg" alt="Third slide">
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#course-testmonial" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#course-testmonial" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </secrion> -->

                                            <section class="logistics testmonials">
                                                <div class="course-logistics">
                                                    <div class="logistic-element">
                                                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" alt="" class="rounded-img">
                                                        <p>محمود سعيد</p>
                                                        <p>كورس جميل جداً انصحه لكل حد عايز يبقى مبرمج</p>
                                                        <p><i class="fas fa-star gold-star"></i><i class="fas fa-star gold-star"></i><i class="fas fa-star gold-star"></i><i class="fas fa-star gold-star"></i><i class="fas fa-star gold-star"></i></p>
                                                    </div>
                                                    <div class="logistic-element">
                                                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" alt="" class="rounded-img">
                                                        <p>علي الفخراني</p>
                                                        <p>المدرسون كانوا عباقرة شكراً جامعة المنصورة</p>
                                                        <p><i class="fas fa-star gold-star"></i><i class="fas fa-star gold-star"></i><i class="fas fa-star gold-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                                                    </div>
                                                    <div class="logistic-element">
                                                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(11).jpg" alt="" class="rounded-img">
                                                        <p>دي سماااح</p>
                                                        <p>مبسوطة اني خدت الكورس ده والله</p>
                                                        <p><i class="fas fa-star gold-star"></i><i class="fas fa-star gold-star"></i><i class="fas fa-star gold-star"></i><i class="fas fa-star gold-star"></i><i class="fas fa-star"></i></p>
                                                    </div>
                                                </div>
                                            </section>

                                            <div class="col-sm-8 mx-auto" style="width: 200px;">
                                                    <hr/>
                                                    <button class="btn btn-success action-buttons w-100" type="submit" id="submit"> انضم <i class="fas fa-plus"></i></button>
                                                </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        <!-- /.container-fluid -->
                        </div>
                    </div>
                    @include('footer')
                </div>
            </div>


        <!-- Bootstrap core JavaScript-->
        <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{url('js/jquery-ui.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{url('js/sb-admin-2.min.js')}}"></script>
        <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>


        <script type='text/javascript' src="{{url('js/notify.min.js')}}"></script>
        <script>
            $.notify.addStyle('successful-process', {
                html: `<div>
                            <span data-notify-text/>
                            <i class="fas fa-times-circle"
                            style="
                                    color:white;
                                    opacity:0.7;
                                    position: relative;
                                    top: 0px;
                                    left: -28px;
                                  "
                            ></i>
                        </div>`,
                classes: {
                    base: {
                    "white-space": "nowrap",
                    "background-color": "green",
                    "padding": "15px",
                    "padding-left": "35px",
                    "border-radius": "3px"
                    },
                    done: {
                    "color": "white",
                    "background-color": "#28a745",
                    "font-weight":"bold"
                    },
                    notDone:{
                        "color": "white",
                        "background-color": "#dc3545",
                        "font-weight":"bold"
                    }
                }
                });

                $('.btn').click(function(){

                    $.notify('تمت العملية بنجاح', {
                            position:"bottom left",
                            style: 'successful-process',
                            className: 'done',
                // autoHideDelay: 500000
                });

                });

                // $.notify('فشلت العملية', {
                // position:"bottom left",
                // style: 'successful-process',
                // className: 'notDone',
                // });

        </script>





        <script>
            $('.carousel').carousel()
        </script>
        <script>
$( "#accordion" ).accordion();
</script>
    </body>

</html>

