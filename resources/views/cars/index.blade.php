@extends('layouts.cars_layout')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase font-bold">Cars</h1>
        </div>
        <a href="/" class="pb-2  italic text-green-700">&lAarr; Home</a>
        @if(Auth::user())
            <div class="pt-10">
                <a href="/cars/create" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">Add a new Car &rarr;</a>
            </div>
        @endif
        <div class="w-5/6 py-10">
            <div class="m-auto">
                @foreach($cars as $car)
                    @if(isset(Auth::user()->id) && Auth::user()->id == $car->user_id)
                        <div class="float-right">
                            <a href="/cars/{{ $car->id }}/edit"
                               class="pb-2  italic text-green-700"
                            >Edit &rarr;
                            </a>
                            <form action="/cars/{{ $car->id }}" method="POST" class="pt-3">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="pb-2 italic text-red-800">
                                    Delete &rarr;
                                </button>
                            </form>
                        </div>
                    @endif
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Founded: {{ $car->founded }}
                    </span>
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                        <a href="/cars/{{ $car->id  }}">{{ $car->name }}</a>
                    </h2>
                    <p class="text-lg text-gray-700 py-6">
                        {{ $car->description }}
                    </p>
                    <hr class="mt-4 mb-8">
                @endforeach
            </div>
        </div>
    </div>

@endsection
