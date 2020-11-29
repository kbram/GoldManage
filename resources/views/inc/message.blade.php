@if (count($errors)>0)
    @foreach ($errors->all() as $error )
        <div class="alert alert-danger">
            <h4>{{$error}}</h4>
        </div>
    @endforeach    
@endif

@if(session('success'))
    <div class="alert alert-success">
        <h4>{{session ('success')}}</h4>
    <div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        <h4>{{session ('error')}}</h4>
    <div>
@endif