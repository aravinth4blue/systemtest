<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

    <form  method="POST" action="{{ old('id',(isset($appData) ? '/editFile/'.$appData->id:'/file')) }}" enctype='multipart/form-data'>
    <div class="align-items-center">
        @csrf
        <div class="form-group">
            <label for="First name">First name</label>
            <input type="text" class="form-control" name="firstName" required value="{{old('firstName', (isset($appData) ? $appData->firstName:''))}}">
        </div>
        <div class="form-group">
            <label for="Last name:">Last name</label>
            <input type="text" class="form-control" name="lastName" required value="{{old('lastName', (isset($appData) ? $appData->lastName:''))}}">
        </div>
        <div class="form-group">
            <label for="occupation">Occupation</label>
            <select class="form-control" name="occupation" required>
                <option>Add occupation selection...</option>
                @foreach ($occupList as $occup)
            
                    <option value=" {{ $occup->id }}" @if($occup->id == old('occupation', (isset($appData) ? $appData->occupation:''))) selected='selected' @endif >{{ $occup->name }}</option>
                @endforeach
            </select>
        </div>
        @if(isset($appData))
            <img src='{{ url("uploads/". $appData->appln ) }}'>
            <a href='{{ url("uploads/". $appData->appln ) }}'>Download</a>
        @else
        <div class="form-group">
            <label for="appln">Application</label>
            <input class="form-control" type="file" name="appln" required>
        </div>
        @endif
        <div class="form-group">
            <input class="btn btn-primary form-control" type="submit" value="Submit">
        </div>
    </div>
    </form>
    <ul class="list-group">
        @foreach ($applnList as $appln)
        <li class="list-group-item">{{$appln->firstName}}{{$appln->lastName}}<img src='{{ url("uploads/". $appln->appln ) }}'><a href=' {{ url("file/".$appln->id) }}'>edit</a></li>
        @endforeach
    </ul>

</body>
</html>