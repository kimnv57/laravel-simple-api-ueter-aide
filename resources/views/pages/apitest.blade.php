@extends('default')
@section('styles')
@stop

@section('content')
<div class ="row">
<h1>API TEST</h1>
</div>

<form class="form-horizontal" method="post"
	action="{{URL::to('apis') }}"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">api host: </label>
					<div class="col-md-10">http://localhost/ueter-aide/public/apis
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<br>
			</div>


			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="api">api: </label>
					<div class="col-md-6">
						<select name="api" id="api" style="width: 100%;">

							<option value="login">login</option>
						</select> <span class="help-block">please chose api</span>
					</div>
				</div>
			</div>

			

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="course">thêm biến</label>
					<div class="col-md-3">
						<input class="form-control" tabindex="1"
							placeholder="key name" type="text" id="key">
					</div>

					<div class="col-md-7">
						<button id="addbutton" type="button" class="btn btn-sm btn-primary">thêm</button>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<br>
			</div>

			<div id="apicontent">
				<div class="col-md-12 form-group">
					<label class="col-md-2 control-label" for="username">username</label>
					<div class="col-md-8">
						<input class="form-control" tabindex="1"
							placeholder="username" type="text"
							name="username" id="username" value="admin_user">
					</div>
					<div class="col-md-2">
						<button type="button" class="deletebutton btn btn-sm btn-danger">xóa</button>
					</div>
				</div>

				<div class="col-md-12 form-group">
					<label class="col-md-2 control-label" for="password">password</label>
					<div class="col-md-8">
						<input class="form-control" tabindex="1"
							placeholder="password" type="text"
							name="password" id="password" value="12345">
					</div>
					<div class="col-md-2">
						<button type="button" class="deletebutton btn btn-sm btn-danger">xóa</button>
					</div>
				</div>

			</div>
			
			
           
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<button type="reset" class="btn btn-sm btn-default">
					<span class="glyphicon glyphicon-remove-circle"></span> {{
					Lang::get("admin/modal.reset") }}
				</button>
				<button type="submit" class="btn btn-sm btn-success">
					<span class="glyphicon glyphicon-ok-circle"></span>
					Test
				</button>
			</div>
		</div>
		<div class="col-md-12">
				<br>
		</div>
		<div class="col-md-12">
			<br>
		</div>
		<div class="col-md-12">
			<br>
		</div>
	</div>
	
</form>

<div class="col-md-12 ">
	<p id="result"></p>
	<br>
	<br>
	<br>
</div>
 @stop

 @section('scripts')
 <script type="text/javascript">
 $(function(){

 	$("#addbutton").click(function() {
 		$key = $("#key").val();
	  	if($key==null||$key=="") return;

	  	$newkey = $( "<div>" ).attr("class","col-md-12 form-group").appendTo($("#apicontent"));
	   	$( "<label>" ).attr("class","col-md-2 control-label").attr("for",$key).html($key).appendTo($newkey);
	   	$inputdiv = $( "<div>" ).attr("class","col-md-8").appendTo($newkey);
	   	$( "<input>" ).attr("class","form-control").attr("placeholder",$key)
	   	.attr("type","text").attr("name",$key).appendTo($inputdiv);
	   	$deletediv = $( "<div>" ).attr("class","col-md-2").appendTo($newkey);
	   	$( "<button>" ).attr("class","deletebutton btn btn-sm btn-danger").attr("type","button").html('Xóa').appendTo($deletediv);


	   	$("#key").val('');

	   	$(".deletebutton").click(function() {
			$(this).parent().parent().remove();
		});
	});

	$(".deletebutton").click(function() {
		$(this).parent().parent().remove();
	});
});
 
 </script>

@stop