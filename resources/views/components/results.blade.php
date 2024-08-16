@if (session()->has('success'))
    <div style="display:flex; justify-content: space-around" {{ $attributes }}>
        <div
            style="
        background-color:green;
        text-align: center;
        font-weight: 500;
        color: white;
        margin-top: .5rem;
        border-radius: .25rem;
        min-height: 2rem;
        padding: .5rem;
        width: 30vW;
        border: 1px solid #01d601;
    ">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session()->has('error'))

<div style="display:flex; justify-content: space-around" {{ $attributes }}>
    <div
        style="
        background-color:red;
        text-align: center;
        font-weight: 500;

        margin-top: .5rem;
        border-radius: .25rem;
        min-height: 2rem;
        padding: .5rem;
        width: 30vW;
        border: 1px solid darkred;
    ">
        <span style="font-weight:800">Fehlermeldung</span>
        {{ session('error') }}
        <p style="font-weight: 400">
            Mehr informationen
            {!!   session('error_details') ?? "" !!}
        </p>
    </div>
</div>


@endif

@if ($errors->any())
    <div style="display:flex; justify-content: space-around" {{ $attributes }}>
        <div
            style="
        background-color:red;

        font-weight: 500;

        margin-top: .5rem;
        border-radius: .25rem;
        min-height: 2rem;
        padding: .5rem;
        width: 30vW;
        border: 1px solid darkred;
    ">
            <span style="font-weight:800">Bei der Überprüfung wurden folgende Fehler gefunden</span>
            {{ session('error') }}

                <ul style="font-weight: 400">
                    @php($messages = "")
                    @foreach($errors->all() as $message)
                        @php($messages.=$message."\n")
                        <li>{{ $message }}</li>

                    @endforeach
                </ul>

        </div>
    </div>
@endif
