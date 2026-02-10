@extends('backend.admin')

@section('content')
<div class="flex justify-center mt-2">
    <div class="w-full max-w-7xl bg-white shadow-xl rounded-2xl p-10">
        <!-- Title -->
        <h2 class="text-3xl font-bold text-[#4DA358] mb-8 text-center border-b pb-4">
            Admin Profile
        </h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-6 text-center font-medium">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Form -->
        <form action="{{ route('submit.update.profile') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @csrf
            <input type="hidden" name="id" value="{{ $showProfile[0]->id }}">

            <!-- Left Column: Profile Image -->
            <div class="flex flex-col items-center">
                <div class="relative">
                    <img src="../../assets/profile/{{ $showProfile[0]->profile }}"
                         alt="Profile Image"
                         class="w-40 h-40 rounded-full object-contain border-4 border-[#4DA358] shadow-md mb-4">
                    <input type="hidden" name="old_profile" value="{{ $showProfile[0]->profile }}">
                </div>

                <label class="block text-gray-700 font-semibold mb-2">Change Profile Picture</label>
                <input type="file" name="update_profile"
                       class="w-full text-sm text-gray-600 border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#4DA358]">
                @error('profile') 
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                @enderror
                  <!-- Submit Button (Full Width) -->
                    <div class="col-span-1 md:col-span-2 text-center mt-4">
                <button type="submit"
                        class="bg-[#4DA358] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#3c8747] transition-all shadow-md">
                    Update Profile
                </button>
            </div>
            </div>
           

            <!-- Right Column: Info Fields -->
            <div>
                <!-- Username -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Username</label>
                    <input type="text" name="update_username" value="{{ $showProfile[0]->username }}"
                           class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4DA358]">
                    @error('name') 
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="update_email" value="{{ $showProfile[0]->email }}"
                           class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4DA358]">
                    @error('email') 
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Change Password</label>
                    <input type="hidden" name="old_password" value="{{ $showProfile[0]->password }}"
                           class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4DA358]">
                    <input type="password" name="update_password"
                           class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4DA358]">
                    @error('password') 
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                    @enderror
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
