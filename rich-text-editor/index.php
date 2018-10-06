<?php

Hook::set('panel.js', function($__content) {
    $__id = Path::B(__DIR__);
    $__state = Config::get('page.editor', "");
    if ($__state === $__id) {
        $__s = Extend::state($__id, 'RTE');
        return $__content . '!function($){$.RTE=' . json_encode($__s) . '}(window.PANEL);';
    }
    return $__content;
});

Hook::set('on.ready', function() {
    $__id = Path::B(__DIR__);
    $__state = Config::get('page.editor', "");
    if ($__state === $__id) {
        Asset::set(__DIR__ . DS . 'lot' . DS . 'asset' . DS . 'css' . DS . 'rich-text-editor.min.css', 20);
        Asset::set(__DIR__ . DS . 'lot' . DS . 'asset' . DS . 'js' . DS . 'rich-text-editor.min.js', 20);
    }
}, 40);