<script type='text/javascript' src='<?php echo base_url();?>asset/ckeditor/ckeditor.js'></script>
<textarea class='ckeditor' name='editor1' id='editor1'></textarea>

<script type="text/javascript">
//<![CDATA[

CKEDITOR.replace( 'editor1',
{
filebrowserBrowseUrl : '/workspace/kpi/asset/ckeditor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '/workspace/kpi/asset/ckeditor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '/workspace/kpi/asset/ckeditor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '/workspace/kpi/asset/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '/workspace/kpi/asset/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '/workspace/kpi/asset/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
}
);
//]]>
</script>