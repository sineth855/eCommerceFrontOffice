<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>BK</title>
        @include('frontend.include.style')
    </head>

    <body>
        <div id="app">
            <!-- <router-view class="view"></router-view> -->
        </div>
    </body>
    <script type="text/javascript" src="{{url('js/app.js')}}"></script>
    @include('frontend.include.script')
    
</html>
