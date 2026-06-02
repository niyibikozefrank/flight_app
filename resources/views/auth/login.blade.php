<x-guest-layout>
    <div style="width: 100%; padding: 0 1rem;">
        <div style="margin: 0 auto; width: 100%; max-width: 28rem;">
            <div style="text-align: center;">
                <h1 style="font-size: 2.25rem; font-weight: 700; background: linear-gradient(to right, #1e3c72, #2a5298); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Airport Management</h1>
                <p style="margin-top: 0.75rem; font-size: 1rem; color: #475569; line-height: 1.5;">Administrator Portal - Sign in to access the airport dashboard</p>
            </div>

            <div style="margin-top: 2rem; border-radius: 1.5rem; border: 1px solid rgba(30, 41, 59, 0.2); background: white; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);">
                <div style="padding: 2rem; padding-top: 3rem;">
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
                        @csrf

                        <div>
                            <label for="email" style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155;">{{ __('Email') }}</label>
                            <x-text-input id="email" style="margin-top: 0.5rem; width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; background: #f8fafc; color: #0f172a; font-size: 1rem; transition: all 0.3s; outline: none;" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" onfocus="this.style.borderColor='#1e3c72'; this.style.boxShadow='0 0 0 3px rgba(30, 60, 114, 0.1)'" onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'" />
                            <x-input-error :messages="$errors->get('email')" style="color: #dc2626; font-size: 0.875rem; margin-top: 0.5rem; font-weight: 500;" />
                        </div>

                        <div>
                            <label for="password" style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155;">{{ __('Password') }}</label>
                            <x-text-input id="password" style="margin-top: 0.5rem; width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; background: #f8fafc; color: #0f172a; font-size: 1rem; transition: all 0.3s; outline: none;" type="password" name="password" required autocomplete="current-password" onfocus="this.style.borderColor='#1e3c72'; this.style.boxShadow='0 0 0 3px rgba(30, 60, 114, 0.1)'" onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'" />
                            <x-input-error :messages="$errors->get('password')" style="color: #dc2626; font-size: 0.875rem; margin-top: 0.5rem; font-weight: 500;" />
                        </div>

                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <label for="remember_me" style="display: inline-flex; align-items: center;">
                                <input id="remember_me" type="checkbox" style="width: 1rem; height: 1rem; border-radius: 0.375rem; border: 1px solid #cbd5e1; accent-color: #1e3c72; cursor: pointer;" name="remember">
                                <span style="margin-left: 0.5rem; font-size: 0.875rem; color: #475569;">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a style="font-size: 0.875rem; font-weight: 500; color: #64748b; text-decoration: none; transition: color 0.2s;" href="{{ route('password.request') }}" onmouseover="this.style.color='#1e3c72'" onmouseout="this.style.color='#64748b'">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <button type="submit" style="width: 100%; background: linear-gradient(to right, #1e3c72, #2a5298); color: white; padding: 0.75rem 1rem; border-radius: 0.75rem; font-size: 1rem; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s; box-shadow: 0 10px 25px rgba(30, 60, 114, 0.2);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 15px 35px rgba(30, 60, 114, 0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 25px rgba(30, 60, 114, 0.2)'">
                            {{ __('Sign In') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
