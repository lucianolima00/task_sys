<!-- Name -->
<div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-4">
    <x-input-label for="name" :value="__('Nome fantasia')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $client->name)" autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-4">
    <x-secondary-button class="ml-4" href="{{route('projects.index')}}">
        {{ __('Back') }}
    </x-secondary-button>
    <x-primary-button class="ml-4">
        {{ __('Save') }}
    </x-primary-button>
</div>
