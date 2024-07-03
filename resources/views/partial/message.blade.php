@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('flash_success'))
    <div class="alert alert-success">
        {{ session('flash_success') }}
    </div>
@endif

@if (session('flash_error'))
    <div class="alert alert-danger">
        {{ session('flash_error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
