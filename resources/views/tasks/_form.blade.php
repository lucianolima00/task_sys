<!-- Name -->
<div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-4">
    <x-input-label for="name" :value="__('Name')"/>
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                  :value="old('name', $task->name)" autocomplete="name"/>
    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
</div>

<!-- Priority -->
<div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-4">
    <x-input-label for="priority" :value="__('Priority')"/>
    <x-text-input id="priority" class="block mt-1 w-full" type="number" name="priority"
                  :value="old('priority', $task->priority)" autocomplete="priority"/>
    <x-input-error :messages="$errors->get('priority')" class="mt-2"/>
</div>

<!-- Project ID -->
@php
    $data = old('project_id', $task->project_id) ? [old('project_id', $task->project_id) => $task->project->name] : null
@endphp
<div class="col-12 mt-4">
    <x-input-label for="project_id" :value="__('Project')"/>
    <x-select-input id="project_id" placeholder="Select a project" class="block mt-1 w-full"
                    type="text" name="project_id"
                    :value="old('project_id', $task->project_id)"
                    :data="$data"/>
    <x-input-error :messages="$errors->get('project')" class="mt-2"/>
</div>

<!-- Description -->
<div class="col-12 col-md-12 col-lg-12 col-xl-12 mt-4">
    <x-input-label type="textarea" for="description" :value="__('Description')"/>
    <x-textarea-input id="description" class="block mt-1 w-full" cols="4" rows="5" name="description"
                      :value="old('description', $task->description)"
                      autocomplete="description"/>
    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
</div>

<div class="flex items-center justify-end mt-4">
    <x-secondary-button class="ms-4" href="{{route('tasks.index')}}">
        {{ __('Back') }}
    </x-secondary-button>
    <x-primary-button class="ms-4">
        {{ __('Save') }}
    </x-primary-button>
</div>

@push('scripts')
    <script type="text/javascript">
        $(function () {
            $("#project_id").select2({
                language: "en-US",
                allowClear: true,
                ajax: {
                    url: "{{route('tasks.projects')}}",
                    type: "get",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
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
@endpush