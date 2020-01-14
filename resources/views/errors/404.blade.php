<!DOCTYPE html>
<html lang="en">
<head>
    <title>Not Found</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link href="/../../../css/404.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //css files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Ropa+Sans:400,400i&amp;subset=latin-ext" rel="stylesheet" />
    <!--//online-fonts -->
</head>

@inject('Constants',"App\helper\Constants")
<body background="/../../../img/confused.gif">
<div class="header">
    <h1>there is nothing here</h1>
</div>
<div class="w3-main">
    <div class="agile-info">
        <h3>SORRY</h3>
        <h2>4<img src="/../../../img/confused.gif" alt="image" />4</h2>
        <p>{{isset($message)?$message:$Constants->getDefaultErrorMessage()}}</p>
        <a href="/">go back</a>
    </div>
</div>

<div class="footer-w3l">

</div>
</body>
</html>
