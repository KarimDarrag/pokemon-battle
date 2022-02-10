@extends('layouts.app')
@section('content')
<center>
    <h1>Start your journey!</h1>
</center>
<center>

    <table>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <tr>
                <td><label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label></td>

                <td><input style='border: 1px solid black;'id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </td>
            </tr>

            @enderror
            <tr>
                <td><label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label></td>
                <td><input style='border: 1px solid black;'id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </td>
            </tr>
            @enderror
            <tr>
                <td><label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label></td>
                <td><input style='border: 1px solid black;'id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </td>
            </tr>
            @enderror
            <tr>
                <td>
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                </td>
                <td>
                    <input style='border: 1px solid black;' id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </td>
            </tr>

            <tr>
                 <td>Starter Pokemon:<br></td>   
                


    <td>
                    <select name='starter' id='starter'>
                        <option value='Charmander'>Charmander</option>
                        <option value='Squirtle'>Squirtle</option>
                        <option value='Bulbasaur'>Bulbasaur</option>
                    </select>


            </tr></td>
            

</table>
                
    </table>
    <button style='border: 1px solid black; padding: 10px;' type="submit" class="btn btn-primary">
        {{ __('Register') }}
    </button>
    </form>
</center>
@endsection