<iframe id="result_iframe" src="about:blank" style="width: 100%;height: 900px;border: 2px solid #eee;"></iframe>

<script type="text/javascript">
	function injectIframe(){
		// prepare iframe element
		var iframe = document.getElementById('result_iframe');

		//prepare html to show
		var html_string = '';
		html_string += `<?php //echo $html_data; ?>`;
		

		var iframedoc = iframe.document;
		if (iframe.contentDocument)
		    iframedoc = iframe.contentDocument;
		else if (iframe.contentWindow)
		    iframedoc = iframe.contentWindow.document;

		if (iframedoc){
		    // Put the content in the iframe
		    iframedoc.open();
		    iframedoc.writeln(html_string);
		    iframedoc.close();
		} else {
		    //just in case of browsers that don't support the above 3 properties.
		    //fortunately we don't come across such case so far.
		    alert('Cannot inject dynamic contents into iframe. Please use supported browser such as "Google Chrome"');
		}
	}

	$(document).ready(function() {
		//injectIframe();
		$('#result_iframe').attr('src', 'assets/hasil_resi.html');
	});
</script>