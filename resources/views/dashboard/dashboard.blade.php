@extends('layouts.master')

@section('content')
    @if (count($links) > 0)
    <!-- table primary start -->
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
                                            <a href="#" class="mr-2">
                                                <i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                                            </a>
                                            <a href="#"><i class="ti-trash fa-lg"></i></a>
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
    @else
        <div class="alert alert-warning mt-5 py-3" role="alert">
            <strong>Holy guacamole!</strong> You have no Links.
        </div>

    @endif
    <div>
        <a href=" {{route('links.create')}} "><button class="btn btn-primary btn-flat">Add Link</button></a>
    </div>
</div>
@endsection
