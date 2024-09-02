<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('One last step! Before you can list or apply we need to verify your identity. Please upload or attach a picture of you holding a piece of identification, make sure it\'s clear and visible.') }}
    </div>

    

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verify-identity') }}" enctype="multipart/form-data">
            @csrf

            <div>
            
            <x-text-input id="identity_verified_picture" class="block mt-1 w-full" type="file" name="identity_verified_picture" required autofocus />
            <x-input-error :messages="$errors->get('identity_verified_picture')" class="mt-2" />
        </div>
        <button class="ms-4" style='margin-top: 30px; margin-left: 0px'>
                Submit
        </button>
            
        </form>

    </div>
</x-guest-layout>
