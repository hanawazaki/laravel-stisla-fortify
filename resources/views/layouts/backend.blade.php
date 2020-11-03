<!DOCTYPE html>
<html lang="lang=" {{ str_replace('_', '-', app()->getLocale()) }}"">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ config('app.name', 'My Blog') }} | @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/modules/fontawesome/css/all.min.css') }}">
  <!-- Plugins -->
  <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-social/bootstrap-social.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
  <!-- Page Specific CSS File -->
  <link href="toastr.css" rel="stylesheet"/>
  {{-- toastr --}}
  @yield('css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <x-navbar />
      <x-sidebar />
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('stisla/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/popper.js') }}"></script>
  <script src="{{ asset('stisla/modules/tooltip.js') }}"></script>
  <script src="{{ asset('stisla/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/moment.min.js') }}"></script>
  <script src="{{ asset('stisla/js/stisla.js') }}"></script>
  <script src="toastr.js"></script>
  <!-- Plugins -->
  @yield('plugin')
  <!-- Page Specific JS File -->
  @yield('js')
  <!-- Template JS File -->
  <script src="{{ asset('stisla/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/js/custom.js') }}"></script>
  <script>
    jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal',function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);
  
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
  </script>
  <div class="modal fade" tabindex="-1" role="dialog" id="mymodal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
          <i class="fa fa-spinner fa-spin"></i>
        </div>
       
      </div>
    </div>
  </div>
 
</body>

</html>