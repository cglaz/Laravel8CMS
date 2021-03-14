<x-admin-master>

    @section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->

    @if(auth()->user()->userHasRole('Admin'))

    <h1 class="h1 mb-0 text-gray-800 text-center">Dashboard</h1>

    @endif

    @endsection

</x-admin-master>
