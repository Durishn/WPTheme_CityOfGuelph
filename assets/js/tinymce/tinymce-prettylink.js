(function() {
	tinymce.PluginManager.add( 'tinymce_prettylink_class', function( editor, url ) {
		// Add Button to Visual Editor Toolbar
		editor.addButton('tinymce_prettylink_class', {
			title: 'Pretty Link',
			image: url + '/assets/prettylink-icon.png',
      // text: 'PrettyLink',
      id: 'mce-wp-prettylink',
			cmd: 'tinymce_prettylink_modal',
			stateSelector: 'prettylink'
		});

		// Called when we click the prettylinkeviation button
		editor.addCommand( 'tinymce_prettylink_modal', function() {
			// Check we have selected some text that we want to link
			var text = editor.selection.getContent({
				'format': 'html'
			});
      editor.windowManager.open({
        // Modal settings
        title: 'Insert A Pretty Link',
        id: 'tinymce-prettylink-insert-dialog',
        body: [
        {
          type   : 'label',
          //text: 'Supported substrings; `.mp3`, `.docx`, `.pptx`, `.ppt`, `.xlsx`, `.pdf`, `forms.guelph.ca`',
          multiline: true,
          style: 'color: dimgray;',
          text: "",
          onPostRender : function() {
              this.getEl().innerHTML =
                 "Supports strings that contain:<br/>"+
                 ".mp3, .docx, .pptx, .ppt, .xlsx, .pdf, forms.guelph.ca<br/>";},
        },
				{
					type   : 'textbox',
					id: 'tinymce-prettylink-title',
					name   : 'prettylinktitle',
					label  : 'Link Text',
					tooltip: 'The text of your link',
					value	 : text,
				},
        {
          type   : 'textbox',
          id: 'tinymce-prettylink-url',
          name   : 'prettylinkurl',
          label  : 'URL',
          tooltip: 'The URL you are linking to',
        },
        {
          type   : 'checkbox',
          id     : 'tinymce-prettylink-external',
          name   : 'prettylinkexternal',
          text   : 'Open in new tab',
        },
        ],
        onsubmit: function(e) {
          if (jQuery('#tinymce-prettylink-external').hasClass("mce-checked")){
            editor.execCommand('mceReplaceContent', false, '<a class="COGprettylink" rel="noopener" target=”_blank” href="' + jQuery('#tinymce-prettylink-url').val() + '">' + jQuery('#tinymce-prettylink-title').val() + '</a>');
          }
          else {
            editor.execCommand('mceReplaceContent', false, '<a class="COGprettylink" href="' + jQuery('#tinymce-prettylink-url').val() + '">' + jQuery('#tinymce-prettylink-title').val() + '</a>');
          }
          editor.windowManager.close();
        }
      });
		});
	});
})();
