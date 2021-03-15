@extends('layouts.userapp')

@section('content')
<div class="container">
    
    <div class=" form-group ">

        <label class="col-form-label" value="{{__(' 入会 ')}}"/></label>

        <label class="mt-4" for="checklistselection" value="{{ __('チェックリスト選択') }}" />
                
        <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="block mt-1 w-full">
            <option></option>
            <option value="{{ '' }}">入会</option>
            <option value="{{ '' }}">夏期講習</option>
            <option value="{{ '' }}">冬期講習</option>
            <option value="{{ '' }}">退会</option>


        </select>
    
    </div>
</div>    

<table class="table table-bordered ">
    <thead class="thead-dark" >
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Check</th>
            <th>Details</th>
    </thead>  
        </tr>
        @foreach ($descriptions as $description)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $description->name }}</td>
            <td>{{ Form::checkbox('active') }}</td>
            <td>{{ $description->detail }}</td>
            
        </tr>
        @endforeach
    </table>   
     
        
 {!! $descriptions->links() !!}


    
 
@endsection
