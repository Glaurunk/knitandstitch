@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
      <div class="my-5 p-3 alert red text-moccha text-center fs-12">
        {{ $error }}
      </div>
  @endforeach
@endif


@if (session('success'))
  <div class="my-5 p-3 alert dark-brown text-moccha text-center fs-12">
    {{ session('success') }}
  </div>
@endif


@if (session('error'))
  <div class="my-5 p-3 alert red text-moccha text-center fs-12">
    {{ session('error') }}
  </div>
@endif
