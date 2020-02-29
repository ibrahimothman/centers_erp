<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style -->
    <link href="/css/diploma_style.css" rel="stylesheet"/>
    <title>Available diploma</title>
</head>
<body id="page-top">
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
                                <h3>الدبلومات المتاحة </h3>
                                <a href="{{ route('diplomas.create') }}">
                                    <button type="button" class="btn btn-success">أضف دبلومه</button>
                                </a>
                            </div>
                        </header>
                        <div class="card-body">
                            <div class=" clearfix"> <span class="float-right">
                        <div class="btn-group print-btn p-3 ">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> الترتيب حسب </button>
                            <div class="dropdown-menu"> <a class="dropdown-item" href="#">السعر</a>
                                <a class="dropdown-item" href="#">المده</a> </div>
                        </div>
                        <div class="btn-group p-3 ">
                            <input type="text" class="form-control " name="x" placeholder="ابحث">
                            <div class="btn-group">
                                <button class="btn btn-success"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </span></div>
                            <!-- diploma view -->
                            @foreach($diplomas as $diploma)
                                <a href="#">
                                    <div class="card  cardDiploma mb-3" style="max-width: 100%; ">
                                        </span>
                                        <div class="row ">
                                            <div class="col-md-4">
                                                <a href="{{ route('diplomas.show', $diploma->id) }}"> <img src="{{$diploma->image }}" class="card-img h-100" alt="..."></a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <div class="view-courses-title">
                                                        <h5 class="card-title text-primary">{{ $diploma->name }}</h5>
                                                        <form>
                                                            <a href="{{ route('diplomas.edit', $diploma->id) }}" class=" btn btn-outline-primary  py-1 px-2"><i
                                                                        class="fas fa-edit m-0 "></i> </a>
                                                            <button type="submit" class="btn btn-outline-danger py-1 px-2">
                                                                <i class="fas fa-trash-alt m-0"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="mb-1">
                                                        <span class=" text-secondary pl-2  ">{{ $diploma->cost }} جنيه</span>
                                                        <span class=" text-secondary pl-2 ">20 {{ $diploma->number_of_lectures }}</span>
                                                        <span class=" text-secondary  pl-2">30 {{ $diploma->duration }}</span>
                                                    </div>
                                                    <p class="card-text">{{ $diploma->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            @endforeach
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
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
</body>

</html>

