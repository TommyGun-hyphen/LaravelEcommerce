@extends('layouts/app')
@section('content')
<div class="flex flex-col justify-center text-white uppercase bg-zinc-900 h-40">
    <h2 class="mb-0 font-bold h2 text-center"><a class="hover:text-gray-400" href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i></a> <a class="underline hover:text-gray-400" href="/category/{{ $category->slug }}">{{ $category->name }}</a> > {{ $subcategory->name }}</h2>
</div>
    <div class="container">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($products as $product)
            @include('product.partials.card')
            @endforeach
        </div>
    </div>

@endsection