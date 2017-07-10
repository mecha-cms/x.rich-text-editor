<?php

Hook::set('panel.js', function($__content) {
    $__id = Path::B(__DIR__);
    $__state = Config::get('page.editor', "");
    if ($__state === $__id) {
        $__s = Extend::state(__DIR__, 'RTE');
        return $__content . '!function($){$.RTE=' . json_encode($__s) . '}(window.PANEL);';
    }
    return $__content;
});

Hook::set('on.panel.ready', function() {
    $__id = Path::B(__DIR__);
    $__state = Config::get('page.editor', "");
    if ($__state === $__id) {
        Asset::set(__DIR__ . DS . 'lot' . DS . 'asset' . DS . 'css' . DS . 'r-t-e.min.css', 20);
        if ($__s = Extend::state('panel', 'shield')) {
            Asset::set(__DIR__ . DS . 'lot' . DS . 'asset' . DS . 'css' . DS . 'r-t-e' . DS . $__s . '.min.css', 20.1);
        }
        Asset::set(__DIR__ . DS . 'lot' . DS . 'asset' . DS . 'js' . DS . 'r-t-e.min.js', 20);
        Asset::set(__DIR__ . DS . 'lot' . DS . 'asset' . DS . 'js' . DS . 'r-t-e.fire.min.js', 20.1);
    }
});