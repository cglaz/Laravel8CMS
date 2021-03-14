<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<x-partials.header></x-partials.header>

<body>
  <!-- Navigation -->
  <x-partials.top-nav></x-partials.top-nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{$post->post_image}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$post->title}}</h1>
            <span class="meta">Posted by {{$post->user->name}} on {{$post->created_at->diffForHumans()}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>{{$post->body}}</p>
        </div>
      </div>
    </div>
  </article>

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
