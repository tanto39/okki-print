@extends('public/layouts/app')

@section('content')
    <div class="container main">

        <div class="item-page product-detail">
            {{-- Breadcrumbs include --}}
            @include('public.partials.breadcrumbs')
            <main itemscope itemtype="http://schema.org/Product">
                <h1 itemprop="name">{{$result['title']." ".$template->contacts['companyWhere']}}</h1>
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
                                <button class="order-button callback_content" onclick="enterShop.openShop('{{$result['properties'][PROP_GROUP_NAME_ALL][PROP_SHOPLINK_ID]['value']}}')"><span>Подробнее о товаре</span></button>
                                <button class="order-button" onclick="enterShop.openShop('{{$result['properties'][PROP_GROUP_NAME_ALL][PROP_SHOPLINK_ID]['value']}}')"><i class="glyphicon glyphicon-shopping-cart"></i><span>Купить</span></button>
                                </div>
                            </div>

                            {{-- Properties include --}}
                            @include('public.partials.properties')
                        </div>

                        {{--Include Slider--}}
                        @isset($result['preview_img'][0])
                            <div class="detail-image">
                                @include('public.partials.previewSlider')
                            </div>
                        @endisset
                    </div>

                    <div class="product-adv flex"><i class="glyphicon glyphicon-thumbs-up"></i> <p>Все размеры для мужчин, женщин, мальчиков, девочек! Качественная ткань - натуральный хлопок или дышащая и экологичная микрофибра. Сублимационная долговечная печать - краска заносится внутрь волокон навсегда.</p></div>
                    <div class="full_content" itemprop="description">{!! $result['full_content'] !!}</div>

                </div>
            </main>

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
