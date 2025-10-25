<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - SMK Negeri 4 Bogor</title>
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
    <!-- Removed old background overlays for light layout -->
    
    <div class="w-full max-w-6xl">
        <div class="bg-white rounded-[32px] shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
            <!-- Left: Form -->
            <div class="p-8 sm:p-12 relative z-10">
                <div class="mb-8">
                    <h1 class="text-3xl font-extrabold text-[#1F2937] tracking-tight">Login Pengguna</h1>
                    <p class="text-gray-500 mt-2">Silakan masuk untuk melanjutkan</p>
                </div>

                <form method="POST" action="{{ route('user.login') }}" class="space-y-6">
                    @csrf
                    @if(request('redirect'))
                        <input type="hidden" name="redirect" value="{{ request('redirect') }}">
                    @endif

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm">
                        </div>
                        @error('email')
                            <p class="text-red-600 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" type="password" name="password" required
                                   class="w-full pl-12 pr-12 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm">
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-600 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember / Forgot -->
                    <div class="flex items-center justify-between">
                        <label class="inline-flex items-center gap-2 select-none text-gray-600">
                            <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-[#4A90E2] rounded border-gray-300">
                            <span class="text-sm">Ingat saya</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-sm text-[#4A90E2] hover:underline">Lupa kata sandi?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-[#394867] hover:bg-[#2e3a59] text-white rounded-xl py-3 font-semibold shadow-sm transition">
                        Masuk
                    </button>

                    <!-- Bottom links -->
                    <div class="flex items-center justify-between text-sm">
                        <a href="/" class="text-gray-500 hover:text-[#4A90E2]">Kembali ke Website</a>
                        <a href="{{ route('user.register', request('redirect') ? ['redirect' => request('redirect')] : []) }}" class="text-[#4A90E2] font-medium">Daftar</a>
                    </div>

                    <a href="{{ request('redirect') ? url(request('redirect')) : url('/') }}" class="block text-center mt-2 text-gray-500 hover:text-[#4A90E2]">Lanjut sebagai Tamu</a>
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

        <p class="w-full text-center text-gray-400 text-sm mt-6">&copy; 2025 SMK Negeri 4 Bogor. All rights reserved.</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const icon = togglePassword.querySelector('i');

            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                // Toggle the eye / eye-slash icon
                if (type === 'password') {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>
</body>
</html>
