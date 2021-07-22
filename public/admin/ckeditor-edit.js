"use strict";


function initEditor(selector) {

    const watchdog = new CKSource.EditorWatchdog();

    window.watchdog = watchdog;

    watchdog.setCreator( ( element, config ) => {
        return CKSource.Editor
            .create( element, config )
            .then( editor => {




                return editor;
            } )
    } );

    watchdog.setDestructor( editor => {



        return editor.destroy();
    } );

    watchdog.on( 'error', handleError );

    watchdog
        .create( document.querySelector( selector), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'bulletedList',
                    'numberedList',
                    'fontBackgroundColor',
                    'fontColor',
                    'fontFamily',
                    'fontSize',
                    '|',
                    'outdent',
                    'indent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    '|',
                    'CKFinder',
                    'mediaEmbed',
                    'link',
                    'sourceEditing'
                ]
            },
            alignment: {
                options: [ 'left', 'right', 'center', 'justify' ]
            },
            fontSize: {
                options: [
                    9,
                    11,
                    13,
                    'default',
                    17,
                    19,
                    21,
                    51
                ],
                supportAllValues: true
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                ]
            },
            language: 'ru',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },



        } )
        .catch( handleError );

    function handleError( error ) {
        console.error( error );
    }
}
initEditor('.editor');
initEditor('.editor1');
initEditor('.editor2');
