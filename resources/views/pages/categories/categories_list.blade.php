@extends("layout.layout")

@section('content')
<div class="main-body">

    <table class="table bg-success">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>

@foreach ($categories as $item)
<tr>
    <th scope="row">{{$item->name}}</th>
    <td>
        <a href="{{route('edit.category',$item->id)}}" class="btn btn-primary">Edit</a>
        <form action="{{route('category.destroy',$item->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
    
</tr>    
@endforeach


        </tbody>
      </table>

</div>
@endsection