<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_locale' => 'en', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/(en|fr)(?'
                    .'|/(?'
                        .'|switch/([^/]++)(*:199)'
                        .'|home(*:211)'
                        .'|proje(?'
                            .'|ts(*:229)'
                            .'|cts(*:240)'
                        .')'
                        .'|experiences(?'
                            .'|(*:263)'
                        .')'
                        .'|cv(*:274)'
                        .'|resume(*:288)'
                    .')'
                    .'|(*:297)'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        199 => [[['_route' => 'switch_language', '_controller' => 'App\\Controller\\LocaleSwitchController::switchLanguage', '_locale' => 'fr'], ['_locale', 'locale'], null, null, false, true, null]],
        211 => [[['_route' => 'homepage', '_controller' => 'App\\Controller\\MainController::index', '_locale' => 'fr'], ['_locale'], null, null, false, false, null]],
        229 => [[['_route' => 'projets', '_controller' => 'App\\Controller\\MainController::projet', '_locale' => 'fr'], ['_locale'], null, null, false, false, null]],
        240 => [[['_route' => 'projets', '_controller' => 'App\\Controller\\MainController::projet', '_locale' => 'fr'], ['_locale'], null, null, false, false, null]],
        263 => [
            [['_route' => 'exp', '_controller' => 'App\\Controller\\MainController::experiences', '_locale' => 'fr'], ['_locale'], null, null, false, false, null],
            [['_route' => 'exp', '_controller' => 'App\\Controller\\MainController::experiences', '_locale' => 'fr'], ['_locale'], null, null, false, false, null],
        ],
        274 => [[['_route' => 'cv', '_controller' => 'App\\Controller\\MainController::cv', '_locale' => 'fr'], ['_locale'], null, null, false, false, null]],
        288 => [[['_route' => 'cv', '_controller' => 'App\\Controller\\MainController::cv', '_locale' => 'fr'], ['_locale'], null, null, false, false, null]],
        297 => [
            [['_route' => 'homepage', '_controller' => 'App\\Controller\\MainController::index', '_locale' => 'fr'], ['_locale'], null, null, true, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
