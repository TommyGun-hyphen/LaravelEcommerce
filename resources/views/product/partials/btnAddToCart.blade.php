@if ($product->in_stock)
    <div data-id="{{ $product->id }}" class="btn-addtocart rounded-full btn btn-primary">Ajouter Au Panier</div>
@else
    <div class="flex flex-col">
        <div class="btn-addtocart rounded-full btn btn-disabled">Ajouter Au Panier</div>
        
    </div>
@endif