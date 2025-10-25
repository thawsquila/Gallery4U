<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin - SMK Negeri 4 Bogor</title>
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/png">
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
                        'sans': ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-slide-in {
            animation: slideIn 0.6s ease-out forwards;
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .glass-effect {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
        }

        .input-focus {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 177, 242, 0.15);
        }

        .btn-shimmer {
            background: linear-gradient(45deg, #66B1F2, #4A90E2, #66B1F2);
            background-size: 200% 200%;
            animation: shimmer 2s infinite;
        }

        .logo-glow {
            filter: drop-shadow(0 0 20px rgba(102, 177, 242, 0.3));
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body class="bg-[#EEF2F7] min-h-screen py-10 px-4 flex flex-col items-center">
    <!-- New two-column light layout (admin register) -->
    <div class="w-full max-w-6xl mb-8">
        <div class="bg-white rounded-[32px] shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
            <!-- Left: Form -->
            <div class="p-8 sm:p-12 relative z-10">
                <div class="mb-8">
                    <h1 class="text-3xl font-extrabold text-[#1F2937] tracking-tight">Daftar Admin</h1>
                    <p class="text-gray-500 mt-2">Buat akun admin baru untuk mengelola sistem</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    @if(request('redirect'))
                        <input type="hidden" name="redirect" value="{{ request('redirect') }}">
                    @endif

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm"
                                   placeholder="nama lengkap">
                        </div>
                        @error('name')
                            <p class="text-red-600 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm"
                                   placeholder="email">
                        </div>
                        @error('email')
                            <p class="text-red-600 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kata Sandi -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" type="password" name="password" required
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm"
                                   placeholder="buat kata sandi yang kuat">
                        </div>
                        @error('password')
                            <p class="text-red-600 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Kata Sandi -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm"
                                   placeholder="konfirmasi kata sandi">
                        </div>
                    </div>

                    <!-- Persetujuan -->
                    <div class="flex items-center">
                        <input id="terms" type="checkbox" name="terms" required class="h-4 w-4 text-[#4A90E2] rounded border-gray-300">
                        <label for="terms" class="ml-3 block text-sm text-gray-600">Saya setuju dengan <a href="#" class="text-[#4A90E2]">Syarat Layanan</a> dan <a href="#" class="text-[#4A90E2]">Kebijakan Privasi</a></label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-[#394867] hover:bg-[#2e3a59] text-white rounded-xl py-3 font-semibold shadow-sm transition flex items-center justify-center gap-2">
                        <i class="fas fa-user-plus"></i>
                        Buat Akun Admin
                    </button>

                    <!-- Links -->
                    <div class="flex items-center justify-between text-sm">
                        <a href="{{ route('login', request('redirect') ? ['redirect' => request('redirect')] : []) }}" class="text-gray-500 hover:text-[#4A90E2]">Kembali ke Login</a>
                        <a href="/" class="text-[#4A90E2] font-medium">Beranda</a>
                    </div>
                </form>
            </div>

            <!-- Right: Illustration / Accent Panel -->
            <div class="relative z-0 overflow-hidden min-h-[420px] md:min-h-full bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80">
                <div class="absolute inset-0 pointer-events-none">
                    <!-- Blobs -->
                    <div class="absolute top-8 left-10 w-48 h-48 bg-[#66B1F2]/30 rounded-full blur-3xl animate-float"></div>
                    <div class="absolute bottom-10 right-12 w-72 h-72 bg-[#4A90E2]/30 rounded-full blur-3xl animate-float" style="animation-delay:1.2s"></div>
                    <!-- Diagonal light streak -->
                    <div class="absolute -rotate-12 top-1/4 left-0 right-0 h-28 bg-gradient-to-r from-white/20 via-white/0 to-transparent opacity-60 blur-2xl"></div>
                    <!-- Center soft spotlight -->
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
                    <!-- Small twinkles -->
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
    </div>
    <!-- End new layout -->

    <!-- Footer (global) -->
    <p class="w-full text-center text-gray-400 text-sm mt-6">&copy; 2025 SMK Negeri 4 Bogor. All rights reserved.</p>
</body>
</html>
