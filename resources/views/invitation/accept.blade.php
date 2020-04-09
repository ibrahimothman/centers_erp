 <!doctype html>
<html lang="ar">
<head>
    <!-- library  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- font awesome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- social media style -->
    <link rel="stylesheet" href="/css/socialMediaIcon.css">
    <!-- style -->
    <link href="/css/invitation_style.css" rel="stylesheet"/>
    <title>accept invitation</title>
</head>
<body class="acceptBody">
<div class="container">
                <table cellspacing="0" cellpadding="0" class="first">
                    <tbody>
                    <tr>
                        <td>
                            <div class="head">
                                <img src="{{url('img/user.png')}}" class="profileImg">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h1  class="header">
                                You have an invite to join!
                            </h1>
                            <p class="name">
                                Hi yasmin,
                            </p>
                            <p class="details">
                                We’re now using dashboard. You're being invited to join the test company account where you'll be able to report.
                            </p>
                            <p class="btn">
                                <a href="" style="text-decoration:none;color:#fff;background-color:#007bff;border:1px solid #00c1d5;border-radius:5px;display:inline-block;font-family:Roboto,Helvetica,sans-serif;font-size:14px;font-weight:400;line-height:24px;text-align:center;text-transform:uppercase;width:40%;min-width: 130px;min-height:24px;padding:10px 10px;margin:0;outline:0" target="_blank">
                                    Click to accept
                                </a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <!-- footer -->
                        <td width="100%" class="footer">
                            <div id="social">
                                <a class="facebookBtn smGlobalBtn ml-2" href="#" ></a>
                                <a class="twitterBtn smGlobalBtn mx-2"  href="#" ></a>
                                <a class="linkedinBtn smGlobalBtn mx-2" href="#" ></a>
                            </div>

                            @include("footer")
                        </td>
                    </tr>
                    </tbody>
                </table>
</div>
<!-- end container -->
</body>
</html>