<!DOCTYPE html>
<html>

<head>
    <title>Ost Magazine</title>
    <link rel="stylesheet" href="/css/layout.css" type="text/css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cycle.min.js"></script>
    <script type="text/javascript">
        $(function() {
    $('#featured_slide').after('<div id="fsn"><ul id="fs_pagination">').cycle({
        timeout: 5000,
        fx: 'fade',
        pager: '#fs_pagination',
        pause: 1,
        pauseOnPagerHover: 0
    });
});
    </script>
</head>

<body id="top">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>

</html>
