
    <x-app-layout>
        <x-slot name="header"></x-slot>

        <div class="max-w-7xl mx-auto bg-white" style="margin-top: 130px;">
            <div class="text-3xl font-extrabold m-8">
            <h1>Profil</h1>
            <hr class="w-40 text-bold">
            </div>
        <section class="flex justify-between mx-6">
        <div class="flex items-center space-x-4">
<img src="{{ asset('storage/profiles/' . Auth::user()->photo) }}" class="rounded-full w-20 h-20 object-cover">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                <p class="text-gray-600 text-lg">{{ $user->email }}</p>
            </div>
        </div>

        <div class="flex items-center">

            <section class="p-6 bg-white">
                

                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Please enter your password to confirm.') }}
                        </p>

                        <div class="mt-6">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                            <x-danger-button class="ml-3">
                                {{ __('Delete Account') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </section>
        </div>

    </section>



        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">

            <section class="px-6 bg-white">

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

<form id="profile-form" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                    <div>
        <x-input-label for="photo" :value="__('Upload Profile Picture')" />
        <input id="photo" name="photo" type="file" class="mt-1 block w-full" accept="image/*">
        <x-input-error class="mt-2" :messages="$errors->get('photo')" />
    </div>
                </form>
            </section>

            <!-- Update Password -->
            <section class="px-6 bg-white">

            <form id="password-form" method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <x-input-label for="current_password" :value="__('Current Password')" />
                        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('New Password')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>


                </form>
            </section>
        </div>
        <div class="flex justify-center">
            <div class="flex items-center mb-40">
                <div>
                <button class="ml-6 bg-white border border-gray-700 text-gray-900 px-5 py-2 rounded-lg font-semibold hover:bg-gray-800 mr-8" style="width: 200px; height: 50px;" onclick="window.history.back();">
    Batal
</button>
 </div>
                <div>
                    <button type="button" onclick="submitForms()"  class="bg-gray-600 text-white px-5 py-2 rounded-lg font-semibold hover:bg-gray-800 mr-8" style="width: 200px; height: 50px;">Save</button>
                    <script>
                        function submitForms() {
                            document.getElementById('profile-form').submit();
                            document.getElementById('password-form').submit();
                        }
                          function submitForms() {
        document.getElementById('profile-form').submit();
        setTimeout(function() {
            document.getElementById('password-form').submit();
        }, 500); // Beri jeda 500ms sebelum submit form kedua
    }
                    </script>
            </div>
            </div>
            </div>
    </x-app-layout>
</div>
