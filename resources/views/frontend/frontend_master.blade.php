<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/')}}frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/owl.css">



  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
   @include('frontend.body.header')

    <!-- Page Content -->
    <!-- Banner Starts Here -->

    <!-- Banner Ends Here -->




    @yield('content')


  @include('frontend.body.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('/')}}frontend/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('/')}}frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('/')}}frontend/assets/js/custom.js"></script>
    <script src="{{asset('/')}}frontend/assets/js/owl.js"></script>
    <script src="{{asset('/')}}frontend/assets/js/slick.js"></script>
    <script src="{{asset('/')}}frontend/assets/js/isotope.js"></script>
    <script src="{{asset('/')}}frontend/assets/js/accordions.js"></script>

    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


 {{--js for sweet alert start--}}
 <script src="{{asset('/')}}frontend/sweet_alert/sweetalert.min.js"></script>

 <script type="text/javascript">
     $(document).on('click', '#delete2', function(e) {
         var link = $(this).attr("href");
         e.preventDefault();
         swal({
                 title: "Careful!",
                 text: "Are you sure you want to delete ?",
                 icon: "warning",
                 dangerMode: true,
                 buttons: {
                     cancel: "Exit",
                     confirm: "Confirm",
                 },
             })
             .then((willDelete) => {
                 if (willDelete) {
                     window.location.href = link;
                 }
             });
     });
 </script>
 {{--js for sweet alert end--}}

  </body>
</html>
