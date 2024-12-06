<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Title for SEO -->
  <title>جوهرة الشرق - كنافة وحلويات شرقية | أفضل الحلويات العربية</title>
  
  <!-- Meta Description -->
  <meta name="description" content="جوهرة الشرق تقدم أجود أنواع الكنافة والحلويات الشرقية التي تُعد بعناية وحب. استمتع بألذ الحلويات المصنوعة من المكونات الطبيعية والطازجة.">
  
  <!-- Meta Keywords -->
  <meta name="keywords" content="جوهرة الشرق, كنافة, حلويات شرقية, حلويات عربية, كنافة نابلسية, حلويات لذيذة, جوهرة الحلويات, محلات حلويات">
  
  <!-- Meta Author -->
  <meta name="author" content="جوهرة الشرق">

  <!-- Open Graph for Social Sharing -->
  <meta property="og:title" content="جوهرة الشرق - كنافة وحلويات شرقية" />
  <meta property="og:description" content="أفضل الحلويات الشرقية من جوهرة الشرق. تجربة لا تُنسى مع أجود أنواع الكنافة والحلويات العربية." />
  <meta property="og:image" content="{{ asset('assets/img/logos/sweets-bg.png') }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="جوهرة الشرق - كنافة وحلويات شرقية">
  <meta name="twitter:description" content="جوهرة الشرق تقدم لكم ألذ الحلويات والكنافة المصنوعة بأعلى جودة.">
  <meta name="twitter:image" content="{{ asset('assets/img/logos/sweets-bg.png') }}">

  <!-- Favicon and Icons -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logos/sweets-bg.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/sweets-bg.png') }}">

  <!-- Fonts and Icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show rtl bg-gray-100">
    @unless (Request::is('/'))
    @include('layouts.sidebar')
    @endunless
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
        <!-- Navbar -->
        @include('layouts.header')
        <!-- End Navbar -->
        @yield('content')
    </main>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <script src="{{ asset('assets/turn.js') }}"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.2.0') }}"></script>
</body>

</html>
