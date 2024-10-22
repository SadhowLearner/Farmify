<x-app-layout>
    <div class="tw-grid tw-grid-cols-12 tw-gap-4">
        <section
            class="tw-grid tw-col-span-8 lg:tw-grid-cols-3 md:tw-grid-cols-2 sm:tw-grid-cols-1 tw-gap-4 tw-pb-3">
            @foreach ($products as $product) 
            <div x-data="{ open: false }"
                class="tw-card tw-card-compact tw-bg-base-100 tw-max-h-72 tw-shadow-xl">
                <figure>
                    <img x-on:click="open = !open" x-on:mouseleave="open = false" class="tw-size-48 tw-cursor-pointer tw-object-cover tw-object-center tw-mt-3 tw-rounded-2xl"
                        src="assets/{{ $product['img'] }}" alt="{{ $product['name'] }}" />
                </figure>
                <div class="tw-card-body tw-w-100 tw-items-center tw-flex tw-flex-row tw-justify-between">
                    <h2 class="tw-card-title  tw-font-poppins">{{ $product['name'] }}</h2>
                    <p class=" tw-text-end tw-text-bold tw-font-sans tw-pt-3">Rp. {{ $product['price'] }}</p>
                </div>
                <div x-show="open" class="tw-card-body">
                    <h5 class="tw-mb-3 tw-font-medium">Stock : <span class="tw-ms-2  tw-outline tw-outline-1 tw-outline-success tw-p-3 tw-rounded-md">{{ $product['stock'] }}</span></h5>
                    <p class="tw-overflow-y-auto">{{ $product['desc'] }}</p>
                </div>
            </div>
            @endforeach 
        </section>
    
        <aside class="tw-flex tw-col-span-4 tw-flex-col tw-bg-blue-gray-50 tw-h-full tw-bg-white tw-pr-4 tw-pl-2 tw-py-4">
            <div class="tw-bg-white tw-rounded-3xl tw-flex tw-flex-col tw-h-full tw-shadow">
                <!-- empty cart -->
                <div x-show="cart.length === 0"
                    class="tw-flex-1 tw-w-full tw-p-4 tw-opacity-25 tw-select-none tw-flex tw-flex-col tw-flex-wrap tw-content-center tw-justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-16 tw-inline-block" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <p>CART EMPTY</p>
                </div>
    
                <!-- cart items -->
                <div x-show="cart.length > 0" class="tw-flex-1 tw-flex tw-flex-col tw-overflow-auto" style="display: none;">
                    <div class="tw-h-16 tw-text-center tw-flex tw-justify-center">
                        <div class="tw-pl-8 tw-text-left tw-text-lg tw-py-4 tw-relative">
                            <!-- cart icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-inline-block" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <div x-show="getItemsCount() > 0"
                                class="tw-text-center tw-absolute tw-bg-cyan-500 tw-text-white tw-w-5 tw-h-5 tw-text-xs tw-p-0 tw-leading-5 tw-rounded-full -right-2 top-3"
                                x-text="getItemsCount()" style="display: none;">0</div>
                        </div>
                        <div class="tw-flex-grow tw-px-8 tw-text-right tw-text-lg tw-py-4 tw-relative">
                            <!-- trash button -->
                            <button x-on:click="clear()"
                                class="tw-text-blue-gray-300 hover:tw-text-pink-500 focus:tw-outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6 tw-inline-block" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
    
                    <div class="tw-flex-1 tw-w-full tw-px-4 tw-overflow-auto">
                        <template x-for="item in cart" :key="item.productId">
                            <div
                                class="tw-select-none tw-mb-3 tw-bg-blue-gray-50 tw-rounded-lg tw-w-full tw-text-blue-gray-700 tw-py-2 tw-px-2 tw-flex tw-justify-center">
                                <img :src="item.image" alt=""
                                    class="tw-rounded-lg tw-h-10 tw-w-10 tw-bg-white tw-shadow tw-mr-2">
                                <div class="tw-flex-grow">
                                    <h5 class="tw-text-sm" x-text="item.name"></h5>
                                    <p class="tw-text-xs tw-block" x-text="priceFormat(item.price)"></p>
                                </div>
                                <div class="tw-py-1">
                                    <div class="tw-w-28 tw-grid tw-grid-cols-3 tw-gap-2 tw-ml-2">
                                        <button x-on:click="addQty(item, -1)"
                                            class="tw-rounded-lg tw-text-center tw-py-1 tw-text-white tw-bg-blue-gray-600 hover:tw-bg-blue-gray-700 focus:tw-outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-3 tw-inline-block"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        <input x-model.number="item.qty" type="text"
                                            class="tw-bg-white tw-rounded-lg tw-text-center tw-shadow focus:tw-outline-none focus:tw-shadow-lg tw-text-sm">
                                        <button x-on:click="addQty(item, 1)"
                                            class="tw-rounded-lg tw-text-center tw-py-1 tw-text-white tw-bg-blue-gray-600 hover:tw-bg-blue-gray-700 focus:tw-outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-3 tw-inline-block"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <!-- end of cart items -->
    
                <!-- payment info -->
                <div class="tw-select-none tw-h-auto tw-w-full tw-text-center tw-pt-3 tw-pb-4 tw-px-4">
                    <div class="tw-flex tw-mb-3 tw-text-lg tw-font-semibold tw-text-blue-gray-700">
                        <div>TOTAL</div>
                        <div class="tw-text-right tw-w-full" x-text="priceFormat(getTotalPrice())">Rp. 0</div>
                    </div>
                    <div class="tw-mb-3 tw-text-blue-gray-700 tw-px-3 tw-pt-2 tw-pb-3 tw-rounded-lg tw-bg-blue-gray-50">
                        <div class="tw-flex tw-text-lg tw-font-semibold">
                            <div class="tw-flex-grow tw-text-left">CASH</div>
                            <div class="tw-flex tw-text-right">
                                <div class="tw-mr-2">Rp</div>
                                <input x-bind:value="numberFormat(cash)" x-on:keyup="updateCash($event.target.value)"
                                    type="text"
                                    class="tw-w-28 tw-text-right tw-bg-white tw-shadow tw-rounded-lg focus:tw-bg-white focus:tw-shadow-lg tw-px-2 focus:tw-outline-none"
                                    spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                        <hr class="tw-my-2">
                        <div class="tw-grid tw-grid-cols-3 tw-gap-2 tw-mt-2">
                            <template x-for="money in moneys">
                                <button x-on:click="addCash(money)"
                                    class="tw-bg-white tw-rounded-lg tw-shadow hover:tw-shadow-lg focus:tw-outline-none tw-inline-block tw-px-2 tw-py-1 tw-text-sm">+<span
                                        x-text="numberFormat(money)"></span></button>
                            </template>
    
                            <button x-on:click="addCash(2000)"
                                class="tw-bg-white tw-rounded-lg tw-shadow hover:tw-shadow-lg focus:tw-outline-none tw-inline-block tw-px-2 tw-py-1 tw-text-sm">+<span
                                    x-text="numberFormat(2000)">2.000</span></button>
                            <button x-on:click="addCash(5000)"
                                class="tw-bg-white tw-rounded-lg tw-shadow hover:tw-shadow-lg focus:tw-outline-none tw-inline-block tw-px-2 tw-py-1 tw-text-sm">+<span
                                    x-text="numberFormat(5000)">5.000</span></button>
                            <button x-on:click="addCash(10000)"
                                class="tw-bg-white tw-rounded-lg tw-shadow hover:tw-shadow-lg focus:tw-outline-none tw-inline-block tw-px-2 tw-py-1 tw-text-sm">+<span
                                    x-text="numberFormat(10000)">10.000</span></button>
                            <button x-on:click="addCash(20000)"
                                class="tw-bg-white tw-rounded-lg tw-shadow hover:tw-shadow-lg focus:tw-outline-none tw-inline-block tw-px-2 tw-py-1 tw-text-sm">+<span
                                    x-text="numberFormat(20000)">20.000</span></button>
                            <button x-on:click="addCash(50000)"
                                class="tw-bg-white tw-rounded-lg tw-shadow hover:tw-shadow-lg focus:tw-outline-none tw-inline-block tw-px-2 tw-py-1 tw-text-sm">+<span
                                    x-text="numberFormat(50000)">50.000</span></button>
                            <button x-on:click="addCash(100000)"
                                class="tw-bg-white tw-rounded-lg tw-shadow hover:tw-shadow-lg focus:tw-outline-none tw-inline-block tw-px-2 tw-py-1 tw-text-sm">+<span
                                    x-text="numberFormat(100000)">100.000</span></button>
                        </div>
                    </div>
                    <div x-show="change > 0"
                        class="tw-flex tw-mb-3 tw-text-lg tw-font-semibold tw-bg-cyan-50 tw-text-blue-gray-700 tw-rounded-lg tw-py-2 tw-px-3"
                        style="display: none;">
                        <div class="tw-text-cyan-800">CHANGE</div>
                        <div class="tw-text-right tw-flex-grow tw-text-cyan-600" x-text="priceFormat(change)">Rp. 0</div>
                    </div>
                    <div x-show="change < 0"
                        class="tw-flex tw-mb-3 tw-text-lg tw-font-semibold tw-bg-pink-100 tw-text-blue-gray-700 tw-rounded-lg tw-py-2 tw-px-3"
                        style="display: none;">
                        <div class="tw-text-right tw-flex-grow tw-text-pink-600" x-text="priceFormat(change)">Rp. 0</div>
                    </div>
                    <div x-show="change == 0 && cart.length > 0"
                        class="tw-flex tw-justify-center tw-mb-3 tw-text-lg tw-font-semibold tw-bg-cyan-50 tw-text-cyan-700 tw-rounded-lg tw-py-2 tw-px-3"
                        style="display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-6 tw-w-6 tw-inline-block" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                            </path>
                        </svg>
                    </div>
                    <button
                        class="tw-text-white tw-rounded-2xl tw-text-lg tw-w-full tw-py-3 focus:tw-outline-none tw-bg-blue-gray-200"
                        x-bind:class="{
                            'tw-bg-cyan-500 hover:tw-bg-cyan-600': submitable(),
                            'tw-bg-blue-gray-200': !submitable()
                        }"
                        :disabled="!submitable()" x-on:click="submit()" disabled="disabled">
                        SUBMIT
                    </button>
                </div>
                <!-- end of payment info -->
            </div>
        </aside>
    </div>
</x-app-layout>
