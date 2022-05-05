<div class="bg-zinc-900 mt-5 px-5 pt-5 pb-2 text-white text-center">
    @if(App\Models\Setting::where('key', 'logo-type')->first()->value == 'text')
    <h1 class="h1 text-center uppercase my-5">{{ config('app.name', 'Laravel') }}</h1>
    @else
        <img src="{{ App\Models\Setting::where('key', 'logo-image-url')->first()->value }}" class="my-3 w-24 mx-auto" alt="PanierMedia ">
    @endif
    <h4 class=" font-thin uppercase">{{ App\Models\Setting::where('key', 'footer-text')->first()->value }}</h4>
    <table class="mx-auto text-left my-4" cellpadding="10">
        <tr>
            <td>
                <i class="fa-solid fa-phone"></i>
            </td>
            <td>
                <a href="tel:{{ App\Models\Setting::where('key', 'phone')->first()->value }}">{{ App\Models\Setting::where('key', 'phone')->first()->value }}</a>
            </td>
        </tr>
        <tr>
            <td>
                <i class="fa-solid fa-location-dot"></i>
            </td>
            <td>
                <span>{{ App\Models\Setting::where('key', 'address')->first()->value }}</span>
            </td>
        </tr>
    </table>
    <hr>
    <h4 class=" font-thin uppercase mt-2">© 2022 {{ config('app.name', 'Laravel') }}. All rights reserved</h4>
</div>