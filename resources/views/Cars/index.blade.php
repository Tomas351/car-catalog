@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Car dealership catalog </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Cars.create') }}"> Add New Car</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Fuel type</th>
            <th>Fuel tank capacity</th>
            <th>Max speed</th>
            <th>Price (€)</th>
            <th>Color</th>
            <th>Description</th>
            <th>Horsepower</th>
            <th>Transmission</th>
            <th>Date added</th>
            <th>Actions</th>
        </tr>
        @foreach ($Cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->fuel_type }}</td>
                <td>{{ $car->fuel_tank_capacity }}</td>
                <td>{{ $car->max_speed }}</td>
                <td>{{ $car->price }}</td>
                <td>{{ $car->color }}</td>
                <td>{{ $car->description }}</td>
                <td>{{ $car->horsepower }}</td>
                <td>{{ $car->transmission }}</td>
                <td>{{ $car->created_at }}</td>
                <td>
                <form action="{{ route('Cars.destroy',$car->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('Cars.show',$car->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('Cars.edit',$car->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $Cars->links() !!}

@endsection
