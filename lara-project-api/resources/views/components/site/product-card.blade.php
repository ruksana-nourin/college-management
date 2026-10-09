{{-- <article class="product-card">

    <div class="img-wrap">



        <button class="wishlist" aria-label="Wishlist">
            ♡
        </button>
        @if ($image)

        <img src="{{ $image }}" alt="{{ $name }}">
        @else
        <img src="https://placehold.net/1.png" alt="">
        @endif

    </div>

    <div class="stock">
        <span class="dot"></span>
        In stock · {{ $quantity }} items
    </div>

    <a href="product.html" class="name">
        {{ $name }}
    </a>

    <div class="price">
        <span class="now">$ {{ $price }}</span>
    </div>

    <div class="stars">
        ★★★★★
        <span class="count">(120)</span>
    </div>

    <a href="cart.html" class="btn">
        Order now →
    </a>

</article> --}}

<article class="product-card">
    <a href="{{ route('product.details', $item->id) }}">

        <div class="img-wrap">

            <button class="wishlist" aria-label="Wishlist">
                ♡
            </button>
            @if ($item->image)

                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
            @else
                <img src="https://placehold.net/1.png" alt="">
            @endif
        </div>

        <div class="stock">
            <span class="dot"></span>
            In stock · {{ $item->quantity }} items
        </div>

        <div class="name">
            {{ $item->name }}
        </div>

        <div class="price">
            <span class="now">$ {{ $item->price }}</span>
        </div>

        <div class="stars">
            ★★★★★
            <span class="count">(56)</span>
        </div>

    </a>
    <a href="javascript:void(0)" onclick="addToCart({{ $item->id }}, '{{ $item->name }}', {{ $item->price }},'{{ $item->image ?? '' }}')" class="btn ">
        Add to Cart →
    </a>

</article>