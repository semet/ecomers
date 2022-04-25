<div class="product__details-review">
    <div class="row">
        <div class="col-xl-4">
            <div class="review-rate">
                <h5>{{ $product->avarageRatings }}</h5>
                <div class="review-star">
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                </div>
                <span class="review-count">{{ $product->reviews->count() }} Review</span>
            </div>
        </div>
        <div class="col-xl-8">
            @if($product->reviews->count() !== 0)
                @foreach($product->reviews as $review)
                    <div class="review-des-infod">
                        <div class="review-details-des">
                            <div class="author-image mr-15">
                                <a href="#"><img src="{{ asset('assets/img/author/author-sm-1.jpeg') }}" alt=""></a>
                            </div>
                            <div class="review-details-content mt-3">
                                <div class="name-date mb-30">
                                    <h6> admin – <span> May 27, 2021</span></h6>
                                </div>
                                <p>{{ $review->review }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <h5 class="text-dark">Be the first to give review to this product and help other to know better</h5>
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="product__details-comment ">
                <div class="comment-title mb-20">
                    <h3>Add a review</h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                </div>
                <div class="comment-rating mb-20">
                    <span>Give yor rating</span>
                    <ul>
                        <li>
                            <a href="#" wire:click.prevent="rate({{ 1 }})">
                                <i class="fal fa-star"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" wire:click.prevent="rate({{ 2 }})">
                                <i class="fal fa-star"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" wire:click.prevent="rate({{ 3 }})">
                                <i class="fal fa-star"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" wire:click.prevent="rate({{ 4 }})">
                                <i class="fal fa-star"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" wire:click.prevent="rate({{ 5 }})">
                                <i class="fal fa-star"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="comment-input-box">
                    <form action="#">
                        <div class="row">
                            <div class="col-xxl-12">
                                <textarea placeholder="Your review" class="comment-input comment-textarea form-control @error('reviewText') is-invalid @enderror" wire:model="reviewText"></textarea>
                                @error('reviewText')
                                <span class="invalid-feedback mb-4">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xxl-12">
                                <div class="comment-submit">
                                    <button type="submit" class="cart-btn" wire:click.prevent="handleSubmitReview">Submit review</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script>
        window.addEventListener('pleaseLogin', () => {
            $('#loginModal').modal('show')
        });
    </script>
@endpush
