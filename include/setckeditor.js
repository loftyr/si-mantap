function setckEditor(e, lebar, tinggi) {
    CKEDITOR.replace(e, {
        // Define the toolbar: https://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_toolbar
        // The full preset from CDN which we used as a base provides more features than we need.
        // Also by default it comes with a 3-line toolbar. Here we put all buttons in two rows.
        toolbar: [
            { name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates'] },
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
            { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
            { name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'] },
            '/',
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language'] },
            { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
            { name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
            '/',
            { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize', 'ShowBlocks'] },
            { name: 'about', items: ['About'] }
        ],

        // Since we define all configuration options here, let's instruct CKEditor to not load config.js which it does by default.
        // One HTTP request less will result in a faster startup time.
        // For more information check https://docs.ckeditor.com/ckeditor4/docs/#!/api/CKEDITOR.config-cfg-customConfig
        customConfig: '',

        // config.filebrowserBrowseUrl = base_url + 'app/app-assets/vendor/kcfinder/browse.php?type=files';
        // config.filebrowserImageBrowseUrl = base_url + 'app/app-assets/vendor/kcfinder/browse.php?type=images';
        // config.filebrowserFlashBrowseUrl = base_url + 'app/app-assets/vendor/kcfinder/browse.php?type=flash';
        // config.filebrowserUploadUrl = base_url + 'app/app-assets/vendor/kcfinder/upload.php?type=files';
        // config.filebrowserImageUploadUrl = base_url + 'app/app-assets/vendor/kcfinder/upload.php?type=images';
        // config.filebrowserFlashUploadUrl = base_url + 'app/app-assets/vendor/kcfinder/upload.php?type=flash';

        // Upload images to a CKFinder connector (note that the response type is set to JSON).
        uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

        // Configure your file manager integration. This example uses CKFinder 3 for PHP.
        // filebrowserBrowseUrl: '../app/app-assets/vendor/kcfinder/browse.php?type=files',
        // filebrowserImageBrowseUrl: '../app/app-assets/vendor/kcfinder/browse.php?type=images',
        // filebrowserUploadUrl: '../app/app-assets/vendor/kcfinder/upload.php?type=files',
        // filebrowserImageUploadUrl: '../app/app-assets/vendor/kcfinder/upload.php?type=images',
        filebrowserBrowseUrl: '../include/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '../include/ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: '../include/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '../include/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

        // Sometimes applications that convert HTML to PDF prefer setting image width through attributes instead of CSS styles.
        // For more information check:
        //  - About Advanced Content Filter: https://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_advanced_content_filter
        //  - About Disallowed Content: https://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_disallowed_content
        //  - About Allowed Content: https://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_allowed_content_rules
        disallowedContent: 'img{width,height,float}',
        extraAllowedContent: 'img[width,height,align];span{background}',

        // Enabling extra plugins, available in the full-all preset: https://ckeditor.com/cke4/presets
        extraPlugins: 'colorbutton,font,justify,print,uploadimage,uploadfile,liststyle',
        //pastefromword

        /*********************** File management support ***********************/
        // In order to turn on support for file uploads, CKEditor has to be configured to use some server side
        // solution with file upload/management capabilities, like for example CKFinder.
        // For more information see https://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_ckfinder_integration

        // Uncomment and correct these lines after you setup your local CKFinder instance.
        // filebrowserBrowseUrl: 'http://example.com/ckfinder/ckfinder.html',
        // filebrowserUploadUrl: 'http://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        /*********************** File management support ***********************/

        // Make the editing area bigger than default.
        //                                     height: 170,
        //                                     width: 840,
        height: tinggi,
        width: lebar,

        // An array of stylesheets to style the WYSIWYG area.
        // Note: it is recommended to keep your own styles in a separate file in order to make future updates painless.
        contentsCss: [CKEDITOR.basePath + 'contents.css'],
        // , CKEDITOR.basePath + 'pastefromword.css'

        // This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
        bodyClass: 'document-editor',

        // Reduce the list of block elements listed in the Format dropdown to the most commonly used.
        format_tags: 'p;h1;h2;h3;pre',

        // Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
        removeDialogTabs: 'image:advanced;link:advanced',

        // Define the list of styles which should be available in the Styles dropdown list.
        // If the "class" attribute is used to style an element, make sure to define the style for the class in "mystyles.css"
        // (and on your website so that it rendered in the same way).
        // Note: by default CKEditor looks for styles.js file. Defining stylesSet inline (as below) stops CKEditor from loading
        // that file, which means one HTTP request less (and a faster startup).
        // For more information see https://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_styles
        stylesSet: [
            /* Inline Styles */
            { name: 'Marker', element: 'span', attributes: { 'class': 'marker' } },
            { name: 'Cited Work', element: 'cite' },
            { name: 'Inline Quotation', element: 'q' },

            /* Object Styles */
            {
                name: 'Special Container',
                element: 'div',
                styles: {
                    padding: '5px 10px',
                    background: '#eee',
                    border: '1px solid #ccc'
                }
            },
            {
                name: 'Compact table',
                element: 'table',
                attributes: {
                    cellpadding: '5',
                    cellspacing: '0',
                    border: '1',
                    bordercolor: '#ccc'
                },
                styles: {
                    'border-collapse': 'collapse'
                }
            },
            { name: 'Borderless Table', element: 'table', styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
            { name: 'Square Bulleted List', element: 'ul', styles: { 'list-style-type': 'square' } },
        ]
    });
}