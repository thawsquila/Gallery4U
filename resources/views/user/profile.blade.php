<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Saya - Gallery4U</title>
  <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
  <nav class="bg-white shadow sticky top-0 z-40">
    <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
      <a href="{{ route('guest.home') }}" class="flex items-center space-x-1">
        <img src="{{ asset('images/favicon.svg') }}" class="w-8 h-8 md:w-9 md:h-9" alt="Logo">
        <span class="text-base md:text-base font-semibold text-gray-800 leading-none">Gallery4U</span>
      </a>
      <div class="flex items-center gap-2">
        <a href="{{ route('guest.home') }}" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Beranda</a>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="ml-1 px-4 py-2 text-base rounded-xl ring-1 ring-gray-200 hover:bg-gray-100 font-semibold text-gray-700 bg-white">Keluar</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="max-w-5xl mx-auto p-4 md:p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Profile Settings</h1>

    @if(session('success'))
      <div class="mb-4 rounded-lg bg-green-50 text-green-700 border border-green-200 px-4 py-3">{{ session('success') }}</div>
    @endif
    @if(session('success_password'))
      <div class="mb-4 rounded-lg bg-green-50 text-green-700 border border-green-200 px-4 py-3">{{ session('success_password') }}</div>
    @endif
    @if($errors->any())
      <div class="mb-4 rounded-lg bg-red-50 text-red-700 border border-red-200 px-4 py-3">
        <ul class="list-disc list-inside text-sm">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
      <div class="p-6 sm:p-8">
        <div class="flex flex-col md:flex-row gap-8">
          <!-- Left: Avatar -->
          <div class="md:w-1/3">
            <div class="bg-gray-100 rounded-xl p-6 text-center">
              @php $cur = $user->avatar ? asset('images/avatars/'.$user->avatar).'?v='.time() : null; @endphp
              <div class="w-32 h-32 mx-auto rounded-full overflow-hidden ring-2 ring-blue-100 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center shadow-lg mb-4">
                @if($cur)
                  <img id="avatarPreview" src="{{ $cur }}" class="w-full h-full object-cover" alt="Avatar">
                @else
                  <img id="avatarPreview" src="" class="w-full h-full object-cover hidden" alt="Avatar">
                  <i id="avatarIcon" class="fas fa-user text-white text-4xl"></i>
                @endif
              </div>
              <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $user->name }}</h3>
              <p class="text-sm text-gray-500 mb-4">Pengguna</p>
              <button type="button" onclick="triggerUserAvatar()" class="w-full px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-300 flex items-center justify-center">
                <i class="fas fa-camera mr-2"></i> Pilih Foto
              </button>
              <p class="text-xs text-gray-500 mt-2">Maks 2MB. JPG, JPEG, PNG, WEBP</p>
            </div>
          </div>

          <!-- Right: Form -->
          <div class="md:w-2/3">
            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
              @csrf
              @method('PUT')
              <input type="file" name="avatar" id="userAvatarInput" accept="image/*" class="hidden" onchange="previewAvatar(this)">

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
              </div>
              <div class="pt-2">
                <button class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
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
        <form action="{{ route('user.password.update') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-2xl">
          @csrf
          @method('PUT')
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
            <input type="password" name="current_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
            <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
          </div>
          <div class="md:col-span-2 pt-2">
            <button class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
              <i class="fas fa-lock mr-2"></i> Update Password
            </button>
          </div>
        </form>
      </div>
    </div>

        <!-- Delete Account -->
        <section class="bg-white rounded-2xl shadow p-6 border border-red-100">
          <h2 class="font-semibold text-red-700 mb-2">Hapus Akun</h2>
          <p class="text-sm text-red-600 mb-4">Tindakan ini permanen. Semua data terkait akun Anda akan dihapus dan Anda akan keluar dari sistem.</p>
          <form action="{{ route('user.account.destroy') }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun? Tindakan ini tidak bisa dibatalkan.');" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            @method('DELETE')
            <div class="md:col-span-2">
              <label class="block text-sm text-gray-600 mb-1">Konfirmasi Password</label>
              <input type="password" name="confirm_password" class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-200 focus:border-red-400" required>
            </div>
            <div class="md:col-span-2 flex justify-end">
              <button class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-xl font-semibold">Hapus Akun</button>
            </div>
          </form>
        </section>
      </div>
    </div>
  </main>
  <script>
    function triggerUserAvatar(){
      const i = document.getElementById('userAvatarInput');
      if(i) i.click();
    }
    function previewAvatar(input){
      if(!input.files || !input.files[0]) return;
      const reader = new FileReader();
      reader.onload = e => {
        const img = document.getElementById('avatarPreview');
        const icon = document.getElementById('avatarIcon');
        if(img){
          img.src = e.target.result;
          img.classList.remove('hidden');
        }
        if(icon){
          icon.classList.add('hidden');
        }
      };
      reader.readAsDataURL(input.files[0]);
    }
  </script>
</body>
</html>
