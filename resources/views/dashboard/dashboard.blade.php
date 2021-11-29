@extends('layouts.master')

@section('content')
@if (count($links) > 0)
{{-- table primary start --}}
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
                                <td>
                                    <livewire:status :link="$link" :name="'status'" :key="'status'.$link->id" />
                                </td>
                                <td> {{$link->created_at->diffForHumans()}} </td>
                                <td> {{$link->updated_at->diffForHumans()}} </td>
                                <td>120</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href=" {{route('links.edit', $link->id)}} " class="mr-2 edit-Link"
                                            data-toggle="modal" data-target="#editLink">
                                            <i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                                        </a>

                                        <button class="deleteLink" data-toggle="modal" data-target="#deleteLink">
                                            <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            {{-- Delete Link confiramtion --}}
                            {{-- Modal --}}
                            <div class="modal fade" id="deleteLink" tabindex="-1" role="dialog"
                                aria-labelledby="LinkDelete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="LinkDelete">Delete Link</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria- hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Wooow, Are you sure from deleting this Link?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            {{-- Delete Link --}}
                                            {!! Form::open([ 'method'=>'delete', 'route'=>['links.destroy', $link->id],
                                            'class'=>'d-inline delete-link-form']) !!}
                                            {!! Form::hidden('id', $link->id, ['class'=>'link-id']) !!}
                                            <button type="submit" class="btn btn-danger">
                                                <strong>Delete Link</strong>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- table primary end --}}
@else
<div class="alert alert-warning mt-5 py-3" role="alert">
    <strong>Holy guacamole!</strong> You have no Links.
</div>

@endif
<div class="mt-3">
    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#createLink">Add
        Link</button>
</div>
</div>

{{-- components --}}
<x-create-link />
@include('dashboard.edit')
@endsection
