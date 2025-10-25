@extends('admin.layout')

@section('title', 'Kustomisasi')

@push('styles')
<style>
    .stat-card {
        @apply bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative;
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
    }
    .stat-icon {
        @apply w-14 h-14 flex items-center justify-center rounded-2xl text-white text-2xl mb-5 shadow-lg;
        background: linear-gradient(135deg, var(--tw-gradient-stops));
    }
    .stat-input {
        @apply w-full px-5 py-3 text-lg font-semibold text-gray-800 bg-white/80 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-opacity-50 focus:border-transparent shadow-sm;
        word-wrap: break-word;
        word-break: break-word;
        white-space: pre-wrap;
        overflow-wrap: break-word;
        line-height: 1.6;
    }
    .stat-label {
        @apply block text-sm font-semibold text-gray-600 mb-3 tracking-wide uppercase;
        letter-spacing: 0.5px;
    }
    .stat-description {
        @apply text-xs text-gray-500 mt-2 transition-colors duration-300;
    }
    .stat-card:hover .stat-description {
        @apply text-blue-600;
    }
    /* Buttons: ubah bentuk container jadi pill/rounded-full */
    .save-btn {
        /* Samakan dengan tombol utama lain (blue → indigo) */
        background: linear-gradient(135deg, #3b82f6, #6366f1);
        @apply inline-flex items-center justify-center px-7 py-3.5 rounded-full font-semibold text-white shadow-lg;
        transition: transform .15s ease, box-shadow .2s ease;
    }
    .save-btn:hover { transform: translateY(-1px); box-shadow: 0 12px 24px rgba(79,70,229,.25); }
    .save-btn:active { transform: translateY(0); }

    .back-btn {
        @apply inline-flex items-center justify-center px-6 py-3 rounded-full font-medium text-gray-700 bg-white border-2 border-gray-200;
        transition: background-color .15s ease, border-color .15s ease, transform .15s ease;
    }
    .back-btn:hover { @apply bg-gray-50 border-gray-300; transform: translateY(-1px); }
    .back-btn:active { transform: translateY(0); }
</style>
@endpush

@section('content')
<div class="space-y-8">
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm text-gray-500 mt-2 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-blue-400"></i>
                    Update tampilan beranda website
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('guest.home') }}" target="_blank" class="inline-flex items-center px-5 py-2.5 bg-white border-2 border-blue-500 text-blue-600 font-medium rounded-full hover:bg-blue-50 transition-colors duration-300">
                    <i class="fas fa-external-link-alt mr-2"></i> Lihat Tampilan Website
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-xl shadow-sm animate-fade-in">
        <div class="flex items-start">
            <div class="flex-shrink-0 mt-0.5">
                <i class="fas fa-check-circle text-green-500 text-xl"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-green-800">Berhasil!</h3>
                <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    <form action="{{ route('admin.statistics.update') }}" method="POST" class="space-y-8" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Siswa Aktif -->
            <div class="stat-card p-7 group">
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Statistik</div>
                                <div class="text-lg font-semibold text-gray-900">Siswa Aktif</div>
                            </div>
                        </div>
                    </div>
                    <label for="active_students" class="sr-only">Siswa Aktif</label>
                    <input type="number"
                           name="active_students"
                           id="active_students"
                           value="{{ old('active_students', $stats->active_students) }}"
                           class="stat-input text-2xl tracking-tight"
                           min="0"
                           oninput="this.value = Math.abs(this.value)">
                    @error('active_students')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                    <p class="stat-description mt-3 flex items-center">
                        <i class="fas fa-info-circle mr-1"></i> Jumlah total siswa aktif saat ini
                    </p>
                </div>
            </div>

            <!-- Jumlah Jurusan -->
            <div class="stat-card p-7 group">
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Statistik</div>
                                <div class="text-lg font-semibold text-gray-900">Program Keahlian</div>
                            </div>
                        </div>
                    </div>
                    <label for="majors_count" class="sr-only">Program Keahlian</label>
                    <input type="number"
                           name="majors_count"
                           id="majors_count"
                           value="{{ old('majors_count', $stats->majors_count) }}"
                           class="stat-input text-2xl tracking-tight"
                           min="0"
                           oninput="this.value = Math.abs(this.value)">
                    @error('majors_count')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                    <p class="stat-description mt-3 flex items-center">
                        <i class="fas fa-info-circle mr-1"></i> Total program keahlian yang tersedia
                    </p>
                </div>
            </div>

            <!-- Guru Profesional -->
            <div class="stat-card p-7 group">
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Statistik</div>
                                <div class="text-lg font-semibold text-gray-900">Guru Profesional</div>
                            </div>
                        </div>
                    </div>
                    <label for="professional_teachers" class="sr-only">Guru Profesional</label>
                    <input type="number"
                           name="professional_teachers"
                           id="professional_teachers"
                           value="{{ old('professional_teachers', $stats->professional_teachers) }}"
                           class="stat-input text-2xl tracking-tight"
                           min="0"
                           oninput="this.value = Math.abs(this.value)">
                    @error('professional_teachers')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                        <i class="fas fa-info-circle mr-1"></i> Total tenaga pendidik profesional
                    </p>
                </div>
            </div>
        </div>

        <!-- Profil Sekolah -->
        <div class="grid grid-cols-1 gap-6">
            <div class="stat-card p-7">
                <div class="mb-4">
                    <div class="text-lg font-semibold text-gray-900">Profil Sekolah</div>
                    <p class="text-sm text-gray-500">Kelola informasi profil, visi-misi, dan kepala sekolah.</p>
                </div>

                <div class="space-y-4">
                    <div class="mb-4">
                        <label for="school_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Sekolah</label>
                        <input type="text" name="school_name" id="school_name" value="{{ old('school_name', $school->school_name ?? 'SMKN 4 Bogor') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="SMKN 4 Bogor">
                    </div>

                    <div class="mb-4">
                        <label for="headmaster_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Kepala Sekolah</label>
                        <input type="text" name="headmaster_name" id="headmaster_name" value="{{ old('headmaster_name', $school->headmaster_name ?? 'Kepala Sekolah') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nama Kepala Sekolah">
                    </div>

                    <div class="mb-4">
                        <label for="profile" class="block text-gray-700 text-sm font-bold mb-2">Profil Sekolah</label>
                        <textarea name="profile" id="profile" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Deskripsi singkat sekolah">{{ old('profile', $school->profile ?? 'SMKN 4 Bogor adalah institusi pendidikan terdepan yang berkomitmen menghasilkan lulusan berkualitas dan siap kerja') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="vision" class="block text-gray-700 text-sm font-bold mb-2">Visi</label>
                        <textarea name="vision" id="vision" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Visi sekolah">{{ old('vision', $school->vision ?? 'Menjadi SMK unggul yang menghasilkan lulusan berkarakter, kompeten, dan berdaya saing global di era digital.') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="mission" class="block text-gray-700 text-sm font-bold mb-2">Misi</label>
                        <textarea name="mission" id="mission" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Pisahkan per baris untuk tiap misi">{{ old('mission', $school->mission ?? "Menyelenggarakan pendidikan berkualitas tinggi\nMengembangkan karakter dan soft skills siswa\nMembangun kemitraan dengan industri") }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="headmaster_greeting" class="block text-gray-700 text-sm font-bold mb-2">Sambutan Kepala Sekolah</label>
                        <textarea name="headmaster_greeting" id="headmaster_greeting" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Sambutan kepala sekolah">{{ old('headmaster_greeting', $school->headmaster_greeting ?? 'Selamat datang di SMKN 4 Bogor. Kami berkomitmen untuk memberikan pendidikan terbaik yang mempersiapkan siswa menghadapi tantangan masa depan.') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="headmaster_photo" class="block text-gray-700 text-sm font-bold mb-2">Foto Kepala Sekolah</label>
                        @if(!empty($school->headmaster_photo))
                            <div class="mb-2">
                                <img src="{{ asset('images/headmaster/'.$school->headmaster_photo) }}" alt="Headmaster" class="w-32 h-32 object-cover rounded border">
                            </div>
                        @endif
                        <input type="file" name="headmaster_photo" id="headmaster_photo" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-gray-500 text-xs mt-1">Format: JPG, PNG, WEBP. Maks: 2MB</p>
                    </div>
                </div>

                <!-- Preview (read-only) -->
                <div class="mt-8 bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">
                    @php
                        $pvSchoolName = old('school_name', $school->school_name);
                        $pvProfile = old('profile', $school->profile);
                        $pvVision = old('vision', $school->vision);
                        $pvMission = old('mission', $school->mission);
                        $pvHeadName = old('headmaster_name', $school->headmaster_name);
                        $pvGreeting = old('headmaster_greeting', $school->headmaster_greeting);
                        $pvHeadPhoto = !empty($school->headmaster_photo) ? asset('images/headmaster/'.$school->headmaster_photo) : null;
                        $pvMissions = $pvMission ? preg_split("/(\r?\n)/", trim($pvMission)) : [];
                    @endphp

                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                            <i class="fas fa-school"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">Pratinjau</div>
                            <div class="text-base font-semibold text-gray-900">{{ $pvSchoolName ?: 'SMKN 4 Bogor' }}</div>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-3 text-sm text-gray-700">
                            <div>
                                <div class="font-semibold text-gray-800 mb-1">Profil</div>
                                <p>{!! nl2br(e($pvProfile ?: 'SMKN 4 Bogor adalah institusi pendidikan terdepan yang berkomitmen menghasilkan lulusan berkualitas dan siap kerja')) !!}</p>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800 mb-1">Visi</div>
                                <p>{!! nl2br(e($pvVision ?: 'Menjadi SMK unggul yang menghasilkan lulusan berkarakter, kompeten, dan berdaya saing global di era digital.')) !!}</p>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800 mb-1">Misi</div>
                                @if(!empty($pvMissions))
                                    <ul class="space-y-1">
                                        @foreach($pvMissions as $m)
                                            @if(trim($m) !== '')
                                            <li class="flex items-start gap-2"><i class="fas fa-check mt-1 text-blue-600"></i><span>{{ $m }}</span></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <ul class="space-y-1">
                                        <li class="flex items-start gap-2"><i class="fas fa-check mt-1 text-blue-600"></i><span>Menyelenggarakan pendidikan berkualitas tinggi</span></li>
                                        <li class="flex items-start gap-2"><i class="fas fa-check mt-1 text-blue-600"></i><span>Mengembangkan karakter dan soft skills siswa</span></li>
                                        <li class="flex items-start gap-2"><i class="fas fa-check mt-1 text-blue-600"></i><span>Membangun kemitraan dengan industri</span></li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-16 h-16 rounded-full overflow-hidden ring-1 ring-gray-200 bg-gray-50 flex items-center justify-center">
                                    @if($pvHeadPhoto)
                                        <img src="{{ $pvHeadPhoto }}" alt="Headmaster" class="w-full h-full object-cover">
                                    @else
                                        <i class="fas fa-user text-gray-400"></i>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-800">{{ $pvHeadName ?: 'Kepala Sekolah' }}</div>
                                    <div class="text-xs text-gray-500">Kepala Sekolah</div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-700">{!! nl2br(e($pvGreeting ?: 'Selamat datang di SMKN 4 Bogor. Kami berkomitmen untuk memberikan pendidikan terbaik yang mempersiapkan siswa menghadapi tantangan masa depan.')) !!}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <a href="{{ route('admin.dashboard') }}" class="back-btn inline-flex items-center justify-center px-6 py-3 text-sm font-medium">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
                </a>
                <button type="submit" class="save-btn inline-flex items-center justify-center px-8 py-3 text-sm font-medium">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
