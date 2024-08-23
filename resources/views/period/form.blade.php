<!--form de C y U-->
@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
@endif


<input type="date" name="start" value="{{ $period->start ?? '' }}">
<input type="date" name="end" value="{{ $period->end ?? '' }}">
<input type="submit" value="{{$modo}}">
