

<div class="card-header m-b-15">
	<h4>Add New News</h4>
</div><br>
{{ Form::open(['route'=>'venue.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
{{csrf_field()}}
<div class="form-group">
	<input type="text" name="title" class="form-control" placeholder="Title">	
</div><br>
<div class="form-group">
	<label>Description or Body of News</label>
	{{Form::textarea('body', '',['class'=>'form-control textarea', 'Placeholder'=>'Enter Your Text Here']) }}
</div><br>
<div class="form-group">
    <textarea name="editor" id="ckview" cols="30" rows="10"></textarea>
</div>

<div class="input-group">
	<input type="file" name="image">
</div><br>
<input type="submit" name="Submit" value="Save" class="btn btn-primary"><hr>

{{ Form::close()}}



<script src="{{asset('ckeditor.js')}}"></script>
<script>
		var ckview = document.getElementById("ckview");
		CKEDITOR.replace(ckview,{
			language:'en-gb'
		});
</script>