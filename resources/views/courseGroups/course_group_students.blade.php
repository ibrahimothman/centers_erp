<!doctype html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Enrolling students in courses</title>

            <!-- Custom fonts for this template-->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link href="/../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            
            <!-- Custom styles for this template-->
            <link href="/../../../css/sb-admin-rtl.css" rel="stylesheet">
            <link href="/../../../css/enrolled-students-in-course.css" rel="stylesheet">
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
                                        <h3>تسجيل الطلاب بالدورة </h3>
                                        </div>
                                    </header>
                                    <div class="card-body">
                                        <form action="">
                                            <div class="form-row">
                                                <div class="col-sm-5 form-group">
                                                        <label for="course-id">الدورة</label>
                                                        <select class="form-control" id="course-id" required>
                                                            <option value="1">هياكل بيانات</option>
                                                            <option value="2">تصميم شبكات</option>
                                                            <option value="3">تحليل بيانات</option>
                                                        </select>
                                                            <span id="test_course-id_error"></span>
                                                            <div></div>
                                                    </div>
                                                    <div class="col-sm-5 form-group">
                                                        <label for="student-id"> الطالب</label>
                                                        <select class="form-control" id="student-id" required>
                                                        <option value="1">سامح محفوظ</option>
                                                            <option value="2">علي علاء</option>
                                                            <option value="3">سامي مصباح</option>
                                                        </select>
                                                            <span id="test_student-id_error"></span>
                                                            <div></div>
                                                    </div>
                                                    <div class="col-sm-2 form-group align-end">
                                                    <a href="/courses/create"><button type="button" class="btn btn-success">أضف</button></a>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="card mb-4 shadowed">
                                    <header>
                                        <div class="card-header text-primary form-title view-courses-title">
                                        <h3>الطلاب المسجلين بالدورة </h3>
                                        </div>
                                    </header>
                                <div class="card-body">
                                <section class="courses-wrap">
                                            <div class='user-card' 
                                            style=" background: linear-gradient(180deg, transparent 65%, rgba(0,0,0,0.7) 92%),
                                                    url('https://indeedmodels.com/sites/default/files/styles/model/public/models/christian-bauer/christian-bauer.jpg?itok=SxCWmB0N');
                                                    background-size:cover; background-repeat:no-repeat"
                                            >
                                                <p>أحمد سعد</p>
                                                <a href="" data-toggle="modal" data-target="#exampleModalCenter">إزالة</a>
                                            </div>
                                            <div class='user-card' 
                                            style=" background: linear-gradient(180deg, transparent 65%, rgba(0,0,0,0.7) 92%),
                                                    url('http://english.ahram.org.eg/Media/News/2011/12/23/2011-634602592528289538-828.jpg');
                                                    background-size:cover; background-repeat:no-repeat"
                                            >
                                                <p>نهى عبد الرحمن</p>
                                                <a href="">إزالة</a>
                                            </div>
                                            <div class='user-card' 
                                            style=" background: linear-gradient(180deg, transparent 65%, rgba(0,0,0,0.7) 92%),
                                                    url('https://jodirubin.files.wordpress.com/2013/06/headshot-scarf.jpg');
                                                    background-size:cover; background-repeat:no-repeat"
                                            >
                                                <p>عبدالمالك سمير</p>
                                                <a href="">إزالة</a>
                                            </div>
                                            <div class='user-card' 
                                            style=" background: linear-gradient(180deg, transparent 65%, rgba(0,0,0,0.7) 92%),
                                                    url('https://i.pinimg.com/originals/1a/2b/60/1a2b603573771c3fe4bed74198cc5c88.jpg');
                                                    background-size:cover; background-repeat:no-repeat"
                                            >
                                                <p>حسني المحمدي</p>
                                                <a href="">إزالة</a>
                                            </div>
                                        </section>
                                </div>
                            </div>    
                        </div> 
                        <!-- /.container-fluid -->
                        </div>
                    </div>
                    @include('footer')
                </div>
            </div>
        


            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">ازالة طالب من الدورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل انت متأكد من أنك تريد ازالة الطالب؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">ازالة</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                </div>
                </div>
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
    </body>

</html>

