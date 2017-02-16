
<p id="f1_upload_process">Loading...<br/><img src="loader.gif" /></p>
<p id="result"></p>
<form action="upload.php" method="post" enctype="multipart/form-data" target="upload_target" >
    File: <input id="filetoup" name="myfile" type="file" />
          <input type="button" id="upload-btn" name="submitBtn" value="Upload" />
</form>
<div id="output">

</div>
{$SCRIPT}
{literal}
<script>
$(document).ready(function(){
	$('#upload-btn').click(function(){
		var file = $('#filetoup')[0].files[0];
		alert(file);
		var formdata = new FormData();
		formdata.append("file1", file);
		var lajax = $.ajax({
			type: 'POST',
			url: '{/literal}{jfullurl "entreprise~entreprise:essaiajax"}{literal}',
			data: formdata,
			processData: false,  // tell jQuery not to process the data
            contentType: false,
            success : function(data) {
           		$('#output').append(data);
		       }
		});
		alert(lajax);
	});
});
</script>
{/literal}