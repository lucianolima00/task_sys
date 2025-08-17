@props(['disabled' => false, 'data' => ['' => Arr::get($attributes, 'placeholder')]])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm']) !!}>
    @foreach($data as $data_option)
        <option value='{{ $data_option['value'] }}'>{{ $data_option['label'] }}</option>
    @endforeach
</select>
