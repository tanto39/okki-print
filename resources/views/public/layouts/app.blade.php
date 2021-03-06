<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta content="telephone=no" name="format-detection">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{$result['meta_key'] ?? META_KEY}}" />
    <meta name="description" content="{{$result['meta_desc'] ?? META_DESC}}" />
    <meta name="google-site-verification" content="h1Nzrxm5CGSR4luApIdMkt_WlU9j8p9wS3L6QSFUNYg" />
    <meta name="yandex-verification" content="04db446b542740a7" />

    <title>{{$result['description'] ?? META_TITLE}}</title>

    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165930777-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-165930777-1');
    </script>

</head>
<body>
<div class="wrapper">

    <header class="header" id="header">

        <div class="container flex center-header">
@if ($template->uri != "/")<a class="logo" href="/"><img src="/images/logo.jpg" alt="OKKI" title="OKKI"/></a>
@else
<a class="logo" href="#"><img src="/images/logo.jpg" alt="OKKI" title="OKKI"/></a>
@endif
<nav class="header-center flex">
    @if ($template->uri != "dostavka") <a href="/dostavka">Доставка и оплата</a> @else <a href="#">Доставка и оплата</a> @endif
    @if ($template->uri != "obmen") <a href="/obmen">Обмен и возврат</a> @else <a href="#">Обмен и возврат</a> @endif
    @if ($template->uri != "faq") <a href="/faq">FAQ</a> @else <a href="#">FAQ</a> @endif
</nav>

            <!-- Include search -->
            @component('public.components.search')
            @endcomponent

        </div>
    </header><!-- .header-->

    <div class="info-wrap">
        <div class="container flex center-header">
            <nav class="navbar navbar-default topmenu">
                <!-- Include menu -->
                @component('public.components.menu')
                    @slot('menuSlug') main @endslot
                @endcomponent
            </nav>

            <div class="header-center">
                <div class="top-info">Телефон для партнеров (08:00 - 22:00): <div>{{$template->contacts['phone']}}</div></div>
            </div>
            <div class="info-right">
                <button class="callback">Свой дизайн</button>
            </div>

        </div>
        <!-- Authentication Links -->
            {{--@include('public.partials.loginlinks')--}}

    </div>
    <!-- Include massage -->
    @include('public.partials.msg')

    <!-- Include content -->
    @yield('content')

    <div class="landing-section landing-adv">
        <div class="container flex adv-body">
            <div class="flex">
                <img src="/images/portfel.svg" alt="Простой возврат" title="Простой возврат">
                <div class="adv-body-text">Простой возврат и обмен в течение недели</div>
            </div>
            <div class="flex">
                <img src="/images/track.svg" alt="Быстрая доставка" title="Быстрая доставка">
                <div class="adv-body-text">Быстрая доставка по России и СНГ</div>
            </div>
            <div class="flex">
                <img src="/images/48-hour.svg" alt="Производство" title="Производство">
                <div class="adv-body-text">Производство изделия 48 часов</div>
            </div>
        </div>
    </div>

    <footer class="footer" id="footer">
        <div class="container">
            <div class="contact flex" itemscope itemtype="http://schema.org/LocalBusiness" >
                <div class="footer-block">
                    <div class="fn org" itemprop="name"><span class="category">Магазин </span>{{COMPANY}}</div>
                    <div class="tel" itemprop="telephone">{{$template->contacts['phone']}}</div>
                    <div itemprop="address">{{$template->contacts['address']}}</div>
                    <div class="email" itemprop="email">{{$template->contacts['mail']}}</div>
                    <div>Все права защищены</div>
                </div>
                <div class="footer-block text-right flex">
                    <button class="callback" data-target="#modal-callback" data-toggle="modal">Задать вопрос</button>
                    <a class="callback" href="https://zen.yandex.ru/id/5f4803e9c29b7217478183e7" target="_blank">Мы в Яндекс.Дзен</a>
                    <div>Время работы: <span class="workhours" itemprop="openingHours">Все дни недели 08:00 - 22:00</span></div>
                    <div class="metrica"><a href="https://metrika.yandex.ru/stat/?id=57437746&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/57437746/3_1_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="57437746" data-lang="ru" /></a><script> (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(57437746, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/57437746" style="position:absolute; left:-9999px;" alt="" /></div></noscript></div>
                </div>
            </div>
        </div>
    </footer>

    <!--кнопки соцсетей-->
    <div class="socbuttons" id="socbuttons">
        <script defer src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
        <script defer src="//yastatic.net/share2/share.js"></script>
        <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter"></div>
    </div>

    <div class="scroll hidden-xs"><i class="glyphicon glyphicon glyphicon-chevron-up" aria-hidden="true"></i></div>

    <!-- Callback form -->
    <div id="modal-callback" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
                    <span class="modal-title">Отправить сообщение</span>
                </div>
                <div class="modal-body">
                    <div class="form-zakaz">
                        <form method="post">
                            <input class="form-name form-control" type="text" placeholder="Введите имя" required name="name" size="16" />
                            <input class="form-phone form-control" type="tel" placeholder="8**********" required pattern="(\+?\d[- .]*){7,13}" title="Международный, государственный или местный телефонный номер" name="phone" size="16" />
                            <input class="form-mail form-control" type="email" placeholder="email@email" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" name="email" size="16" />
                            <textarea name="mess" class="form-massage" cols="23" rows="8"></textarea>
                            <div class="form-input form-pd"><label>Даю согласие на обработку <a href="#" target="_blank" rel="noopener noreferrer">персональных данных</a>:</label><input class="checkbox-inline" type="checkbox" required="" name="pd" /></div>
                            <label>Защита от спама: введите сумму 2+2:</label><input class="form-control" id="form-capcha" type="number" required name="capcha"/>
                            <input class="btn form-submit order-button" type="submit" name="submit" value="Отправить сообщение" />
                        </form>
                        <div class='message-form alert alert-success'><p>Загрузка...</p></div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button></div>
            </div>
        </div>
    </div>
    <!-- Callback form -->
</div>

</body>
</html>
