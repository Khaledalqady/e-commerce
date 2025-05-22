@include('user.app.head')
  <body>

   
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
     @include('user.app.navbar')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
   
    <!-- Banner Ends Here -->
@yield('content')
    
   @include('user.app.footer')



