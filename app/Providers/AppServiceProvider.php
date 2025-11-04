<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set locale untuk Carbon ke bahasa Indonesia
        \Carbon\Carbon::setLocale('id');
        
        // Mengubah URL gambar menjadi absolut untuk API
        $this->configureImageUrls();
    }
    
    /**
     * Mengonfigurasi URL gambar menjadi absolut untuk API
     */
    private function configureImageUrls(): void
    {
        // Mendapatkan base URL dari konfigurasi atau request
        $baseUrl = config('app.url');
        
        // Untuk emulator Android, gunakan 10.0.2.2 sebagai pengganti localhost
        if (request()->is('api/*')) {
            // Jika diakses melalui API, gunakan URL absolut
            \Illuminate\Database\Eloquent\Model::resolveRelationUsing('fotos', function ($model) use ($baseUrl) {
                return $model->hasMany(\App\Models\Foto::class, 'galery_id')->each(function ($foto) use ($baseUrl) {
                    if ($foto->file) {
                        // Tambahkan URL absolut ke file gambar
                        $foto->file_url = $baseUrl . '/storage/gallery/' . $foto->file;
                    }
                });
            });
            
            // Tambahkan URL absolut ke model Post
            \App\Models\Post::retrieved(function ($post) use ($baseUrl) {
                if ($post->gambar) {
                    $post->gambar_url = $baseUrl . '/storage/posts/' . $post->gambar;
                }
            });
            
            // Tambahkan URL absolut ke model User untuk avatar
            \App\Models\User::retrieved(function ($user) use ($baseUrl) {
                if ($user->avatar) {
                    $user->avatar_url = $baseUrl . '/storage/avatars/' . $user->avatar;
                }
            });
        }
    }
}
