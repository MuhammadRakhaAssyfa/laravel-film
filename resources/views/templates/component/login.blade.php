@php
    $fromRegister = old('from_modal') === 'register';
    $startTab = ($fromRegister || session('open_modal') === 'register') ? 'register' : 'login';
@endphp

<style>
  /* textarea mengikuti gaya kotak isian template */
  .form-module .form textarea {
    outline: none;
    display: block;
    width: 100%;
    border: 1px solid #d9d9d9;
    margin: 0 0 20px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
    font-family: inherit;
  }
  .form-module .modal-error {
    color: red;
    margin: -12px 0 15px;
    font-size: 13px;
  }
</style>

<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Sign In & Sign Up
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <section>
        <div class="modal-body">
          <div class="w3_login_module">
            <div class="module form-module">
              <div class="toggle"><i class="fa fa-times fa-pencil"></i>
              <div class="tooltip">Click Me</div>
              </div>

              {{-- FORM LOGIN --}}
              <div class="form" id="form-login">
                <h3>Login to your account</h3>
                @if (session('success'))
                  <p style="color: green; margin-top: 0;">{{ session('success') }}</p>
                @endif

                @if (! $fromRegister)
                  @foreach (['notif', 'email', 'password'] as $field)
                    @if ($errors->has($field))
                      <p class="modal-error" style="margin-top: 0;">{{ $errors->first($field) }}</p>
                    @endif
                  @endforeach
                @endif

                <form action="{{ route('login.authenticate') }}" method="post">
                  @csrf
                  <input type="hidden" name="from_modal" value="login">
                  <input type="email" name="email" placeholder="Email" value="{{ $fromRegister ? '' : old('email') }}" required="">
                  <input type="password" name="password" placeholder="Password" required="">
                  <input type="submit" value="Login">
                </form>
              </div>

              {{-- FORM REGISTER --}}
              <div class="form" id="form-register">
                <h3>Create an account</h3>
                <form action="{{ route('register.store') }}" method="post">
                  @csrf
                  <input type="hidden" name="from_modal" value="register">

                  <input type="text" name="name" placeholder="Nama lengkap" value="{{ $fromRegister ? old('name') : '' }}">
                  @if ($fromRegister && $errors->has('name'))<p class="modal-error">{{ $errors->first('name') }}</p>@endif

                  <input type="email" name="email" placeholder="Email" value="{{ $fromRegister ? old('email') : '' }}">
                  @if ($fromRegister && $errors->has('email'))<p class="modal-error">{{ $errors->first('email') }}</p>@endif

                  <input type="password" name="password" placeholder="Password (minimal 6 karakter)">
                  @if ($fromRegister && $errors->has('password'))<p class="modal-error">{{ $errors->first('password') }}</p>@endif

                  <input type="password" name="password_confirmation" placeholder="Ulangi password">

                  <input type="text" inputmode="numeric" name="age" placeholder="Umur" value="{{ $fromRegister ? old('age') : '' }}">
                  @if ($fromRegister && $errors->has('age'))<p class="modal-error">{{ $errors->first('age') }}</p>@endif

                  <textarea name="bio" rows="3" placeholder="Bio (minimal 20 karakter)">{{ $fromRegister ? old('bio') : '' }}</textarea>
                  @if ($fromRegister && $errors->has('bio'))<p class="modal-error">{{ $errors->first('bio') }}</p>@endif

                  <textarea name="alamat" rows="3" placeholder="Alamat (minimal 30 karakter)">{{ $fromRegister ? old('alamat') : '' }}</textarea>
                  @if ($fromRegister && $errors->has('alamat'))<p class="modal-error">{{ $errors->first('alamat') }}</p>@endif

                  <input type="submit" value="Register">
                </form>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<script>
  function showForm(which) {
    if (which === 'register') {
      $('#form-login').hide();
      $('#form-register').show();
      $('.toggle i').removeClass('fa-pencil');
    } else {
      $('#form-register').hide();
      $('#form-login').show();
      $('.toggle i').addClass('fa-pencil');
    }
  }

  $(document).ready(function () {
    $('.toggle').click(function () {
      showForm($('#form-login').is(':visible') ? 'register' : 'login');
    });

    $(document).on('click', '.open-login', function () { showForm('login'); });

    showForm('{{ $startTab }}');

    @if (($errors->has('notif') || old('from_modal') || session('open_modal')) && ! request()->routeIs('login.login', 'register.create'))
      $('#myModal').modal('show');
    @endif
  });
</script>