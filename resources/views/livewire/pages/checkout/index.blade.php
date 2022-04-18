@section('title', 'Checkout')
<section>
    <!-- page-banner-area-start -->
    <livewire:pages.checkout.banner/>
    <!-- page-banner-area-end -->

    <!-- checkout-area-start -->
    <div class="checkout-area pb-85 mt-4">
        <div class="container">
            <form action="#">
                <div class="row">
                    <livewire:pages.checkout.address/>
                    <livewire:pages.checkout.order/>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout-area-end -->
</section>
