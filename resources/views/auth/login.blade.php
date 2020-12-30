@component ('components.master')
    <div class="container mx-auto flex justify-center">
        <div class="px-12 py-8 bg-gray-200 border border-gray-300 rounded-lg">
            <div class="col-md-8">
                <div class="font-bold text-lg mb-4">{{ __('Login') }}</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="email"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Email
                        </label>

                        <input type="email"
                               class="border border-gray-400 p-2 w-full"
                               name="email"
                               id="email"
                               required
                               value="{{ old('email') }}"
                        >

                        @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password"
                               class="black mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               id="password"
                               class="border border-gray-400 p-2 w-full"
                               required
                        >

                        @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div>
                            <input type="checkbox"
                                   name="remember"
                                   id="remember"
                                   class="mr-1"
                                   required
                                   {{ old('remember') ? 'checked' : '' }}
                            >

                            <label for="remember"
                                   class="text-xs text-gray-700 font-bold uppercase"
                            >
                                Remember Me
                            </label>
                        </div>

                        @error('remember')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        @component ('components.submit-button')
                            Login
                        @endcomponent

                        @component ('components.link-button')
                            @slot ('link')
                                {{ route('password.request') }}
                            @endslot

                            Forget Your Password?
                        @endcomponent
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcomponent
