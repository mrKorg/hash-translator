<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        {{ csrf_field() }}
        <select multiple="multiple" id="word-select" name="word_select[]">
            @foreach($words as $word)
                <option value="{{ $word->id }}">{{ $word->word }}</option>
            @endforeach
        </select>
        <div>
            @foreach(hash_algos() as $option)
            <label>
                <input type="checkbox" name="hash[]" value="{{ $option }}"> {{ $option }}
            </label>
            @endforeach
        </div>
        <button type="submit">Get hash</button>
    </form>

    @if(isset($hashResult))
        @foreach($hashResult as $word=>$hashArray)
            <h3>{{ $word }}</h3>
            <ul>
                @foreach($hashArray as $k=>$hash)
                    <li>{{$k}}: <strong>{{ $hash }}</strong></li>
                @endforeach
            </ul>
        @endforeach
    @endif
</body>
</html>