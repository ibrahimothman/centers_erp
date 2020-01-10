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
            <link href="/../../../css/courses-styles.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/58b9d7bcbd.js" crossorigin="anonymous"></script>
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
                                        <h3>الدورات المتاحة </h3>
                                        <a href="/courses/create"><button type="button" class="btn btn-success">أضف دورة</button></a>
                                        </div>
                                    </header>
                                    <div class="card-body">
                                        <section class="courses-wrap">
                                            @php($j = 0)
                                            @foreach($courses as $course)
                                        <article class="course">
                                                <div id="jj{{$j}}" class="carousel slide" data-ride="carousel" data-interval="false">
                                                    <div class="carousel-inner">
                                                        @php($i = 0)
                                                        @foreach($course->images as $image)
                                                            <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                                                                <img class="d-block w-100" src="{{ $image->url }}" alt="First slide">
                                                            </div>
                                                            @php($i++)
                                                        @endforeach

                                                    </div>

                                                    <a class="carousel-control-prev" href="#jj{{ $j }}" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#jj{{ $j }}" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="{{ route('courses.show',[$course->id]) }}">{{$course->name}}</a>
                                                    <div class="time-and-money">
                                                    <p>{{$course->cost}} <i class="fas fa-coins" style="color:gold"></i> {{$course->duration}} <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">{{$course->description}}</p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <td class="btn btn-primary btn-sm"> <a href="{{ route('courses.edit',[$course->id]) }}">تعديل</a></td>
{{--                                                       <button  type="button" class="btn btn-primary btn-sm"> <a href="courses/{{ $course->id }}/edit"></a> تعديل</button>--}}
                                                       <form action="{{ route('courses.destroy',[$course->id]) }}" method="post">
                                                           @csrf
                                                           @method('delete')
                                                           <input type="hidden" name="_method" value="delete" />
                                                       <button  type="submit" class="btn btn-danger btn-sm">حذف</button>                                                       </form>

                                                   </div>
                                            </article>
                                                @php($j++)
                                                @endforeach

                                        </section>
                                    </div>
                                </div>
                            </div>
                        <!-- /.container-fluid -->
                        </div>
                    </div>
                    <nav aria-label="Page navigation ">
                        <ul class="pagination justify-content-center">
{{--                            {{$courses->render()}}--}}
                        </ul>
                    </nav>

                    @include('footer')
                </div>
            </div>


        <!-- Bootstrap core JavaScript-->
        <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{url('js/sb-admin-2.min.js')}}"></script>
        <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
        <script>


        </script>
    </body>

</html>

