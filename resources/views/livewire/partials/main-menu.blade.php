<div class="col-lg-6 col-md-6 col-3">
    <div class="header__bottom-left d-flex d-xl-block align-items-center">
        <div class="side-menu d-lg-none mr-20">
            <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i class="fas fa-bars"></i></button>
        </div>
        <div class="main-menu d-none d-lg-block">
            <nav>
                <ul>

                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">Categories <i class="far fa-angle-down"></i></a>
                        <ul class="submenu">
                            @foreach ($categories as $category)
                                <li><a href="{{ url('/shop/category/' . $category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#">Stores <i class="far fa-angle-down"></i></a>
                        <ul class="submenu">
                            @foreach ($stores as $store)
                                <li><a href="blog.html">{{ $store->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="about.html">menus <i class="far fa-angle-down"></i></a>
                        <ul class="submenu">
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="product-details.html">Product Details</a></li>
                            <li><a href="faq.html">FAQs pages</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="404.html">404 Error</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
