@extends('admin/model')
@section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			Lang::get('admin/modal.general') }}}</a></li>
</ul>


{!!Form::open(['method'=>'POST','files' => true])!!}
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						Lang::get('admin/dishes.name') }}</label>
					<div class="col-md-10">
						{{{ Input::old('name', isset($dish) ? $dish->name : null)  }}}
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="image">{{
						Lang::get('admin/dishes.price') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{ Lang::get('admin/dishes.price') }}" type="text"
							name="price" id="price"
							value="{{{ Input::old('price',isset($dish) ? $dish->price : null) }}}">
							{!! $errors->first('price', '<label class="control-label"
							for="email">:message</label>')!!}
					</div>
				</div>
			</div>


			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						Lang::get('admin/dishes.type') }}</label>
					<div class="col-md-10">
						<select name="type" id="type" style="width: 100%;">
							<option value="1" {{$dish->type==1 ? ' selected="selected"' : ''}}>Món Tráng Miệng</option>
							<option value="2" {{$dish->type==2 ? ' selected="selected"' : ''}}>Món Chính</option>
							<option value="3" {{$dish->type==3 ? ' selected="selected"' : ''}}>Món Canh</option>
						</select>
						
					</div>
				</div>
			</div>


			<div class="col-md-12">
				<label class="col-md-2 control-label" for="name">{{
						Lang::get('admin/dishes.oldimage') }}</label>
						<div class="col-md-10">
							<img src="{{{URL::to('appfiles/dishimages/thumbs/' . $dish->image)}}}">
						</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						Lang::get('admin/dishes.image') }}</label>
					<div class="col-md-10">
						<input name="image"
						type="file" class="uploader" id="image" value="image" />
						{!! $errors->first('price', '<label class="control-label"
							for="email">:message</label>')!!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-default">
				<span class="glyphicon glyphicon-remove-circle"></span> {{
				Lang::get("admin/modal.reset") }}
			</button>
			<button type="submit" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-ok-circle"></span> {{
				Lang::get("admin/modal.edit") }}
			</button>
		</div>
	</div>
	
{!!Form::close()!!}
@stop

@section('scripts')

<script type="text/javascript">
	$(function() {
		$('form').submit(function(event) {
			event.preventDefault();
			var form = $(this);
			if (form.attr('id') == '' || form.attr('id') != 'fupload'){
				$.ajax({
					  type : form.attr('method'),
					  url : form.attr('action'),
					  data : form.serialize()
					  }).success(function() {
						  setTimeout(function() {
							  parent.$.colorbox.close();
							  }, 10);
					}).fail(function(jqXHR, textStatus, errorThrown) {
	                    // Optionally alert the user of an error here...
	                    alert("fail");
	                    var textResponse = jqXHR.responseText;
	                    var alertText = "One of the following conditions is not met:\n\n";
	                    var jsonResponse = jQuery.parseJSON(textResponse);
	                    $.each(jsonResponse, function(n, elem) {
	                        alertText = alertText + elem + "\n";
	                    });
	                    alert(alertText);
	                });
				}
			else{
				var formData = new FormData(this);
				$.ajax({
					  type : form.attr('method'),
					  url : form.attr('action'),
					  data : formData,
					  mimeType:"multipart/form-data",
					  contentType: false,
					  cache: false,
					  processData:false
				}).success(function() {
					  setTimeout(function() {
						  parent.$.colorbox.close();
						  }, 10);
				}).fail(function(jqXHR, textStatus, errorThrown) {
                    // Optionally alert the user of an error here...
                    var textResponse = jqXHR.responseText;
                    var alertText = "One of the following conditions is not met:\n\n";
                    var jsonResponse = jQuery.parseJSON(textResponse);
                    $.each(jsonResponse, function(n, elem) {
                        alertText = alertText + elem + "\n";
                    });
                    alert(alertText);
                });
			};
		});
		$('.close_popup').click(function() {
			parent.$.colorbox.close()
		});
	});
</script>
@stop
