<!DOCTYPE html>
<html lang="ar">
<head>
    @include('library')
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <title> instructor data</title>
    <style>
        body {
            direction: rtl;
            font-family: 'GESSTwoLight-Light' !important;
        }

        .container {
            background-color: #fff;
        }

        .instructorHeader, .headerInstructor {
            color: #007bff;

        }

        span.type {
            font-size: 20px;
            color: #005cbf;
        }

        .header {

            background-color: rgba(0, 0, 0, .09);
            padding-top: 5px;
        }

    </style>
</head>
<body class="bg-light">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
<!-- Begin Page Content -->
<section>

    <div class="container text-right  ">
        <div class="row header">
            <div class="col">
                <h2 class="instructorHeader"><span class="headerInstructor"> <i class="fa fa-user" aria-dden="true"></i></span> البيانات الشخصيه</h2>
            </div>
        </div>
        <div class="row mr-3">
            <div class="col">
                <span class="type">الاسم: </span> احمد محمووووووود
            </div>
        </div>
        <div class="row mr-3">
            <div class="col">
                <span class="type">البريد الالكتروني: </span> email@email.com
            </div>
        </div>
        <div class="row mr-3">
            <div class="col">
                <span class="type"> رقم التليفون: </span> 01098826337
            </div>
        </div>

        <div class="row mr-3">
            <div class="col">
                <span class="type"> الرقم القومي: </span>2958378439002020
            </div>
        </div>
        <div class="row mr-3">
            <div class="col">
                <span class="type">العنوان: </span> المنصوره شارع الجلاء
            </div>
        </div>
        <br>
        <div class="row  header">
            <div class="col">
                <h2 class="instructorHeader"><span class="headerInstructor"> <i class="fa fa-graduation-cap"></i></span> المؤهلات الدراسيه</h2>
            </div>
        </div>

        <div class="row mr-3">
            <div class="col">
                <span class="type">المؤهل الدراسي: </span> بكالريوس
            </div>
        </div>

        <div class="row mr-3">
            <div class="col">
                <span class="type">  الكليه: </span> كليه هندسه
            </div>
        </div>

        <br>


        <div class="row header">
            <div class="col">
                <h2 class="instructorHeader"><span class="headerInstructor"> <i class="fa fa-file"></i></span> نبذه عن</h2>
            </div>
        </div>


        <div class="row mr-3">
            <div class="col">
                <p>
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                    الخارجي
                    للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي
                    توزيعاَ
                    طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو
                    أي
                    الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم
                    بشكل
                    إفتراضي كنموذج عن النص، وإذا قمت بإدخال في أي محرك بحث ستظهر العديد من المواقع الحديثة
                    العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق
                    الصدفة،
                    وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.
                </p>
            </div>
        </div>
    </div>

</section>
<!-- script-->
        @include('footer')
    </div>
</div>
<!-- script-->

@include('script')

</body>
</html>
