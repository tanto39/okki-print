@extends('public/layouts/app')

@section('content')
    <div class="container main">

        <div class="item-page">
            {{-- Breadcrumbs include --}}
            @include('public.partials.breadcrumbs')

            <main class="catalog-categories">
                <h1>{{$result['title']}}</h1>
                <div class="categories-description">{!! $result['full_content'] ?? "" !!}</div>
                <h2>Разделы каталога</h2>
                @isset($result['children'])
                    <div class="flex category-list">
                        @foreach($result['children'] as $category)
                            <a class="list-item" href="{{route('item.showCatalogCategory', ['category_slug' => $category['slug']])}}">
                                <div class="list-item-title">
                                    {{$category['title']}}
                                </div>
                                <div class="wrap-image-list flex">
                                    @if(isset($category['preview_img'][0]))
                                        <img class="list-item-img" src="{{$category['preview_img'][0]['MIDDLE']}}" alt="{{$category['title']}}" title="{{$category['title']}}"/>
                                    @endif
                                </div>
                                <span class="order-button">Перейти в раздел</span>
                            </a>
                        @endforeach
                    </div>
                @endisset
            </main>

            @if(!empty($items) && USE_CATALOG == "Y")
                <h2>Товары</h2>

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
                                <span class="old-price">{{PRICE_OLD}}</span> / <span>{{PRICE_NEW}}</span>
                            </div>
                            <span class="order-button">Подробнее</span>
                        </a>
                    @endforeach
                </div>
            @endif

            <div class="pagination-wrap">
                {!!$itemsLink!!}
            </div>

        </div>
    </div>
    
    <section class="landing-section">
    <div class="container video">
        <h3>Видео с демонстрацией изделий и производства</h3>
        <iframe width="700" height="400" src="https://www.youtube.com/embed/MB20vEU3oy0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>
@endsection
