(function() {
    tinymce.create('tinymce.plugins.buttons', {
        init : function(ed, url) {
            ed.addButton('buttons', {
                title : 'Add a Button',
                image : url+'/button.png',
                onclick : function() {
                     ed.selection.setContent('[button type="" size="" url=""]' + ed.selection.getContent() + '[/button]');

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('buttons', tinymce.plugins.buttons);
})();

(function() {
    tinymce.create('tinymce.plugins.labels', {
        init : function(ed, url) {
            ed.addButton('labels', {
                title : 'Add a Label',
                image : url+'/label.png',
                onclick : function() {
                     ed.selection.setContent('[label type=""]' + ed.selection.getContent() + '[/label]');

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('labels', tinymce.plugins.labels);
})();

(function() {
    tinymce.create('tinymce.plugins.badges', {
        init : function(ed, url) {
            ed.addButton('badges', {
                title : 'Add a Badge',
                image : url+'/button.png',
                onclick : function() {
                     ed.selection.setContent('[badge type=""]' + ed.selection.getContent() + '[/badge]');

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('badges', tinymce.plugins.badges);
})();

(function() {
    tinymce.create('tinymce.plugins.alerts', {
        init : function(ed, url) {
            ed.addButton('alerts', {
                title : 'Add a Alert',
                image : url+'/alert.png',
                onclick : function() {
                     ed.selection.setContent('[alert type="" heading=""]' + ed.selection.getContent() + '[/alert]');

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('alerts', tinymce.plugins.alerts);
})();