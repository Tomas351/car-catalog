@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit car</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('Cars.index') }}"> Back</a>
        </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Brand:</strong>
                    <input type="text" name="brand" class="form-control" placeholder="Brand" value="{{ $Car->brand }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Model:</strong>
                    <input type="text" name="model" class="form-control" placeholder="Model" value="{{ $Car->model }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select fuel type:</strong>
                    <div><select id="fuel_type" name="fuel_type" class="form-control">
  <option value="Gasoline"<?php echo $Car['fuel_type'] == 'Gasoline' ? ' selected ' : '';?>>Petrol</option>
  <option value="Diesel"<?php echo $Car['fuel_type'] == 'Diesel' ? ' selected ' : '';?>>Diesel</option>
  <option value="Electric"<?php echo $Car['fuel_type'] == 'Electric' ? ' selected ' : '';?>>Electric</option>
</select></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fuel tank capacity:</strong>
                    <input type="number" name="fuel_tank_capacity" class="form-control" placeholder="Fuel tank capacity" value="{{ $Car->fuel_tank_capacity }}"> 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="price" class="form-control" placeholder="Price" value="{{ $Car->price }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:100px" name="description"
                        placeholder="description">{{ $Car->description }}</textarea>
                </div>
</div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Color:</strong>
                    <input type="text" name="color" class="form-control" placeholder="Color" value="{{ $Car->color }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Max Speed:</strong>
                    <input type="number" name="max_speed" class="form-control" placeholder="Max speed" value="{{ $Car->max_speed }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Horse power:</strong>
                    <input type="number" name="horsepower" class="form-control" placeholder="Horse Power" value="{{ $Car->horsepower }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select transmission type:</strong>
                    <div><select id="transmission" name="transmission" class="form-control">
  <option value="Automatic"<?php echo $Car['transmission'] == 'Automatic' ? ' selected ' : '';?>>Automatic</option>
  <option value="Manual"<?php echo $Car['transmission'] == 'Manual' ? ' selected ' : '';?>>Manual</option>
</select></div>                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>

    </form>
@endsection