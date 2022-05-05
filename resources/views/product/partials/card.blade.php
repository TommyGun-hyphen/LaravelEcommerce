<div style="width: calc(100% - 10px)" class="drop-shadow-md hover:drop-shadow-2xl card rounded-lg mx-1 h-full bg-base-100 shadow-xl">
    <figure>
        {{-- <img class="object-cover" src="" alt="Shoes" /> --}}
        <a a href="/product/{{ $product->slug }}"  class="flex justify-center align-items-center block m-1 w-full hover:scale-120 h-48 lg:h-64 bg-cover bg-center" style="background-image:url({{ $product->image_url }});background-size: contain; background-repeat:no-repeat; background-position:center">
        @if (!$product->in_stock)
            <div class="badge badge-outline border-red-800 bg-red-600 text-white">Rupture de stock</div>
        @endif
        </a>
    </figure>
    <div class="card-body flex flex-col justify-between">
        <div class="flex justify-between flex-col md:flex-row">
            <a a href="/product/{{ $product->slug }}" class="text-center md:text-left block h5">
                {{ $product->name }}
            </a>
            
        </div>
        <div class="flex flex-col grow">
            <span class=" font-bold whitespace-nowrap">{{ $product->price }} DH </span>
            @if ($product->price_old)
               <span class=" text-slate-400 line-through text-sm  font-normal whitespace-nowrap">{{ $product->price_old }} DH</span>
            @endif
        </div>
        <div class="card-actions justify-center items-center flex-col">
            
            <a href="/category/{{ $product->subCategory()->first()->category()->first()->slug }}" class="badge badge-outline">{{ $product->subCategory()->first()->category()->first()->name }}</a>
            
            @include('product.partials.btnAddToCart')
        </div>
    </div>
</div>