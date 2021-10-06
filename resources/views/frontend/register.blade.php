@extends('frontend.layouts.master')

@section('container')
  
<section class="default-page">
    <div class="container">
        <div class="tz-register">
            <h2>Create an account</h2>

            <!--Start form-->
            <form method="post">
                <p class="form-row form-row-wide">
                    <label for="username">Email address</label>
                    <input type="text" class="input-text" name="username" value="">
                </p>
                <p class="form-row form-row-wide">
                    <label for="password">Password</label>
                    <input class="input-text" type="password" name="password">
                </p>

                <p class="form-row">
                    <input type="submit" class="button" name="register" value="Create an account">
                </p>
            </form>
            <!--End form-->

        </div>
    </div>
</section>
@endsection

