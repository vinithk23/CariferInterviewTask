<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car = null;
        return view('car.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            //img upload
            if ($request->car_image) {
                $imageName = $request->reg_no . time() . '.' . $request->car_image->extension();
                $input['image'] = $imageName;
                $request->car_image->move(public_path('CarImages'), $imageName);
            }
            Car::Create($input);
            DB::commit();
            return redirect()->route("home")->with("success", "Car Details Stored Successfully.");

        } catch (\Exception $exception) {
            DB::rollBack();
            info('Error::Place@CarController@store - ' . $exception->getMessage());
            return redirect()->back()->with("warning", "Something went wrong" . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('car.show',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('car.create',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            //img upload
            if ($request->car_image) {
                $imageName = $request->reg_no . time() . '.' . $request->car_image->extension();
                $input['image'] = $imageName;
                $request->car_image->move(public_path('CarImages'), $imageName);
                $imagePath = DB::table('cars')->whereId($car->id)->pluck('image')->first();
                if(File::exists(public_path('CarImages/'.$imagePath))){
                    File::delete(public_path('CarImages/'.$imagePath));
                }
            }
            $car->update($input);
            DB::commit();
            return redirect()->route("home")->with("success", "Car Details Updated Successfully.");

        } catch (\Exception $exception) {
            DB::rollBack();
            info('Error::Place@CarController@update - ' . $exception->getMessage());
            return redirect()->back()->with("warning", "Something went wrong" . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $imagePath = DB::table('cars')->whereId($car->id)->pluck('image')->first();
        $car->delete();
        if(File::exists(public_path('CarImages/'.$imagePath))){
            File::delete(public_path('CarImages/'.$imagePath));
        }
        return redirect()->route("home")->with("warning", "Car Details Deleted Successfully.");
    }
}
