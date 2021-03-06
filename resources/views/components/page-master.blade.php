<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<x-partials.header></x-partials.header>

<body>
  <!-- Navigation -->
  <x-partials.top-nav></x-partials.top-nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{$page->page_image}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>{{$page->title}}</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>{!! $page->body !!}</p>
      </div>
    </div>
  </div>

  <hr>

   <!-- Footer -->
   <x-partials.footer></x-partials.footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('js/clean-blog.min.js')}}"></script>

</body>
</html>
