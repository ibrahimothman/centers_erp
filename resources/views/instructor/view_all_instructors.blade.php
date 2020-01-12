<!DOCTYPE html>
<html lang="ar">
<head>

    <!-- Bootstrap CSS & js -->
    @include('library')
    <title> view instructors </title>
    <style>
        body {
            direction: rtl;
            font-family: 'GESSTwoLight-Light' !important;
        }

        .container {
            background-color: #fff;
        }

        input {
            outline: none;
        }

        input[type=search] {
            -webkit-appearance: textfield;
            -webkit-box-sizing: content-box;
            font-family: inherit;
            font-size: 100%;
        }

        input::-webkit-search-decoration,
        input::-webkit-search-cancel-button {
            display: none;
        }


        input[type=search] {
            background: #fff;
            border: solid 1px #007bff;
            padding: 10px 40px 10px 60px;
            width: 55px;

            -webkit-border-radius: 10em;
            -moz-border-radius: 10em;
            border-radius: 10em;

            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            transition: all .5s;
        }

        input[type=search]:focus {
            width: 130px;
            background-color: #fff;
            border-color: #007bff;
            -webkit-box-shadow: 0 0 5px rgba(109, 207, 246, .5);
            -moz-box-shadow: 0 0 5px rgba(109, 207, 246, .5);
            box-shadow: 0 0 5px rgba(109, 207, 246, .5);
        }

        input:-moz-placeholder {
            color: #999;
        }

        input::-webkit-input-placeholder {
            color: #999;
        }

        /* card */

        .card {

            position: relative;

            border-radius: 10px;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.14), 0 2px 1px -1px rgba(0, 0, 0, 0.12), 0 1px 3px 0 rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.1s linear, transform 0.15s ease-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 17px 2px rgba(0, 0, 0, 0.14), 0 5px 22px 4px rgba(0, 0, 0, 0.12), 0 7px 8px -4px rgba(0, 0, 0, 0.2);
        }
        /* dropdown */

        .dropdown-menu li label {
            display: block;
            padding: 3px 10px;
            clear: both;
            font-weight: normal;
            line-height: 1.42857143;
            color: #333;
            white-space: nowrap;
            margin: 0;
            transition: background-color .4s ease;
        }

        .dropdown-menu li input {
            margin: 0px 5px;
            top: 2px;
            position: relative;
        }

        .dropdown-menu li.active label {
            background-color: #cbcbff;
            font-weight: bold;
        }

        .dropdown-menu li label:hover,
        .dropdown-menu li label:focus {
            background-color: #f5f5f5;
        }

        .dropdown-menu li.active label:hover,
        .dropdown-menu li.active label:focus {
            background-color: #b8b8ff;
        }


    </style>
</head>
<body class="bg-light">
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')

<!-- container -->
<div class="container  ">
    <nav class="navbar navbar-expand-lg navbar-light ">

        <form class="form-inline my-2 my-lg-0   ">

            <input type="search" placeholder="بحث">
            <button class="btn btn-primary  mx-2 px-4 my-5 my-sm-0" type="submit">بحث</button>

        </form>

        <ul class="navbar-nav text-right">

            <li class="nav-item ml-4">
                <h5 style="color: #007bff">تصنيف علي حسب</h5>

            </li>

            <li class=" nav-item  dropdown ml-4 ">
                <button data-toggle="dropdown" class="dropdown-toggle btn-primary py-1">
                    الاقسام <b class="caret"></b>
                </button>
                <ul class=" dropdown-menu text-right">
                    <li><label class="checkbox"><input type="checkbox">القسم الاول</label></li>
                    <li><label class="checkbox"><input type="checkbox"> القسم الثاني</label></li>


                </ul>
            </li>
            <br>
            <li class=" nav-item  dropdown ml-4 ">
                <button data-toggle="dropdown" class="dropdown-toggle btn-primary py-1">
                    المواعيد <b class="caret"></b>
                </button>
                <ul class=" dropdown-menu text-right">
                    <li><label class="checkbox"><input type="checkbox">من1:2</label></li>
                    <li><label class="checkbox"><input type="checkbox"> من3:4</label></li>


                </ul>
            </li>
            <br>

        </ul>

    </nav>


</div>

<!-- end container -->
<div class="container text-right px-5 py-5">

    <div class="row">
        <div class="col">
            <h2 class="text-primary ">المدربين</h2>
            <br>
        </div>
    </div>
    <!-- card -->
    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="image-flip">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class="img-fluid rounded-circle  " src="\img\portfoliopic_0.jpg" width="100"
                                        height="100" alt="card image"></p>
                                <h4 class="card-title">اسم المدرب</h4>
                                <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                                    القارئ </p>
                                <a href="#" class="btn btn-primary btn-sm">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>  
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="image-flip">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class="img-fluid rounded-circle  " src="\img\portfoliopic_0.jpg" width="100"
                                        height="100" alt="card image"></p>
                                <h4 class="card-title">اسم المدرب</h4>
                                <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                                    القارئ</p>
                                <a href="#" class="btn btn-primary btn-sm">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="image-flip">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class="img-fluid rounded-circle  " src="\img\portfoliopic_0.jpg" width="100"
                                        height="100" alt="card image"></p>
                                <h4 class="card-title">اسم المدرب</h4>
                                <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                                    القارئ</p>
                                <a href="#" class="btn btn-primary btn-sm">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <br>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="image-flip">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class="img-fluid rounded-circle  " src="\img\portfoliopic_0.jpg" width="100"
                                        height="100" alt="card image"></p>
                                <h4 class="card-title">اسم المدرب</h4>
                                <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                                    القارئ </p>
                                <a href="#" class="btn btn-primary btn-sm">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <br>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="image-flip">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class="img-fluid rounded-circle  " src="\img\portfoliopic_0.jpg" width="100"
                                        height="100" alt="card image"></p>
                                <h4 class="card-title">اسم المدرب</h4>
                                <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                                    القارئ</p>
                                <a href="#" class="btn btn-primary btn-sm">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <br>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="image-flip">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class="img-fluid rounded-circle  " src="\img\portfoliopic_0.jpg" width="100"
                                        height="100" alt="card image"></p>
                                <h4 class="card-title">اسم المدرب</h4>
                                <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي
                                    القارئ</p>
                                <a href="#" class="btn btn-primary btn-sm">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <br>
        </div>
    </div>
</div>
        @include('footer')
    </div>
</div>
<!-- script-->

@include('script')
</body>
</html>