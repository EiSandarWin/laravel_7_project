@extends('layouts.app')


@section('content')
    

    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($description as $description)
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

@endsection

