@extends('layouts.app')

@section('content')
    <style>
        .w-5 {
            display: none;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card table-responsive">
                    <table class="table table-bordered car_datatable">
                        <thead class="table-primary">
                        <tr>
                            <th>Registration&nbsp;Number</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Color</th>
                            <th>Mileage</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('.car_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('home') }}",
                columns: [
                    {data: 'reg_no', name: 'reg_no'},
                    {data: 'model', name: 'model'},
                    {data: 'year', name: 'year'},
                    {data: 'color', name: 'color'},
                    {data: 'mileage', name: 'mileage'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
