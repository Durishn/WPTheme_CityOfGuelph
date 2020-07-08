(function() {
	tinymce.PluginManager.add( 'tinymce_prettybtn_class', function( editor, url ) {
		// Add Button to Visual Editor Toolbar
		editor.addButton('tinymce_prettybtn_class', {
			title: 'Button',
			image: url + '/assets/prettybtn-icon.png',
      //text: 'pretty btn',
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
            type: 'listbox',
            name: 'prettybtnalign',
            label: 'Alignment',
            'values': [
                {text: 'Left', value: 'left'},
                {text: 'Center', value: 'center'},
                {text: 'Right', value: 'right'},
            ],
						onPostRender: function( ){
                    prettybtnalign = this;
                }
        },
				{
            type: 'listbox',
            name: 'prettybtncolor',
            label: 'Color',
            'values': [
                {text: 'Default', value: ''},
                {text: 'Grey', value: 'grey'},
                {text: 'Blue', value: 'blue'}
								//{text: 'White', value: 'white'}
            ],
						onPostRender: function( ){
                    prettybtncolor = this;
                }
        },
				{
            type: 'listbox',
            name: 'prettybtnsize',
            label: 'Size',
            'values': [
                {text: 'Medium', value: 'medium'},
                {text: 'Small', value: 'small'},
								{text: 'Large', value: 'x-large'}
            ],
						onPostRender: function( ){
                    prettybtnsize = this;
                }
        },
        {
          type   : 'checkbox',
          id     : 'tinymce-prettybtn-external',
          name   : 'prettybtnexternal',
          text   : 'Open in new tab',
        },
				{
          type   : 'checkbox',
          id     : 'tinymce-prettybtn-hover',
          name   : 'prettybtnhover',
          text   : 'Hover animation',
        },
        ],
        onsubmit: function(e) {
          if (jQuery('#tinymce-prettybtn-external').hasClass("mce-checked")){
						if (jQuery('#tinymce-prettybtn-hover').hasClass("mce-checked")){
            	editor.execCommand('mceReplaceContent', false, '<div style="text-align:' + prettybtnalign.value() + ';"><a style="font-size:' + prettybtnsize.value() + '" class="prettybtn ' + prettybtncolor.value() + ' ' + prettybtnsize.value() + ' fill" rel="noopener" target=”_blank” href="' + jQuery('#tinymce-prettybtn-url').val() + '">' + jQuery('#tinymce-prettybtn-title').val() + '</a></div>');
						}
						else{
							editor.execCommand('mceReplaceContent', false, '<div style="text-align:' + prettybtnalign.value() + ';"><a style="font-size:' + prettybtnsize.value() + '" class="prettybtn ' + prettybtncolor.value() + ' ' + prettybtnsize.value() + '" rel="noopener" target=”_blank” href="' + jQuery('#tinymce-prettybtn-url').val() + '">' + jQuery('#tinymce-prettybtn-title').val() + '</a></div>');
						}
					}
          else {
						if (jQuery('#tinymce-prettybtn-hover').hasClass("mce-checked")){
            	editor.execCommand('mceReplaceContent', false, '<div style="text-align:' + prettybtnalign.value() + ';"><a style="font-size:' + prettybtnsize.value() + '" class="prettybtn ' + prettybtncolor.value() + ' ' + prettybtnsize.value() + ' fill" href="' + jQuery('#tinymce-prettybtn-url').val() + '">' + jQuery('#tinymce-prettybtn-title').val() + '</a></div>');
          	}
						else{
							editor.execCommand('mceReplaceContent', false, '<div style="text-align:' + prettybtnalign.value() + ';"><a style="font-size:' + prettybtnsize.value() + '" class="prettybtn ' + prettybtncolor.value() + ' ' + prettybtnsize.value() + '" href="' + jQuery('#tinymce-prettybtn-url').val() + '">' + jQuery('#tinymce-prettybtn-title').val() + '</a></div>');
						}
					}
          editor.windowManager.close();
        }
      });
		});
	});
})();
