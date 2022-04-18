<div class="product-widget mb-30">
    <h5 class="pt-title">Filter By Price</h5>
    <div class="price__slider mt-30">
        <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" wire:ignore>
            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0"
                class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                style="left: 100%;"></span>
        </div>
        <div>
            <form action="#" class="s-form mt-20">
                <input type="text" id="amount">
                <button type="submit" class="tp-btn-square-lg" wire:click.prevent="filterPrice">Filter</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', () => {
            $("#slider-range").slider({
                range: true,
                min: 1000,
                max: 10000,
                values: [1000, 10000],
                slide:  (event, ui) => {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                    @this.
                    set('min', ui.values[0])
                    @this.set('max', ui.values[1])
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
        });
    </script>
@endpush
