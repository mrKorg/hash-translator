<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        {{ csrf_field() }}

        @if (isset($hashResult) && is_object($hashResult))
            @foreach ($hashResult->getMessages() as $message)
                <p>{{ $message[0] }}</p>
            @endforeach
        @endif

        <select multiple="multiple" id="word-select" name="word_select[]">
            @foreach($words as $word)
                <option value="{{ $word->id }}">{{ $word->word }}</option>
            @endforeach
        </select>

        <div>
            @foreach(hash_algos() as $option)
            <label>
                <input type="checkbox" name="hash_select[]" value="{{ $option }}"> {{ $option }}
            </label>
            @endforeach
        </div>
        <button type="submit">Get hash</button>
    </form>


    @if(isset($hashResult) && is_array($hashResult))
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