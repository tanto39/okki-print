@extends('public/layouts/app')

@section('content')
    <div class="container main">

        <div class="item-page product-detail" data-shop="{{$result['properties'][PROP_GROUP_NAME_ALL][PROP_SHOPLINK_ID]['value'] ?? ''}}" data-shop2="{{$result['properties'][PROP_GROUP_NAME_ALL][PROP_SHOPLINK2_ID]['value'] ?? $result['properties'][PROP_GROUP_NAME_ALL][PROP_SHOPLINK_ID]['value']}}" data-shop3="{{$result['properties'][PROP_GROUP_NAME_ALL][PROP_SHOPLINK3_ID]['value'] ?? 'https://okki.myprintbar.ru/futbolki/'}}" data-cat-id="{{$result['category']['parent_id'] ?? ''}}">
            {{-- Breadcrumbs include --}}
            @include('public.partials.breadcrumbs')
            <main itemscope itemtype="http://schema.org/Product">
                <h1 itemprop="name">{{$result['title']}}</h1>
                <div class="product">

                    <div class="product-wrap flex">
                        <div class="product-desc @if(empty($result['preview_img'])) full-flex-basis @endif">
                            <div class="top-product-block flex">
                                <div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">Цена:
                                    <span class="old-price">{{PRICE_OLD}}</span> / <span itemprop="price">{{PRICE_NEW}}</span>
                                    <span>руб.</span>
                                    <meta itemprop="priceCurrency" content="RUB">
                                </div>
                                <div class="order-box flex">
                                <button class="order-button callback_content age-default"><span>Подробнее о товаре</span></button>
                                <button class="order-button"><i class="glyphicon glyphicon-shopping-cart"></i><span>Купить</span></button>
                                </div>
                            </div>

                            {{-- Properties include --}}
                            @include('public.partials.properties')
							
							<button class="order-button category-out">Посмотреть еще товары на тему "{{$result['title']}}"</button>
                        </div>

                        {{--Include Slider--}}
                        @isset($result['preview_img'][0])
                            <div class="detail-image">
                                @include('public.partials.previewSlider')
                            </div>
                        @endisset
                    </div>

                    <p class="age-title">Посмотреть этот товар для:</p>
                    <div class="age-box flex">
                        <button class="order-button age-man">Мужчин</button>
                        <button class="order-button age-woman">Женщин</button>
                        <button class="order-button age-boy">Мальчиков</button>
                        <button class="order-button age-girl">Девочек</button>
                    </div>
                    <button class="order-button size-table">Таблица размеров</button>

                    <div class="product-adv flex"><i class="glyphicon glyphicon-thumbs-up"></i> <p>Качественная ткань - натуральный хлопок или дышащая и экологичная микрофибра! Сублимационная долговечная печать - краска заносится внутрь волокон навсегда.</p></div>
                    <div class="full_content" itemprop="description">{!! $result['full_content'] !!}</div>

                </div>
            </main>
            
            <div class="video">
                <h3>Видео с демонстрацией изделий и производства</h3>
                <iframe width="700" height="400" src="https://www.youtube.com/embed/MB20vEU3oy0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            {{-- Reviews include --}}
            @include('public.partials.reviews')

        </div>
    </div>

    <!-- Modal gallery -->
    <div id="blueimp-gallery-carousel" class="blueimp-gallery blueimp-gallery-carousel">
        <div class="slides"></div>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close" style="top: 40px; color: #fff;">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
@endsection
