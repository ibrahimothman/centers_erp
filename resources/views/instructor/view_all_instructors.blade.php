<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/instructor_style.css">
    <title> view instructors </title>
</head>
<body class="bg-light" id="page-top">
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')

<!-- container -->
<div class="container  ">
    <nav class="navbar navbar-expand-lg navbar-light ">

        <form class="form-inline my-2 my-lg-0" action="/instructors" method="get">
            <input hidden name="search_by" value="nameAr">
            <input name="value" id="search" type="search" placeholder="بحث">
            <button class="btn btn-primary  mx-2 px-4 my-5 my-sm-0" id="search_for_instructor" type="submit">بحث</button>

        </form>

        <ul class="navbar-nav text-right">

            <li class="nav-item ml-4">
                <h5 hidden style="color: #007bff">تصنيف علي حسب</h5>

            </li>

            <li class=" nav-item  dropdown ml-4 ">
                <button hidden data-toggle="dropdown" class="dropdown-toggle btn-primary py-1">
                    الاقسام <b class="caret"></b>
                </button>
                <ul class=" dropdown-menu text-right">
                    <li><label class="checkbox"><input type="checkbox">القسم الاول</label></li>
                    <li><label class="checkbox"><input type="checkbox"> القسم الثاني</label></li>


                </ul>
            </li>
            <br>
            <li class=" nav-item  dropdown ml-4 ">
                <button hidden data-toggle="dropdown" class="dropdown-toggle btn-primary py-1">
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

    <div class="row ">
        <div class="col">
            <h2 class="text-primary ">المدربين</h2>
            <br>
        </div>
    </div>
    <!-- card -->

        @for($i=0;$i<count($instructors);$i+=3)
        <div class="row ">
            @for($j=$i;$j<$i+3;$j++)
                @if($j==count($instructors))
                    @break
                    @endif
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card motionCard">
                                <div class="card-body text-center">
                                    <p><img class="img-fluid rounded-circle" id="image-{{$j}}" src="{{$instructors[$j]->image}}" width="100"
                                            height="100" alt=""></p>
                                    <h4 class="card-title">{{$instructors[$j]->nameAr}}</h4>
                                    <p class="card-text">{{$instructors[$j]->bio}}</p>
                                    <a href="/instructors/{{$instructors[$j]->id}}" class="btn btn-primary btn-sm">قراءه المزيد</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <br>
            </div>
                @endfor
        </div>
        @endfor
{!! $instructors->render() !!}
</div>

        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
</body>
</html>

<script>


    // $('')
    // var lines = '';
    // for(i=0; i< instructors.length; i+=3){
    //     lines += "<div class='row instructor'>";
    //     for(j = i; j < i + 3; j++){
    //         if(j == count(instructors)) {
    //             break;
    //         }
    //         lines += "<div class='col-xs-12 col-sm-6 col-md-'>";
    //         lines += "<div class='image-flip'>";
    //         lines += "<div class='mainflip'>";
    //         lines += "<div class='frontside'>";
    //         lines += "<div class='card motionCard'>";
    //         lines += "<div class='card-body text-center'>";
    //         lines += "<p><img class='img-fluid rounded-circle  ' src='' width='100'height='100' alt='card image'></p>";
    //         linese += "<h4 class='card-title'></h4>";
    //         linese += "<p class='card-text'></p>";
    //         linese += "<a href='' class='btn btn-primary btn-sm'>قراءة المزيد</a>";
    //
    //         lines += "</div>";
    //         lines += "</div>";
    //         lines += "</div>";
    //
    //
    //         lines += "</div>";
    //         lines += "</div>";
    //         lines += "<br>";
    //         lines += "</div>";
    //     }
    //     lines += "/div>";
    // }
</script>
