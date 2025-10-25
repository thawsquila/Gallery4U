@extends('admin.layout')

@section('title', 'Account Settings')

@section('content')
<div class="max-w-4xl mx-auto">
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
        <div class="p-6 sm:p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Account Settings</h2>
            
            <!-- Account Preferences -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-sliders-h mr-2 text-primary"></i> Preferences
                </h3>
                
                <form method="POST" action="{{ route('admin.settings.preferences') }}" class="space-y-6 max-w-2xl">
                    @csrf
                    @method('PUT')
                    
                    <div class="flex items-center justify-between py-3 border-b border-gray-200">
                        <div>
                            <h4 class="font-medium text-gray-800">Email Notifications</h4>
                            <p class="text-sm text-gray-500">Receive email notifications for new comments</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="email_notifications" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between py-3 border-b border-gray-200">
                        <div>
                            <h4 class="font-medium text-gray-800">Two-Factor Authentication</h4>
                            <p class="text-sm text-gray-500">Add an extra layer of security to your account</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="two_factor" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between py-3 border-b border-gray-200">
                        <div>
                            <h4 class="font-medium text-gray-800">Activity Log</h4>
                            <p class="text-sm text-gray-500">Track all activities on your account</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="activity_log" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        </label>
                    </div>
                    
                    <div class="pt-4">
                        <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-dark transition duration-300">
                            <i class="fas fa-save mr-2"></i> Save Preferences
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Language and Region -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-globe mr-2 text-primary"></i> Language and Region
                </h3>
                
                <form method="POST" action="{{ route('admin.settings.language') }}" class="space-y-6 max-w-2xl">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                        <select id="language" name="language" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                            <option value="en" selected>English</option>
                            <option value="id">Bahasa Indonesia</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="timezone" class="block text-sm font-medium text-gray-700 mb-1">Timezone</label>
                        <select id="timezone" name="timezone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                            <option value="Asia/Jakarta" selected>Asia/Jakarta (GMT+7)</option>
                            <option value="Asia/Makassar">Asia/Makassar (GMT+8)</option>
                            <option value="Asia/Jayapura">Asia/Jayapura (GMT+9)</option>
                        </select>
                    </div>
                    
                    <div class="pt-4">
                        <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-dark transition duration-300">
                            <i class="fas fa-save mr-2"></i> Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Session Management -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
        <div class="p-6 sm:p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Session Management</h2>
            
            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="flex items-start justify-between">
                        <div>
                            <h4 class="font-medium text-gray-800">Current Session</h4>
                            <p class="text-sm text-gray-500">Windows - Chrome - Jakarta, Indonesia</p>
                            <p class="text-xs text-green-600 mt-1">Active now</p>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Current</span>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="flex items-start justify-between">
                        <div>
                            <h4 class="font-medium text-gray-800">Mobile Session</h4>
                            <p class="text-sm text-gray-500">Android - Chrome - Jakarta, Indonesia</p>
                            <p class="text-xs text-gray-500 mt-1">Last active: 2 days ago</p>
                        </div>
                        <button class="text-red-500 hover:text-red-700">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="mt-6">
                <form method="POST" action="{{ route('admin.sessions.logout-others') }}">
                    @csrf
                    <button type="submit" class="px-6 py-3 bg-red-50 text-red-600 border border-red-200 rounded-lg hover:bg-red-100 transition duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i> Log Out All Other Sessions
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- API Access -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-6 sm:p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">API Access</h2>
            
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">API Token</h3>
                <p class="text-sm text-gray-600 mb-4">Use this token to access the API from external applications.</p>
                
                <div class="flex items-center space-x-2 mb-4">
                    <input type="text" value="{{ $apiToken ?? 'api_token_will_be_displayed_here' }}" class="flex-1 px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg" readonly>
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-300">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
                
                <div class="flex space-x-3">
                    <form method="POST" action="{{ route('admin.api.generate-token') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition duration-300">
                            <i class="fas fa-sync-alt mr-2"></i> Generate New Token
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.api.revoke-token') }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-50 text-red-600 border border-red-200 rounded-lg hover:bg-red-100 transition duration-300">
                            <i class="fas fa-trash-alt mr-2"></i> Revoke Token
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection