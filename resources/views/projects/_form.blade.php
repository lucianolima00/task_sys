<!-- Name -->
<div class="col-12 mt-4">
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $project->name)" autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Description -->
<div class="col-12 col-md-12 col-lg-12 col-xl-12 mt-4">
    <x-input-label for="description" :value="__('Description')"/>
    <x-textarea-input id="description" class="block mt-1 w-full" cols="4" rows="5" name="description"
                      :value="old('description', $project->description)"
                      autocomplete="description"/>
    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
</div>

<div class="flex items-center justify-end mt-4">
    <x-secondary-button class="ms-4" href="{{route('projects.index')}}">
        {{ __('Back') }}
    </x-secondary-button>
    <x-primary-button class="ms-4">
        {{ __('Save') }}
    </x-primary-button>
</div>
