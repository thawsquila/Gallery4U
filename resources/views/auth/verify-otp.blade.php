<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - SMK Negeri 4 Bogor</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
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

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
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

        .otp-input {
            width: 60px;
            height: 60px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border-radius: 12px;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: white;
            transition: all 0.3s ease;
        }

        .otp-input:focus {
            border-color: #66B1F2;
            box-shadow: 0 0 0 3px rgba(102, 177, 242, 0.3);
            transform: scale(1.05);
        }

        .countdown {
            animation: pulse 1s infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80 py-8 px-4 relative">
    <!-- Background Elements -->
    <div class="fixed inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.02"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20 pointer-events-none"></div>
    <div class="fixed inset-0 bg-[#66B1F2]/20 pointer-events-none"></div>
    <div class="fixed top-10 right-10 w-32 h-32 bg-[#66B1F2]/10 rounded-full blur-xl animate-pulse pointer-events-none"></div>
    <div class="fixed bottom-10 left-10 w-48 h-48 bg-[#4A90E2]/10 rounded-full blur-2xl animate-pulse pointer-events-none" style="animation-delay: 1s;"></div>
    
    <div class="container mx-auto max-w-lg relative z-10">
        <!-- Logo dan Judul -->
        <div class="text-center mb-10 animate-fade-in-up">
            <div class="flex justify-center mb-6">
                <div class="glass-effect p-6 rounded-3xl shadow-2xl animate-float logo-glow">
                    <img src="/images/favicon.svg" alt="Logo SMK Negeri 4" class="w-20 h-20 object-contain">
                </div>
            </div>
            <h1 class="text-4xl font-bold text-white mb-3 text-shadow">SMK Negeri 4 Bogor</h1>
            <p class="text-white/60 text-lg font-medium">Verify Your Email</p>
            <div class="w-24 h-1 bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] rounded-full mx-auto mt-4"></div>
        </div>

        <!-- Form OTP Verification -->
        <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.2s;">
            <div class="bg-gradient-to-r from-[#66B1F2] via-[#4A90E2] to-[#254C6B] p-8 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full translate-y-12 -translate-x-12"></div>
                <div class="relative z-10">
                    <div class="flex items-center space-x-4 mb-2">
                        <div class="p-3 bg-white/10 rounded-2xl">
                            <i class="fas fa-shield-check text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Email Verification</h3>
                            <p class="text-blue-100 text-sm">Enter the 6-digit code sent to your email</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                @if (session('error'))
                    <div class="mb-6 p-4 bg-red-500/20 border border-red-500/30 rounded-2xl">
                        <p class="text-red-300 text-sm flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                        </p>
                    </div>
                @endif

                <div class="mb-6 p-4 bg-blue-500/20 border border-blue-500/30 rounded-2xl">
                    <p class="text-blue-200 text-sm">
                        <i class="fas fa-envelope mr-2"></i>
                        We've sent a 6-digit verification code to <strong>{{ session('email') }}</strong>
                    </p>
                </div>

                <form method="POST" action="{{ route('verify.otp') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="email" value="{{ session('email') }}">

                    <!-- OTP Input -->
                    <div class="animate-slide-in" style="animation-delay: 0.3s;">
                        <label class="block text-sm font-semibold text-white/90 mb-4 text-center">Enter Verification Code</label>
                        <div class="flex justify-center space-x-3 mb-4">
                            <input type="text" name="otp1" maxlength="1" class="otp-input" oninput="moveToNext(this, 'otp2')" onkeydown="moveToPrev(this, null)" autofocus>
                            <input type="text" name="otp2" maxlength="1" class="otp-input" oninput="moveToNext(this, 'otp3')" onkeydown="moveToPrev(this, 'otp1')">
                            <input type="text" name="otp3" maxlength="1" class="otp-input" oninput="moveToNext(this, 'otp4')" onkeydown="moveToPrev(this, 'otp2')">
                            <input type="text" name="otp4" maxlength="1" class="otp-input" oninput="moveToNext(this, 'otp5')" onkeydown="moveToPrev(this, 'otp3')">
                            <input type="text" name="otp5" maxlength="1" class="otp-input" oninput="moveToNext(this, 'otp6')" onkeydown="moveToPrev(this, 'otp4')">
                            <input type="text" name="otp6" maxlength="1" class="otp-input" oninput="moveToNext(this, null)" onkeydown="moveToPrev(this, 'otp5')">
                        </div>
                        <input type="hidden" name="otp_code" id="otp_code">
                        @error('otp_code')
                            <p class="text-red-400 text-sm mt-2 flex items-center justify-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Countdown Timer -->
                    <div class="text-center animate-slide-in" style="animation-delay: 0.4s;">
                        <p class="text-white/60 text-sm mb-2">Code expires in:</p>
                        <div class="countdown text-2xl font-bold text-[#66B1F2]" id="countdown">10:00</div>
                    </div>

                    <!-- Submit Button -->
                    <div class="animate-slide-in" style="animation-delay: 0.5s;">
                        <button type="submit" id="verify-btn"
                            class="w-full btn-shimmer text-white px-6 py-4 rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
                            <span class="relative z-10 flex items-center justify-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                Verify & Complete Registration
                            </span>
                        </button>
                    </div>

                    <!-- Resend OTP -->
                    <div class="text-center animate-slide-in" style="animation-delay: 0.6s;">
                        <p class="text-white/60 text-sm mb-3">Didn't receive the code?</p>
                        <button type="button" onclick="resendOtp()" id="resend-btn" disabled
                            class="text-[#66B1F2] hover:text-white transition-colors font-medium disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-redo mr-2"></i>
                            <span id="resend-text">Resend Code (60s)</span>
                        </button>
                    </div>

                    <!-- Links -->
                    <div class="flex items-center justify-center pt-4 animate-slide-in" style="animation-delay: 0.7s;">
                        <a href="{{ route('register') }}" class="text-[#66B1F2] hover:text-white transition-colors font-medium flex items-center group">
                            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                            Back to Registration
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-10 animate-fade-in-up" style="animation-delay: 0.8s;">
            <div class="glass-effect rounded-2xl p-6 mb-6">
                <div class="flex items-center justify-center space-x-6 text-white/60">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-shield-check text-green-400"></i>
                        <span class="text-sm font-medium">Secure</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-clock text-yellow-400"></i>
                        <span class="text-sm font-medium">10 Minutes</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-envelope text-blue-400"></i>
                        <span class="text-sm font-medium">Email Verified</span>
                    </div>
                </div>
            </div>
            <p class="text-white/40 text-sm">&copy; 2025 SMK Negeri 4 Bogor. All rights reserved.</p>
        </div>
    </div>

    <script>
        let countdown = 600; // 10 minutes in seconds
        let resendCountdown = 60; // 60 seconds for resend

        function moveToNext(current, nextFieldId) {
            if (current.value.length === 1) {
                if (nextFieldId) {
                    document.getElementById(nextFieldId).focus();
                }
                updateOtpCode();
            }
        }

        function moveToPrev(current, prevFieldId) {
            if (event.key === 'Backspace' && current.value === '' && prevFieldId) {
                document.getElementById(prevFieldId).focus();
            }
        }

        function updateOtpCode() {
            const otp1 = document.querySelector('input[name="otp1"]').value;
            const otp2 = document.querySelector('input[name="otp2"]').value;
            const otp3 = document.querySelector('input[name="otp3"]').value;
            const otp4 = document.querySelector('input[name="otp4"]').value;
            const otp5 = document.querySelector('input[name="otp5"]').value;
            const otp6 = document.querySelector('input[name="otp6"]').value;
            
            document.getElementById('otp_code').value = otp1 + otp2 + otp3 + otp4 + otp5 + otp6;
        }

        function updateCountdown() {
            const minutes = Math.floor(countdown / 60);
            const seconds = countdown % 60;
            document.getElementById('countdown').textContent = 
                `${minutes}:${seconds.toString().padStart(2, '0')}`;
            
            if (countdown <= 0) {
                document.getElementById('countdown').textContent = 'Expired';
                document.getElementById('verify-btn').disabled = true;
                document.getElementById('verify-btn').classList.add('opacity-50', 'cursor-not-allowed');
            }
            
            countdown--;
        }

        function updateResendCountdown() {
            const resendBtn = document.getElementById('resend-btn');
            const resendText = document.getElementById('resend-text');
            
            if (resendCountdown > 0) {
                resendText.textContent = `Resend Code (${resendCountdown}s)`;
                resendCountdown--;
            } else {
                resendBtn.disabled = false;
                resendText.textContent = 'Resend Code';
            }
        }

        function resendOtp() {
            // Reset countdown
            resendCountdown = 60;
            document.getElementById('resend-btn').disabled = true;
            
            // Make AJAX request to resend OTP
            fetch('{{ route("resend.otp") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    email: '{{ session("email") }}'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('New verification code sent!');
                } else {
                    alert('Failed to send code. Please try again.');
                }
            });
        }

        // Start countdowns
        setInterval(updateCountdown, 1000);
        setInterval(updateResendCountdown, 1000);

        // Auto-submit when all fields are filled
        document.querySelectorAll('.otp-input').forEach(input => {
            input.addEventListener('input', function() {
                updateOtpCode();
                const otpCode = document.getElementById('otp_code').value;
                if (otpCode.length === 6) {
                    setTimeout(() => {
                        document.querySelector('form').submit();
                    }, 500);
                }
            });
        });
    </script>
</body>
</html>
