<?php
$template = \App\Http\Controllers\Site\TemplateController::getInstance();
if($template->isInstance == 'N') $template->setTemplateVariables();
?>

@extends('public/layouts.app')

@section('content')
<aside class="section landing-section landing-section-color">
    <div class="container text-center">
        <div class="adv-wrap flex">
            <div class="adv-item">
                <div class="adv-img adv-img-1"></div>
                <p class="adv-title">Качественная ткань</p>
                <p class="adv-desc">Ткань из натурального хлопка или экологичной микрофибры</p>
            </div>
            <div class="adv-item">
                <div class="adv-img adv-img-2"></div>
                <p class="adv-title">Долговечные изображения</p>
                <p class="adv-desc">Сублимационная печать - краска заносится внутрь волокон навсегда</p>
            </div>
            <div class="adv-item">
                <div class="adv-img adv-img-3"></div>
                <p class="adv-title">Свой дизайн</p>
                <p class="adv-desc">Возможность создать макет со своим изображением</p>
            </div>
        </div>
    </div>
</aside>
<main class="landing-section" itemscope="" itemtype="https://schema.org/Article">
    <div class="container" itemprop="articleBody">
        <h1 itemprop="headline">{{$result['title']}}</h1>
        @if(!empty($result['preview_img']))
            <img class="image-left" src="{{$result['preview_img'][0]['MIDDLE']}}" alt="{{$result['title']}}" title="{{$result['title']}}" />
        @endif
        {!! $result['full_content'] !!}
    </div>
</main>
<section class="section landing-section landing-section-color">
    <div class="container catalog-categories">
        <h2>Каталог одежды</h2>
        <div class="flex category-list">
            @foreach($categories as $category)
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
        <a href="/catalog/futbolki" class="order-button order-button-link">Перейти в каталог</a>
    </div>
</section>

<section class="landing-section">
    <div class="container video">
        <h3>Видео с демонстрацией изделий и производства</h3>
        <iframe width="700" height="400" src="https://www.youtube.com/embed/MB20vEU3oy0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<div class="alert alert-info">
		<p>Информация, представленная на сайте, может быть неактуальна и не является публичной офертой. Для просмотра точных характеристик и цены перейдите в карточку товара в интернет-магазине, нажав на кнопку "Подробнее".</p>
		</div>
	</div>
</section>

@endsection
