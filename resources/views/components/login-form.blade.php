<div class='flex flex-col gap-8 w-lg h-lg p-12 bg-white rounded-4xl'>
    <div>
        <p class='text-4xl font-sans font-italic w-full text-center text-(--brand-color) font-bold'>Log In</p>
    </div>

    <form class='d-flex flex-column align-items-center justify-content-center' method='POST' action='{{ route("auth.login") }}'>
        <div class='flex flex-col gap-10'>
            <div class='flex flex-col gap-2'>
                <div class='flex flex-col gap-1'>
                    <label for='password' class='text-(--brand-color) text-sm'>Email</label>
                    <input class='border-solid border-1 border-(--brand-color) py-2 px-4 rounded-md' name='email' type='email' placeholder='example@email.com'/>
                </div>
                <div class='flex flex-col gap-1'>
                    <label for='password' class='text-(--brand-color) text-sm'>Password</label>
                    <input class='border-solid border-1 border-(--brand-color) py-2 px-4 rounded-md' name='password' type='password' placeholder='********'/>
                </div>
            </div>
            <div class='flex flex-col'>
                <button type='submit' class='text-white bg-(--brand-color) rounded-full px-6 py-2 font-bold'>Log In</button>
            </div>
        </div>
    </form>

    <div class='flex flex-col text-center justify-center items-center'>
        <p class='text-sm'>Dont have an account?
            <a href='{{ route('auth.register') }}'>Sign Up</a>
        </p>
        <p class='text-sm'>Or
        <a href='{{ route('auth.guest') }}'>Login as guest</a>
        </p>
    </div>

    @if ($errors->any())
        <div class="mt-4 p-4 bg-red-50 border-l-4 border-red-500">
            <ul class="list-none">
                @foreach ($errors->all() as $error)
                    <li class="text-xs font-bold text-red-600 font-sans">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
