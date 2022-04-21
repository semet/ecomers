<div class="block-wishlist action">
    <a class="icon-link icon-link-2"
       @auth('customer') href="{{ route('account.wishlist') }}" @endauth
       @guest('customer') href="#" data-bs-toggle="modal" data-bs-target="#loginModal" @endguest
    >
        <i class="flaticon-heart"></i>
        <span class="count count-2">
            @auth('customer')
                {{ $totalItems }}
            @endauth
            @guest('customer')
                0
            @endguest
        </span>
        <span class="text mt-1">
            <span class="sub">Favorite</span>
            My Wishlist </span>
    </a>
</div>
