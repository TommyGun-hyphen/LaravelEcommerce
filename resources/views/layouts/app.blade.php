<!doctype html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/shopping.js') }}" defer></script>
    <script src="{{ asset('js/utils.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@300;500;700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
  :root:root{
    --p:{{ hexToHsl(App\Models\Setting::where('key', 'primary-color')->first()->value) }};
    --s:{{ hexToHsl(App\Models\Setting::where('key', 'secondary-color')->first()->value) }};
    --a:{{ hexToHsl(App\Models\Setting::where('key', 'accent-color')->first()->value) }};

    --pf:{{ hexToHsl(adjustBrightness(App\Models\Setting::where('key', 'primary-color')->first()->value, -25)) }};
    --sf:{{ hexToHsl(adjustBrightness(App\Models\Setting::where('key', 'secondary-color')->first()->value, -25)) }};
    --af:{{ hexToHsl(adjustBrightness(App\Models\Setting::where('key', 'accent-color')->first()->value, -25)) }};
  }
  .btn-primary.active{
    background-color: hsl({{ hexToHslSep(App\Models\Setting::where('key', 'primary-color')->first()->value) }});
    border-color: hsl({{ hexToHslSep(App\Models\Setting::where('key', 'primary-color')->first()->value) }});

}
</style>
<body>
    <div id="app">
        <div style="z-index:5;" id="navbar" class="py-0 my-0 px-0 navbar bg-base-300 position-fixed">
            <div class="navbar-start shrink">
              <div class="dropdown w-fit">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </label>
                
                <div>
                  <ul tabindex="0" class="menu menu-compact dropdown-content mt-2 p-2 shadow bg-base-100 rounded-0 w-64">
                    {{-- mobile --}}
                      <form action="/search" method="get" class="m-0 p-0">

                      <li class="click:bg-base-100">
                          <div class="flex items-center justify-center m-0 px-0">
                            <div class="flex bg-white py-2 rounded-full">
                                <input type="text" name="q" class=" rounded-0" placeholder="Recherche..." autocomplete="off">
                                <button class="text-white bg-zinc-900 btn-circle btn-sm ">
                                  <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                          </div>
                      </li>
                      </form>
                      
                        @foreach(App\Models\Category::all() as $category)
                        <li tabindex="0" class="border-b">
                          <div class="flex justify-between pl-2 pr-0 py-0 rounded-0">
                            <a href="/category/{{ $category->slug }}" class="grow">
                              {{ $category->name }}
                            </a>
                            <a class="border-l px-3 bg-base-200  py-3">
                              <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
                            </a>
                          </div>
                          <ul class="p-2 bg-base-200 rounded-0 shadow">
                            @foreach ($category->subCategories()->get() as $subCategory)
                              <li><a href="/category/{{ $category->slug }}/{{ $subCategory->slug }}">{{ $subCategory->name }}</a></li>
                            @endforeach
                          </ul>
                        </li>
                        @endforeach
                  </ul>
                </div>
              </div>
              <a href="/" class="btn btn-ghost normal-case text-xl">{{ config('app.name', 'Laravel') }}</a>
              <form action="/search" method="get">
                <div class="flex items-center justify-center hidden lg:block mx-auto">
                  <div class="flex bg-white p-2 rounded-full">
                      <input type="text" name="q" class="px-4 w-48 rounded-0" placeholder="Recherche..." autocomplete="off">
                      <button class="text-white bg-zinc-900 btn-circle btn-sm ">
                        <i class="fa-solid fa-magnifying-glass"></i>
                      </button>
                  </div>
                </div>
              </form>
            </div>
            
            <div class="navbar-center hidden lg:flex grow">
              
            </div>
            
            <a href="/cart" class="p-3 bg-transparent border-0 text-lg text-zinc-900 hover:text-zinc-700 mr-5"><i class="fa-solid fa-cart-shopping"></i></a>
            
          </div>
          <div style="height:60px"></div>
          <div class="d-none d-lg-block" style="height:60px"></div>
          {{-- @if(request()->user())
          <div style="height:30px"></div>
          @endif --}}
        <main class="py-0">
          <div class="w-full py-2 my-0 justify-center bg-zinc-800 text-white hidden lg:flex fixed" id="categories" style="top:60px; z-index:5">
            <ul class="menu menu-horizontal p-0">
              
              @foreach(App\Models\Category::all() as $category)
              {{-- <li  ><a class="bg-zinc-900 py-4 inline-block hover:bg-zinc-500" href="/category/{{ $category->slug }}">{{ $category->name }}</a></li> --}}
              <div class="dropdown dropdown-hover">
                <a tabindex="0"  href="/category/{{ $category->slug }}" class="hover:text-gray-400 text-lg px-3 py-1 inline-block m-1">{{ $category->name }}</a>
                <ul tabindex="0" class="dropdown-content text-black menu p-2 bg-base-200 shadow rounded-box w-52">
                  @foreach($category->subCategories()->get() as $subCategory)
                    <li><a class="w-full" href="/category/{{ $category->slug }}/{{ $subCategory->slug }}">{{ $subCategory->name }}</a></li>
                  @endforeach
                </ul>
              </div>
              @endforeach
            </ul>
          </div>
            @yield('content')
        </main>
    </div>
    @include('partials.footer')

    <script>
      var lastScrollTop = 0;
      var lastType;
      $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop){
            // downscroll code
            if(st > 200){
              if(lastType == "up"){
                $("#navbar").stop( true, false )
                $("#categories").stop( true, false );
              }
              $("#navbar").animate({top:'-60px'}, 300);
              $("#categories").animate({top:'0px'}, 300);
              lastType = "down";
            }
        } else {
          if(lastType == "down"){
            $("#navbar").stop( true, false )
            $("#categories").stop( true, false );
          }
          $("#navbar").animate({top:'0px'}, 300);
          $("#categories").animate({top:'60px'}, 300);
          lastType = "up";
        }
        lastScrollTop = st;
      });
    </script>
</body>
</html>
