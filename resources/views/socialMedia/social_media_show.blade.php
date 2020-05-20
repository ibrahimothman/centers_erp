<!DOCTYPE html>
<html lang="en">
<head>
@include('library')
<!-- style -->
    <link href="/css/socialMediaShow.css" rel="stylesheet"/>
    <title>social media</title>
</head>

<body id="page-top">
<!-- Page Wrapper -->
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Begin Page Content -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-primary ">
                                <h3> الروابط</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row form-group">
                                    <div class="col-lg-6 col-sm-12 ">
                                        <a href="#">
                                            <div class="youtube social smGlobalBtn">
                                                <i class="fab fa-youtube my-float"></i>
                                            </div>
                                            <span class="icon youtubeIcon iconRight">user name</span>
                                        </a></div>
                                    <div class="col-lg-6 col-sm-12 ">
                                        <a href="#">
                                            <span class="icon instaIcon iconLeft">user name</span>
                                            <div class="insta social smGlobalBtn">
                                                <i class="fab fa-instagram my-float"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-lg-6 col-sm-12 ">
                                        <a href="#">
                                            <div class="google social smGlobalBtn">
                                                <i class="fab fa-google"></i>
                                            </div>
                                            <span class="icon googleIcon iconRight">user name</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 ">
                                        <a href="#">
                                            <span class="icon twitterIcon iconLeft">user name</span>
                                            <div class="twitter twitterBtn social smGlobalBtn "></div>

                                        </a></div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-lg-6 col-sm-12 ">
                                        <a href="#">
                                            <div class="pinterestBtn social pin smGlobalBtn" href="#"></div>
                                            <span class="icon pinIcon iconRight">user name</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 ">
                                        <a href="#">
                                            <span class="icon faceIcon iconLeft">user name</span>
                                            <div class="face social facebookBtn smGlobalBtn "></div>
                                        </a>
                                    </div>

                                </div>
                                <div class="form-row form-group">
                                    <div class="col-lg-6 col-sm-12 ">
                                        <a href="#">
                                            <div class="linkedinBtn linked social smGlobalBtn"></div>
                                            <span class="icon linkIcon iconRight">user name</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 "><a href="#">
                                            <span class="icon whatsIcon iconLeft">user name</span>
                                            <div class="whats social smGlobalBtn">
                                                <i class="fab fa-whatsapp my-float"></i>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- End of Main Content -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
</body>
</html>
