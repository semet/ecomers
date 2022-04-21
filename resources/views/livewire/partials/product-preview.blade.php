<div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered product__modal" role="document">
        <div class="modal-content">
            <div class="product__modal-wrapper p-relative">
                <div class="product__modal-close p-absolute">
                    <button data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                </div>
                <div class="product__modal-inner">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product__modal-box">
                                <div class="tab-content" id="modalTabContent">
                                    <div class="tab-pane fade show active" id="nav1" role="tabpanel" aria-labelledby="nav1-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="{{ asset('assets/img/quick-view/quick-view-1.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav2" role="tabpanel" aria-labelledby="nav2-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="{{ asset('assets/img/quick-view/quick-view-2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav3" role="tabpanel" aria-labelledby="nav3-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="{{ asset('assets/img/quick-view/quick-view-3.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav4" role="tabpanel" aria-labelledby="nav4-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="{{ asset('assets/img/quick-view/quick-view-4.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab" data-bs-target="#nav1" type="button" role="tab" aria-controls="nav1"
                                            aria-selected="true">
                                            <img src="{{ asset('assets/img/quick-view/quick-nav-1.jpg') }}" alt="">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="nav2-tab" data-bs-toggle="tab" data-bs-target="#nav2" type="button" role="tab" aria-controls="nav2"
                                            aria-selected="false">
                                            <img src="{{ asset('assets/img/quick-view/quick-nav-2.jpg') }}" alt="">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="nav3-tab" data-bs-toggle="tab" data-bs-target="#nav3" type="button" role="tab" aria-controls="nav3"
                                            aria-selected="false">
                                            <img src="{{ asset('assets/img/quick-view/quick-nav-3.jpg') }}" alt="">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="nav4-tab" data-bs-toggle="tab" data-bs-target="#nav4" type="button" role="tab" aria-controls="nav4"
                                            aria-selected="false">
                                            <img src="{{ asset('assets/img/quick-view/quick-nav-4.jpg') }}" alt="">
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product__modal-content">
                                <h4>
                                    <a href="product-details.html">
                                        {{ $product !== null ? $product->name : '' }}
                                    </a>
                                </h4>
                                <div class="product__review d-sm-flex">
                                    <div class="rating rating__shop mb-10 mr-30">
                                        <ul>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__add-review mb-15">
                                        <span>01 review</span>
                                    </div>
                                </div>
                                <div class="product__price">
                                    <span>Rp. {{ $product !== null ? $product->latest_price : '' }}</span>
                                </div>
                                <div class="product__modal-des mt-20 mb-15">
                                    {{ $product !== null ? $product->description : '' }}
                                </div>
                                <div class="product__stock mb-20">
                                    <span class="mr-10">Availability :</span>
                                    <span> {{ $product !== null ? $product->amount : '' }} in stock</span>
                                </div>
                                <div class="product__modal-form">
                                    <form action="#">
                                        <div class="pro-quan-area d-lg-flex align-items-center">
                                            <div class="product-quantity mr-20 mb-25">
                                                <div class="cart-plus-minus p-relative">
                                                    <input type="text" wire:model="quantity" />
                                                    <button class="dec qtybutton @if($quantity === 0) text-black-50 @endif" wire:click.prevent="decrementItem" @if($quantity === 0) disabled @endif>-</button>
                                                    <button class="inc qtybutton" wire:click.prevent="incrementItem">+</button>
                                                </div>

                                            </div>
                                            <div class="pro-cart-btn mb-25">
                                                <button class="cart-btn" wire:click.prevent="handleAddToCart('{{ $product !== null ? $product->id : '' }}')">
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="product__stock mb-30">
                                    <ul>
                                        <li>
                                            <span class="cat mr-10">Category:</span>
                                            <span> {{ $product !== null ? $product->category->name : '' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
