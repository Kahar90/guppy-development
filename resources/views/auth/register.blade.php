<x-guest-layout>
    <div class="bg-base-100 flex flex-row w-3/6 min-h-[70%] shadow-2xl rounded-md border border-slate-200">

        <div class="bg-[#6e7d95] w-4/6 flex items-center">
            <img class="w-[400px] h-[400px] m-auto" src="/assets/logo2.png" />
        </div>

        <div class="bg-white text-white w-5/6 p-10">
            <div id="title" class="text-center text-[#3d4451] mb-0 flex flex-col justify-center items-center">
                <h1 class="text-3xl">
                    Create new account
                </h1>

                <h3 class="text-xl text-[#3d4451]">
                    Already registered? <a class="text-black hover:underline" href="/login">Login</a>
                </h3>

                <div class="flex flex-row justify-center gap-2 mt-2">
                    <button class="btn btn-primary bg-[#6e7d95] gap-2" onclick="window.location.href='/login/google'">
                        <img class="w-[20px] h-[20px]" src="/assets/google.png" />
                        <h1>Google</h1>

                    </button>
                    <div class="divider divider-vertical"></div>
                    <button class="btn btn-primary bg-[#6e7d95] gap-2" onclick="window.location.href='/login/github'">

                        <img class="w-[20px] h-[20px]" src="/assets/github.png" />
                        <h1>Github</h1>
                    </button>
                </div>

                <p class="text-sm mt-2">Or continue with your social accounts.</p>

                <div class="divider"></div>
            </div>

            <form class="w-full mb-5 text-black" method="POST" action="{{ route('register') }}">
                @csrf
                <div class=" form-control">

                    <!-- name -->
                    <div class="m-auto w-4/6">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>


                    <!-- Email -->
                    <div class="m-auto w-4/6 mt-5">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- password -->

                    <div class="m-auto w-4/6 mt-5">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- confirm password -->

                    <div class="m-auto w-4/6 mt-5">
                        <x-input-label for="password" :value="__('Please enter password')" />
                        <x-text-input id="password" class="block mt-1 w-full mb-8" type="password" name="password_confirmation" required autocomplete="current-password" />
                    </div>

                    <button class="btn btn-primary bg-[#6e7d95] border border-[#6e7d95] max-w-xs m-auto w-2/6">LOGIN</button>
                </div>
            </form>
        </div>

    </div>


</x-guest-layout>