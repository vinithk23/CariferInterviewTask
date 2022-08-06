<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Car::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<div class="row"><div class="col-md-1"><a href="' . route('car.show', $data->id) . '"><i class="fa fa-eye text-success"></i></a></div>
                            <div class="col-md-1"><a href="' . route('car.edit', $data->id) . '"><i class="fa fa-pencil text-warning"></i></a></div>
                            <div class="col-md-1"><form action="' . route('car.destroy', $data->id) . '" method="POST" class="btn-inline d-flex">' . method_field('delete') .
                           '<input type="hidden" name="_token" value="' . csrf_token() . '"><i class="fa fa-trash text-danger mt-1"  onclick="commonDelete(this)" aria-hidden="true"></i></form></div></div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('home');
    }
}
