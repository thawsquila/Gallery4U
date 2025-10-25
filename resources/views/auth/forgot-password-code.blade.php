<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verifikasi Kode - SMK Negeri 4 Bogor</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#3B82F6',
            'primary-dark': '#1E40AF',
            'primary-light': '#93C5FD',
            accent: '#10B981',
            'accent-dark': '#059669'
          },
          fontFamily: {
            'sans': ['Poppins', 'system-ui', 'sans-serif']
          }
        }
      }
    }
  </script>
  <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/png">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>*{font-family:'Poppins',system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial,'Noto Sans',sans-serif}</style>
</head>
<body class="bg-[#EEF2F7] min-h-screen py-10 px-4 flex items-center justify-center">
  <div class="w-full max-w-6xl">
    <div class="bg-white rounded-[32px] shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
      <!-- Left: Form -->
      <div class="p-8 sm:p-12">
        <div class="mb-8">
          <h1 class="text-3xl font-extrabold text-[#1F2937] tracking-tight">Verifikasi Kode</h1>
          <p class="text-gray-500 mt-2">Masukkan kode 6 digit yang kami kirim ke email Anda.</p>
        </div>

        @if(session('status'))
          <div class="mb-4 rounded-xl bg-blue-50 text-blue-700 border border-blue-200 px-4 py-3">{{ session('status') }}</div>
        @endif
        @if($errors->any())
          <div class="mb-4 rounded-xl bg-red-50 text-red-700 border border-red-200 px-4 py-3">
            <ul class="list-disc list-inside text-sm">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('password.code.verify') }}" class="space-y-6">
          @csrf

          <!-- Email -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="fas fa-envelope text-gray-400"></i>
              </div>
              <input type="email" name="email" value="{{ old('email', $email) }}" required
                     class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm">
            </div>
          </div>

          <!-- OTP Code -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Kode 6 Digit</label>
            <input type="text" name="otp_code" maxlength="6" placeholder="Contoh: 123456" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm tracking-widest text-center text-lg">
          </div>

          <!-- Submit -->
          <button class="w-full bg-[#394867] hover:bg-[#2e3a59] text-white rounded-xl py-3 font-semibold shadow-sm transition">Verifikasi & Lanjutkan</button>

          <!-- Bottom links -->
          <div class="text-center text-sm mt-2">
            <a href="{{ route('password.request') }}" class="text-gray-500 hover:text-[#4A90E2]">Kirim ulang kode</a>
          </div>
        </form>
      </div>

      <!-- Right: Illustration / Accent Panel -->
      <div class="relative min-h-[420px] md:min-h-full bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80">
        <div class="absolute inset-0 pointer-events-none">
          <div class="absolute top-8 left-10 w-48 h-48 bg-[#66B1F2]/30 rounded-full blur-3xl animate-float"></div>
          <div class="absolute bottom-10 right-12 w-72 h-72 bg-[#4A90E2]/30 rounded-full blur-3xl animate-float" style="animation-delay:1.2s"></div>
          <div class="absolute -rotate-12 top-1/4 left-0 right-0 h-28 bg-gradient-to-r from-white/20 via-white/0 to-transparent opacity-60 blur-2xl"></div>
          <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
          <span class="absolute top-14 right-16 w-1.5 h-1.5 bg-white/70 rounded-full animate-pulse"></span>
          <span class="absolute bottom-16 left-20 w-1 h-1 bg-white/60 rounded-full animate-pulse" style="animation-delay:.4s"></span>
          <span class="absolute top-1/3 left-1/3 w-1 h-1 bg-white/60 rounded-full animate-pulse" style="animation-delay:.8s"></span>
        </div>
        <div class="relative h-full flex items-center justify-center p-10">
          <div class="bg-white/70 rounded-3xl shadow-lg p-6">
            <img src="{{ asset('images/favicon.svg') }}" alt="Logo" class="w-24 h-24 mx-auto mb-4">
            <p class="text-center text-[#394867] font-extrabold text-2xl md:text-3xl tracking-tight">Gallery4U</p>
          </div>
        </div>
      </div>
    </div>

    <p class="text-center text-gray-400 text-sm mt-6">&copy; 2025 SMK Negeri 4 Bogor. All rights reserved.</p>
  </div>
</body>
</html>
