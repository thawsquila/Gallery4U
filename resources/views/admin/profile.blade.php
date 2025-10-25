@extends('admin.layout')

@section('title', 'Profile Settings')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
        <div class="p-6 sm:p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Profile Settings</h2>
            
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Profile Picture Section -->
                <div class="md:w-1/3">
                    <div class="bg-gray-100 rounded-xl p-6 text-center">
                        @php $av = Auth::user()->avatar ? asset('images/avatars/'.Auth::user()->avatar).'?v='.time() : null; @endphp
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden ring-2 ring-blue-100 bg-gradient-to-r from-primary to-primary-dark flex items-center justify-center shadow-lg mb-4">
                            @if($av)
                                <img id="adminAvatarPreview" src="{{ $av }}" class="w-full h-full object-cover" alt="Avatar">
                            @else
                                <img id="adminAvatarPreview" src="" class="w-full h-full object-cover hidden" alt="Avatar">
                                <i id="adminAvatarIcon" class="fas fa-user text-white text-4xl"></i>
                            @endif
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ Auth::user()->name }}</h3>
                        <p class="text-sm text-gray-500 mb-4">Administrator</p>
                        <button type="button" onclick="triggerAdminAvatar()" class="w-full px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-300 flex items-center justify-center">
                            <i class="fas fa-camera mr-2"></i> Pilih Foto
                        </button>
                        <p class="text-xs text-gray-500 mt-2">Maks 2MB. JPG, JPEG, PNG, WEBP</p>
                    </div>
                </div>
                
                <!-- Profile Information Form -->
                <div class="md:w-2/3">
                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <!-- Hidden avatar input to ensure file is submitted -->
                        <input type="file" name="avatar" id="adminAvatarInput" accept="image/*" class="hidden" onchange="previewAdminAvatar(this)">
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="pt-4">
                            <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-dark transition duration-300">
                                <i class="fas fa-save mr-2"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Security Settings -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
        <div class="p-6 sm:p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Security Settings</h2>
            
            <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-6 max-w-2xl">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    @error('current_password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                </div>
                
                <div class="pt-4">
                    <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-dark transition duration-300">
                        <i class="fas fa-lock mr-2"></i> Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Danger Zone -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-6 sm:p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Danger Zone</h2>
            
            <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-red-700 mb-2">Delete Account</h3>
                <p class="text-sm text-gray-600 mb-4">Once you delete your account, there is no going back. Please be certain.</p>
                
                <button type="button" onclick="confirmDelete()" class="px-6 py-3 bg-white border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition duration-300">
                    <i class="fas fa-trash-alt mr-2"></i> Delete Account
                </button>
                
                <!-- Hidden Delete Form -->
                <form id="deleteAccountForm" method="POST" action="{{ route('admin.account.delete') }}" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function triggerAdminAvatar(){
        const inp = document.getElementById('adminAvatarInput');
        if(inp) inp.click();
    }
    function previewAdminAvatar(input){
        if(!input.files || !input.files[0]) return;
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.getElementById('adminAvatarPreview');
            const icon = document.getElementById('adminAvatarIcon');
            if(img){ img.src = e.target.result; img.classList.remove('hidden'); }
            if(icon){ icon.classList.add('hidden'); }
        };
        reader.readAsDataURL(input.files[0]);
    }
    function confirmDelete() {
        if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
            document.getElementById('deleteAccountForm').submit();
        }
    }
</script>
@endpush
@endsection