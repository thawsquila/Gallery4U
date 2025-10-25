<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sign Up - SMK Negeri 4 Bogor</title>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <!-- New two-column light layout (user register) -->
    <div class="w-full max-w-6xl mb-8">
        <div class="bg-white rounded-[32px] shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
            <!-- Left: Form -->
            <div class="p-8 sm:p-12 relative z-10">
                <div class="mb-8">
                    <h1 class="text-3xl font-extrabold text-[#1F2937] tracking-tight">Daftar Pengguna</h1>
                    <p class="text-gray-500 mt-2">Buat akun untuk berpartisipasi</p>
                </div>

                <form method="POST" action="{{ route('user.register') }}" class="space-y-6">
                    @csrf
                    @if(request('redirect'))
                        <input type="hidden" name="redirect" value="{{ request('redirect') }}">
                    @endif

                    <!-- Nama -->
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
                                   class="w-full pl-12 pr-12 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm"
                                   placeholder="buat kata sandi">
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none bg-transparent">
                                <i class="fas fa-eye-slash"></i>
                            </button>
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
                                   class="w-full pl-12 pr-12 py-3 rounded-xl border border-gray-200 focus:border-[#4A90E2] focus:ring-2 focus:ring-[#B3D9FF] outline-none bg-white placeholder-gray-400 shadow-sm"
                                   placeholder="konfirmasi kata sandi">
                            <button type="button" id="togglePasswordConfirm" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none bg-transparent">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Persetujuan -->
                    <div class="flex items-center">
                        <input id="terms" type="checkbox" name="terms" required class="h-4 w-4 text-[#4A90E2] rounded border-gray-300">
                        <label for="terms" class="ml-3 block text-sm text-gray-600">Saya setuju dengan <a href="#" class="text-[#4A90E2]">Syarat Layanan</a> dan <a href="#" class="text-[#4A90E2]">Kebijakan Privasi</a></label>
                    </div>

                    <!-- reCAPTCHA -->
                    <div>
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        @error('g-recaptcha-response')
                          <p class="text-red-600 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-[#394867] hover:bg-[#2e3a59] text-white rounded-xl py-3 font-semibold shadow-sm transition flex items-center justify-center gap-2">
                        <i class="fas fa-user-plus"></i>
                        Buat Akun
                    </button>

                    <!-- Links -->
                    <div class="flex items-center justify-between text-sm">
                        <a href="{{ route('user.login', request('redirect') ? ['redirect' => request('redirect')] : []) }}" class="text-gray-500 hover:text-[#4A90E2]">Kembali ke Login</a>
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
    <!-- Legacy dark layout below is hidden -->
    <div class="fixed inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.02\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20 pointer-events-none hidden"></div>
    <div class="fixed inset-0 bg-[#66B1F2]/20 pointer-events-none hidden"></div>
    <div class="fixed top-10 right-10 w-32 h-32 bg-[#66B1F2]/10 rounded-full blur-xl animate-pulse pointer-events-none hidden"></div>
    <div class="fixed bottom-10 left-10 w-48 h-48 bg-[#4A90E2]/10 rounded-full blur-2xl animate-pulse pointer-events-none hidden" style="animation-delay: 1s;"></div>
    
    <div class="container mx-auto max-w-lg relative z-10 hidden">
        <!-- Logo dan Judul -->
        <div class="text-center mb-10 animate-fade-in-up">
            <div class="flex justify-center mb-6">
                <div class="glass-effect p-6 rounded-3xl shadow-2xl animate-float logo-glow">
                    <img src="/images/favicon.svg" alt="Logo SMK Negeri 4" class="w-20 h-20 object-contain">
                </div>
            </div>
            <h1 class="text-4xl font-bold text-white mb-3 text-shadow">SMK Negeri 4 Bogor</h1>
            <p class="text-white/60 text-lg font-medium">Create User Account</p>
            <div class="w-24 h-1 bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] rounded-full mx-auto mt-4"></div>
        </div>

        <!-- Form Sign Up -->
        <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.2s;">
            <div class="bg-gradient-to-r from-[#66B1F2] via-[#4A90E2] to-[#254C6B] p-8 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full translate-y-12 -translate-x-12"></div>
                <div class="relative z-10">
                    <div class="flex items-center space-x-4 mb-2">
                        <div class="p-3 bg-white/10 rounded-2xl">
                            <i class="fas fa-user-plus text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Create Account</h3>
                            <p class="text-blue-100 text-sm">User Registration</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <form method="POST" action="{{ route('user.register') }}" class="space-y-6">
                    @csrf
                    @if(request('redirect'))
                        <input type="hidden" name="redirect" value="{{ request('redirect') }}">
                    @endif

                    <!-- Name -->
                    <div class="animate-slide-in" style="animation-delay: 0.3s;">
                        <label for="name" class="block text-sm font-semibold text-white/90 mb-3">Full Name</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                            </div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                class="bg-black/30 backdrop-blur-md border border-white/20 text-white rounded-2xl block w-full pl-12 pr-4 py-4 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#66B1F2]/70 focus:border-[#66B1F2]/70 input-focus"
                                placeholder="Enter your full name">
                        </div>
                        @error('name')
                            <p class="text-red-400 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="animate-slide-in" style="animation-delay: 0.4s;">
                        <label for="email" class="block text-sm font-semibold text-white/90 mb-3">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                class="bg-black/30 backdrop-blur-md border border-white/20 text-white rounded-2xl block w-full pl-12 pr-4 py-4 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#66B1F2]/70 focus:border-[#66B1F2]/70 input-focus"
                                placeholder="Email">
                        </div>
                        @error('email')
                            <p class="text-red-400 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="animate-slide-in" style="animation-delay: 0.5s;">
                        <label for="password" class="block text-sm font-semibold text-white/90 mb-3">Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                            </div>
                            <input id="password" type="password" name="password" required
                                class="bg-black/30 backdrop-blur-md border border-white/20 text-white rounded-2xl block w-full pl-12 pr-12 py-4 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#66B1F2]/70 focus:border-[#66B1F2]/70 input-focus"
                                placeholder="Create a strong password">
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-white transition-colors">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-400 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="animate-slide-in" style="animation-delay: 0.6s;">
                        <label for="password_confirmation" class="block text-sm font-semibold text-white/90 mb-3">Confirm Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="bg-black/30 backdrop-blur-md border border-white/20 text-white rounded-2xl block w-full pl-12 pr-12 py-4 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#66B1F2]/70 focus:border-[#66B1F2]/70 input-focus"
                                placeholder="Confirm your password">
                            <button type="button" id="togglePasswordConfirm" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-white transition-colors">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="flex items-center animate-slide-in" style="animation-delay: 0.7s;">
                        <input id="terms" type="checkbox" name="terms" required
                            class="h-5 w-5 text-[#66B1F2] focus:ring-[#66B1F2] border-white/20 rounded-lg bg-black/30">
                        <label for="terms" class="ml-3 block text-sm text-white/80 font-medium">
                            I agree to the <a href="#" class="text-[#66B1F2] hover:text-white transition-colors">Terms of Service</a> and <a href="#" class="text-[#66B1F2] hover:text-white transition-colors">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- reCAPTCHA -->
                    <div class="animate-slide-in" style="animation-delay: 0.8s;">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        @error('g-recaptcha-response')
                          <p class="text-red-400 text-sm mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="animate-slide-in" style="animation-delay: 0.9s;">
                        <button type="submit"
                            class="w-full btn-shimmer text-white px-6 py-4 rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
                            <span class="relative z-10 flex items-center justify-center">
                                <i class="fas fa-user-plus mr-2"></i>
                                Create Account
                            </span>
                        </button>
                        <a href="{{ request('redirect') ? url(request('redirect')) : url('/') }}"
                           class="mt-3 w-full inline-flex items-center justify-center px-6 py-3 rounded-2xl border border-white/20 text-white/90 hover:text-white hover:bg-white/10 transition-all">
                           Lanjut sebagai Guest
                        </a>
                    </div>

                    <!-- Links -->
                    <div class="flex items-center justify-between pt-4 animate-slide-in" style="animation-delay: 0.9s;">
                        <a href="{{ route('user.login', request('redirect') ? ['redirect' => request('redirect')] : []) }}" class="text-[#66B1F2] hover:text-white transition-colors font-medium flex items-center group">
                            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                            Back to Login
                        </a>
                        <a href="/" class="text-[#66B1F2] hover:text-white transition-colors font-medium flex items-center group">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-10 animate-fade-in-up" style="animation-delay: 1s;">
            <div class="glass-effect rounded-2xl p-6 mb-6">
                <div class="flex items-center justify-center space-x-6 text-white/60">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-shield-check text-green-400"></i>
                        <span class="text-sm font-medium">Aman</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-lock text-blue-400"></i>
                        <span class="text-sm font-medium">Terenkripsi</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user-shield text-purple-400"></i>
                        <span class="text-sm font-medium">Terlindungi</span>
                    </div>
                </div>
            </div>
            <p class="text-white/40 text-sm">&copy; 2025 SMK Negeri 4 Bogor. All rights reserved.</p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const setupToggle = (inputSelector, buttonSelector) => {
                const input = document.querySelector(inputSelector);
                const btn = document.querySelector(buttonSelector);
                if (!input || !btn) return;
                const icon = btn.querySelector('i');
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Preserve caret position when toggling type
                    const start = input.selectionStart;
                    const end = input.selectionEnd;
                    const isPassword = input.getAttribute('type') === 'password';
                    input.setAttribute('type', isPassword ? 'text' : 'password');
                    // Restore selection and focus
                    requestAnimationFrame(() => {
                        input.focus();
                        try { input.setSelectionRange(start, end); } catch (err) {}
                    });
                    // Swap icon
                    icon.classList.toggle('fa-eye', isPassword);
                    icon.classList.toggle('fa-eye-slash', !isPassword);
                });
            };
            setupToggle('#password', '#togglePassword');
            setupToggle('#password_confirmation', '#togglePasswordConfirm');
        });
    </script>
</body>
</html>
