@extends('layouts.cars_layout')

@section('content')
    <div class="m-auto w-4/8 py-14">
        <div class="text-center">
            <h1 class="text-5xl uppercase font-bold">Create Car</h1>
            <div class="py-2">
                <a href="/cars" class="italic text-green-700">&larr; Back</a>
            </div>
        </div>
    </div>

    <div class="flex justify-center pt-5">
        <form action="/cars" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block">
                <input type="file"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-amber-400"
                       name="image">
                <input type="text"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-amber-400"
                       name="name"
                       placeholder="Brand name...">
                <input type="text"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-amber-400"
                       name="founded"
                       placeholder="Founded...">

                <input type="text"
                       class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-amber-400"
                       name="description"
                       placeholder="Description...">

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>
    @if($errors->any)
        <div class="w-4/8 m-auto text-center">
            @foreach($errors->all() as $error)
                <li class="text-red-800 list-none">
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif
@endsection
