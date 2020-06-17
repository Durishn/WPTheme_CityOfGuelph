(function() {
	tinymce.PluginManager.add( 'tinymce_prettybtn_class', function( editor, url ) {
		// Add Button to Visual Editor Toolbar
		editor.addButton('tinymce_prettybtn_class', {
			title: 'Pretty Link',
			// image: url + '/assets/prettybtn-icon.png',
      text: 'pretty btn',
      id: 'mce-wp-prettybtn',
			cmd: 'tinymce_prettybtn_modal',
			stateSelector: 'prettybtn'
		});

		// Called when we click the prettylinkeviation button
		editor.addCommand( 'tinymce_prettybtn_modal', function() {
			// Check we have selected some text that we want to link
			var text = editor.selection.getContent({
				'format': 'html'
			});
      editor.windowManager.open({
        // Modal settings
        title: 'Insert A Pretty Button',
        id: 'tinymce-prettybtn-insert-dialog',
        body: [
				{
					type   : 'textbox',
					id: 'tinymce-prettybtn-title',
					name   : 'prettybtntitle',
					label  : 'Button Text',
					tooltip: 'The text of your button',
					value	 : text,
				},
        {
          type   : 'textbox',
          id: 'tinymce-prettybtn-url',
          name   : 'prettybtnurl',
          label  : 'URL',
          tooltip: 'The URL you are linking to',
        },
        {
          type   : 'checkbox',
          id     : 'tinymce-prettybtn-external',
          name   : 'prettybtnexternal',
          text   : 'Open in new tab',
        },
        ],
        onsubmit: function(e) {
          if (jQuery('#tinymce-prettybtn-external').hasClass("mce-checked")){
            editor.execCommand('mceReplaceContent', false, '<a class="COGprettybtn" rel="noopener" target=”_blank” href="' + jQuery('#tinymce-prettybtn-url').val() + '">' + jQuery('#tinymce-prettybtn-title').val() + '</a>');
          }
          else {
            editor.execCommand('mceReplaceContent', false, '<a class="COGprettybtn" href="' + jQuery('#tinymce-prettybtn-url').val() + '">' + jQuery('#tinymce-prettybtn-title').val() + '</a>');
          }
          editor.windowManager.close();
        }
      });
		});
	});
})();
