{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm','data-confirm' => $confirm_message]) !!}
<a href="{{ $edit_url }}" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span></a> 
<a href="{{ $show_url }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
<button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></span></button>
{!! Form::close()!!}
