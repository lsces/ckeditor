{strip}
{if $gBitUser->isRegistered() }
	<script nonce="{$cspNonce}">
    	CKEDITOR.replace( '{$smarty.const.LIBERTY_TEXT_AREA}', {
			extraAllowedContent: 'pre(bwcode)[data-bwcode-params]',
			toolbarGroups: [
			{if $gBitSystem->getConfig('ckedit_toolbars') eq 'Full'}
				{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
				{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
				{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
				{ name: 'forms' },
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ] },
				{ name: 'links' },
				{ name: 'insert' },
				{ name: 'styles' },
				{ name: 'colors' },
				{ name: 'tools' },
				{ name: 'others' }
			{elseif $gBitSystem->getConfig('ckedit_toolbars') eq 'Advanced'}
				{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
				{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
				{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
				{ name: 'forms' },
				'/',
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ] },
				{ name: 'links' },
				{ name: 'insert' },
				'/',
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
				{ name: 'styles' },
				{ name: 'colors' },
				{ name: 'tools' },
				{ name: 'about' }
			{elseif $gBitSystem->getConfig('ckedit_toolbars') eq 'Intermediate'}
				{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
				{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
				{ name: 'forms' },
				'/',
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
				'/',
				{ name: 'links' },
				{ name: 'insert' },
				'/',
				{ name: 'styles' },
				{ name: 'colors' },
				{ name: 'tools' },
				{ name: 'about' }
			{else}
			 	{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
			 	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			 	{ name: 'links' }
			{/if}
			],
		});
	</script>
	{/if}
{/strip}
