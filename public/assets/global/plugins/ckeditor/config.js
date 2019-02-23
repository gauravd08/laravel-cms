/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) 
{
    // The toolbar groups arrangement, optimized for a single toolbar row.
    config.toolbarGroups = [
        { name: 'document', groups: ['mode', 'document', 'doctools'] },
        { name: 'clipboard', groups: ['clipboard', 'undo'] },
        // { name: 'editing', groups: ['find', 'selection', 'spellchecker'] },
        // { name: 'forms' },
        { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
        { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'styles' },
        { name: 'colors' },
        { name: 'tools' },
        { name: 'others' }
    ];
    
    config.fillEmptyBlocks = false;
	config.extraPlugins = 'uploadimage';
    config.extraPlugins = 'image2';
    config.extraPlugins = 'tableselection';
    config.extraPlugins = 'scayt';
    config.extraPlugins = 'wsc';
    config.uploadUrl = '/admin/uploader/upload';
    
    config.allowedContent  = true;
};

CKEDITOR.dtd.$removeEmpty['span'] = false;
CKEDITOR.dtd.$removeEmpty['div'] = false;
CKEDITOR.dtd.$removeEmpty['a'] = false;
CKEDITOR.dtd.$removeEmpty['i'] = false;
CKEDITOR.dtd.$removeEmpty['li'] = false;
CKEDITOR.dtd.$removeEmpty['ul'] = false;
