@extends('layouts.master')

@section('content')
        <div class="page-container">
            <!-- page title area end -->
            <div class="main-content">
            <div class="main-content-inner">
                <!-- table primary start -->
                @if (Auth::check())
                    <div class="signed-message">
                        @if (session('logged-in'))
                            <p> {{session('logged-in')}} </p>
                        @endif
                    </div>
                @endif
                <div class="mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Your Links</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-primary">
                                            <tr class="text-white">
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Link</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Updated At</th>
                                                <th scope="col">Visits</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($links as $link)
                                                <tr>
                                                    <th scope="row"> {{$link->id}} </th>
                                                    <td>{{$link->name}}</td>
                                                    <td> {{$link->link}} </td>
                                                    <td> ative </td>
                                                    <td> {{$link->created_at->diffForHumans()}} </td>
                                                    <td> {{$link->updated_at->diffForHumans()}} </td>
                                                    <td>120</td>
                                                    <td>
                                                        <i class="ti-trash"></i>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- table primary end -->
            </div>
        </div>
        <!-- main content area end -->
    </div>

    {{-- <ul class="icons-ul">
            <li><i class="icon-li icon-ok"></i>Embedded icon using the &lt;i&gt; tag</li>
            <li><i class="icon-li icon-ok"></i>Doesn't work with background-image</li>
            <li><i class="icon-li icon-ok"></i>We can use the :before psuedo class</li>
            <li><i class="icon-li icon-ok"></i>Works in IE8+, FireFox 21+, Chrome 26+, Safari 5.1+, most mobile browsers</li>
            <li><i class="icon-li icon-ok"></i>See <a href="http://caniuse.com/#search=before">CanIUse.com</a> for browser support</li>
        </ul> --}}
        <button class="btn btn-primary" id="tryMe">Try Me</button>
</div>
@endsection
