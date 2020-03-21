<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style-->
    <link rel="stylesheet" href="/css/setting_style.css"/>
    <title>setting</title>
</head>
<body>
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-logos-title">
                                <h3>تعديل البيانات</h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <!-- side bar -->
                            <div class="row">
                                <aside class="col-sm-3 ">
                                    <article class="card-group-item">
                                        <h6 class="title text-secondary">الاعدادات <i class="fas fa-cogs"></i></h6>
                                        <div class="filter-content">
                                            <div class="list-group list-group-flush">
                                                <a href="#" id="center" class="list-group-item">
                                                    <i class="fas fa-edit"></i>
                                                    تعديل البيانات المركز
                                                    <i class="fas fa-angle-double-left  "></i> </a>

                                                <a href="#" id="pass" class="list-group-item">
                                                    <i class="fas fa-key"></i>
                                                    تغير الباسورد
                                                    <i class="fas fa-angle-double-left "></i></a>

                                                <a href="#" id="lang" class="list-group-item">
                                                    <i class="fas fa-globe"></i>
                                                    اللغه
                                                    <i class="fas fa-angle-double-left "></i></a>
                                                <a href="#" class="list-group-item" data-toggle="modal"
                                                   data-target="#logout">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    الخروج
                                                    <i class="fas fa-angle-double-left "></i></a>
                                            </div>  <!-- list-group .// -->
                                        </div>
                                    </article> <!-- card-group-item.// -->
                                </aside>

                                <!-- en side bar -->
                                <!-- ///////////content //////////////// -->
                                <!-- end -->
                                <div class="col-sm-8">
                                    <!-- center info -->
                                    <section class="centerInfoSection">
                                        <div class="card mb-4">
                                            <header>
                                                <div class="card-header text-primary form-title">
                                                     بيانات المركز
                                                </div>
                                            </header>

                                            <div class="card-body">
                                                @if(Session('center_id'))
                                                    <form id="centerInfo" action="{{ route('centers.update', $center) }}" method="post" enctype="multipart/form-data">
                                                        @method('put')
                                                @else
                                                     <form id="centerInfo" action="{{ route('centers.store') }}" method="post" enctype="multipart/form-data">

                                                  @endif
                                                    @csrf
                                                    <div class="form-row image-upload">
                                                        <div class="col-sm-8">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                       accept="image/*" name="image"
                                                                       id="customFile1" src=""
                                                                       onchange="readURL(this, 1);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center  ">
                                                        <div class="logo-image-input">
                                                            <img id="imageUploaded1"
                                                                 src="{{ $center ? $center->image :  'http://simpleicon.com/wp-content/uploads/camera-2.svg'}}"
                                                                 alt="your image"/>
                                                            <p>شعار المركز</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-row form-group">
                                                        <label>اسم المركز</label>
                                                        <span class="required">*</span>
                                                        <input type="text" name="name" value="{{ $center? $center->name : old('name') }}" class='form-control'
                                                               placeholder='ادخل اسم المركز'>
                                                    </div>


                                                    <div class="form-row form-group">
                                                        <label>الموقع</label>
                                                        <span class="required">*</span>
                                                        <input type="text" name="location" value="{{ $center && $center->location? $center->location: old('location')  }}" class='form-control'
                                                               placeholder='ادخل الموقع'>
                                                    </div>
                                                    <div class="form-row form-group">
                                                        <label>نبذه عن المركز</label>
                                                        <span class="required">*</span>
                                                        <textarea name="about_center" placeholder="نبذه عن " rows="3"
                                                                  class="form-control"
                                                                  style="  overflow-scrolling:auto; ">{{ $center && $center->about_center? $center->about_center: old('about_center')  }}</textarea>
                                                    </div>
                                                    <div class="form-row form-group">
                                                        <label>اسم المدير</label>
                                                        <span class="required">*</span>
                                                        <input type="text" name="manager_name" value="{{ $center && $center->manager_name? $center->manager_name: old('manager_name')  }}" class='form-control'
                                                               placeholder='ادخل اسم المدير'>
                                                    </div>
                                                    <div class="form-row form-group">
                                                        <label>نبذه عن المدير</label>
                                                        <span class="required">*</span>
                                                        <textarea name="about_manager" placeholder="نبذه عن " rows="3"
                                                                  class="form-control"
                                                                  style="  overflow-scrolling:auto; ">{{ $center && $center->about_manager? $center->about_manager: old('about_manager')  }}</textarea>
                                                    </div>
                                                    <div class="form-row save">
                                                        <div class="col-sm-6 mx-auto text-center">
                                                            <button class="btn btn-primary" type="submit" id="submit">
                                                                {{ Session('center_id')? 'تعديل' : 'حفظ' }}
                                                            </button>
                                                            <button class="btn  btn-danger" type="reset"> الغاء</button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.container-fluid -->
                                    </section><!-- end center info -->

                                    <!-- password -->
                                    <section class="passwordSection">
                                        <div class="card mb-4">
                                            <div class="card-header text-primary form-title">
                                                تغير كلمه السر
                                            </div>
                                            <div class="card-body">
                                                <form  id="password">
                                                    <div class="row">
                                                        <div class="col-sm text-center ">
                                                            <h5> email@email.com</h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row form-group">
                                                        <div class="col-4 ">كلمه السر القديمه
                                                            <span class="required">*</span></div>

                                                        <div class="col-8 ">
                                                            <input type="text" name="password" class='form-control'
                                                                   placeholder='ادخل كلمه السر القديمه'>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row form-group">
                                                        <div class="col-4 ">كلمه السر الجديده
                                                            <span class="required">*</span></div>

                                                        <div class="col-8 ">
                                                            <input id="newPassword" type="text" name="newPassword"
                                                                   class='form-control'
                                                                   placeholder='ادخل كلمه السر الجديده'>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row form-group">
                                                        <div class="col-4 ">تاكيد كلمه السر
                                                            <span class="required">*</span></div>

                                                        <div class="col-8 ">
                                                            <input type="text" name="confirm" class='form-control'
                                                                   placeholder="تاكيد كلمه السر">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row save">
                                                        <div class="col-sm-6 mx-auto text-center">
                                                            <button class="btn btn-primary" type="submit" id="submit">
                                                                حفظ
                                                            </button>
                                                            <button class="btn  btn-danger" type="reset"> الغاء</button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.container-fluid -->
                                    </section><!-- end password -->
                                    <!-- language -->
                                    <section class="languageSection">
                                        <div class="card mb-4">
                                            <header>
                                                <div class="card-header text-primary form-title">
                                                    اللغه
                                                </div>
                                            </header>

                                            <div class="card-body">
                                                <form>
                                                    <div class="form-row form-group">
                                                        <h5 class="text-secondary">اختيار اللغه</h5>
                                                    </div>
                                                    <div class="form-row form-group">
                                                        <label>
                                                            <input type="radio" class="option-input radio"
                                                                   name="example" checked/>
                                                            اللغه العربيه
                                                        </label>
                                                    </div>
                                                    <div class="form-row form-group">
                                                        <label>
                                                            <input type="radio" class="option-input radio"
                                                                   name="example"/>
                                                            اللغه الانجليزيه
                                                        </label>
                                                    </div>

                                                    <div class="form-row save">
                                                        <div class="col-sm-6 mx-auto text-center">
                                                            <button class="btn btn-primary" type="submit" id="submit">
                                                                حفظ
                                                            </button>
                                                            <button class="btn  btn-danger" type="reset"> الغاء</button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.container-fluid -->
                                    </section><!-- end language -->
                                    <!-- log out -->
                                    <!-- modal form -->
                                    <div class="modal fade" id="logout" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <!--Content-->
                                            <div class="modal-content card ">
                                                <div class=" rgba-stylish-strong">
                                                    <!--Header-->
                                                    <div class="modal-header text-center ">
                                                        <h3 class="modal-title w-100 text-primary font-weight-bold"
                                                            id="myModalLabel">الخروج
                                                        </h3>
                                                        <button type="button" class="close white-text"
                                                                data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!--Body-->
                                                    <div class="modal-body">
                                                        <!--Body-->
                                                        <form>
                                                            <div class="form-row">
                                                                <p>هل تريد الخروج بالفعل؟</p>
                                                            </div>
                                                            <div class="form-row save">
                                                                <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                                    <button class="btn btn-primary action-buttons"
                                                                            type="submit" id="submit">الخروج
                                                                    </button>
                                                                    <button class="btn  btn-danger action-buttons"
                                                                            type="reset"> إلغاء
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/.Content-->
                                        </div>
                                    </div><!-- end modal form -->  <!-- end log out -->
                                </div><!-- end content -->
                            </div><!-- end row -->
                        </div><!--  end card body-->
                    </div><!-- end card -->
                    <br>
                </div>
            </div>
        </div>
        <!-- footer -->
        @include('footer')
    </div>
</div>
<!-- script-->
@include('script')
<!-- script style-->
<script type='text/javascript' src="/js/setting.js"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/setting_validation.js"></script>



</body>
</html>
