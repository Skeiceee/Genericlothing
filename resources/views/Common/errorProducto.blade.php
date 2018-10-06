@if($errors->any())
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
      <span>{{$error}}</span>
    </div>
  @endforeach
@endif
