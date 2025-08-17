<!-- ID -->
<div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-4">
    <x-input-label for="id" :value="__('ID')"/>
    <x-text-input id="id" disabled="true" class="block mt-1 w-full" type="text" name="id"
                  :value="Formatter::asID(old('id', $task->id))" autocomplete="id"/>
    <x-input-error :messages="$errors->get('id')" class="mt-2"/>
</div>

<!-- Project ID -->
@php
    $data = old('project', $task->project) ? [old('project', $task->project) => $task->project->name] : null
@endphp
<div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-4">
    <x-input-label for="project" :value="__('Project')"/>
    <x-select-input id="project" placeholder="Select a project" class="block mt-1 w-full"
                    type="text" name="project"
                    :value="old('project', $task->project)"
                    :data="$data"/>
    <x-input-error :messages="$errors->get('project')" class="mt-2"/>
</div>

<!-- Description -->
<div class="col-12 col-md-12 col-lg-12 col-xl-12 mt-4">
    <x-input-label for="description" :value="__('Descrição')"/>
    <x-textarea-input id="description" class="block mt-1 w-full" cols="4" rows="5" name="description"
                      :value="old('description', $task->description)"
                      autocomplete="description"/>
    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
</div>

<div class="flex items-center justify-end mt-4">
    <x-secondary-button class="ml-4" href="{{route('tasks.index')}}">
        {{ __('Back') }}
    </x-secondary-button>
    <x-primary-button class="ml-4">
        {{ __('Save') }}
    </x-primary-button>
</div>
<!-- Script -->
<script type="text/javascript">
    // CSRF Token
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function () {
        $("#project").select2({
            language: "en-US",
            allowClear: true,
            ajax: {
                url: "{{route('tasks.projects')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term,
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    });
</script>
