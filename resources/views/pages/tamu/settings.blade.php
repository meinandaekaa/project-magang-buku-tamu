@extends('layouts.app')

@section('body')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-3xl shadow-2xl space-y-6">
    <h2 class="text-2xl font-bold text-gray-900">Profil Saya</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <!-- Foto Profil -->
        <div class="flex items-center gap-4">
            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-500">
                <img id="preview" src="{{ $user->photo ? asset('uploads/profile/'.$user->photo) : asset('img/Admin.png') }}" class="object-cover w-full h-full">
            </div>
            <div class="flex-1">
                <input type="file" name="photo" id="photo" class="w-full border rounded p-2"
                       onchange="previewImage(event)">
                @error('photo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Nama -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                   class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                   class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400">
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Password (Kosongkan jika tidak ingin ganti)</label>
            <input type="password" name="password" class="w-full border p-2 rounded mb-1 focus:ring-2 focus:ring-blue-400">
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400">
            @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-xl hover:bg-blue-600 transition">
            Update Profil
        </button>
    </form>
</div>

<script>
function previewImage(event){
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
