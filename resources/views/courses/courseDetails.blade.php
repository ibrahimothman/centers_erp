<!doctype html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            @include('library')
            <link href="/../../../css/course-details.css" rel="stylesheet">
            <link href="/../../../css/jquery-ui.min.css" rel="stylesheet">
            <title>Available Course</title>
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
                                                            <img class="d-block w-100" src="{{\App\helper\Constants::getCoursePlaceholderImage()}}" alt="First slide">
                                                        </div>
                                                    @else
                                                        @foreach($course->images as $image)
                                                            <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                                                                <img class="d-block w-100" src="{{ $image->url }}" alt="First slide">
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
                                                        <img src="{{$instructor->image==null?\App\helper\Constants::getInstructorPlaceholderImage():$instructor->image}}" alt="">
                                                        <a href="{{ route('instructors.show',$instructor->id) }}">{{ $instructor->nameAr }}</a>
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

            <!-- script-->
            @include('script')
        <script src="{{url('js/jquery-ui.min.js')}}"></script>
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

