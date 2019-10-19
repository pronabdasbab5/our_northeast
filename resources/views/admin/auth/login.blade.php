@extends('admin.layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
    <h1>Admin Login</h1>
        @error('email')
            <p><b>Invalid Authentication.</b></p>
        @enderror
              <div>
                <input type="email" class="form-control" style="font-weight: bold;" placeholder="Enter Your Email" name="email" required autofocus/>
              </div>
              <div>
                <input id="password" type="password" style="font-weight: bold;" class="form-control" placeholder="Enter Your Password" name="password" required/>
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" style="font-weight: bold;">{{ __('Login') }}</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <b><p>Developed By <a href="https://www.webinfotech.net.in/">WebInfotech</a></p></b>
                </div>
              </div>
            </form>
@endsection