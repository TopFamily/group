<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css') }}
        {{ stylesheet_link('css/main.css') }}

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <meta name="description" content="TopFamily, where you can talk freely"/>
        <meta name="author" content="SkyZH, TopFamily"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="renderer" content="webkit"/>
        <meta name="keywords" content="TopFamily, Telegram, Group" />
        <meta name="robots" content="index,follow"/>
    </head>

    <body>
        {{ javascript_include('//cdn.bootcss.com/json2/20150503/json2.min.js') }}
        {{ javascript_include('//cdn.bootcss.com/jquery/2.1.4/jquery.min.js') }}
        {{ javascript_include('//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js') }}
        {{ javascript_include('//cdn.bootcss.com/jquery.pjax/1.9.6/jquery.pjax.min.js') }}
        {{ javascript_include('//cdn.bootcss.com/twemoji/1.4.1/twemoji.min.js') }}
        {{ javascript_include('js/main.js') }}

        <div id="pjax-container">
            {{ content() }}
        </div>
    </body>


</html>
