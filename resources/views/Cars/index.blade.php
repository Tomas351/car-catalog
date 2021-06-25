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

<!-- Search -->

<div class="card my-4">
        <form class="card-body" action="/search" method="get">
            <div class="input-group">
                <span class="input-group-btn">
                <input type="search" class="form-control" placeholder="Search in brand, model or description" name="search">

            <button class="btn btn-secondary" type="submit">Search</button>
          </span>
            </div>
                <div class="form-group">
                    <select id="sort" name="sort" class="form-control">
  <option value="">Sort by</option>
  <option value="price">Price</option>
  <option value="max_speed">Max speed</option>
  <option value="fuel_tank_capacity">Fuel tank capacity</option>
  <option value="horsepower">Horse power</option>

</select>            </div>

        </form>
    </div>

<!-- Filter -->
<div class="card my-4">
        <form class="card-body" action="/filter" method="get">
            <div class="input-group">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div><select id="transmission" name="transmission" class="form-control">
  <option value="">Filter by transmission</option>
  <option value="Automatic">Automatic</option>
  <option value="Manual">Manual</option>
</select></div>                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div><select id="fuel_type" name="fuel_type" class="form-control">
  <option value="">Filter by fuel type</option>
  <option value="Petrol">Petrol</option>
  <option value="Diesel">Diesel</option>
  <option value="Electric">Electric</option>

</select></div>                </div>
            </div>
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Filter</button>
          </span>
            </div>
        </form>
    </div>
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
    
                    <a class="btn btn-warning" href="{{ route('Cars.editPrice',$car->id) }}">Update price</a>

                    <a class="btn btn-primary" href="{{ route('Cars.edit',$car->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $Cars->links('pagination::bootstrap-4') !!}

@endsection
