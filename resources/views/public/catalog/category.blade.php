@extends('public/layouts/app')

@section('content')
    <div class="container main flex category-page-wrap">

        <div class="item-page category-page @if(USE_CATALOG == "N")full-flex-basis @endif">
            {{-- Breadcrumbs include --}}
            @include('public.partials.breadcrumbs')

            <main>
                <h1>{{$result['title']}}</h1>

                <div class="category-desk">{!! $result['full_content'] !!}</div>

                {{-- Properties include --}}
                @include('public.partials.properties')

                @if(!empty($result['children']))
                    <div class="category-child">
                        <h2>Подразделы</h2>
                        <div class="flex category-child-list category-list">
                            @foreach($result['children'] as $children)
                                <a class="list-item" href="{{route('item.showCatalogCategory', ['category_slug' => $children['slug']])}}">
                                    <div class="list-item-title">
                                        {{$children['title']}}
                                    </div>
                                    <div class="wrap-image-list flex">
                                        @if(isset($children['preview_img'][0]))
                                            <img class="list-item-img" src="{{$children['preview_img'][0]['MIDDLE']}}" alt="{{$children['title']}}" title="{{$children['title']}}"/>
                                        @endif
                                    </div>
                                    <span class="order-button">Перейти в раздел</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </main>

            <div class="clearfix"></div>

            @if(!empty($items) && USE_CATALOG == "Y")
                <h2>Товары</h2>

                {{-- Breadcrumbs include --}}
                @include('public.partials.sort')

                <div class="product-list flex">
                    @foreach($items as $item)
                        <a class="list-item" href="{{route('item.showProduct', ['category_slug' => $item['category']['slug'], 'item_slug' => $item['slug']])}}">
                            <div class="list-item-title">
                                {{$item['title']}}
                            </div>
                            <div class="wrap-image-list flex">
                                @if(isset($item['preview_img'][0]))
                                    <img class="list-item-img" src="{{$item['preview_img'][0]['MIDDLE']}}" alt="{{$item['title']}}" title="{{$item['title']}}"/>
                                @endif
                            </div>
                            <div class="price">Цена:
                                <span class="old-price">{{PRICE_OLD}}</span> / <span itemprop="price">{{PRICE_NEW}}</span>
                            </div>
                            <span class="order-button">Подробнее</span>
                        </a>
                    @endforeach
                </div>
            @endif

            <div class="pagination-wrap">
                <ul class="pagination">
                    {!!$itemsLink!!}
                </ul>
            </div>
        </div>

        @if(USE_CATALOG == "Y")
        <aside class="left-sidebar">
            @include('public.partials.smartfilter')
        </aside>
        @endif
    </div>

    <div id="blueimp-gallery-carousel" class="blueimp-gallery blueimp-gallery-carousel">
        <div class="slides"></div>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close" style="top: 40px; color: #fff;">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
@endsection
