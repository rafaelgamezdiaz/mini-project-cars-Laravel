@extends('layouts.cars_layout')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <img src="{{ asset('images' . '/' . $car->image) }}" alt=""
            class="w-6/12 mb-8 shadow-xl"/>
            <h1 class="text-5xl uppercase font-bold">{{ $car->name }}</h1>
            <div class="py-2">
                <a href="/cars" class="italic text-green-700">&larr; Back</a>
            </div>
        </div>

        <div class="py-5 text-center">
            <div class="m-auto">
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Founded: {{ $car->founded }}
                    </span>

                    <p class="text-lg text-gray-700 py-6">
                        {{ $car->description }}
                    </p>
                    @if(count($car->carModels) !== 0)
                        <table class="table-auto">
                            <tr class="bg-blue-100">
                                <th class="w-1/4 border-4 border-gray-800">Model</th>
                                <th class="w-1/4 border-4 border-gray-800">Engines</th>
                                <th class="w-1/4 border-4 border-gray-800">Date Production</th>
                            </tr>

                            @forelse($car->carModels as $model)
                                <tr>
                                    <td class="border-4 border-gray-800">{{ $model->name }}</td>
                                    <td class="border-4 border-gray-800">
                                        @foreach($car->engines as $engine)
                                            @if($model->id == $engine->model_id)
                                                {{ $engine->name }},
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="border-4 border-gray-800">
                                        {{ date('d-m-Y', strtotime($car->productionDate->created_at)) }}
                                    </td>
                                </tr>
                            @empty
                                <p>No car Model found</p>
                            @endforelse

                        </table>
                    @endif
                        <div class="text-left">
                            Product types:
                            @forelse($car->products as $product)
                                <p class="px-2">{{ $product->name }}</p>
                            @empty
                                No car product description
                            @endforelse
                        </div>

                    <hr class="mt-4 mb-8">
            </div>
        </div>
    </div>
@endsection
