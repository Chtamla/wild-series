<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    'app_index' => [[], ['_controller' => 'App\\Controller\\DefaultController::index'], [], [['text', '/']], [], []],
    'wild_show' => [['slug'], ['slug' => 'Aucune série sélectionnée, veuillez choisir une série', '_controller' => 'App\\Controller\\WildController::show'], ['slug' => '[a-z0-9-]+'], [['variable', '/', '[a-z0-9-]+', 'slug'], ['text', '/wild/show']], [], []],
    'wild_categories' => [[], ['_controller' => 'App\\Controller\\WildController::categories'], [], [['text', '/wild/categories']], [], []],
    'show_category' => [['categoryName'], ['categoryName' => '0', '_controller' => 'App\\Controller\\WildController::showByCategory'], ['categoryName' => '[a-z0-9-]+'], [['variable', '/', '[a-z0-9-]+', 'categoryName'], ['text', '/wild/category']], [], []],
    'wild_programs' => [[], ['_controller' => 'App\\Controller\\WildController::programs'], [], [['text', '/wild/programs']], [], []],
    'wild_program' => [['id'], ['_controller' => 'App\\Controller\\WildController::showByProgram'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/wild/program']], [], []],
    'wild_episodes' => [['id'], ['_controller' => 'App\\Controller\\WildController::episodes'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/wild/episodes']], [], []],
    'wild_episode' => [['id'], ['_controller' => 'App\\Controller\\WildController::episode'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/wild/episode']], [], []],
    'wild_index' => [[], ['_controller' => 'App\\Controller\\WildController::index'], [], [['text', '/wild/']], [], []],
];
