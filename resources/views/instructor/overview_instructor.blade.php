<!DOCTYPE html>
<html lang="ar">
<head>
    @include('library')
    <link rel="stylesheet" href="/css/instructor_style.css">

    <title>overview instructor</title>
    <style>

    </style>
</head>
<body class="bg-light">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
<!-- Begin Page Content -->
<section>
    <!-- data -->
    <div class="container  text-right" style="background-color: #fff;">
        <br>
        <div class="row">
            <div class="  col-lg-4">

                <img class="profilePhoto" src="\img\portfoliopic_0.jpg" style="">
            </div>
            <div class="  col-lg-8">
                <br>
                <br>
                <h5>د/ محمود احمد محمد</h5>
                <p>دكتور بكليه الهندسه جامعه المنصوره</p>
                <a href="#">السيره الذاتيه</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h2 class="text-primary">نبذه عن</h2>
                <p>
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                    الخارجي
                    للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي
                    توزيعاَ
                    طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو
                    (أي
                    الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم
                    بشكل
                    إفتراضي كنموذج عن النص، وإذا قمت بإدخال في أي محرك بحث ستظهر العديد من المواقع الحديثة
                    العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق
                    الصدفة،
                    وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.
                </p>

            </div>
        </div>
        <hr>
        <!-- start courses -->
        <div class="row">
            <div class="col">
                <h2 class="text-primary">الكورسات </h2>
            </div>
        </div>
        <!-- start cards  -->
        <!-- first card  -->
        <div class="spldishes-grids">
            <div class="row pb-4">
                <div class="col-lg-4">
                    <div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
                        <div class="item g1">
                            <img src="\img\working-in-a-group-6224.jpg" style="height:400px;width: 100%"
                                 class="lazyOwl">
                            <div class="agile-dish-caption">
                                <h5 style="color: #007bff">اسم الكورس </h5>
                                <p style="height:100px; width: 100%; color: #fff"> هناك حقيقة مثبتة منذ زمن طويل وهي أن
                                    المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي
                                </p>
                                <a href=" # ">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <!-- end card -->
                <div class="col-lg-4">
                    <div class="owl-carousel text-center agileinfo-gallery-row">
                        <div class="item g1">
                            <img src="\img\working-in-a-group-6224.jpg" style="height:400px;width: 100%"
                                 class="lazyOwl">
                            <div class="agile-dish-caption">
                                <h5 style="color: #007bff">اسم الكورس </h5>
                                <p style="height:100px; width: 100%; color: #fff"> هناك حقيقة مثبتة منذ زمن طويل وهي أن
                                    المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي
                                </p>
                                <a href=" # ">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="col-lg-4">
                    <div class="owl-carousel text-center agileinfo-gallery-row"
                         style="padding-bottom: 30px;">
                        <div class="item g1">
                            <img src="\img\working-in-a-group-6224.jpg" style="height:400px;width: 100%;  ">
                            <div class="agile-dish-caption">
                                <h5 style="color: #007bff">اسم الكورس </h5>
                                <p style="height:100px; width: 100%; color: #fff"> هناك حقيقة مثبتة منذ زمن طويل وهي أن
                                    المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي
                                </p>
                                <a href=" # ">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>


            <div class="row pb-4">
                <div class="col-lg-4">
                    <div class="owl-carousel text-center agileinfo-gallery-row">
                        <div class="item g1">
                            <img src="\img\man-in-black-holding-phone-618613.jpg" style="height:400px;width: 100%"
                                 class="lazyOwl">
                            <div class="agile-dish-caption">
                                <h5 style="color: #007bff">اسم الكورس </h5>
                                <p style="height:100px; width: 100%; color: #fff"> هناك حقيقة مثبتة منذ زمن طويل وهي أن
                                    المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي
                                </p>
                                <a href=" # ">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-lg-4">
                    <div class="owl-carousel text-center agileinfo-gallery-row">
                        <div class="item g1">
                            <img src="\img\man-in-black-holding-phone-618613.jpg" style="height:400px;width: 100%"
                                 class="lazyOwl">
                            <div class="agile-dish-caption">
                                <h5 style="color: #007bff">اسم الكورس </h5>
                                <p style="height:100px; width: 100%; color: #fff"> هناك حقيقة مثبتة منذ زمن طويل وهي أن
                                    المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي
                                </p>
                                <a href=" # ">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>


                <div class="col-lg-4">
                    <div class="owl-carousel text-center agileinfo-gallery-row">
                        <div class="item g1">
                            <img src="\img\man-in-black-holding-phone-618613.jpg" style="height:400px;width: 100%;  ">
                            <div class="agile-dish-caption">
                                <h5 style="color: #007bff">اسم الكورس </h5>
                                <p style="height:100px; width: 100%; color: #fff"> هناك حقيقة مثبتة منذ زمن طويل وهي أن
                                    المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي
                                </p>
                                <a href=" # ">قراءه المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <!-- end cards  -->
    </div>

    <!-- end container  -->
</section>
        @include('footer')
    </div>
</div>
<!-- script-->

@include('script')
</body>

</html>