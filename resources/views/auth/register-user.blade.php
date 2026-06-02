<x-guest-layout>
    <div style="width: 100%; padding: 0 1rem;">
        <div style="margin: 0 auto; width: 100%; max-width: 28rem;">
            <div style="text-align: center;">
                <h1 style="font-size: 2.25rem; font-weight: 700; background: linear-gradient(to right, #10b981, #059669); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Create Account</h1>
                <p style="margin-top: 0.75rem; font-size: 1rem; color: #475569; line-height: 1.5;">Register to access your clinic profile</p>
            </div>

            <div style="margin-top: 2rem; border-radius: 1.5rem; border: 1px solid rgba(30, 41, 59, 0.2); background: white; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);">
                <div style="padding: 2rem; padding-top: 3rem;">

                    <form method="POST" action="{{ route('register.user.store') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
                        @csrf

                        <div>
                            <label for="name" style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155;">{{ __('Full Name') }}</label>
                            <x-text-input id="name" style="margin-top: 0.5rem; width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; background: #f8fafc; color: #0f172a; font-size: 1rem; transition: all 0.3s; outline: none;" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" onfocus="this.style.borderColor='#10b981'; this.style.boxShadow='0 0 0 3px rgba(16, 185, 129, 0.1)'" onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'" />
                            <x-input-error :messages="$errors->get('name')" style="color: #dc2626; font-size: 0.875rem; margin-top: 0.5rem; font-weight: 500;" />
                        </div>

                        <div>
                            <label for="email" style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155;">{{ __('Email') }}</label>
                            <x-text-input id="email" style="margin-top: 0.5rem; width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; background: #f8fafc; color: #0f172a; font-size: 1rem; transition: all 0.3s; outline: none;" type="email" name="email" :value="old('email')" required autocomplete="email" onfocus="this.style.borderColor='#10b981'; this.style.boxShadow='0 0 0 3px rgba(16, 185, 129, 0.1)'" onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'" />
                            <x-input-error :messages="$errors->get('email')" style="color: #dc2626; font-size: 0.875rem; margin-top: 0.5rem; font-weight: 500;" />
                        </div>

                        <div>
                            <label for="password" style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155;">{{ __('Password') }}</label>
                            <x-text-input id="password" style="margin-top: 0.5rem; width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; background: #f8fafc; color: #0f172a; font-size: 1rem; transition: all 0.3s; outline: none;" type="password" name="password" required autocomplete="new-password" onfocus="this.style.borderColor='#10b981'; this.style.boxShadow='0 0 0 3px rgba(16, 185, 129, 0.1)'" onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'" />
                            <x-input-error :messages="$errors->get('password')" style="color: #dc2626; font-size: 0.875rem; margin-top: 0.5rem; font-weight: 500;" />
                        </div>

                        <div>
                            <label for="password_confirmation" style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155;">{{ __('Confirm Password') }}</label>
                            <x-text-input id="password_confirmation" style="margin-top: 0.5rem; width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; background: #f8fafc; color: #0f172a; font-size: 1rem; transition: all 0.3s; outline: none;" type="password" name="password_confirmation" required autocomplete="new-password" onfocus="this.style.borderColor='#10b981'; this.style.boxShadow='0 0 0 3px rgba(16, 185, 129, 0.1)'" onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'" />
                            <x-input-error :messages="$errors->get('password_confirmation')" style="color: #dc2626; font-size: 0.875rem; margin-top: 0.5rem; font-weight: 500;" />
                        </div>

                        <button type="submit" style="width: 100%; background: linear-gradient(to right, #10b981, #059669); color: white; padding: 0.75rem 1rem; border-radius: 0.75rem; font-size: 1rem; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s; box-shadow: 0 10px 25px rgba(16, 185, 129, 0.2);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 15px 35px rgba(16, 185, 129, 0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 25px rgba(16, 185, 129, 0.2)'">
                            {{ __('Create Account') }}
                        </button>

                        <div style="text-align: center;">
                            <span style="font-size: 0.875rem; color: #475569;">Already have an account? </span>
                            <a href="{{ route('login') }}" style="font-size: 0.875rem; font-weight: 600; color: #10b981; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#047857'" onmouseout="this.style.color='#10b981'">
                                Sign in
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
