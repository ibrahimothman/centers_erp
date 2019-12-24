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
                                        <article class="course">
                                                <div id="jj" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#jj" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#jj" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
                                            <article class="course">
                                                <div id="uu" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#uu" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#uu" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
                                            <article class="course">
                                                <div id="uh" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#uh" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#uh" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
                                            <article class="course">
                                                <div id="io" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#io" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#io" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
                                            <article class="course">
                                                <div id="gy" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#gy" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#gy" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
                                            <article class="course">
                                                <div id="ty" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#ty" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#ty" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
                                            <article class="course">
                                                <div id="rr" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#rr" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#rr" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
                                            <article class="course">
                                                <div id="rt" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#rt" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#rt" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
                                            <article class="course">
                                                <div id="courseImageIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#courseImageIndicators" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#courseImageIndicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
                                            <article class="course">
                                                <div id="courseImageIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                                    <a class="carousel-control-prev" href="#courseImageIndicators" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#courseImageIndicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="main-info">
                                                    <a href="">اسم الدورة</a>
                                                    <div class="time-and-money">
                                                    <p>400 <i class="fas fa-coins" style="color:gold"></i> 23:00 <i class="far fa-clock" style="color:grey"></i></p>
                                                    </div>
                                                </div>
                                                <div class="about-container">
                                                    <p class="about">                                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو
                                                    شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                                    إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام
                                                    "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل 
                                                    إفتراضي كنموذج عن النص،
                                                    وإذا قمت
                                                    بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة
                                                    من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً
                                                    عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                                    </p>
                                                   </div>
                                                   <div class="view-course-action-buttons">
                                                       <button type="button" class="btn btn-primary btn-sm">تعديل</button>
                                                       <button type="button" class="btn btn-danger btn-sm">إلغاء</button>
                                                   </div> 
                                            </article>
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
        

        <!-- Bootstrap core JavaScript-->
        <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{url('js/sb-admin-2.min.js')}}"></script>
        <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
        <script>
            // $('.carousel').carousel()
        </script>
    </body>

</html>
