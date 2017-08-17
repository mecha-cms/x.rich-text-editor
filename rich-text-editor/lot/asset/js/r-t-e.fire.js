(function($) {
    if (!$) return;
    var form = $.__form__,
        lot = form.$,
        config = $config.RTE || {},
        CM = form.CM || {},
        i, j, k, l;
    for (i in CM) {
        for (j in CM[i]) {
            k = CM[i][j];
            if (!k.getTextArea) continue;
            l = k.getTextArea();
            if (l.nodeName.toLowerCase() === 'textarea' && l.classList.contains('editor') && l.getAttribute('data-type') === 'HTML') {
                k.toTextArea(); // destroy `CodeMirror`
            }
        }
    }
    form.RTE = {};
    for (i in lot) {
        form.RTE[i] = {};
        for (j in lot[i]) {
            k = lot[i][j];
            if (k.nodeName.toLowerCase() === 'textarea' && k.classList.contains('editor') && k.getAttribute('data-type') === 'HTML') {
                form.RTE[i][j] = new RTE(k, config);
            }
        }
    }
})(window.PANEL);