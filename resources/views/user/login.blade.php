<x-user.layout>

         <form action="{{ route('login.store') }}" method="POST" class="container w-50 mt-5  py-2 shadow">
            @csrf

            <h1 class=" text-center" style="font-weight: bold">Login</h1>

            <x-shared.input-field
             type="email"
             name="email"
             placeholder="Please Enter your email"
             value="{{ old('email') }}"
             id="email"
             > Email </x-shared.input-field>

            <x-shared.input-field
             type="password"
             name="password"
             placeholder="Please Enter your password"
             value="{{ old('password') }}"
             id="password"
             > Password </x-shared.input-field>


            @error('error')

                <div class="alert alert-danger p-1 mt-3 w-auto text-center" role="alert" style="font-size: 13px"> {{ $message }} </div>

            @enderror

            <x-shared.submit-button>login</x-shared.submit-button>


         </form>
         

</x-user.layout>
