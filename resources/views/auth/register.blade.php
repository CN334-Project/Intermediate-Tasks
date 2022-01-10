<style>
.logo {
    margin: 10px;
    font-size: 30px;
    border: none;
    color: white;
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    justify-content: center;
    padding-top: 3%;
    text-decoration: none;
}

html, body {
    background: rgb(24,26,27);
    /* height: 95.3vh; */
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
;
}

.box {
    width: 60%;
    max-width: 650%;
    border: 1px solid rgb(156, 156, 156);
    border-radius: 25px;
    background-color: rgb(35,38,40);
    /* #eceaea */
    color: white;
    margin: 5rem;
    padding-top: 2%;
    padding-bottom: 2%;}


.container {
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    justify-content: center;
}

.bigContainer{
    width: 100%;
    text-align: center;
    background: rgb(24,26,27);
}

.input {
    width: 60%;
    background: gray;
    border: 1px solid black;
    border-radius: 5px;
    padding: 8px;
    color: white;

}

#registerBtn {
    margin-top: 2%;
    background: rgb(65, 65, 65);
    color: white;
    border-radius: 15px;
    padding-left: 40px;
    padding-right: 40px;
    padding-top: 20px;
    padding-bottom: 20px;
    cursor: pointer;
    overflow: hidden;
    box-shadow: 0 0 0 0 rgba(31, 31, 31, 0);
    transition: 0.5s;
    border: 1px solid rgb(168, 168, 168);
}

#registerBtn:enabled:hover {
    box-shadow: 5px 5px 5px 1px #1a1a1a;
    background: white;
    color: black;
    transition: 0.5s;
}

#registerBtn:disabled, button[disabled]{
  border: 1px solid #999999;
  background-color: #cccccc;
  color: #666666;
  cursor: default;
}

#toLoginLink {
    text-decoration: none;
    color: white;
    padding-right: 2%;
}

/* .titleName{
    padding-top: 20%;
    margin: 10%;
} */

label {
    color: white;
}

.smallBox {
    padding-bottom:2%;
}
</style> 


<x-jet-authentication-card>
    <div class="bigContainer">
        <x-slot name="logo">
            <a class="logo" href="http://127.0.0.1:8000/">Register</a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <div class="container">
            <form class="box" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="smallBox">
                    <!-- <x-jet-label value="{{ __('Name') }}" /> -->
                    <label class="titleName"> Name </label><br/>
                    <x-jet-input class="input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="smallBox">
                    <!-- <x-jet-label value="{{ __('Email') }}" /> -->
                    <label class="titleName"> Email </label><br/>
                    <x-jet-input  class="input" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="smallBox">
                    <!-- <x-jet-label value="{{ __('Password') }}" /> -->
                    <label class="titleName"> Password </label><br/>
                    <x-jet-input class="input" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="smallBox">
                    <!-- <x-jet-label value="{{ __('Confirm Password') }}" /> -->
                    <label class="titleName"> Confirm Password </label><br/>
                    <x-jet-input class="input" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a id="toLoginLink" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button id="registerBtn" class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-jet-authentication-card>
