<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('css/style.css') }}
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyBxQpLsZRBZ340_0llT_Glen4uhbxh8U70"
                type="text/javascript"></script>
        <script src=""></script>
    </head>
    <body>

    <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">INVO</a>
            </div>
            {{ elements.getMenu() }}
        </div>
    </nav>
        <div class="container">
            {{ flash.output() }}
            {{ content() }}
        </div>
        {{ javascript_include('js/jquery.min.js') }}
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ javascript_include("js/utils.js") }}
    </body>
</html>
