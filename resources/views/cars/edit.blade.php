@extends('layouts.cars_layout')

@section('content')
    <div class="m-auto w-4/8 py-14">
        <div class="text-center">
            <h1 class="text-5xl uppercase font-bold">Update Car</h1>
            <div class="py-2">
                <a href="/cars" class="italic text-green-700">&larr; Back</a>
            </div>
        </div>

    </div>

    <div class="flex justify-center pt-5">

        <form action="/cars/{{ $car->id }}" method="post">
            @csrf
            @method('put')
            <div class="block">
                <input type="text"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-amber-400"
                       name="name"
                       value="{{ $car->name }}"
                >
                <input type="text"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-amber-400"
                       name="founded"
                       value="{{ $car->founded }}"
                >

                <input type="text"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-amber-400"
                       name="description"
                       value="{{ $car->description }}"
                >

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>

@endsection
