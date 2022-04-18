<header class="header d-blue-bg">
    <div class="header-top">
        <div class="container custom-conatiner">
            <div class="header-inner">
                <div class="row align-items-center">
                    <livewire:partials.header-top-left />
                    <livewire:partials.header-top-right />

                </div>
            </div>
        </div>
    </div>
    <div class="header-mid">
        <div class="container custom-conatiner">
            <div class="heade-mid-inner">
                <div class="row align-items-center">
                    <livewire:partials.app-logo />
                    <livewire:partials.search-bar />

                    <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8">
                        <div class="header-action">
                            <livewire:partials.user-menu />
                            <livewire:partials.wishlist-preview />
                            <livewire:partials.cart-preview />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container custom-conatiner">
            <div class="row g-0 align-items-center">
                <livewire:partials.department-filter />
                <livewire:partials.main-menu />

                <div class="col-lg-3 col-md-6 col-9">
                    <div class="shopeing-text text-sm-end">
                        <p>Spend $120 more and get free shipping!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
