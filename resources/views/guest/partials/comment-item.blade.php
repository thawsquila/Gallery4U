@php
    $level = $level ?? 0;
    $allowToggle = $allowToggle ?? true; // control nested toggle rendering
@endphp
<div class="mb-5" id="comment-thread-{{ $comment->id }}">
    <div class="flex items-start">
        <div class="{{ $level > 0 ? 'h-8 w-8' : 'h-10 w-10' }} rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 text-white flex items-center justify-center font-bold mr-3 text-sm">
            {{ strtoupper(substr($comment->name,0,1)) }}
        </div>
        <div class="flex-1">
            <div class="{{ $level > 0 ? 'bg-gray-50/70 border border-gray-100 rounded-xl p-3' : '' }}">
                <div class="flex items-center gap-2">
                    <span class="font-semibold text-gray-800">{{ $comment->name }}</span>
                    <span class="text-xs text-gray-400">• {{ $comment->created_at->diffForHumans() }}</span>
                    @if($level > 0)
                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-blue-50 text-blue-600 font-semibold">Balasan</span>
                    @endif
                </div>
                <p class="text-gray-700 mt-1" id="comment-text-{{ $comment->id }}">{{ $comment->content }}</p>

                <div class="mt-2 flex items-center gap-4">
                    @auth
                        <button type="button" onclick="toggleReplyForm({{ $comment->id }})" class="text-xs text-gray-600 hover:text-gray-800 font-semibold">Balas</button>
                        @if($comment->user_id === auth()->id())
                            <button type="button" onclick="document.getElementById('edit-form-{{ $comment->id }}').classList.toggle('hidden')" class="text-xs text-blue-600 hover:text-blue-700 font-semibold">Edit</button>
                            <form action="{{ route('guest.comment.delete', $comment->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" onclick="return confirm('Hapus komentar ini?')" class="text-xs text-red-600 hover:text-red-700 font-semibold">Hapus</button>
                            </form>
                        @endif
                    @endauth
                    @guest
                        <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="text-xs text-blue-600 hover:text-blue-700 font-semibold">Masuk untuk membalas</a>
                    @endguest
                </div>

                @auth
                <!-- Reply form (for any comment level) -->
                <form id="reply-form-{{ $comment->id }}" action="{{ isset($berita->kategori_id) ? route('guest.berita.comment', $berita->id) : route('guest.galeri.comment', $berita->id) }}" method="POST" class="mt-3 hidden bg-white p-4 rounded-lg border">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="md:col-span-2">
                            <label class="block text-xs text-gray-600 mb-1">Balasan</label>
                            <textarea name="content" rows="3" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary/50 focus:border-primary" required></textarea>
                        </div>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg text-sm">Kirim Balasan</button>
                        <button type="button" class="px-4 py-2 rounded-lg text-sm border" onclick="toggleReplyForm({{ $comment->id }})">Batal</button>
                    </div>
                </form>
                
                @if($comment->user_id === auth()->id())
                <!-- Edit form for owner -->
                <form id="edit-form-{{ $comment->id }}" action="{{ route('guest.comment.update', $comment->id) }}" method="POST" class="mt-3 hidden bg-white p-4 rounded-lg border">
                    @csrf
                    <label class="block text-xs text-gray-600 mb-1">Edit Komentar</label>
                    <textarea name="content" rows="3" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary/50 focus:border-primary" required>{{ $comment->content }}</textarea>
                    <div class="mt-3 flex gap-2">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg text-sm">Simpan</button>
                        <button type="button" class="px-4 py-2 rounded-lg text-sm border" onclick="document.getElementById('edit-form-{{ $comment->id }}').classList.add('hidden')">Batal</button>
                    </div>
                </form>
                @endif
                @endauth
            </div>

            @if($comment->replies && $comment->replies->count())
                @php $repliesCount = $comment->replies->count(); @endphp
                @if($allowToggle)
                    <div class="mt-2">
                        <button type="button" id="toggle-replies-btn-{{ $comment->id }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700"
                                onclick="toggleReplies({{ $comment->id }})" aria-expanded="false" data-count="{{ $repliesCount }}">
                            Lihat semua balasan ({{ $repliesCount }})
                        </button>
                    </div>
                    <div id="replies-hidden-{{ $comment->id }}" class="mt-3 space-y-4 hidden">
                        @foreach($comment->replies as $child)
                            @include('guest.partials.comment-item', ['comment' => $child, 'berita' => $berita, 'level' => $level + 1, 'allowToggle' => false])
                        @endforeach
                    </div>
                @else
                    <div class="mt-3 space-y-4">
                        @foreach($comment->replies as $child)
                            @include('guest.partials.comment-item', ['comment' => $child, 'berita' => $berita, 'level' => $level + 1, 'allowToggle' => false])
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
