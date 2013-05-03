$(document).ready(function() {
    $("#file_upload").fileUpload({
        'uploader': 'uploadify/uploader.swf',
         'cancelImg': 'uploadify/cancel.png',
                'script': 'libs/subirarchivo.php',

        'folder': 'uploads',
        'buttonText': 'examinar',
        'checkScript': 'uploadify/check.php',
        'fileDesc': 'archivo captura',
        'auto':false,
      'fileExt': '*.jpg;*.jpeg;*.gif;*.png,;*.docx;*.doc',

        'multi': false,
        'displayData': 'percentage',
        onComplete: function (){
     verlistadoimagenes();
            $("#txtdes").val('');
        }

       });
   $('#instrumento').bind('change', function(){
	$('#file_upload').fileUploadSettings('scriptData','&des='+$(this).val());


    });

})

function startUpload(id, conditional)
{	if(conditional.value.length != 0) {
		$('#'+id).fileUploadStart();
	} else
		alert("Ingrese el número de instrumento");
        $("#instrumento").focus();
}