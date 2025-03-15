@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-400 focus:border-indigo-300 focus:ring-2 focus:ring-indigo-100 focus:ring-opacity-50 rounded-md text-black bg-white transition-colors']) }}>