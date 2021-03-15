@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Description</h2>
            </div>
            <div class="pull-right">
                @can('description-create')
                <a class="btn btn-success" href="{{ route('descriptions.create') }}"> Create New Description</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($descriptions as $description)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $description->name }}</td>
            <td>{{ $description->detail }}</td>
            <td>
                <form action="{{ route('descriptions.destroy',$description->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('descriptions.show',$description->id) }}">Show</a>
                    @can('description-edit')
                    <a class="btn btn-primary" href="{{ route('descriptions.edit',$description->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('description-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    {!! $descriptions->links() !!}


<p class="text-center text-primary"><small>4leaf-clover.com</small></p>
@endsection