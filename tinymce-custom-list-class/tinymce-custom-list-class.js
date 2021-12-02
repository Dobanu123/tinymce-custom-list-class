(function () {
    tinymce.PluginManager.add('custom_list_class', function (editor, url) {

        editor.addButton('custom_list_class1', {
            title: 'Insert green checklist',
            image: url + '/icon2.png',
            cmd: 'custom_list_class1',
        });
        editor.addButton('custom_list_class', {
            title: 'Insert white checklist',
            image: url + '/icon1.png',
            cmd: 'custom_list_class',
        });

        editor.addCommand('custom_list_class1', function () {
            editor.execCommand('mceInsertContent', false, '<div class="checklist"> <ul><li> </li></ul> </div>');
        });

        editor.addCommand('custom_list_class', function () {
            editor.execCommand('mceInsertContent', false, '<div class="checklist checklist-color"><ul><li> </li></ul></div>');
        });

    });
})();

