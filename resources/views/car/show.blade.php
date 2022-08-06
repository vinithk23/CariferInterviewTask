@extends('layouts.app')

@section('content')
    {{--    year filter--}}
    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
<style>
    #showCarForm {
        pointer-events: none;
    }
</style>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">

                        <div class="col-md-12 titles text-center bg-emp-title p-2">
                            <h3>View Car Details</h3>
                            <form id="showCarForm">
                            @csrf
                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="reg_no" class="col-md-5 col-sm-4">Registration Number</label>
                                                <div class="col-md-7 col-sm-8">
                                                    <input type="text" class="form-control form-control-sm @error('reg_no') is-invalid @enderror" placeholder="Enter Registration Number" name="reg_no" id="reg_no" value="{{ $car ? old('reg_no', $car->reg_no) : old('reg_no') }}" onkeydown="return false">
                                                    @error('reg_no')
                                                    <span class="error invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="model" class="col-md-5 col-sm-4">Model</label>
                                                <div class="col-md-7 col-sm-8">
                                                    <input type="text" class="form-control form-control-sm @error('model') is-invalid @enderror" placeholder="Enter Model" name="model" id="model" value="{{ $car ? old('model', $car->model) : old('model') }}" onkeydown="return false">
                                                    @error('model')
                                                    <span class="error invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="form-group row">
                                                <label for="year" class="col-md-5 col-sm-4">Year</label>
                                                <div class="col-md-7 col-sm-8" id="salaryYear">
                                                    <input class="form-control form-control-sm @error('designation_id') is-invalid @enderror" id="year" name="year" placeholder="Enter Year" value="{{ $car ? old('year', $car->year) : old('year') }}" onkeydown="return false">
                                                    @error('year')
                                                    <span class="error invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="form-group row">
                                                <label for="color" class="col-md-5 col-sm-4">Color</label>
                                                <div class="col-md-7 col-sm-8">
                                                    <input type="text" class="form-control form-control-sm @error('color') is-invalid @enderror" placeholder="Enter Color" name="color" id="color" value="{{ $car ? old('color', $car->color) : old('color') }}" onkeydown="return false">
                                                    @error('color')
                                                    <span class="error invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="form-group row">
                                                <label for="mileage" class="col-md-5 col-sm-4">Mileage</label>
                                                <div class="col-md-7 col-sm-8">
                                                    <input type="text" class="form-control form-control-sm @error('mileage') is-invalid @enderror" placeholder="Enter Mileage" name="mileage" id="mileage" value="{{ $car ? old('mileage', $car->mileage) : old('mileage') }}" onkeydown="return false">
                                                    @error('mileage')
                                                    <span class="error invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <div class="form-group row justify-content-center">

                                                <div class="col-12">
                                                    <label for="car_image" class="col-md-5 col-sm-4">Image</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="{{ $car ? old('image', $car->image) : old('image') }}" class="form-control form-control-sm">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row mt-2 justify-content-center">
                                <div class="col-md-6 mt-2">
                                    <a href="{{ route('car.edit', $car->id) }}" class="btn btn-success mr-3">Edit</a>
                                    <a href="{{ route('home') }}" class="btn btn-danger ml-3">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        $('#salaryYear').calendar({
            type: 'year'
        });
    </script>

@endsection
