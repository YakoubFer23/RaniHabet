<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('One last step! Before you can list or apply we need to verify your identity. Please upload or attach a picture of you holding a piece of identification, make sure it\'s clear and visible.') }}
    </div>



    <div class="mt-4 flex items-center justify-between">
        <form method="POST" id="uploadForm" action="{{ route('verify-identity') }}" enctype="multipart/form-data">
            @csrf

            <div>

                <x-text-input id="identity_verified_picture" class="block mt-1 w-full" type="file"
                    name="identity_verified_picture" accept="image/*" required autofocus />
                <x-input-error :messages="$errors->get('identity_verified_picture')" class="mt-2" />
            </div>
            <x-primary-button style='margin-top: 30px; margin-left: 0px'>
                {{ __('Submit') }}
            </x-primary-button>

        </form>

    </div>
</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('uploadForm').addEventListener('submit', function (e) {
            const fileInput = document.getElementById('identity_verified_picture');
            const file = fileInput.files[0];

            if (file) {
                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];

                if (!validImageTypes.includes(fileType)) {
                    alert('Please upload a valid image file (JPEG, PNG, GIF).');
                    e.preventDefault(); // Prevent the form from submitting
                }
            }
        });

    })
</script>