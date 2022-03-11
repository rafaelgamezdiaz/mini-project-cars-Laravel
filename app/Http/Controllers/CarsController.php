<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Car;
use App\Http\Requests\CreateValidationRequest;

class CarsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()//: View
    {
        $cars = Car::all();

        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Methods we can use on $request
            // extension(), getMimeType(), store(), storePublicly(), storeAs(), move(),
            // getSize(), getClientOriginalName(), getError(), isValid()

            $request->validate([
                'image' => 'required|mimes:jpg,png,jpeg|max:5048',
                'name' => 'required',
                'founded' => 'required|integer|min:1900|max:2022',
                'description' => 'required'
            ]);
            $image = $request->file('image');
            $newImageName = time() . '-' . $request->name . '.' . $image->extension();
            $image->move(storage_path('images'), $newImageName);


            Car::create([
               'name' => request()->input('name'),
               'founded' => request()->input('founded'),
               'image' => $newImageName,
               'description' => request()->input('description'),
               'user_id' => auth()->user()->id
            ]);
            //            $car = new Car();
            //            $car->name = $request->input('name');
            //            $car->founded = $request->input('founded');
            //            $car->description = $request->input('description');
            //            if ($car->save()) {
            //                return redirect('/cars');
            //            }

            return redirect('/cars');
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException('Error: Car Nor created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $car = Car::find($id)->first();

        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$request->validated();
        Car::where('id', $id)
            ->update([
            'name' => request()->input('name'),
            'founded' => request()->input('founded'),
            'description' => request()->input('description')
        ]);
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Car::find($id)->delete();
        return redirect('/cars');
    }
}
