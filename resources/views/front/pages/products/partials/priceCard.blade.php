<div class="{{ $first? 'mb-12 py-6 md:-mt-8 md:py-10 md:z-10' : 'mb-8 py-6' }} md:mb-0 md:mx-2 max-w-md flex flex-col bg-white shadow-lg px-8" 
    style="bottom: {{ $first? '-2rem' : '-1rem' }}">
    <h2 class="flex-0 flex items-center font-bold {{ $first? 'text-2xl' : 'text-lg'}} mb-4 min-h-10">
        {{ $purchasable->title }}
    </h2>
    
    <div class="flex-grow markup markup-lists markup-lists-compact text-xs">
        {!! $purchasable->formattedDescription !!}
    </div>

    @if ($product->hasActiveCoupon())
        <div class="mt-4 text-gray-500 text-xs">
            Use <code class="px-1 bg-gray-lightest">{{ $product->coupon_code }}</code> during checkout to get {{ $product->coupon_percentage }}% off
        </div>
    @endif


    <div class="flex-0 mt-6 flex justify-center">
        <span data-id="original-display-{{ $purchasable->id }}" class="hidden">
            <sup class="text-gray-500 text-xs" data-id="original-currency-{{ $purchasable->id }}"></sup><span
                class="text-gray-500 line-through" data-id="original-price-{{ $purchasable->id }}">—</span>
        </span>
        @auth
            <x-paddle-button :url="auth()->user()->getPayLinkForProductId($purchasable->paddle_product_id)" data-theme="none">
                <x-button>
                    <span class="font-normal">Buy for&nbsp;</span>
                    <span data-id="current-currency-{{ $purchasable->id }}"></span>
                    <span data-id="current-price-{{ $purchasable->id }}"></span>
                </x-button>
            </x-paddle-button>
        @else
            <a href="{{ route('login') }}?next={{ url()->current() }}">
                <x-button>
                    <span class="font-normal">Buy for&nbsp;</span>
                    <span data-id="current-currency-{{ $purchasable->id }}"></span>
                    <span data-id="current-price-{{ $purchasable->id }}"></span>
                </x-button>
            </a>
        @endauth
    </div>
</div>

<script type="text/javascript">
    function indexOfFirstDigitInString(string) {
        let firstDigit = string.match(/\d/);

        return string.indexOf(firstDigit);
    }

    function displayPaddleProductPrice(productId) {
        Paddle.Product.Prices(productId, function(prices) {
            let priceString = prices.price.net;

            let factor = {{ $product->hasActiveCoupon() ? (100 - $product->coupon_percentage)/100 : 1 }};

            let indexOFirstDigitInString = indexOfFirstDigitInString(priceString);

            let price = priceString.substring(indexOFirstDigitInString);
            price = price.replace('.00', '').replace(/,/g, '');

            let currencySymbol = priceString.substring(0, indexOFirstDigitInString);
            currencySymbol = currencySymbol.replace('US', '');

            document.querySelector(`[data-id="original-currency-${productId}"]`).innerHTML = currencySymbol;
            document.querySelector(`[data-id="original-price-${productId}"]`).innerHTML = price;

            document.querySelector(`[data-id="current-currency-${productId}"]`).innerHTML = currencySymbol;
            document.querySelector(`[data-id="current-price-${productId}"]`).innerHTML = Math.ceil(price * factor);
            
            if(factor < 1) {
                document.querySelector(`[data-id="original-display-${productId}"]`).classList.remove('hidden');
            }
        });
    }

    displayPaddleProductPrice({{ $purchasable->id }});

</script>
