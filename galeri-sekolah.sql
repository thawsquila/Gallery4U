-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2025 at 03:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri-sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `galery_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `content` text NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `galery_id`, `parent_id`, `user_id`, `name`, `email`, `content`, `is_approved`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(9, 30, NULL, NULL, NULL, 'Admin kr4bat', 'admin@smkn4.sch.id', 'oh kerenn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 22:04:44', '2025-09-19 22:04:44'),
(10, 26, NULL, NULL, 5, 'Jie', 'methajwi@gmail.com', 'Keren SMKN 4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 23:15:29', '2025-09-19 23:15:29'),
(11, NULL, 8, NULL, 1, 'Admin kr4bat', 'admin@smkn4.sch.id', 'keren dmv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-07 02:08:19', '2025-10-07 02:08:19'),
(12, NULL, 17, NULL, 5, 'Jie', 'methajwi@gmail.com', 'wow kerennn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-07 20:27:20', '2025-10-07 20:27:20'),
(13, NULL, 18, NULL, 5, 'Jie', 'methajwi@gmail.com', 'NATS KERENN SEKALI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-07 20:34:51', '2025-10-07 20:34:51'),
(14, NULL, 22, NULL, 9, 'Jie', 'itoshipower17@gmail.com', 'Kerenn banget juara 3, Semangat Terus ya tim tani pintar!!!!!', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '2025-10-24 03:24:46', '2025-10-24 03:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Thaaa', 'methajwi@gmail.com', 'Buat admin', 'Makasih admin', 1, '2025-10-21 23:04:15', '2025-10-21 23:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `galery_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `galery_id`, `file`, `judul`, `created_at`, `updated_at`) VALUES
(9, 8, '1757515378_68c18e72aa743.JPG', 'Gallery Photo', '2025-09-10 07:42:58', '2025-09-10 07:42:58'),
(10, 8, '1757515412_68c18e94655fd.JPG', 'Gallery Photo', '2025-09-10 07:43:32', '2025-09-10 07:43:32'),
(11, 9, '1757515651_68c18f835aafb.JPG', 'Gallery Photo', '2025-09-10 07:47:31', '2025-09-10 07:47:31'),
(12, 10, '1757515858_68c190527d084.JPG', 'Gallery Photo', '2025-09-10 07:50:58', '2025-09-10 07:50:58'),
(13, 11, '1757516139_68c1916b1dab5.JPG', 'Gallery Photo', '2025-09-10 07:55:39', '2025-09-10 07:55:39'),
(14, 12, '1757643922_68c38492b990c.JPG', 'Gallery Photo', '2025-09-11 19:25:22', '2025-09-11 19:25:22'),
(15, 13, '1757650326_68c39d9621cd6.JPG', 'Gallery Photo', '2025-09-11 21:12:06', '2025-09-11 21:12:06'),
(16, 14, '1757651537_68c3a25126866.JPG', 'Gallery Photo', '2025-09-11 21:32:17', '2025-09-11 21:32:17'),
(17, 15, '1757651826_68c3a372ddd58.jpg', 'Gallery Photo', '2025-09-11 21:37:06', '2025-09-11 21:37:06'),
(18, 16, '1757655296_68c3b10014cf1.JPG', 'Gallery Photo', '2025-09-11 22:34:56', '2025-09-11 22:34:56'),
(19, 17, '1757655547_68c3b1fbeb912.jpg', 'Gallery Photo', '2025-09-11 22:39:07', '2025-09-11 22:39:07'),
(20, 18, '1757656572_68c3b5fc87c86.JPG', 'Gallery Photo', '2025-09-11 22:56:12', '2025-09-11 22:56:12'),
(21, 19, '1757657363_68c3b91303768.JPG', 'Gallery Photo', '2025-09-11 23:09:23', '2025-09-11 23:09:23'),
(22, 20, '1757657620_68c3ba1437f52.JPG', 'Gallery Photo', '2025-09-11 23:13:40', '2025-09-11 23:13:40'),
(23, 21, '1757657738_68c3ba8a815bc.JPG', 'Gallery Photo', '2025-09-11 23:15:38', '2025-09-11 23:15:38'),
(25, 22, '1760075681_68e89fa15c7c1.JPG', 'Gallery Photo', '2025-10-09 22:54:41', '2025-10-09 22:54:41'),
(26, 16, '1761101412_68f84664eceb4.JPG', 'Gallery Photo', '2025-10-21 19:50:12', '2025-10-21 19:50:12'),
(27, 16, '1761101451_68f8468bdc579.JPG', 'Gallery Photo', '2025-10-21 19:50:51', '2025-10-21 19:50:51'),
(28, 16, '1761101451_68f8468bddc64.JPG', 'Gallery Photo', '2025-10-21 19:50:51', '2025-10-21 19:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `kategori` enum('Kegiatan Sekolah','Ekstrakurikuler','Prestasi','Fasilitas Sekolah','Acara Khusus','Dokumentasi Guru dan Siswa') NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `position` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`id`, `post_id`, `kategori`, `judul`, `deskripsi`, `views`, `position`, `status`, `created_at`, `updated_at`) VALUES
(8, NULL, 'Ekstrakurikuler', 'DMV', 'Tim Dokumentasi Sekolah Desain Media Visual X ICT', 0, 1, 'aktif', '2025-09-09 01:40:11', '2025-09-10 07:42:58'),
(9, NULL, 'Kegiatan Sekolah', 'SERTIJAB OSIS 2024-2025', 'Momen pergantian kepengurusan OSIS berlangsung khidmat dan penuh semangat. Terima kasih kepada pengurus sebelumnya atas dedikasi dan kontribusinya. Selamat bertugas untuk pengurus baru, semoga semakin membawa OSIS lebih maju!', 0, 1, 'aktif', '2025-09-10 07:47:31', '2025-09-10 18:08:47'),
(10, NULL, 'Kegiatan Sekolah', 'FEDAT', 'FEDAT menjadi ajang tahunan untuk merayakan keberagaman budaya melalui seni, musik, tari, dan kreativitas siswa. Acara ini menampilkan berbagai pertunjukan yang menggambarkan kekayaan tradisi sekaligus semangat generasi muda. Dengan penuh antusias, seluruh warga sekolah berpartisipasi, menjadikan FEDAT bukan hanya hiburan, tetapi juga ruang apresiasi budaya.', 2, 1, 'aktif', '2025-09-10 07:50:58', '2025-10-25 23:39:56'),
(11, NULL, 'Prestasi', 'Penghargaan Murid Berprestasi', 'Muhammad Farhan Abdullah Juara 2 UI Design Competition', 0, 1, 'aktif', '2025-09-10 07:55:39', '2025-09-11 22:35:56'),
(12, NULL, 'Ekstrakurikuler', 'PMR', 'Ekstrakurikuler Palang Merah Remaja (PMR) SMKN 4 Kota Bogor', 0, 2, 'aktif', '2025-09-11 19:25:22', '2025-09-11 19:25:22'),
(13, NULL, 'Ekstrakurikuler', 'PASKIBRA', 'Ekstrakurikuler PASKIBRA SMKN 4 Bogor', 0, 3, 'aktif', '2025-09-11 21:12:06', '2025-09-11 21:12:06'),
(14, NULL, 'Ekstrakurikuler', 'PADUS', 'Ekstrakurikuler Paduan Suara SMK Negeri 4 Bogor', 0, 1, 'aktif', '2025-09-11 21:32:17', '2025-09-11 21:32:17'),
(15, NULL, 'Ekstrakurikuler', 'SENI TARI', 'Ekstrakurikuler Seni Tari SMK Negeri 4 Bogor', 0, 1, 'aktif', '2025-09-11 21:37:06', '2025-09-11 21:37:06'),
(16, NULL, 'Kegiatan Sekolah', 'CLASSMEETING', 'Kegiatan classmeeting berlangsung seru dengan berbagai lomba olahraga, seni, dan permainan kreatif.\r\nAjang ini jadi wadah refreshing setelah ujian sekaligus mempererat kebersamaan antar siswa.\r\nPenuh tawa, semangat, dan momen tak terlupakan!', 1, 1, 'aktif', '2025-09-11 22:34:56', '2025-10-26 06:09:47'),
(17, NULL, 'Prestasi', 'Penghargaan Murid Berprestasi', 'Adrian Anugerah Maulana Juara 3 IT Software Solution For Businnes', 0, 1, 'aktif', '2025-09-11 22:39:07', '2025-09-11 22:40:10'),
(18, NULL, 'Prestasi', 'Penghargaan Murid Berprestasi', 'Hasanatun Nadiyyah Syakh Juara 1 Graphic Design Technology', 0, 1, 'aktif', '2025-09-11 22:56:12', '2025-09-11 23:05:18'),
(19, NULL, 'Fasilitas Sekolah', 'Lapangan', 'Lapangan serbaguna yang digunakan untuk kegiatan olahraga, upacara, hingga berbagai acara sekolah.\r\nMenjadi ruang penting bagi siswa untuk berlatih, berkompetisi, sekaligus menjalin kebersamaan.', 0, 5, 'aktif', '2025-09-11 23:09:22', '2025-10-26 00:22:51'),
(20, NULL, 'Fasilitas Sekolah', 'Lab TJKT', 'Laboratorium khusus Teknik Jaringan Komputer dan Telekomunikasi sebagai ruang praktik siswa.\r\nDilengkapi perangkat jaringan dan komputer modern untuk mendukung pembelajaran berbasis teknologi.', 0, 2, 'aktif', '2025-09-11 23:13:40', '2025-09-11 23:13:40'),
(21, NULL, 'Fasilitas Sekolah', 'Bengkel Teknik Otomotif', 'Bengkel praktik siswa jurusan Teknik Otomotif dengan fasilitas peralatan lengkap.\r\nMenjadi tempat belajar, melatih keterampilan, dan mengasah kemampuan siswa di bidang otomotif.', 0, 3, 'aktif', '2025-09-11 23:15:38', '2025-09-11 23:15:38'),
(22, NULL, 'Prestasi', 'BIA 2025', 'SMKN 4 meraih Juara 3 Bogor Innovation 2025 melalui Tim TaniPintar, yang menghadirkan inovasi teknologi pertanian cerdas untuk mendukung efisiensi dan keberlanjutan sektor agrikultur.', 0, 1, 'aktif', '2025-10-09 22:54:41', '2025-10-09 22:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `galery_likes`
--

CREATE TABLE `galery_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `galery_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galery_likes`
--

INSERT INTO `galery_likes` (`id`, `galery_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 17, 5, '2025-10-07 20:26:59', '2025-10-07 20:26:59'),
(3, 18, 5, '2025-10-07 20:34:41', '2025-10-07 20:34:41'),
(4, 13, 5, '2025-10-07 21:30:13', '2025-10-07 21:30:13'),
(28, 10, 1, '2025-10-21 21:56:31', '2025-10-21 21:56:31'),
(29, 16, 1, '2025-10-21 22:09:34', '2025-10-21 22:09:34'),
(30, 22, 9, '2025-10-24 03:23:57', '2025-10-24 03:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `judul`) VALUES
(1, 'Berita'),
(2, 'Event');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '0001_01_01_000000_create_users_table', 1),
(10, '0001_01_01_000001_create_cache_table', 1),
(11, '0001_01_01_000002_create_jobs_table', 1),
(12, '2025_07_28_233404_add_role_to_users_table', 1),
(13, '2025_07_29_000058_create_personal_access_tokens_table', 1),
(14, '2025_07_29_013420_add_created_at_to_galery_table', 2),
(15, '2025_07_31_142453_add_event_fields_to_posts_table', 2),
(16, '2025_07_31_145813_add_gambar_to_posts_table', 2),
(17, '2025_08_01_000000_create_petugas_table', 3),
(18, '2025_08_27_000000_add_updated_at_to_galery_table', 4),
(19, '2025_08_28_013211_add_kategori_to_galery_table', 5),
(20, '2025_08_28_085328_change_status_column_type_in_galery_table', 6),
(21, '2025_08_28_085729_add_timestamps_to_foto_table', 7),
(22, '2025_08_29_000000_add_judul_deskripsi_to_galery_table', 8),
(23, '2025_09_09_040209_create_visitors_table', 9),
(24, '2025_09_09_000000_create_teachers_table', 10),
(25, '2025_09_09_000100_create_comments_table', 11),
(26, '2025_09_09_195300_add_more_event_fields_to_posts_table', 11),
(27, '2025_01_10_add_views_to_posts_table', 12),
(28, '2025_09_10_044029_add_visitor_key_to_visitors_table', 13),
(29, '2025_09_10_054258_create_user_otps_table', 14),
(30, '2025_09_10_125611_create_statistics_table', 15),
(31, '2025_09_20_051000_add_user_id_to_comments_table', 16),
(33, '2025_09_20_061000_update_users_role_enum', 17),
(34, '2025_10_07_084106_add_galery_id_to_comments_table', 18),
(35, '2025_10_07_090708_make_post_id_nullable_in_comments_table', 19),
(36, '2025_10_07_092500_create_galery_likes_table', 20),
(37, '2025_10_08_000001_add_avatar_to_users_table', 20),
(38, '2025_10_09_000000_create_school_settings_table', 21),
(39, '2025_10_22_000000_reset_admin_password', 22),
(40, '2025_10_22_000001_add_post_id_to_galery_table', 23),
(41, '2025_10_22_053500_create_contact_messages_table', 24),
(42, '2025_10_26_063649_add_views_to_galery_table', 25),
(43, '2025_11_01_023043_create_personal_access_tokens_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('methajwi@gmail.com', '$2y$12$/5rp4kP2i0nGC7wa2liBcOADwExLadS4ck.jyJg5lG/2nqYu2EVSW', '2025-10-24 03:50:59'),
('methapjs0302@gmail.com', '$2y$12$xXGgMLOS.v7WxaOEo//.F.qADBzCDLK.rbjnCYdesD.Gvw7ROk42K', '2025-09-09 22:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 5, 'api-token', 'c5132119d593c6749df45c43517e2db576f55bdd1c195b07806d93681b198345', '[\"*\"]', NULL, NULL, '2025-10-31 19:34:38', '2025-10-31 19:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `user_id`, `username`, `password`, `nama`, `jabatan`, `created_at`, `updated_at`) VALUES
(2, 1, 'admin@smkn4.sch.id', '$2y$12$cRaGugq.p2zyy.mOQnsiuO9qeRxl4ahG9px3MjDhAsi/Its7KI3p6', 'Admin User', 'Staff', '2025-07-31 18:27:14', '2025-07-31 18:27:14'),
(3, 2, 'guest@smkn4.sch.id', '$2y$12$BdYb/pht080x19lS1d1AkOtAfucCb4mN0zL4IHqyg6Y2.hGm82FlS', 'Guest User', 'Staff', '2025-07-31 18:27:14', '2025-07-31 18:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `isi` text DEFAULT NULL,
  `petugas_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu_mulai` varchar(10) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `tiket` varchar(255) DEFAULT NULL,
  `kapasitas` int(10) UNSIGNED DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `judul`, `kategori_id`, `isi`, `petugas_id`, `status`, `created_at`, `updated_at`, `tanggal`, `waktu_mulai`, `lokasi`, `tiket`, `kapasitas`, `views`, `gambar`) VALUES
(18, 'Prestasi Gemilang di LKS Tingkat Kota Bogor 2025', 1, 'Bogor, 19 Maret 2025 – SMKN 4 Bogor kembali mengukir prestasi membanggakan dalam ajang Lomba Kompetensi Siswa (LKS) Tingkat Kota Bogor tahun 2025. Dalam kompetisi bergengsi yang diikuti oleh berbagai sekolah menengah kejuruan se-Kota Bogor ini, SMKN 4 Bogor berhasil meraih sejumlah medali di berbagai bidang lomba.\r\n\r\nBeberapa jurusan yang berhasil menunjukkan keunggulannya antara lain:\r\n\r\nJuara 3 Lomba IT Software Solution For Businesst – atas nama Adrian Anugerah Maulana, jurusan Pengembangan Perangkat Lunak Dan Gim\r\nJuara 1 Lomba Teknik Otomotif – atas nama Muhamad Agung Hidayat, jurusan Teknik Otomotif\r\nJuara 3 Lomba Cyber Security - atas nama Bagas Refani Putra(TJKT) Dan Muhammad Heidar Arrizqie(PPLG)\r\nJuara 1 Lomba Teknik Pengelasan - atas nama Muhammad Destian, Jurusan TPFL\r\nJuara 1 Lomba Cloud Computing - atas nama Novandra Aria Budi Raspati, Jurusan PPLG\r\nJuara 1 Lomba Graphic Design Technology - atas nama Hasanatun Nadiyyah Syakh, Jurusan PPLG\r\nJuara 3 Lomba Web Technologies - atas nama Akbar Tolib Ramadan, Jurusan PPLG\r\n Juara 1 Lomba Information Network Cabling - atas nama Muhammad Harist Abdullah Arrohman, Jurusan TJKT\r\n\r\nKeberhasilan ini merupakan hasil dari kerja keras siswa, dukungan penuh para guru pembimbing, serta semangat kolaborasi yang terus dijaga oleh seluruh warga sekolah. Kepala SMKN 4 Bogor, Drs. Mulyamurprihartono , menyampaikan rasa bangga dan harapannya agar prestasi ini dapat menjadi motivasi bagi seluruh siswa untuk terus mengembangkan kompetensi dan semangat juang mereka.', 2, 'aktif', '2025-07-31 21:01:07', '2025-10-25 23:34:13', NULL, NULL, NULL, NULL, NULL, 58, '1754020867.jpg'),
(22, 'TRANSFORKR4B 2024', 2, 'Transformasi SMK Negeri 4 Bogor\r\nSMK Negeri 4 Bogor menghadirkan sebuah rangkaian acara istimewa bertajuk “Transformasi”, sebagai wadah kolaborasi, kreativitas, dan peluang masa depan bagi seluruh siswa, alumni, dan masyarakat. Dalam event ini, berbagai kegiatan inspiratif akan digelar, mulai dari Job Fair yang mempertemukan pencari kerja dengan perusahaan ternama, Edu Fair yang memberikan informasi pendidikan lanjutan, Bazar dengan ragam produk kreatif karya siswa dan UMKM, hingga Pentas Karya yang menampilkan bakat seni dan inovasi siswa.', 2, 'aktif', '2025-08-11 21:35:38', '2025-10-09 17:49:47', '2024-10-17', '09:05', 'SMK Negeri 4 Bogor', 'Gratis', 600, 7, '1754973338.JPG'),
(25, 'DIGI GOES TO SCHOOL 2024', 2, 'SMKN 4 Bogor kembali menjadi tuan rumah kegiatan Digi Goes To School 2024, sebuah program inspiratif yang menghadirkan edukasi digital langsung ke sekolah. Acara ini bertujuan untuk meningkatkan literasi digital, memperkenalkan teknologi terkini, serta memberikan wawasan mengenai peluang dan tantangan di era transformasi digital.\r\n\r\nMelalui kegiatan ini, para siswa mendapat kesempatan untuk belajar langsung dari para praktisi dan ahli di bidang teknologi informasi. Mereka dibekali pengetahuan tentang keamanan digital, pemanfaatan internet secara positif, hingga pemahaman tentang peluang karier di dunia IT dan industri kreatif.\r\n\r\nDengan semangat “Go Digital, Be Future Ready”, Digi Goes To School 2024 diharapkan mampu menumbuhkan motivasi siswa SMKN 4 Bogor untuk terus mengembangkan keterampilan digital dan siap bersaing di era global.', 2, 'aktif', '2025-09-10 07:06:53', '2025-10-06 19:26:29', '2024-01-30', '08:00', 'SMK Negeri 4 Bogor', 'Gratis', 1000, 7, '1757513213.jpg'),
(26, 'Workshop Soft Skill Di SMKN 4 Bogor', 1, 'SMKN 4 Bogor menyelenggarakan Workshop Soft Skill sebagai upaya untuk membekali siswa dengan kemampuan non-teknis yang sangat penting di dunia kerja maupun kehidupan sehari-hari. Kegiatan ini menekankan pada pengembangan komunikasi, kerja sama tim, kepemimpinan, manajemen waktu, serta kemampuan berpikir kritis dan kreatif.\r\n\r\nMelalui sesi interaktif bersama narasumber berpengalaman, para siswa diajak untuk mengenali potensi diri, melatih keterampilan interpersonal, dan membangun rasa percaya diri. Workshop ini juga menjadi sarana untuk memperkuat karakter positif siswa agar siap menghadapi tantangan di era global yang penuh persaingan.\r\n\r\nDengan adanya kegiatan ini, diharapkan siswa SMKN 4 Bogor tidak hanya unggul dalam keterampilan teknis, tetapi juga memiliki soft skill yang mumpuni untuk meraih kesuksesan di masa depan.', 2, 'aktif', '2025-09-10 07:15:54', '2025-10-09 10:58:41', NULL, NULL, NULL, NULL, NULL, 13, '1757513754.JPG'),
(27, 'Upacara Penyambutan Tamu Dari Malaysia', 1, 'SMKN 4 Bogor mendapat kehormatan untuk menyambut kedatangan tamu dari Malaysia dalam rangka menjalin silaturahmi sekaligus mempererat kerja sama di bidang pendidikan. Acara penyambutan berlangsung hangat dengan penampilan budaya, sambutan resmi, serta sesi ramah tamah antara pihak sekolah dan tamu undangan.\r\n\r\nKunjungan ini menjadi momen penting bagi SMKN 4 Bogor untuk berbagi pengalaman, berdiskusi mengenai perkembangan dunia pendidikan, serta membuka peluang kolaborasi internasional. Para siswa pun ikut serta dalam kegiatan ini dengan menunjukkan kreativitas dan potensi yang dimiliki.\r\n\r\nMelalui penyambutan ini, diharapkan hubungan baik antara SMKN 4 Bogor dan institusi pendidikan di Malaysia dapat terus terjalin, sehingga memberikan manfaat positif bagi perkembangan pendidikan kedua belah pihak.', 2, 'aktif', '2025-09-10 07:36:50', '2025-10-06 20:03:05', NULL, NULL, NULL, NULL, NULL, 11, '1757515010.JPG'),
(28, 'Pensi Neospragma 2024', 2, 'SMKN 4 Bogor kembali menunjukkan eksistensinya dalam dunia seni dan kreativitas siswa melalui penyelenggaraan Pensi Neospragma 2024. Acara tahunan ini menjadi wadah bagi siswa untuk mengekspresikan bakat, mengembangkan kreativitas, sekaligus menjalin kebersamaan dalam suasana penuh kegembiraan.Rangkaian acara berlangsung meriah dengan berbagai penampilan seni dari siswa, mulai dari tarian tradisional, musik modern, drama, hingga penampilan band sekolah yang penuh energi. Tidak hanya menampilkan potensi internal, Pensi Neospragma 2024 juga menghadirkan bintang tamu spesial yang semakin menambah semarak suasana, yaitu DJ Mail dengan gebrakan musik energiknya serta Mighfar Suganda yang berhasil memikat penonton dengan suara merdunya. Kehadiran mereka menjadikan acara ini semakin berkesan dan menghadirkan pengalaman tak terlupakan bagi seluruh warga sekolah.\r\n\r\nLebih dari sekadar ajang hiburan, Pensi Neospragma 2024 juga menjadi simbol kebersamaan dan persaudaraan di lingkungan SMKN 4 Bogor. Antusiasme siswa, dukungan guru, dan partisipasi seluruh civitas sekolah menjadikan acara ini bukti nyata bahwa seni dan kreativitas mampu menyatukan semua elemen sekolah dalam sebuah perayaan yang penuh makna.', 2, 'aktif', '2025-09-11 17:26:15', '2025-10-09 05:04:30', '2024-09-26', '08:30', 'SMK Negeri 4 Bogor', '125.000 (Tiket Dan Baju)', 1000, 12, '1757636775.JPG'),
(29, 'TRANSFORKR4B 2023', 2, 'SMKN 4 Bogor kembali mengukir momen istimewa melalui penyelenggaraan TRANSFORKR4B 2023, sebuah perayaan akbar yang menghadirkan semangat kreativitas, inovasi, serta kebersamaan siswa. Acara ini dirancang khusus sebagai wadah bagi angkatan 14 untuk mengekspresikan bakat, menuangkan ide-ide segar, dan menunjukkan potensi terbaik mereka di hadapan seluruh warga sekolah.\r\n\r\nRangkaian kegiatan TRANSFORKR4B 2023 berlangsung meriah dengan berbagai penampilan seni, pertunjukan musik, karya kreatif, hingga atraksi yang mencerminkan semangat muda penuh energi. Tidak hanya sebagai ajang hiburan, acara ini juga menjadi ruang transformasi yang mendorong kolaborasi antarsiswa, sekaligus bentuk apresiasi terhadap karya dan dedikasi mereka di berbagai bidang.\r\n\r\nLebih dari sekadar pesta perayaan, TRANSFORKR4B 2023 juga menjadi simbol identitas angkatan 14 SMKN 4 Bogor. Melalui acara ini, mereka menegaskan diri sebagai generasi yang solid, penuh inovasi, dan siap menghadapi masa depan dengan kreativitas tanpa batas.\r\n\r\nDengan mengusung tema besar “Transformasi dan Kreativitas”, TRANSFORKR4B 2023 hadir bukan hanya sebagai acara tahunan, tetapi juga momentum berharga yang menyalakan semangat berkarya, mempererat persaudaraan, serta menginspirasi seluruh siswa untuk terus berkembang.', 2, 'aktif', '2025-09-11 18:33:01', '2025-10-25 23:33:14', '2023-09-01', '08:00', 'SMK Negeri 4 Bogor', 'Gratis', 800, 22, '1757640781.jpg'),
(30, 'Kunjungan SMK Negeri 4 Yapsi Papua ke SMKN 4 Bogor', 1, 'SMKN 4 Bogor mendapat kehormatan dengan hadirnya tamu istimewa dari SMK 4 Yapsi Papua dalam rangka kunjungan persahabatan dan studi banding. Kegiatan ini menjadi momentum berharga untuk mempererat silaturahmi, berbagi pengalaman, serta memperluas wawasan dalam dunia pendidikan kejuruan.\r\n\r\nAcara penyambutan berlangsung hangat, diawali dengan sambutan dari pihak sekolah, pertukaran cendera mata, serta penampilan budaya yang mencerminkan kekayaan tradisi Nusantara. Siswa dari kedua sekolah juga terlibat aktif dalam sesi diskusi, saling bertukar cerita mengenai kegiatan belajar, ekstrakurikuler, hingga peluang karier di masa depan.\r\n\r\nMelalui kunjungan ini, diharapkan terjalin kerja sama yang lebih erat antara SMK 4 Yapsi Papua dan SMKN 4 Bogor, sehingga kedua sekolah dapat saling menginspirasi dalam mencetak generasi muda yang unggul, kreatif, dan siap menghadapi tantangan global.', 2, 'aktif', '2025-09-11 22:01:33', '2025-10-07 20:47:10', NULL, NULL, NULL, NULL, NULL, 14, '1757653293.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_settings`
--

CREATE TABLE `school_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `profile` longtext DEFAULT NULL,
  `vision` longtext DEFAULT NULL,
  `mission` longtext DEFAULT NULL,
  `headmaster_name` varchar(255) DEFAULT NULL,
  `headmaster_greeting` longtext DEFAULT NULL,
  `headmaster_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_settings`
--

INSERT INTO `school_settings` (`id`, `school_name`, `profile`, `vision`, `mission`, `headmaster_name`, `headmaster_greeting`, `headmaster_photo`, `created_at`, `updated_at`) VALUES
(1, 'SMKN 4 Bogor', 'SMKN 4 Bogor adalah institusi pendidikan terdepan yang berkomitmen menghasilkan lulusan berkualitas dan siap kerja', 'Menjadi SMK unggul yang menghasilkan lulusan berkarakter, kompeten, dan berdaya saing global di era digital.', 'Menyelenggarakan pendidikan berkualitas tinggi\r\nMengembangkan karakter dan soft skills siswa\r\nMembangun kemitraan dengan industri', 'Drs. Mulyamurpri Hartono', 'Selamat datang di SMKN 4 Bogor. Kami berkomitmen untuk memberikan pendidikan terbaik yang mempersiapkan siswa menghadapi tantangan masa depan.', NULL, '2025-10-09 09:56:46', '2025-10-09 10:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BhRv3Y5lIFYd5pNrpTy0iGKwu9ED7idFY0WV0HSV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTZrenJESFNPTGZXSWx5cVpFTGlleXNsZ1NYNU1NcVJlbVk2cWFaNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1761634257),
('JvxBkshcmVHwkEEnWQjNFXZenAEEqHGppvAQiKxY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQk85VkR4d1BHcTRabEJubWk4T2x5S2Z2bmtGb2E2ekE4MDdyOXJGayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1761747300),
('w2pPfaNKHCwcccz4SAeLTWZLKcnnpUkrSosGrqFc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiektBN2JMQTM2eGNyeVRVWm5XT3BZYjd5c0hmdmxnNEkzdkxtclRrViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1761965533);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `active_students` int(11) NOT NULL DEFAULT 0,
  `majors_count` int(11) NOT NULL DEFAULT 4,
  `professional_teachers` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `active_students`, `majors_count`, `professional_teachers`, `created_at`, `updated_at`) VALUES
(1, 1180, 4, 100, '2025-09-10 06:05:46', '2025-09-10 06:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL,
  `keahlian` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `status` enum('aktif','tidak_aktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `nama`, `jabatan`, `bidang`, `keahlian`, `bio`, `foto`, `linkedin_url`, `email`, `urutan`, `status`, `created_at`, `updated_at`) VALUES
(3, 'MUJIBBUR ROHMAN, S.SI', 'Guru Kejuruan', 'Pengembangan Perangkat Lunak Dan Gim', 'PPLG', 'Guru Kejuruan Pengembangan Perangkat Lunak Dan Gim', '1757512863_68c1849f905ec.jpg', NULL, NULL, 3, 'aktif', '2025-09-10 07:01:03', '2025-09-10 19:14:06'),
(4, 'NOVITA WANDASARI, S.PD, M.T', 'Guru', 'Pengembangan Perangkat Lunak Dan Gim', 'PPLG', 'Guru Kejuruan Pengembangan Perangkat Lunak Dan Gim', '1757554711_68c22817c62e2.jpg', NULL, NULL, 1, 'aktif', '2025-09-10 18:38:31', '2025-09-10 19:13:52'),
(5, 'YUYUS RUSLI, S.Kom', 'Guru', 'Pengembangan Perangkat Lunak Dan Gim', 'PPLG, Ketua Kejuruan', 'Guru Kejuruan Pengembangan Perangkat Lunak Dan Gim', '1757556736_68c2300064a60.jpg', NULL, NULL, 2, 'aktif', '2025-09-10 19:12:16', '2025-09-10 19:12:16'),
(7, 'SUNGGONO, S.PT', 'Guru Kejuruan', 'Pengembangan Perangkat Lunak Dan Gim', 'PPLG', 'Guru Kejuruan Pengembangan Perangkat Lunak Dan Gim', '1757654760_68c3aee8b33bd.jpg', NULL, NULL, 4, 'aktif', '2025-09-11 22:26:00', '2025-09-11 22:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` enum('admin','user','guest') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Gallery4U', 'admin@smkn4.sch.id', '1761302426_68fb579a7d12e.jpg', 'admin', NULL, '$2y$12$3n1x/j9W5LbjPeMenWFqh.jEt.JLFHg6z2mRjpB3m2SgWoNm9hr5q', NULL, '2025-07-31 18:27:13', '2025-10-24 03:40:26'),
(5, 'Thaaa', 'methajwi@gmail.com', 'avatar_5_1759897702.png', 'user', NULL, '$2y$12$5clx7eHdmHDLcBpVtgAOHOh1RnyhdVEEESSZEtOpNpVVpEiP6xRXK', 'usgFIt6T4Tayk83IvDPfUrHheUjy2kT5sfIKzJMF9cWygJ3Gd6aOAgfrmPtE', '2025-09-19 23:13:22', '2025-10-07 21:28:22'),
(9, 'Jie', 'itoshipower17@gmail.com', 'avatar_9_1761301372.jpg', 'user', NULL, '$2y$12$e1Lew.NTbBpX60gr3X6fd.QLZ0ih5KqZJrq.Bwm5cxYcQD1NIyDHK', NULL, '2025-10-24 03:12:37', '2025-10-24 03:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp_code` varchar(6) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_otps`
--

INSERT INTO `user_otps` (`id`, `email`, `otp_code`, `expires_at`, `is_verified`, `created_at`, `updated_at`) VALUES
(12, 'methajwi@gmail.com', '898884', '2025-09-20 06:13:22', 1, '2025-09-19 23:09:12', '2025-09-19 23:13:22'),
(13, 'methaa@gmail.com', '444788', '2025-10-07 19:43:03', 0, '2025-10-07 19:33:03', '2025-10-07 19:33:03'),
(17, 'cerothafs@gmail.com', '190031', '2025-10-24 13:58:20', 1, '2025-10-24 06:57:59', '2025-10-24 06:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `page_visited` varchar(255) NOT NULL,
  `visitor_key` varchar(255) DEFAULT NULL,
  `visited_at` timestamp NULL DEFAULT NULL,
  `visit_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `page_visited`, `visitor_key`, `visited_at`, `visit_date`, `created_at`, `updated_at`) VALUES
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-10', '2025-09-09 18:44:22', '2025-09-09 18:44:22'),
(3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-09 21:43:26', '2025-09-10', '2025-09-09 21:43:26', '2025-09-09 21:43:26'),
(4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-09 21:43:39', '2025-09-10', '2025-09-09 21:43:39', '2025-09-09 21:43:39'),
(5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/jurusan', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-10 03:34:43', '2025-09-10', '2025-09-10 03:34:43', '2025-09-10 03:34:43'),
(6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/teachers', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-10 03:34:49', '2025-09-10', '2025-09-10 03:34:49', '2025-09-10 03:34:49'),
(7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/event', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-10 03:35:25', '2025-09-10', '2025-09-10 03:35:25', '2025-09-10 03:35:25'),
(8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/galeri', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-10 03:35:35', '2025-09-10', '2025-09-10 03:35:35', '2025-09-10 03:35:35'),
(9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/18', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-10 04:34:35', '2025-09-10', '2025-09-10 04:34:35', '2025-09-10 04:34:35'),
(10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/23', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-10 04:59:28', '2025-09-10', '2025-09-10 04:59:28', '2025-09-10 04:59:28'),
(11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/event-detail/25', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-10 07:08:34', '2025-09-10', '2025-09-10 07:08:34', '2025-09-10 07:08:34'),
(12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/27', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-10 07:39:43', '2025-09-10', '2025-09-10 07:39:43', '2025-09-10 07:39:43'),
(13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/26', '889eeb0c1b78826d91cc7a2be77f19d0', '2025-09-10 07:40:44', '2025-09-10', '2025-09-10 07:40:44', '2025-09-10 07:40:44'),
(14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-10', '2025-09-10 08:01:35', '2025-09-10 08:01:35'),
(15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-10', '2025-09-10 08:03:58', '2025-09-10 08:03:58'),
(16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-10 17:39:42', '2025-09-10 17:39:42'),
(17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 17:39:42', '2025-09-11', '2025-09-10 17:39:42', '2025-09-10 17:39:42'),
(18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'teachers', NULL, NULL, '2025-09-11', '2025-09-10 17:40:23', '2025-09-10 17:40:23'),
(19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/teachers', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 17:40:23', '2025-09-11', '2025-09-10 17:40:23', '2025-09-10 17:40:23'),
(20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-10 17:43:55', '2025-09-10 17:43:55'),
(21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-10 17:59:57', '2025-09-10 17:59:57'),
(22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-09-11', '2025-09-10 18:00:05', '2025-09-10 18:00:05'),
(23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/galeri', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 18:00:05', '2025-09-11', '2025-09-10 18:00:05', '2025-09-10 18:00:05'),
(24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-10 18:02:24', '2025-09-10 18:02:24'),
(25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', '/', '491fa2c80be85d8e021e99ba97182421', '2025-09-10 18:02:24', '2025-09-11', '2025-09-10 18:02:24', '2025-09-10 18:02:24'),
(26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-10 18:02:52', '2025-09-10 18:02:52'),
(27, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-09-11', '2025-09-10 18:03:29', '2025-09-10 18:03:29'),
(28, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'teachers', NULL, NULL, '2025-09-11', '2025-09-10 18:03:40', '2025-09-10 18:03:40'),
(29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-10 18:03:46', '2025-09-10 18:03:46'),
(30, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-10 18:07:31', '2025-09-10 18:07:31'),
(31, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/jurusan', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 18:27:47', '2025-09-11', '2025-09-10 18:27:47', '2025-09-10 18:27:47'),
(32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 18:31:31', '2025-09-11', '2025-09-10 18:31:31', '2025-09-10 18:31:31'),
(33, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/event', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 18:31:38', '2025-09-11', '2025-09-10 18:31:38', '2025-09-10 18:31:38'),
(34, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/event-detail/25', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 18:34:25', '2025-09-11', '2025-09-10 18:34:25', '2025-09-10 18:34:25'),
(35, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/18', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 18:58:40', '2025-09-11', '2025-09-10 18:58:40', '2025-09-10 18:58:40'),
(36, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/26', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 18:59:01', '2025-09-11', '2025-09-10 18:59:01', '2025-09-10 18:59:01'),
(37, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', '/event', '491fa2c80be85d8e021e99ba97182421', '2025-09-10 18:59:46', '2025-09-11', '2025-09-10 18:59:46', '2025-09-10 18:59:46'),
(38, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', '/galeri', '491fa2c80be85d8e021e99ba97182421', '2025-09-10 19:02:01', '2025-09-11', '2025-09-10 19:02:01', '2025-09-10 19:02:01'),
(39, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/27', 'a1d9aad9462359e8b72de96b9589ec03', '2025-09-10 21:08:19', '2025-09-11', '2025-09-10 21:08:19', '2025-09-10 21:08:19'),
(40, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-11 16:34:05', '2025-09-11 16:34:05'),
(41, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-11 16:43:25', '2025-09-11 16:43:25'),
(42, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-11 16:46:13', '2025-09-11 16:46:13'),
(43, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-11 16:46:54', '2025-09-11 16:46:54'),
(44, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-11 16:50:35', '2025-09-11 16:50:35'),
(45, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-11', '2025-09-11 16:50:36', '2025-09-11 16:50:36'),
(46, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 17:26:31', '2025-09-12', '2025-09-11 17:26:31', '2025-09-11 17:26:31'),
(47, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/18', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 17:26:55', '2025-09-12', '2025-09-11 17:26:55', '2025-09-11 17:26:55'),
(48, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', '/', NULL, NULL, '2025-09-12', '2025-09-11 18:05:40', '2025-09-11 18:05:40'),
(49, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', '/', '1563a01135975477ecf6b9c366a757c7', '2025-09-11 18:05:40', '2025-09-12', '2025-09-11 18:05:40', '2025-09-11 18:05:40'),
(50, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/event', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 18:46:17', '2025-09-12', '2025-09-11 18:46:17', '2025-09-11 18:46:17'),
(51, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 20:42:18', '2025-09-12', '2025-09-11 20:42:18', '2025-09-11 20:42:18'),
(52, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/event-detail/22', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 20:42:29', '2025-09-12', '2025-09-11 20:42:29', '2025-09-11 20:42:29'),
(53, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/26', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 20:42:41', '2025-09-12', '2025-09-11 20:42:41', '2025-09-11 20:42:41'),
(54, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/galeri', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 20:43:09', '2025-09-12', '2025-09-11 20:43:09', '2025-09-11 20:43:09'),
(55, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/jurusan', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 20:43:22', '2025-09-12', '2025-09-11 20:43:22', '2025-09-11 20:43:22'),
(56, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/event-detail/28', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 21:18:43', '2025-09-12', '2025-09-11 21:18:43', '2025-09-11 21:18:43'),
(57, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/teachers', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 21:26:43', '2025-09-12', '2025-09-11 21:26:43', '2025-09-11 21:26:43'),
(58, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/berita-detail/27', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 21:26:53', '2025-09-12', '2025-09-11 21:26:53', '2025-09-11 21:26:53'),
(59, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '/event-detail/29', '75a110b7fb78cc8d31737f6bae0ab3a1', '2025-09-11 21:42:30', '2025-09-12', '2025-09-11 21:42:30', '2025-09-11 21:42:30'),
(60, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 21:29:01', '2025-09-19 21:29:01'),
(61, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', 'c9490af56ea98eec0872883dc00d0754', '2025-09-19 21:29:01', '2025-09-20', '2025-09-19 21:29:01', '2025-09-19 21:29:01'),
(62, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-09-20', '2025-09-19 21:29:50', '2025-09-19 21:29:50'),
(63, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/berita', 'c9490af56ea98eec0872883dc00d0754', '2025-09-19 21:29:50', '2025-09-20', '2025-09-19 21:29:50', '2025-09-19 21:29:50'),
(64, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:29:54', '2025-09-19 21:29:54'),
(65, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/berita-detail/18', 'c9490af56ea98eec0872883dc00d0754', '2025-09-19 21:29:55', '2025-09-20', '2025-09-19 21:29:55', '2025-09-19 21:29:55'),
(66, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18/comment', NULL, NULL, '2025-09-20', '2025-09-19 21:30:14', '2025-09-19 21:30:14'),
(67, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:30:15', '2025-09-19 21:30:15'),
(68, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:37:26', '2025-09-19 21:37:26'),
(69, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18/comment', NULL, NULL, '2025-09-20', '2025-09-19 21:37:47', '2025-09-19 21:37:47'),
(70, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:37:48', '2025-09-19 21:37:48'),
(71, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18/comment', NULL, NULL, '2025-09-20', '2025-09-19 21:38:10', '2025-09-19 21:38:10'),
(72, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:38:10', '2025-09-19 21:38:10'),
(73, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:41:10', '2025-09-19 21:41:10'),
(74, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:43:48', '2025-09-19 21:43:48'),
(75, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:44:44', '2025-09-19 21:44:44'),
(76, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:45:53', '2025-09-19 21:45:53'),
(77, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18/comment', NULL, NULL, '2025-09-20', '2025-09-19 21:46:10', '2025-09-19 21:46:10'),
(78, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:46:11', '2025-09-19 21:46:11'),
(79, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-09-20', '2025-09-19 21:48:46', '2025-09-19 21:48:46'),
(80, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 21:49:19', '2025-09-19 21:49:19'),
(81, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 21:49:20', '2025-09-19 21:49:20'),
(82, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/berita-detail/30', 'c9490af56ea98eec0872883dc00d0754', '2025-09-19 22:02:20', '2025-09-20', '2025-09-19 22:02:20', '2025-09-19 22:02:20'),
(83, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/berita-detail/26', 'c9490af56ea98eec0872883dc00d0754', '2025-09-19 22:09:46', '2025-09-20', '2025-09-19 22:09:46', '2025-09-19 22:09:46'),
(84, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/berita-detail/27', 'c9490af56ea98eec0872883dc00d0754', '2025-09-19 22:15:59', '2025-09-20', '2025-09-19 22:15:59', '2025-09-19 22:15:59'),
(85, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 22:17:40', '2025-09-19 22:17:40'),
(86, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/26', NULL, NULL, '2025-09-20', '2025-09-19 22:17:48', '2025-09-19 22:17:48'),
(87, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 22:17:54', '2025-09-19 22:17:54'),
(88, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 22:18:00', '2025-09-19 22:18:00'),
(89, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/26', NULL, NULL, '2025-09-20', '2025-09-19 22:18:09', '2025-09-19 22:18:09'),
(90, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/26', NULL, NULL, '2025-09-20', '2025-09-19 22:24:19', '2025-09-19 22:24:19'),
(91, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:24:31', '2025-09-19 22:24:31'),
(92, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:25:54', '2025-09-19 22:25:54'),
(93, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:25:54', '2025-09-19 22:25:54'),
(94, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:26:09', '2025-09-19 22:26:09'),
(95, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'verify-otp', NULL, NULL, '2025-09-20', '2025-09-19 22:26:11', '2025-09-19 22:26:11'),
(96, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'verify-otp', NULL, NULL, '2025-09-20', '2025-09-19 22:35:27', '2025-09-19 22:35:27'),
(97, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:35:27', '2025-09-19 22:35:27'),
(98, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:36:18', '2025-09-19 22:36:18'),
(99, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:37:44', '2025-09-19 22:37:44'),
(100, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'test-email', NULL, NULL, '2025-09-20', '2025-09-19 22:38:42', '2025-09-19 22:38:42'),
(101, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:39:11', '2025-09-19 22:39:11'),
(102, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:39:20', '2025-09-19 22:39:20'),
(103, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'test-email', NULL, NULL, '2025-09-20', '2025-09-19 22:39:27', '2025-09-19 22:39:27'),
(104, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'test-email', NULL, NULL, '2025-09-20', '2025-09-19 22:42:29', '2025-09-19 22:42:29'),
(105, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:43:27', '2025-09-19 22:43:27'),
(106, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:48:31', '2025-09-19 22:48:31'),
(107, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'test-email', NULL, NULL, '2025-09-20', '2025-09-19 22:55:21', '2025-09-19 22:55:21'),
(108, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 22:55:45', '2025-09-19 22:55:45'),
(109, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'verify-otp', NULL, NULL, '2025-09-20', '2025-09-19 22:55:49', '2025-09-19 22:55:49'),
(110, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 23:08:56', '2025-09-19 23:08:56'),
(111, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-09-20', '2025-09-19 23:09:12', '2025-09-19 23:09:12'),
(112, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'verify-otp', NULL, NULL, '2025-09-20', '2025-09-19 23:09:17', '2025-09-19 23:09:17'),
(113, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'verify-otp', NULL, NULL, '2025-09-20', '2025-09-19 23:09:46', '2025-09-19 23:09:46'),
(114, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'verify-otp', NULL, NULL, '2025-09-20', '2025-09-19 23:13:22', '2025-09-19 23:13:22'),
(115, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:13:23', '2025-09-19 23:13:23'),
(116, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/30', NULL, NULL, '2025-09-20', '2025-09-19 23:13:33', '2025-09-19 23:13:33'),
(117, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'logout', NULL, NULL, '2025-09-20', '2025-09-19 23:14:02', '2025-09-19 23:14:02'),
(118, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:14:10', '2025-09-19 23:14:10'),
(119, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/27', NULL, NULL, '2025-09-20', '2025-09-19 23:14:52', '2025-09-19 23:14:52'),
(120, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/27', NULL, NULL, '2025-09-20', '2025-09-19 23:15:12', '2025-09-19 23:15:12'),
(121, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/26', NULL, NULL, '2025-09-20', '2025-09-19 23:15:21', '2025-09-19 23:15:21'),
(122, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/26/comment', NULL, NULL, '2025-09-20', '2025-09-19 23:15:29', '2025-09-19 23:15:29'),
(123, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/26', NULL, NULL, '2025-09-20', '2025-09-19 23:15:29', '2025-09-19 23:15:29'),
(124, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:15:50', '2025-09-19 23:15:50'),
(125, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:24:01', '2025-09-19 23:24:01'),
(126, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:26:54', '2025-09-19 23:26:54'),
(127, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:42:09', '2025-09-19 23:42:09'),
(128, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:43:21', '2025-09-19 23:43:21'),
(129, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:43:22', '2025-09-19 23:43:22'),
(130, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:43:32', '2025-09-19 23:43:32'),
(131, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'logout', NULL, NULL, '2025-09-20', '2025-09-19 23:44:49', '2025-09-19 23:44:49'),
(132, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-09-20', '2025-09-19 23:45:03', '2025-09-19 23:45:03'),
(133, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'logout', NULL, NULL, '2025-09-20', '2025-09-19 23:45:09', '2025-09-19 23:45:09'),
(134, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 07:22:06', '2025-10-06 07:22:06'),
(135, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', '5650bb300528f0018363095b200ea783', '2025-10-06 07:22:06', '2025-10-06', '2025-10-06 07:22:06', '2025-10-06 07:22:06'),
(136, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 07:24:53', '2025-10-06 07:24:53'),
(137, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 07:39:32', '2025-10-06 07:39:32'),
(138, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-06', '2025-10-06 07:39:46', '2025-10-06 07:39:46'),
(139, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-06', '2025-10-06 07:41:43', '2025-10-06 07:41:43'),
(140, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/teachers', '5650bb300528f0018363095b200ea783', '2025-10-06 07:41:43', '2025-10-06', '2025-10-06 07:41:43', '2025-10-06 07:41:43'),
(141, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-06', '2025-10-06 07:41:55', '2025-10-06 07:41:55'),
(142, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 07:44:03', '2025-10-06 07:44:03'),
(143, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 07:48:00', '2025-10-06 07:48:00'),
(144, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/register', NULL, NULL, '2025-10-06', '2025-10-06 07:50:02', '2025-10-06 07:50:02'),
(145, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-06', '2025-10-06 07:50:09', '2025-10-06 07:50:09'),
(146, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 07:50:31', '2025-10-06 07:50:31'),
(147, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-06', '2025-10-06 07:52:09', '2025-10-06 07:52:09'),
(148, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-06', '2025-10-06 07:58:49', '2025-10-06 07:58:49'),
(149, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan', NULL, NULL, '2025-10-06', '2025-10-06 07:58:56', '2025-10-06 07:58:56'),
(150, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/jurusan', '5650bb300528f0018363095b200ea783', '2025-10-06 07:58:56', '2025-10-06', '2025-10-06 07:58:56', '2025-10-06 07:58:56'),
(151, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-06', '2025-10-06 07:59:00', '2025-10-06 07:59:00'),
(152, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/berita', '5650bb300528f0018363095b200ea783', '2025-10-06 07:59:00', '2025-10-06', '2025-10-06 07:59:00', '2025-10-06 07:59:00'),
(153, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-06', '2025-10-06 07:59:16', '2025-10-06 07:59:16'),
(154, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event', '5650bb300528f0018363095b200ea783', '2025-10-06 07:59:16', '2025-10-06', '2025-10-06 07:59:16', '2025-10-06 07:59:16'),
(155, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-06', '2025-10-06 07:59:27', '2025-10-06 07:59:27'),
(156, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/galeri', '5650bb300528f0018363095b200ea783', '2025-10-06 07:59:27', '2025-10-06', '2025-10-06 07:59:27', '2025-10-06 07:59:27'),
(157, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-06', '2025-10-06 07:59:31', '2025-10-06 07:59:31'),
(158, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-06', '2025-10-06 07:59:34', '2025-10-06 07:59:34'),
(159, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-06', '2025-10-06 07:59:39', '2025-10-06 07:59:39'),
(160, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-06', '2025-10-06 07:59:42', '2025-10-06 07:59:42'),
(161, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-06', '2025-10-06 07:59:44', '2025-10-06 07:59:44'),
(162, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-06', '2025-10-06 07:59:50', '2025-10-06 07:59:50'),
(163, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-06', '2025-10-06 07:59:53', '2025-10-06 07:59:53'),
(164, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-06', '2025-10-06 07:59:54', '2025-10-06 07:59:54'),
(165, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 08:00:06', '2025-10-06 08:00:06'),
(166, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan/tkj', NULL, NULL, '2025-10-06', '2025-10-06 08:00:38', '2025-10-06 08:00:38'),
(167, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan/tkj', NULL, NULL, '2025-10-06', '2025-10-06 08:05:05', '2025-10-06 08:05:05'),
(168, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan', NULL, NULL, '2025-10-06', '2025-10-06 08:05:08', '2025-10-06 08:05:08'),
(169, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan', NULL, NULL, '2025-10-06', '2025-10-06 08:05:11', '2025-10-06 08:05:11'),
(170, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan/tkj', NULL, NULL, '2025-10-06', '2025-10-06 08:05:16', '2025-10-06 08:05:16'),
(171, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan/otomotif', NULL, NULL, '2025-10-06', '2025-10-06 08:05:23', '2025-10-06 08:05:23'),
(172, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan/rpl', NULL, NULL, '2025-10-06', '2025-10-06 08:05:32', '2025-10-06 08:05:32'),
(173, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan/rpl', NULL, NULL, '2025-10-06', '2025-10-06 08:08:51', '2025-10-06 08:08:51'),
(174, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 08:08:55', '2025-10-06 08:08:55'),
(175, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan', NULL, NULL, '2025-10-06', '2025-10-06 08:08:59', '2025-10-06 08:08:59'),
(176, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan/otomotif', NULL, NULL, '2025-10-06', '2025-10-06 08:09:03', '2025-10-06 08:09:03'),
(177, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 08:09:09', '2025-10-06 08:09:09'),
(178, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 16:48:25', '2025-10-06 16:48:25'),
(179, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 16:48:53', '2025-10-06 16:48:53'),
(180, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-06', '2025-10-06 16:49:45', '2025-10-06 16:49:45'),
(181, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 17:35:13', '2025-10-06 17:35:13'),
(182, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 17:35:14', '2025-10-07', '2025-10-06 17:35:14', '2025-10-06 17:35:14'),
(183, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 17:35:20', '2025-10-06 17:35:20'),
(184, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 17:38:56', '2025-10-06 17:38:56'),
(185, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 17:42:02', '2025-10-06 17:42:02'),
(186, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 17:57:41', '2025-10-06 17:57:41'),
(187, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/19', NULL, NULL, '2025-10-07', '2025-10-06 17:59:15', '2025-10-06 17:59:15'),
(188, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 18:01:38', '2025-10-06 18:01:38'),
(189, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 18:04:24', '2025-10-06 18:04:24'),
(190, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 18:19:46', '2025-10-06 18:19:46'),
(191, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 18:24:22', '2025-10-06 18:24:22'),
(192, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-07', '2025-10-06 18:25:13', '2025-10-06 18:25:13'),
(193, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/teachers', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 18:25:13', '2025-10-07', '2025-10-06 18:25:13', '2025-10-06 18:25:13'),
(194, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/30', NULL, NULL, '2025-10-07', '2025-10-06 18:25:21', '2025-10-06 18:25:21'),
(195, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/berita-detail/30', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 18:25:23', '2025-10-07', '2025-10-06 18:25:23', '2025-10-06 18:25:23'),
(196, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/11', NULL, NULL, '2025-10-07', '2025-10-06 19:15:23', '2025-10-06 19:15:23'),
(197, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/11', NULL, NULL, '2025-10-07', '2025-10-06 19:18:12', '2025-10-06 19:18:12'),
(198, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 19:18:35', '2025-10-06 19:18:35'),
(199, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 19:20:07', '2025-10-06 19:20:07'),
(200, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 19:20:13', '2025-10-06 19:20:13'),
(201, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 19:20:15', '2025-10-06 19:20:15'),
(202, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-07', '2025-10-06 19:20:22', '2025-10-06 19:20:22'),
(203, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/galeri', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 19:20:22', '2025-10-07', '2025-10-06 19:20:22', '2025-10-06 19:20:22'),
(204, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-07', '2025-10-06 19:20:35', '2025-10-06 19:20:35'),
(205, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 19:20:43', '2025-10-06 19:20:43'),
(206, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 19:21:10', '2025-10-06 19:21:10'),
(207, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 19:21:12', '2025-10-06 19:21:12'),
(208, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 19:21:25', '2025-10-06 19:21:25'),
(209, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 19:21:31', '2025-10-06 19:21:31'),
(210, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/25', NULL, NULL, '2025-10-07', '2025-10-06 19:21:40', '2025-10-06 19:21:40'),
(211, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event-detail/25', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 19:21:40', '2025-10-07', '2025-10-06 19:21:40', '2025-10-06 19:21:40'),
(212, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/25', NULL, NULL, '2025-10-07', '2025-10-06 19:25:57', '2025-10-06 19:25:57');
INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `page_visited`, `visitor_key`, `visited_at`, `visit_date`, `created_at`, `updated_at`) VALUES
(213, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/25', NULL, NULL, '2025-10-07', '2025-10-06 19:25:59', '2025-10-06 19:25:59'),
(214, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/25', NULL, NULL, '2025-10-07', '2025-10-06 19:26:29', '2025-10-06 19:26:29'),
(215, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/25', NULL, NULL, '2025-10-07', '2025-10-06 19:26:29', '2025-10-06 19:26:29'),
(216, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/30', NULL, NULL, '2025-10-07', '2025-10-06 19:28:24', '2025-10-06 19:28:24'),
(217, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/30', NULL, NULL, '2025-10-07', '2025-10-06 19:29:11', '2025-10-06 19:29:11'),
(218, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/29', NULL, NULL, '2025-10-07', '2025-10-06 19:29:20', '2025-10-06 19:29:20'),
(219, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event-detail/29', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 19:29:20', '2025-10-07', '2025-10-06 19:29:20', '2025-10-06 19:29:20'),
(220, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 19:29:32', '2025-10-06 19:29:32'),
(221, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 19:30:03', '2025-10-06 19:30:03'),
(222, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-07', '2025-10-06 19:32:02', '2025-10-06 19:32:02'),
(223, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-07', '2025-10-06 19:32:12', '2025-10-06 19:32:12'),
(224, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/berita', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 19:32:12', '2025-10-07', '2025-10-06 19:32:12', '2025-10-06 19:32:12'),
(225, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-07', '2025-10-06 19:32:19', '2025-10-06 19:32:19'),
(226, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 19:32:19', '2025-10-07', '2025-10-06 19:32:19', '2025-10-06 19:32:19'),
(227, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/29', NULL, NULL, '2025-10-07', '2025-10-06 19:32:26', '2025-10-06 19:32:26'),
(228, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/30', NULL, NULL, '2025-10-07', '2025-10-06 19:32:33', '2025-10-06 19:32:33'),
(229, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/28', NULL, NULL, '2025-10-07', '2025-10-06 19:32:45', '2025-10-06 19:32:45'),
(230, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event-detail/28', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 19:32:45', '2025-10-07', '2025-10-06 19:32:45', '2025-10-06 19:32:45'),
(231, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/28', NULL, NULL, '2025-10-07', '2025-10-06 19:38:23', '2025-10-06 19:38:23'),
(232, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 19:38:28', '2025-10-06 19:38:28'),
(233, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'jurusan', NULL, NULL, '2025-10-07', '2025-10-06 19:38:34', '2025-10-06 19:38:34'),
(234, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/jurusan', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 19:38:34', '2025-10-07', '2025-10-06 19:38:34', '2025-10-06 19:38:34'),
(235, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-07', '2025-10-06 19:38:56', '2025-10-06 19:38:56'),
(236, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/18', NULL, NULL, '2025-10-07', '2025-10-06 19:42:10', '2025-10-06 19:42:10'),
(237, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/berita-detail/18', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 19:42:10', '2025-10-07', '2025-10-06 19:42:10', '2025-10-06 19:42:10'),
(238, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-07', '2025-10-06 19:42:14', '2025-10-06 19:42:14'),
(239, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/29', NULL, NULL, '2025-10-07', '2025-10-06 19:42:19', '2025-10-06 19:42:19'),
(240, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-07', '2025-10-06 20:02:37', '2025-10-06 20:02:37'),
(241, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/29', NULL, NULL, '2025-10-07', '2025-10-06 20:02:37', '2025-10-06 20:02:37'),
(242, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 20:02:43', '2025-10-06 20:02:43'),
(243, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/28', NULL, NULL, '2025-10-07', '2025-10-06 20:02:54', '2025-10-06 20:02:54'),
(244, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/27', NULL, NULL, '2025-10-07', '2025-10-06 20:03:05', '2025-10-06 20:03:05'),
(245, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/berita-detail/27', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 20:03:05', '2025-10-07', '2025-10-06 20:03:05', '2025-10-06 20:03:05'),
(246, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/10', NULL, NULL, '2025-10-07', '2025-10-06 20:03:14', '2025-10-06 20:03:14'),
(247, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/22', NULL, NULL, '2025-10-07', '2025-10-06 20:03:22', '2025-10-06 20:03:22'),
(248, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event-detail/22', '29cca13353dee0e93d4ecc56a2738605', '2025-10-06 20:03:22', '2025-10-07', '2025-10-06 20:03:22', '2025-10-06 20:03:22'),
(249, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-07', '2025-10-06 20:03:26', '2025-10-06 20:03:26'),
(250, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 20:03:32', '2025-10-06 20:03:32'),
(251, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 20:09:22', '2025-10-06 20:09:22'),
(252, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 20:09:32', '2025-10-06 20:09:32'),
(253, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-07', '2025-10-06 20:09:44', '2025-10-06 20:09:44'),
(254, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/18', NULL, NULL, '2025-10-07', '2025-10-06 20:09:53', '2025-10-06 20:09:53'),
(255, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-07', '2025-10-06 20:10:01', '2025-10-06 20:10:01'),
(256, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-07', '2025-10-06 20:16:52', '2025-10-06 20:16:52'),
(257, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-07', '2025-10-06 20:16:56', '2025-10-06 20:16:56'),
(258, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-07', '2025-10-06 20:17:04', '2025-10-06 20:17:04'),
(259, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-07', '2025-10-06 20:17:08', '2025-10-06 20:17:08'),
(260, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-07', '2025-10-06 20:17:13', '2025-10-06 20:17:13'),
(261, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-07', '2025-10-06 20:17:15', '2025-10-06 20:17:15'),
(262, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-07', '2025-10-06 20:40:43', '2025-10-06 20:40:43'),
(263, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-07', '2025-10-06 20:41:00', '2025-10-06 20:41:00'),
(264, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-07', '2025-10-06 20:41:07', '2025-10-06 20:41:07'),
(265, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 20:42:56', '2025-10-06 20:42:56'),
(266, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 23:05:01', '2025-10-06 23:05:01'),
(267, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-07', '2025-10-06 23:05:01', '2025-10-06 23:05:01'),
(268, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 23:05:05', '2025-10-06 23:05:05'),
(269, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-07', '2025-10-06 23:05:10', '2025-10-06 23:05:10'),
(270, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/18', NULL, NULL, '2025-10-07', '2025-10-06 23:05:13', '2025-10-06 23:05:13'),
(271, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 23:40:50', '2025-10-06 23:40:50'),
(272, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 23:44:46', '2025-10-06 23:44:46'),
(273, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-06 23:44:49', '2025-10-06 23:44:49'),
(274, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-07 00:52:29', '2025-10-07 00:52:29'),
(275, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-07 00:54:32', '2025-10-07 00:54:32'),
(276, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-07 00:54:37', '2025-10-07 00:54:37'),
(277, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-07 01:07:58', '2025-10-07 01:07:58'),
(278, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/14', NULL, NULL, '2025-10-07', '2025-10-07 01:45:06', '2025-10-07 01:45:06'),
(279, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-07', '2025-10-07 01:45:39', '2025-10-07 01:45:39'),
(280, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/8', NULL, NULL, '2025-10-07', '2025-10-07 01:45:48', '2025-10-07 01:45:48'),
(281, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-07 01:47:01', '2025-10-07 01:47:01'),
(282, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/8', NULL, NULL, '2025-10-07', '2025-10-07 01:47:53', '2025-10-07 01:47:53'),
(283, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-07', '2025-10-07 01:48:28', '2025-10-07 01:48:28'),
(284, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-07', '2025-10-07 01:56:19', '2025-10-07 01:56:19'),
(285, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-07', '2025-10-07 01:56:50', '2025-10-07 01:56:50'),
(286, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 18:43:41', '2025-10-07 18:43:41'),
(287, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', '90c723ddfac04a11e891cab925de2793', '2025-10-07 18:43:41', '2025-10-08', '2025-10-07 18:43:41', '2025-10-07 18:43:41'),
(288, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 18:43:41', '2025-10-07 18:43:41'),
(289, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 18:44:25', '2025-10-07 18:44:25'),
(290, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 18:44:26', '2025-10-07 18:44:26'),
(291, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 18:44:27', '2025-10-07 18:44:27'),
(292, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 18:44:28', '2025-10-07 18:44:28'),
(293, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 18:44:28', '2025-10-07 18:44:28'),
(294, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 18:44:28', '2025-10-07 18:44:28'),
(295, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 18:44:29', '2025-10-07 18:44:29'),
(296, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 19:31:41', '2025-10-07 19:31:41'),
(297, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 19:31:45', '2025-10-07 19:31:45'),
(298, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 19:31:47', '2025-10-07 19:31:47'),
(299, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-07 19:31:52', '2025-10-07 19:31:52'),
(300, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 19:31:57', '2025-10-07 19:31:57'),
(301, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-07 19:32:11', '2025-10-07 19:32:11'),
(302, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-07 19:32:40', '2025-10-07 19:32:40'),
(303, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-07 19:32:41', '2025-10-07 19:32:41'),
(304, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-07 19:33:03', '2025-10-07 19:33:03'),
(305, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'verify-otp', NULL, NULL, '2025-10-08', '2025-10-07 19:33:09', '2025-10-07 19:33:09'),
(306, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-10-08', '2025-10-07 19:34:07', '2025-10-07 19:34:07'),
(307, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-10-08', '2025-10-07 19:36:36', '2025-10-07 19:36:36'),
(308, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-10-08', '2025-10-07 19:36:37', '2025-10-07 19:36:37'),
(309, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:18:34', '2025-10-07 20:18:34'),
(310, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 20:18:36', '2025-10-07 20:18:36'),
(311, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-07 20:18:52', '2025-10-07 20:18:52'),
(312, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'forgot-password', NULL, NULL, '2025-10-08', '2025-10-07 20:22:14', '2025-10-07 20:22:14'),
(313, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'forgot-password', NULL, NULL, '2025-10-08', '2025-10-07 20:22:26', '2025-10-07 20:22:26'),
(314, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'forgot-password', NULL, NULL, '2025-10-08', '2025-10-07 20:22:39', '2025-10-07 20:22:39'),
(315, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'reset-password/7a15678e19fd3803a66e1118aeacfccb2c5fc02826bec6e55ea8ca8567954190', NULL, NULL, '2025-10-08', '2025-10-07 20:24:24', '2025-10-07 20:24:24'),
(316, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'reset-password', NULL, NULL, '2025-10-08', '2025-10-07 20:25:22', '2025-10-07 20:25:22'),
(317, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'reset-password/7a15678e19fd3803a66e1118aeacfccb2c5fc02826bec6e55ea8ca8567954190', NULL, NULL, '2025-10-08', '2025-10-07 20:25:23', '2025-10-07 20:25:23'),
(318, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'reset-password', NULL, NULL, '2025-10-08', '2025-10-07 20:25:46', '2025-10-07 20:25:46'),
(319, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:26:18', '2025-10-07 20:26:18'),
(320, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:26:19', '2025-10-07 20:26:19'),
(321, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 20:26:20', '2025-10-07 20:26:20'),
(322, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 20:26:28', '2025-10-07 20:26:28'),
(323, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:26:28', '2025-10-07 20:26:28'),
(324, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:26:29', '2025-10-07 20:26:29'),
(325, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/17', NULL, NULL, '2025-10-08', '2025-10-07 20:26:54', '2025-10-07 20:26:54'),
(326, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/17/like', NULL, NULL, '2025-10-08', '2025-10-07 20:26:59', '2025-10-07 20:26:59'),
(327, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/17/comment', NULL, NULL, '2025-10-08', '2025-10-07 20:27:20', '2025-10-07 20:27:20'),
(328, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/17', NULL, NULL, '2025-10-08', '2025-10-07 20:27:21', '2025-10-07 20:27:21'),
(329, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'logout', NULL, NULL, '2025-10-08', '2025-10-07 20:27:41', '2025-10-07 20:27:41'),
(330, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:28:44', '2025-10-07 20:28:44'),
(331, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:28:45', '2025-10-07 20:28:45'),
(332, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/17', NULL, NULL, '2025-10-08', '2025-10-07 20:28:52', '2025-10-07 20:28:52'),
(333, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/17', NULL, NULL, '2025-10-08', '2025-10-07 20:30:03', '2025-10-07 20:30:03'),
(334, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:32:23', '2025-10-07 20:32:23'),
(335, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:32:25', '2025-10-07 20:32:25'),
(336, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:32:30', '2025-10-07 20:32:30'),
(337, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/berita', '90c723ddfac04a11e891cab925de2793', '2025-10-07 20:32:30', '2025-10-08', '2025-10-07 20:32:30', '2025-10-07 20:32:30'),
(338, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:34:09', '2025-10-07 20:34:09'),
(339, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:34:11', '2025-10-07 20:34:11'),
(340, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/event', '90c723ddfac04a11e891cab925de2793', '2025-10-07 20:34:11', '2025-10-08', '2025-10-07 20:34:11', '2025-10-07 20:34:11'),
(341, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-08', '2025-10-07 20:34:15', '2025-10-07 20:34:15'),
(342, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/galeri', '90c723ddfac04a11e891cab925de2793', '2025-10-07 20:34:15', '2025-10-08', '2025-10-07 20:34:15', '2025-10-07 20:34:15'),
(343, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/18', NULL, NULL, '2025-10-08', '2025-10-07 20:34:24', '2025-10-07 20:34:24'),
(344, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 20:34:27', '2025-10-07 20:34:27'),
(345, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 20:34:38', '2025-10-07 20:34:38'),
(346, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/18', NULL, NULL, '2025-10-08', '2025-10-07 20:34:38', '2025-10-07 20:34:38'),
(347, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/18/like', NULL, NULL, '2025-10-08', '2025-10-07 20:34:41', '2025-10-07 20:34:41'),
(348, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/18/comment', NULL, NULL, '2025-10-08', '2025-10-07 20:34:51', '2025-10-07 20:34:51'),
(349, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/18', NULL, NULL, '2025-10-08', '2025-10-07 20:34:51', '2025-10-07 20:34:51'),
(350, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'logout', NULL, NULL, '2025-10-08', '2025-10-07 20:34:56', '2025-10-07 20:34:56'),
(351, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:34:56', '2025-10-07 20:34:56'),
(352, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:34:57', '2025-10-07 20:34:57'),
(353, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/18', NULL, NULL, '2025-10-08', '2025-10-07 20:35:08', '2025-10-07 20:35:08'),
(354, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'teachers', NULL, NULL, '2025-10-08', '2025-10-07 20:35:34', '2025-10-07 20:35:34'),
(355, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/teachers', '90c723ddfac04a11e891cab925de2793', '2025-10-07 20:35:34', '2025-10-08', '2025-10-07 20:35:34', '2025-10-07 20:35:34'),
(356, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'teachers', NULL, NULL, '2025-10-08', '2025-10-07 20:36:30', '2025-10-07 20:36:30'),
(357, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:36:41', '2025-10-07 20:36:41'),
(358, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:37:20', '2025-10-07 20:37:20'),
(359, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:37:40', '2025-10-07 20:37:40'),
(360, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:37:51', '2025-10-07 20:37:51'),
(361, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:37:52', '2025-10-07 20:37:52'),
(362, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:37:57', '2025-10-07 20:37:57'),
(363, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:38:03', '2025-10-07 20:38:03'),
(364, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:38:04', '2025-10-07 20:38:04'),
(365, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:38:10', '2025-10-07 20:38:10'),
(366, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:38:13', '2025-10-07 20:38:13'),
(367, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:38:14', '2025-10-07 20:38:14'),
(368, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:38:31', '2025-10-07 20:38:31'),
(369, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'jurusan', NULL, NULL, '2025-10-08', '2025-10-07 20:38:38', '2025-10-07 20:38:38'),
(370, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/jurusan', '90c723ddfac04a11e891cab925de2793', '2025-10-07 20:38:38', '2025-10-08', '2025-10-07 20:38:38', '2025-10-07 20:38:38'),
(371, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:38:38', '2025-10-07 20:38:38'),
(372, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:40:46', '2025-10-07 20:40:46'),
(373, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:40:48', '2025-10-07 20:40:48'),
(374, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:41:29', '2025-10-07 20:41:29'),
(375, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:41:31', '2025-10-07 20:41:31'),
(376, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:42:00', '2025-10-07 20:42:00'),
(377, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:42:02', '2025-10-07 20:42:02'),
(378, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:42:02', '2025-10-07 20:42:02'),
(379, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:43:04', '2025-10-07 20:43:04'),
(380, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:43:05', '2025-10-07 20:43:05'),
(381, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:43:07', '2025-10-07 20:43:07'),
(382, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event-detail/29', NULL, NULL, '2025-10-08', '2025-10-07 20:43:16', '2025-10-07 20:43:16'),
(383, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/event-detail/29', '90c723ddfac04a11e891cab925de2793', '2025-10-07 20:43:17', '2025-10-08', '2025-10-07 20:43:17', '2025-10-07 20:43:17'),
(384, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event-detail/29', NULL, NULL, '2025-10-08', '2025-10-07 20:43:56', '2025-10-07 20:43:56'),
(385, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:44:03', '2025-10-07 20:44:03'),
(386, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/30', NULL, NULL, '2025-10-08', '2025-10-07 20:44:50', '2025-10-07 20:44:50'),
(387, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/berita-detail/30', '90c723ddfac04a11e891cab925de2793', '2025-10-07 20:44:50', '2025-10-08', '2025-10-07 20:44:50', '2025-10-07 20:44:50'),
(388, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/30', NULL, NULL, '2025-10-08', '2025-10-07 20:45:09', '2025-10-07 20:45:09'),
(389, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita-detail/30', NULL, NULL, '2025-10-08', '2025-10-07 20:47:10', '2025-10-07 20:47:10'),
(390, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 20:47:21', '2025-10-07 20:47:21'),
(391, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 20:47:39', '2025-10-07 20:47:39'),
(392, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:47:46', '2025-10-07 20:47:46'),
(393, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 20:48:17', '2025-10-07 20:48:17'),
(394, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-08', '2025-10-07 20:48:24', '2025-10-07 20:48:24'),
(395, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-08', '2025-10-07 20:48:54', '2025-10-07 20:48:54'),
(396, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/8', NULL, NULL, '2025-10-08', '2025-10-07 20:49:00', '2025-10-07 20:49:00'),
(397, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/8', NULL, NULL, '2025-10-08', '2025-10-07 20:49:51', '2025-10-07 20:49:51'),
(398, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'teachers', NULL, NULL, '2025-10-08', '2025-10-07 20:50:19', '2025-10-07 20:50:19'),
(399, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'teachers', NULL, NULL, '2025-10-08', '2025-10-07 20:50:41', '2025-10-07 20:50:41'),
(400, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:50:50', '2025-10-07 20:50:50'),
(401, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:50:50', '2025-10-07 20:50:50'),
(402, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:51:20', '2025-10-07 20:51:20'),
(403, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:51:21', '2025-10-07 20:51:21'),
(404, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:51:51', '2025-10-07 20:51:51'),
(405, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:51:52', '2025-10-07 20:51:52'),
(406, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 20:52:46', '2025-10-07 20:52:46'),
(407, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-08', '2025-10-07 20:52:53', '2025-10-07 20:52:53'),
(408, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:52:54', '2025-10-07 20:52:54'),
(409, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:52:55', '2025-10-07 20:52:55'),
(410, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:58:01', '2025-10-07 20:58:01'),
(411, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:58:03', '2025-10-07 20:58:03'),
(412, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 20:58:04', '2025-10-07 20:58:04'),
(413, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 20:58:45', '2025-10-07 20:58:45'),
(414, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 20:58:46', '2025-10-07 20:58:46'),
(415, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:58:56', '2025-10-07 20:58:56'),
(416, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 20:58:56', '2025-10-07 20:58:56'),
(417, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 20:58:59', '2025-10-07 20:58:59'),
(418, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 20:59:10', '2025-10-07 20:59:10'),
(419, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 20:59:30', '2025-10-07 20:59:30'),
(420, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 20:59:37', '2025-10-07 20:59:37'),
(421, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:04:09', '2025-10-07 21:04:09'),
(422, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:10:10', '2025-10-07 21:10:10'),
(423, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:10:15', '2025-10-07 21:10:15'),
(424, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:10:16', '2025-10-07 21:10:16'),
(425, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:10:17', '2025-10-07 21:10:17'),
(426, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:10:18', '2025-10-07 21:10:18'),
(427, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:10:20', '2025-10-07 21:10:20'),
(428, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:21:11', '2025-10-07 21:21:11'),
(429, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-08', '2025-10-07 21:21:18', '2025-10-07 21:21:18'),
(430, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-08', '2025-10-07 21:21:21', '2025-10-07 21:21:21'),
(431, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-08', '2025-10-07 21:21:23', '2025-10-07 21:21:23'),
(432, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:21:27', '2025-10-07 21:21:27');
INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `page_visited`, `visitor_key`, `visited_at`, `visit_date`, `created_at`, `updated_at`) VALUES
(433, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:22:44', '2025-10-07 21:22:44'),
(434, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:22:45', '2025-10-07 21:22:45'),
(435, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:22:48', '2025-10-07 21:22:48'),
(436, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:22:52', '2025-10-07 21:22:52'),
(437, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:22:53', '2025-10-07 21:22:53'),
(438, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:22:56', '2025-10-07 21:22:56'),
(439, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:28:17', '2025-10-07 21:28:17'),
(440, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:28:18', '2025-10-07 21:28:18'),
(441, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:28:22', '2025-10-07 21:28:22'),
(442, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:28:22', '2025-10-07 21:28:22'),
(443, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:29:52', '2025-10-07 21:29:52'),
(444, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:29:53', '2025-10-07 21:29:53'),
(445, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:29:54', '2025-10-07 21:29:54'),
(446, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:29:55', '2025-10-07 21:29:55'),
(447, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 21:29:56', '2025-10-07 21:29:56'),
(448, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/13', NULL, NULL, '2025-10-08', '2025-10-07 21:30:01', '2025-10-07 21:30:01'),
(449, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'galeri-detail/13/like', NULL, NULL, '2025-10-08', '2025-10-07 21:30:13', '2025-10-07 21:30:13'),
(450, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 21:30:23', '2025-10-07 21:30:23'),
(451, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-08', '2025-10-07 22:04:09', '2025-10-07 22:04:09'),
(452, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 22:04:23', '2025-10-07 22:04:23'),
(453, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 22:04:24', '2025-10-07 22:04:24'),
(454, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'logout', NULL, NULL, '2025-10-08', '2025-10-07 22:04:27', '2025-10-07 22:04:27'),
(455, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 22:04:28', '2025-10-07 22:04:28'),
(456, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-07 22:04:28', '2025-10-07 22:04:28'),
(457, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-08 01:09:23', '2025-10-08 01:09:23'),
(458, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-08', '2025-10-08 01:09:24', '2025-10-08 01:09:24'),
(459, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-08 01:09:25', '2025-10-08 01:09:25'),
(460, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-08 01:13:39', '2025-10-08 01:13:39'),
(461, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-08 01:16:24', '2025-10-08 01:16:24'),
(462, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-08 01:16:24', '2025-10-08 01:16:24'),
(463, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-08 01:18:41', '2025-10-08 01:18:41'),
(464, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-08', '2025-10-08 01:28:43', '2025-10-08 01:28:43'),
(465, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:23:24', '2025-10-09 04:23:24'),
(466, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 04:23:24', '2025-10-09', '2025-10-09 04:23:24', '2025-10-09 04:23:24'),
(467, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:23:28', '2025-10-09 04:23:28'),
(468, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 04:23:54', '2025-10-09 04:23:54'),
(469, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 04:24:10', '2025-10-09 04:24:10'),
(470, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 04:24:11', '2025-10-09 04:24:11'),
(471, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 04:24:19', '2025-10-09 04:24:19'),
(472, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:24:20', '2025-10-09 04:24:20'),
(473, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:24:21', '2025-10-09 04:24:21'),
(474, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 04:24:30', '2025-10-09 04:24:30'),
(475, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 04:24:40', '2025-10-09 04:24:40'),
(476, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:24:40', '2025-10-09 04:24:40'),
(477, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:24:42', '2025-10-09 04:24:42'),
(478, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'logout', NULL, NULL, '2025-10-09', '2025-10-09 04:26:46', '2025-10-09 04:26:46'),
(479, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:26:46', '2025-10-09 04:26:46'),
(480, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:26:48', '2025-10-09 04:26:48'),
(481, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-09', '2025-10-09 04:26:48', '2025-10-09 04:26:48'),
(482, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-09', '2025-10-09 04:34:30', '2025-10-09 04:34:30'),
(483, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:34:45', '2025-10-09 04:34:45'),
(484, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:34:47', '2025-10-09 04:34:47'),
(485, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-09', '2025-10-09 04:34:47', '2025-10-09 04:34:47'),
(486, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-09', '2025-10-09 04:35:31', '2025-10-09 04:35:31'),
(487, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:35:32', '2025-10-09 04:35:32'),
(488, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 04:35:34', '2025-10-09 04:35:34'),
(489, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 05:01:26', '2025-10-09 05:01:26'),
(490, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 05:01:27', '2025-10-09 05:01:27'),
(491, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-09', '2025-10-09 05:01:28', '2025-10-09 05:01:28'),
(492, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event-detail/28', NULL, NULL, '2025-10-09', '2025-10-09 05:04:30', '2025-10-09 05:04:30'),
(493, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/event-detail/28', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 05:04:30', '2025-10-09', '2025-10-09 05:04:30', '2025-10-09 05:04:30'),
(494, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri-detail/16', NULL, NULL, '2025-10-09', '2025-10-09 05:04:48', '2025-10-09 05:04:48'),
(495, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-09', '2025-10-09 05:04:58', '2025-10-09 05:04:58'),
(496, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/galeri', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 05:04:58', '2025-10-09', '2025-10-09 05:04:58', '2025-10-09 05:04:58'),
(497, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 05:10:19', '2025-10-09 05:10:19'),
(498, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-09', '2025-10-09 05:25:41', '2025-10-09 05:25:41'),
(499, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/profile', NULL, NULL, '2025-10-09', '2025-10-09 05:29:53', '2025-10-09 05:29:53'),
(500, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 05:44:27', '2025-10-09 05:44:27'),
(501, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 05:44:29', '2025-10-09 05:44:29'),
(502, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 05:57:54', '2025-10-09 05:57:54'),
(503, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 05:57:55', '2025-10-09 05:57:55'),
(504, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'register', NULL, NULL, '2025-10-09', '2025-10-09 05:58:09', '2025-10-09 05:58:09'),
(505, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 07:54:44', '2025-10-09 07:54:44'),
(506, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 07:54:46', '2025-10-09 07:54:46'),
(507, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 08:03:07', '2025-10-09 08:03:07'),
(508, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 08:03:09', '2025-10-09 08:03:09'),
(509, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 08:03:28', '2025-10-09 08:03:28'),
(510, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 08:03:32', '2025-10-09 08:03:32'),
(511, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 08:08:41', '2025-10-09 08:08:41'),
(512, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 08:08:45', '2025-10-09 08:08:45'),
(513, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 08:09:41', '2025-10-09 08:09:41'),
(514, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 08:17:58', '2025-10-09 08:17:58'),
(515, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'forgot-password', NULL, NULL, '2025-10-09', '2025-10-09 08:18:07', '2025-10-09 08:18:07'),
(516, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-09', '2025-10-09 08:20:59', '2025-10-09 08:20:59'),
(517, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-09', '2025-10-09 08:21:03', '2025-10-09 08:21:03'),
(518, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-09', '2025-10-09 08:23:03', '2025-10-09 08:23:03'),
(519, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 08:23:33', '2025-10-09 08:23:33'),
(520, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 08:24:41', '2025-10-09 08:24:41'),
(521, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 08:26:22', '2025-10-09 08:26:22'),
(522, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 08:26:24', '2025-10-09 08:26:24'),
(523, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/berita', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 10:38:51', '2025-10-09', '2025-10-09 10:38:51', '2025-10-09 10:38:51'),
(524, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/teachers', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 10:41:20', '2025-10-09', '2025-10-09 10:41:20', '2025-10-09 10:41:20'),
(525, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/jurusan', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 10:46:21', '2025-10-09', '2025-10-09 10:46:21', '2025-10-09 10:46:21'),
(526, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/event', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 10:46:38', '2025-10-09', '2025-10-09 10:46:38', '2025-10-09 10:46:38'),
(527, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/berita-detail/18', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 10:58:19', '2025-10-09', '2025-10-09 10:58:19', '2025-10-09 10:58:19'),
(528, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/berita-detail/26', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 10:58:41', '2025-10-09', '2025-10-09 10:58:41', '2025-10-09 10:58:41'),
(529, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/event-detail/29', '259bbf78ec588a09a1de58c0feefc780', '2025-10-09 10:59:28', '2025-10-09', '2025-10-09 10:59:28', '2025-10-09 10:59:28'),
(530, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 11:09:13', '2025-10-09 11:09:13'),
(531, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-09', '2025-10-09 11:09:15', '2025-10-09 11:09:15'),
(532, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-09', '2025-10-09 11:09:26', '2025-10-09 11:09:26'),
(533, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-10-09', '2025-10-09 11:09:30', '2025-10-09 11:09:30'),
(534, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 11:09:38', '2025-10-09 11:09:38'),
(535, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-09', '2025-10-09 11:09:51', '2025-10-09 11:09:51'),
(536, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-10-09', '2025-10-09 11:09:52', '2025-10-09 11:09:52'),
(537, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-09', '2025-10-09 11:10:11', '2025-10-09 11:10:11'),
(538, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-09', '2025-10-09 11:10:16', '2025-10-09 11:10:16'),
(539, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event-detail/29', NULL, NULL, '2025-10-09', '2025-10-09 11:10:20', '2025-10-09 11:10:20'),
(540, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:27:46', '2025-10-09 17:27:46'),
(541, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', '7b3faec77b5b7f4db4b959b2e31def5c', '2025-10-09 17:27:46', '2025-10-10', '2025-10-09 17:27:46', '2025-10-09 17:27:46'),
(542, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:27:48', '2025-10-09 17:27:48'),
(543, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri-detail/16', NULL, NULL, '2025-10-10', '2025-10-09 17:28:45', '2025-10-09 17:28:45'),
(544, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-10', '2025-10-09 17:29:21', '2025-10-09 17:29:21'),
(545, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/galeri', '7b3faec77b5b7f4db4b959b2e31def5c', '2025-10-09 17:29:21', '2025-10-10', '2025-10-09 17:29:21', '2025-10-09 17:29:21'),
(546, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-10', '2025-10-09 17:30:05', '2025-10-09 17:30:05'),
(547, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/event', '7b3faec77b5b7f4db4b959b2e31def5c', '2025-10-09 17:30:05', '2025-10-10', '2025-10-09 17:30:05', '2025-10-09 17:30:05'),
(548, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event-detail/29', NULL, NULL, '2025-10-10', '2025-10-09 17:30:11', '2025-10-09 17:30:11'),
(549, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/event-detail/29', '7b3faec77b5b7f4db4b959b2e31def5c', '2025-10-09 17:30:11', '2025-10-10', '2025-10-09 17:30:11', '2025-10-09 17:30:11'),
(550, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event-detail/29', NULL, NULL, '2025-10-10', '2025-10-09 17:32:34', '2025-10-09 17:32:34'),
(551, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event-detail/29', NULL, NULL, '2025-10-10', '2025-10-09 17:34:36', '2025-10-09 17:34:36'),
(552, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-10', '2025-10-09 17:35:06', '2025-10-09 17:35:06'),
(553, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/berita', '7b3faec77b5b7f4db4b959b2e31def5c', '2025-10-09 17:35:06', '2025-10-10', '2025-10-09 17:35:06', '2025-10-09 17:35:06'),
(554, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-10-10', '2025-10-09 17:35:10', '2025-10-09 17:35:10'),
(555, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/berita-detail/18', '7b3faec77b5b7f4db4b959b2e31def5c', '2025-10-09 17:35:10', '2025-10-10', '2025-10-09 17:35:10', '2025-10-09 17:35:10'),
(556, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-10', '2025-10-09 17:35:13', '2025-10-09 17:35:13'),
(557, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-10', '2025-10-09 17:35:59', '2025-10-09 17:35:59'),
(558, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-10', '2025-10-09 17:36:20', '2025-10-09 17:36:20'),
(559, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event-detail/29', NULL, NULL, '2025-10-10', '2025-10-09 17:36:24', '2025-10-09 17:36:24'),
(560, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:36:35', '2025-10-09 17:36:35'),
(561, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:36:37', '2025-10-09 17:36:37'),
(562, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:38:52', '2025-10-09 17:38:52'),
(563, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:38:53', '2025-10-09 17:38:53'),
(564, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:41:50', '2025-10-09 17:41:50'),
(565, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:41:55', '2025-10-09 17:41:55'),
(566, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-10', '2025-10-09 17:42:01', '2025-10-09 17:42:01'),
(567, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'teachers', NULL, NULL, '2025-10-10', '2025-10-09 17:42:05', '2025-10-09 17:42:05'),
(568, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/teachers', '7b3faec77b5b7f4db4b959b2e31def5c', '2025-10-09 17:42:05', '2025-10-10', '2025-10-09 17:42:05', '2025-10-09 17:42:05'),
(569, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:42:08', '2025-10-09 17:42:08'),
(570, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:42:10', '2025-10-09 17:42:10'),
(571, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:49:12', '2025-10-09 17:49:12'),
(572, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:49:18', '2025-10-09 17:49:18'),
(573, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:49:20', '2025-10-09 17:49:20'),
(574, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event-detail/22', NULL, NULL, '2025-10-10', '2025-10-09 17:49:47', '2025-10-09 17:49:47'),
(575, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/event-detail/22', '7b3faec77b5b7f4db4b959b2e31def5c', '2025-10-09 17:49:48', '2025-10-10', '2025-10-09 17:49:48', '2025-10-09 17:49:48'),
(576, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 17:50:15', '2025-10-09 17:50:15'),
(577, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 20:00:02', '2025-10-09 20:00:02'),
(578, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 20:00:04', '2025-10-09 20:00:04'),
(579, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 20:00:09', '2025-10-09 20:00:09'),
(580, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 20:00:11', '2025-10-09 20:00:11'),
(581, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'berita', NULL, NULL, '2025-10-10', '2025-10-09 20:00:57', '2025-10-09 20:00:57'),
(582, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'berita-detail/18', NULL, NULL, '2025-10-10', '2025-10-09 20:01:16', '2025-10-09 20:01:16'),
(583, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-10', '2025-10-09 20:01:29', '2025-10-09 20:01:29'),
(584, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-10', '2025-10-09 20:01:41', '2025-10-09 20:01:41'),
(585, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri-detail/13', NULL, NULL, '2025-10-10', '2025-10-09 20:01:52', '2025-10-09 20:01:52'),
(586, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri-detail/13', NULL, NULL, '2025-10-10', '2025-10-09 20:02:09', '2025-10-09 20:02:09'),
(587, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-10', '2025-10-09 20:02:16', '2025-10-09 20:02:16'),
(588, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri-detail/8', NULL, NULL, '2025-10-10', '2025-10-09 20:02:39', '2025-10-09 20:02:39'),
(589, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-10', '2025-10-09 20:02:53', '2025-10-09 20:02:53'),
(590, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/register', NULL, NULL, '2025-10-10', '2025-10-09 20:02:57', '2025-10-09 20:02:57'),
(591, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 20:03:05', '2025-10-09 20:03:05'),
(592, '127.0.0.1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.6584', '/', NULL, NULL, '2025-10-10', '2025-10-09 22:33:32', '2025-10-09 22:33:32'),
(593, '127.0.0.1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.6584', '/', '303f56039a671fc30bc3aed642b6679b', '2025-10-09 22:33:32', '2025-10-10', '2025-10-09 22:33:32', '2025-10-09 22:33:32'),
(594, '127.0.0.1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.6584', '/', NULL, NULL, '2025-10-10', '2025-10-09 22:53:04', '2025-10-09 22:53:04'),
(595, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 22:59:18', '2025-10-09 22:59:18'),
(596, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 22:59:20', '2025-10-09 22:59:20'),
(597, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-10', '2025-10-09 22:59:31', '2025-10-09 22:59:31'),
(598, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-22', '2025-10-21 19:12:35', '2025-10-21 19:12:35'),
(599, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', '11f5611a705eaad7e1f3838845a5883c', '2025-10-21 19:12:35', '2025-10-22', '2025-10-21 19:12:35', '2025-10-21 19:12:35'),
(600, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-22', '2025-10-21 19:12:36', '2025-10-21 19:12:36'),
(601, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-22', '2025-10-21 19:12:43', '2025-10-21 19:12:43'),
(602, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-22', '2025-10-21 19:12:44', '2025-10-21 19:12:44'),
(603, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-22', '2025-10-21 19:12:45', '2025-10-21 19:12:45'),
(604, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-22', '2025-10-21 19:12:46', '2025-10-21 19:12:46'),
(605, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/event', '11f5611a705eaad7e1f3838845a5883c', '2025-10-21 19:22:16', '2025-10-22', '2025-10-21 19:22:16', '2025-10-21 19:22:16'),
(606, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/event-detail/29', '11f5611a705eaad7e1f3838845a5883c', '2025-10-21 19:22:20', '2025-10-22', '2025-10-21 19:22:20', '2025-10-21 19:22:20'),
(607, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/galeri', '11f5611a705eaad7e1f3838845a5883c', '2025-10-21 19:25:57', '2025-10-22', '2025-10-21 19:25:57', '2025-10-21 19:25:57'),
(608, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/teachers', '11f5611a705eaad7e1f3838845a5883c', '2025-10-21 19:53:42', '2025-10-22', '2025-10-21 19:53:42', '2025-10-21 19:53:42'),
(609, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/berita', '11f5611a705eaad7e1f3838845a5883c', '2025-10-21 19:56:43', '2025-10-22', '2025-10-21 19:56:43', '2025-10-21 19:56:43'),
(610, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '/kontak', '11f5611a705eaad7e1f3838845a5883c', '2025-10-21 20:04:06', '2025-10-22', '2025-10-21 20:04:06', '2025-10-21 20:04:06'),
(611, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-22', '2025-10-21 21:43:39', '2025-10-21 21:43:39'),
(612, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', 'e7207aa10271e6a2936fb7c1dd1be2c2', '2025-10-21 21:43:39', '2025-10-22', '2025-10-21 21:43:39', '2025-10-21 21:43:39'),
(613, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-22', '2025-10-21 21:43:43', '2025-10-21 21:43:43'),
(614, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-22', '2025-10-21 21:43:58', '2025-10-21 21:43:58'),
(615, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/galeri', 'e7207aa10271e6a2936fb7c1dd1be2c2', '2025-10-21 21:43:58', '2025-10-22', '2025-10-21 21:43:58', '2025-10-21 21:43:58'),
(616, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri-detail/16', NULL, NULL, '2025-10-22', '2025-10-21 21:45:02', '2025-10-21 21:45:02'),
(617, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-22', '2025-10-21 21:45:34', '2025-10-21 21:45:34'),
(618, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-22', '2025-10-21 21:45:44', '2025-10-21 21:45:44'),
(619, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/event', 'e7207aa10271e6a2936fb7c1dd1be2c2', '2025-10-21 21:57:13', '2025-10-22', '2025-10-21 21:57:13', '2025-10-21 21:57:13'),
(620, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/kontak', 'e7207aa10271e6a2936fb7c1dd1be2c2', '2025-10-21 22:06:56', '2025-10-22', '2025-10-21 22:06:56', '2025-10-21 22:06:56'),
(621, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/berita', 'e7207aa10271e6a2936fb7c1dd1be2c2', '2025-10-21 23:51:56', '2025-10-22', '2025-10-21 23:51:56', '2025-10-21 23:51:56'),
(622, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/teachers', 'e7207aa10271e6a2936fb7c1dd1be2c2', '2025-10-21 23:52:30', '2025-10-22', '2025-10-21 23:52:30', '2025-10-21 23:52:30'),
(623, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 00:22:59', '2025-10-24 00:22:59'),
(624, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', '6a25d79bf08aefa394a3e2468eef4c7a', '2025-10-24 00:23:00', '2025-10-24', '2025-10-24 00:23:00', '2025-10-24 00:23:00'),
(625, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 00:23:07', '2025-10-24 00:23:07'),
(626, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:17:19', '2025-10-24 02:17:19'),
(627, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:17:24', '2025-10-24 02:17:24'),
(628, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 02:18:17', '2025-10-24 02:18:17'),
(629, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:25:17', '2025-10-24 02:25:17'),
(630, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:25:20', '2025-10-24 02:25:20'),
(631, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:51:58', '2025-10-24 02:51:58'),
(632, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:52:02', '2025-10-24 02:52:02'),
(633, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:52:14', '2025-10-24 02:52:14'),
(634, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:52:16', '2025-10-24 02:52:16'),
(635, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:54:22', '2025-10-24 02:54:22'),
(636, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:54:24', '2025-10-24 02:54:24'),
(637, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:55:54', '2025-10-24 02:55:54'),
(638, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:55:55', '2025-10-24 02:55:55'),
(639, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:58:45', '2025-10-24 02:58:45'),
(640, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:58:48', '2025-10-24 02:58:48'),
(641, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:58:57', '2025-10-24 02:58:57'),
(642, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:58:59', '2025-10-24 02:58:59'),
(643, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:59:14', '2025-10-24 02:59:14'),
(644, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 02:59:16', '2025-10-24 02:59:16'),
(645, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:02:02', '2025-10-24 03:02:02'),
(646, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:02:04', '2025-10-24 03:02:04'),
(647, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:02:07', '2025-10-24 03:02:07'),
(648, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:02:08', '2025-10-24 03:02:08'),
(649, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 03:02:42', '2025-10-24 03:02:42'),
(650, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:03:04', '2025-10-24 03:03:04'),
(651, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'register', NULL, NULL, '2025-10-24', '2025-10-24 03:03:13', '2025-10-24 03:03:13'),
(652, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/register', NULL, NULL, '2025-10-24', '2025-10-24 03:03:28', '2025-10-24 03:03:28'),
(653, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:04:09', '2025-10-24 03:04:09'),
(654, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:04:11', '2025-10-24 03:04:11');
INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `page_visited`, `visitor_key`, `visited_at`, `visit_date`, `created_at`, `updated_at`) VALUES
(655, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:05:16', '2025-10-24 03:05:16'),
(656, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:05:18', '2025-10-24 03:05:18'),
(657, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:06:15', '2025-10-24 03:06:15'),
(658, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:06:16', '2025-10-24 03:06:16'),
(659, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:06:23', '2025-10-24 03:06:23'),
(660, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:06:25', '2025-10-24 03:06:25'),
(661, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:06:38', '2025-10-24 03:06:38'),
(662, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:06:39', '2025-10-24 03:06:39'),
(663, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:06:41', '2025-10-24 03:06:41'),
(664, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:06:43', '2025-10-24 03:06:43'),
(665, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 03:06:48', '2025-10-24 03:06:48'),
(666, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/register', NULL, NULL, '2025-10-24', '2025-10-24 03:06:51', '2025-10-24 03:06:51'),
(667, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:06:57', '2025-10-24 03:06:57'),
(668, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/register', NULL, NULL, '2025-10-24', '2025-10-24 03:07:01', '2025-10-24 03:07:01'),
(669, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-24', '2025-10-24 03:08:51', '2025-10-24 03:08:51'),
(670, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/berita', '6a25d79bf08aefa394a3e2468eef4c7a', '2025-10-24 03:08:51', '2025-10-24', '2025-10-24 03:08:51', '2025-10-24 03:08:51'),
(671, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/18', NULL, NULL, '2025-10-24', '2025-10-24 03:09:03', '2025-10-24 03:09:03'),
(672, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/berita-detail/18', '6a25d79bf08aefa394a3e2468eef4c7a', '2025-10-24 03:09:04', '2025-10-24', '2025-10-24 03:09:04', '2025-10-24 03:09:04'),
(673, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-24', '2025-10-24 03:09:22', '2025-10-24 03:09:22'),
(674, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event', '6a25d79bf08aefa394a3e2468eef4c7a', '2025-10-24 03:09:22', '2025-10-24', '2025-10-24 03:09:22', '2025-10-24 03:09:22'),
(675, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/29', NULL, NULL, '2025-10-24', '2025-10-24 03:09:27', '2025-10-24 03:09:27'),
(676, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event-detail/29', '6a25d79bf08aefa394a3e2468eef4c7a', '2025-10-24 03:09:27', '2025-10-24', '2025-10-24 03:09:27', '2025-10-24 03:09:27'),
(677, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/18', NULL, NULL, '2025-10-24', '2025-10-24 03:10:07', '2025-10-24 03:10:07'),
(678, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-24', '2025-10-24 03:10:15', '2025-10-24 03:10:15'),
(679, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/29', NULL, NULL, '2025-10-24', '2025-10-24 03:10:20', '2025-10-24 03:10:20'),
(680, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-24', '2025-10-24 03:11:01', '2025-10-24 03:11:01'),
(681, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/galeri', '6a25d79bf08aefa394a3e2468eef4c7a', '2025-10-24 03:11:01', '2025-10-24', '2025-10-24 03:11:01', '2025-10-24 03:11:01'),
(682, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'kontak', NULL, NULL, '2025-10-24', '2025-10-24 03:11:39', '2025-10-24 03:11:39'),
(683, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/kontak', '6a25d79bf08aefa394a3e2468eef4c7a', '2025-10-24 03:11:39', '2025-10-24', '2025-10-24 03:11:39', '2025-10-24 03:11:39'),
(684, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:11:55', '2025-10-24 03:11:55'),
(685, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:11:57', '2025-10-24 03:11:57'),
(686, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 03:11:58', '2025-10-24 03:11:58'),
(687, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/register', NULL, NULL, '2025-10-24', '2025-10-24 03:12:00', '2025-10-24 03:12:00'),
(688, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/register', NULL, NULL, '2025-10-24', '2025-10-24 03:12:34', '2025-10-24 03:12:34'),
(689, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:12:38', '2025-10-24 03:12:38'),
(690, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:12:39', '2025-10-24 03:12:39'),
(691, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:12:41', '2025-10-24 03:12:41'),
(692, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:16:21', '2025-10-24 03:16:21'),
(693, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:16:24', '2025-10-24 03:16:24'),
(694, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:16:47', '2025-10-24 03:16:47'),
(695, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:16:50', '2025-10-24 03:16:50'),
(696, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:19:00', '2025-10-24 03:19:00'),
(697, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:21:27', '2025-10-24 03:21:27'),
(698, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:21:31', '2025-10-24 03:21:31'),
(699, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:21:31', '2025-10-24 03:21:31'),
(700, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:22:51', '2025-10-24 03:22:51'),
(701, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:22:52', '2025-10-24 03:22:52'),
(702, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:22:56', '2025-10-24 03:22:56'),
(703, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/profile', NULL, NULL, '2025-10-24', '2025-10-24 03:22:56', '2025-10-24 03:22:56'),
(704, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:23:10', '2025-10-24 03:23:10'),
(705, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:23:12', '2025-10-24 03:23:12'),
(706, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/22', NULL, NULL, '2025-10-24', '2025-10-24 03:23:48', '2025-10-24 03:23:48'),
(707, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/22/like', NULL, NULL, '2025-10-24', '2025-10-24 03:23:57', '2025-10-24 03:23:57'),
(708, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/22/comment', NULL, NULL, '2025-10-24', '2025-10-24 03:24:46', '2025-10-24 03:24:46'),
(709, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/22', NULL, NULL, '2025-10-24', '2025-10-24 03:24:46', '2025-10-24 03:24:46'),
(710, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'logout', NULL, NULL, '2025-10-24', '2025-10-24 03:24:58', '2025-10-24 03:24:58'),
(711, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:24:59', '2025-10-24 03:24:59'),
(712, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:25:00', '2025-10-24 03:25:00'),
(713, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 03:25:02', '2025-10-24 03:25:02'),
(714, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:42:34', '2025-10-24 03:42:34'),
(715, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:42:36', '2025-10-24 03:42:36'),
(716, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-24', '2025-10-24 03:44:22', '2025-10-24 03:44:22'),
(717, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/10', NULL, NULL, '2025-10-24', '2025-10-24 03:44:58', '2025-10-24 03:44:58'),
(718, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri-detail/16', NULL, NULL, '2025-10-24', '2025-10-24 03:45:03', '2025-10-24 03:45:03'),
(719, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'kontak', NULL, NULL, '2025-10-24', '2025-10-24 03:45:22', '2025-10-24 03:45:22'),
(720, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-24', '2025-10-24 03:45:28', '2025-10-24 03:45:28'),
(721, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/29', NULL, NULL, '2025-10-24', '2025-10-24 03:45:50', '2025-10-24 03:45:50'),
(722, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 03:46:24', '2025-10-24 03:46:24'),
(723, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:46:33', '2025-10-24 03:46:33'),
(724, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'register', NULL, NULL, '2025-10-24', '2025-10-24 03:46:36', '2025-10-24 03:46:36'),
(725, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'register', NULL, NULL, '2025-10-24', '2025-10-24 03:46:42', '2025-10-24 03:46:42'),
(726, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:46:46', '2025-10-24 03:46:46'),
(727, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:46:49', '2025-10-24 03:46:49'),
(728, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:46:51', '2025-10-24 03:46:51'),
(729, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/register', NULL, NULL, '2025-10-24', '2025-10-24 03:46:54', '2025-10-24 03:46:54'),
(730, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:47:16', '2025-10-24 03:47:16'),
(731, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:47:18', '2025-10-24 03:47:18'),
(732, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 03:47:31', '2025-10-24 03:47:31'),
(733, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:47:37', '2025-10-24 03:47:37'),
(734, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:47:41', '2025-10-24 03:47:41'),
(735, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:47:42', '2025-10-24 03:47:42'),
(736, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:47:49', '2025-10-24 03:47:49'),
(737, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:47:51', '2025-10-24 03:47:51'),
(738, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 03:47:52', '2025-10-24 03:47:52'),
(739, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:48:29', '2025-10-24 03:48:29'),
(740, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 03:48:30', '2025-10-24 03:48:30'),
(741, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 03:48:32', '2025-10-24 03:48:32'),
(742, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:48:41', '2025-10-24 03:48:41'),
(743, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:48:45', '2025-10-24 03:48:45'),
(744, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:49:06', '2025-10-24 03:49:06'),
(745, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:49:06', '2025-10-24 03:49:06'),
(746, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:49:15', '2025-10-24 03:49:15'),
(747, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:49:19', '2025-10-24 03:49:19'),
(748, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:49:19', '2025-10-24 03:49:19'),
(749, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:50:59', '2025-10-24 03:50:59'),
(750, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:51:04', '2025-10-24 03:51:04'),
(751, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'register', NULL, NULL, '2025-10-24', '2025-10-24 03:51:56', '2025-10-24 03:51:56'),
(752, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:54:55', '2025-10-24 03:54:55'),
(753, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:54:59', '2025-10-24 03:54:59'),
(754, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 03:55:04', '2025-10-24 03:55:04'),
(755, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password/code', NULL, NULL, '2025-10-24', '2025-10-24 03:55:09', '2025-10-24 03:55:09'),
(756, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password/code', NULL, NULL, '2025-10-24', '2025-10-24 03:55:57', '2025-10-24 03:55:57'),
(757, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'reset-password/3cfc7102de076e68edb67ed87efbb9e8726b0ac2ab4405b7200573140a8c9827', NULL, NULL, '2025-10-24', '2025-10-24 03:55:58', '2025-10-24 03:55:58'),
(758, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'reset-password/3cfc7102de076e68edb67ed87efbb9e8726b0ac2ab4405b7200573140a8c9827', NULL, NULL, '2025-10-24', '2025-10-24 03:58:32', '2025-10-24 03:58:32'),
(759, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'reset-password/3cfc7102de076e68edb67ed87efbb9e8726b0ac2ab4405b7200573140a8c9827', NULL, NULL, '2025-10-24', '2025-10-24 03:58:35', '2025-10-24 03:58:35'),
(760, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'reset-password/3cfc7102de076e68edb67ed87efbb9e8726b0ac2ab4405b7200573140a8c9827', NULL, NULL, '2025-10-24', '2025-10-24 04:03:11', '2025-10-24 04:03:11'),
(761, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 04:03:22', '2025-10-24 04:03:22'),
(762, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 04:03:29', '2025-10-24 04:03:29'),
(763, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 04:03:31', '2025-10-24 04:03:31'),
(764, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 04:03:49', '2025-10-24 04:03:49'),
(765, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 04:03:53', '2025-10-24 04:03:53'),
(766, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password/code', NULL, NULL, '2025-10-24', '2025-10-24 04:03:58', '2025-10-24 04:03:58'),
(767, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password/code', NULL, NULL, '2025-10-24', '2025-10-24 04:04:17', '2025-10-24 04:04:17'),
(768, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'reset-password/ed76f21a14cf680424fbfa88caa6dd941db7537eece517f318b1e292ea0b2d7c', NULL, NULL, '2025-10-24', '2025-10-24 04:04:18', '2025-10-24 04:04:18'),
(769, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 06:53:38', '2025-10-24 06:53:38'),
(770, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 06:53:40', '2025-10-24 06:53:40'),
(771, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 06:53:49', '2025-10-24 06:53:49'),
(772, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 06:53:50', '2025-10-24 06:53:50'),
(773, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/register', NULL, NULL, '2025-10-24', '2025-10-24 06:53:56', '2025-10-24 06:53:56'),
(774, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 06:54:02', '2025-10-24 06:54:02'),
(775, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 06:54:05', '2025-10-24 06:54:05'),
(776, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 06:54:17', '2025-10-24 06:54:17'),
(777, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 06:54:27', '2025-10-24 06:54:27'),
(778, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password/code', NULL, NULL, '2025-10-24', '2025-10-24 06:54:33', '2025-10-24 06:54:33'),
(779, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password/code', NULL, NULL, '2025-10-24', '2025-10-24 06:57:51', '2025-10-24 06:57:51'),
(780, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password', NULL, NULL, '2025-10-24', '2025-10-24 06:57:59', '2025-10-24 06:57:59'),
(781, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password/code', NULL, NULL, '2025-10-24', '2025-10-24 06:58:05', '2025-10-24 06:58:05'),
(782, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'forgot-password/code', NULL, NULL, '2025-10-24', '2025-10-24 06:58:20', '2025-10-24 06:58:20'),
(783, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'reset-password/f65963fe79a38a1f57ed1f3377637d32cecb76ce35f37e2e4b5f9bb7cb69acf4', NULL, NULL, '2025-10-24', '2025-10-24 06:58:21', '2025-10-24 06:58:21'),
(784, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'reset-password/f65963fe79a38a1f57ed1f3377637d32cecb76ce35f37e2e4b5f9bb7cb69acf4', NULL, NULL, '2025-10-24', '2025-10-24 07:01:36', '2025-10-24 07:01:36'),
(785, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'reset-password', NULL, NULL, '2025-10-24', '2025-10-24 07:02:06', '2025-10-24 07:02:06'),
(786, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 07:02:16', '2025-10-24 07:02:16'),
(787, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-24', '2025-10-24 07:02:24', '2025-10-24 07:02:24'),
(788, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 07:02:25', '2025-10-24 07:02:25'),
(789, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 07:02:26', '2025-10-24 07:02:26'),
(790, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 07:02:33', '2025-10-24 07:02:33'),
(791, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 07:02:35', '2025-10-24 07:02:35'),
(792, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'logout', NULL, NULL, '2025-10-24', '2025-10-24 07:02:40', '2025-10-24 07:02:40'),
(793, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 07:02:40', '2025-10-24 07:02:40'),
(794, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 07:02:42', '2025-10-24 07:02:42'),
(795, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 07:11:39', '2025-10-24 07:11:39'),
(796, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-24', '2025-10-24 07:11:43', '2025-10-24 07:11:43'),
(797, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-25 22:33:01', '2025-10-25 22:33:01'),
(798, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', 'e00267d785f626e2d8a46531978c297f', '2025-10-25 22:33:01', '2025-10-26', '2025-10-25 22:33:01', '2025-10-25 22:33:01'),
(799, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-25 22:33:08', '2025-10-25 22:33:08'),
(800, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-26', '2025-10-25 22:33:19', '2025-10-25 22:33:19'),
(801, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/berita', 'e00267d785f626e2d8a46531978c297f', '2025-10-25 22:33:19', '2025-10-26', '2025-10-25 22:33:19', '2025-10-25 22:33:19'),
(802, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita-detail/18', NULL, NULL, '2025-10-26', '2025-10-25 22:33:27', '2025-10-25 22:33:27'),
(803, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/berita-detail/18', 'e00267d785f626e2d8a46531978c297f', '2025-10-25 22:33:29', '2025-10-26', '2025-10-25 22:33:29', '2025-10-25 22:33:29'),
(804, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-26', '2025-10-25 22:33:52', '2025-10-25 22:33:52'),
(805, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event', 'e00267d785f626e2d8a46531978c297f', '2025-10-25 22:33:52', '2025-10-26', '2025-10-25 22:33:52', '2025-10-25 22:33:52'),
(806, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event-detail/29', NULL, NULL, '2025-10-26', '2025-10-25 22:34:45', '2025-10-25 22:34:45'),
(807, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/event-detail/29', 'e00267d785f626e2d8a46531978c297f', '2025-10-25 22:34:45', '2025-10-26', '2025-10-25 22:34:45', '2025-10-25 22:34:45'),
(808, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-26', '2025-10-25 22:35:04', '2025-10-25 22:35:04'),
(809, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-26', '2025-10-25 22:41:28', '2025-10-25 22:41:28'),
(810, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/teachers', 'e00267d785f626e2d8a46531978c297f', '2025-10-25 22:41:28', '2025-10-26', '2025-10-25 22:41:28', '2025-10-25 22:41:28'),
(811, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-26', '2025-10-25 22:41:36', '2025-10-25 22:41:36'),
(812, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-26', '2025-10-25 22:41:42', '2025-10-25 22:41:42'),
(813, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'event', NULL, NULL, '2025-10-26', '2025-10-25 22:44:25', '2025-10-25 22:44:25'),
(814, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'berita', NULL, NULL, '2025-10-26', '2025-10-25 22:44:30', '2025-10-25 22:44:30'),
(815, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-26', '2025-10-25 22:44:34', '2025-10-25 22:44:34'),
(816, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/galeri', 'e00267d785f626e2d8a46531978c297f', '2025-10-25 22:44:34', '2025-10-26', '2025-10-25 22:44:34', '2025-10-25 22:44:34'),
(817, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'kontak', NULL, NULL, '2025-10-26', '2025-10-25 22:44:49', '2025-10-25 22:44:49'),
(818, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/kontak', 'e00267d785f626e2d8a46531978c297f', '2025-10-25 22:44:49', '2025-10-26', '2025-10-25 22:44:49', '2025-10-25 22:44:49'),
(819, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-25 22:44:54', '2025-10-25 22:44:54'),
(820, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-25 22:44:56', '2025-10-25 22:44:56'),
(821, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-26', '2025-10-25 22:45:09', '2025-10-25 22:45:09'),
(822, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-26', '2025-10-25 22:45:17', '2025-10-25 22:45:17'),
(823, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-25 22:45:28', '2025-10-25 22:45:28'),
(824, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-25 22:45:30', '2025-10-25 22:45:30'),
(825, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-26', '2025-10-25 22:47:28', '2025-10-25 22:47:28'),
(826, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-26 00:52:06', '2025-10-26 00:52:06'),
(827, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-26 00:52:07', '2025-10-26 00:52:07'),
(828, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'galeri', NULL, NULL, '2025-10-26', '2025-10-26 00:52:23', '2025-10-26 00:52:23'),
(829, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-26', '2025-10-26 00:52:37', '2025-10-26 00:52:37'),
(830, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'teachers', NULL, NULL, '2025-10-26', '2025-10-26 00:52:41', '2025-10-26 00:52:41'),
(831, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-26 00:52:45', '2025-10-26 00:52:45'),
(832, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-26 00:52:47', '2025-10-26 00:52:47'),
(833, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-26 00:56:07', '2025-10-26 00:56:07'),
(834, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-26 00:56:10', '2025-10-26 00:56:10'),
(835, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-26 00:58:18', '2025-10-26 00:58:18'),
(836, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-26', '2025-10-26 00:58:22', '2025-10-26 00:58:22'),
(837, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 05:41:36', '2025-10-26 05:41:36'),
(838, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', '37199b1655c209d485aa0a7bbf6a275f', '2025-10-26 05:41:37', '2025-10-26', '2025-10-26 05:41:37', '2025-10-26 05:41:37'),
(839, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 05:41:44', '2025-10-26 05:41:44'),
(840, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 05:43:49', '2025-10-26 05:43:49'),
(841, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 05:43:51', '2025-10-26 05:43:51'),
(842, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:05:45', '2025-10-26 06:05:45'),
(843, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', 'eecddd3587916cecf4646f936a1e9c3b', '2025-10-26 06:05:45', '2025-10-26', '2025-10-26 06:05:45', '2025-10-26 06:05:45'),
(844, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:05:48', '2025-10-26 06:05:48'),
(845, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:06:11', '2025-10-26 06:06:11'),
(846, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:06:13', '2025-10-26 06:06:13'),
(847, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:06:14', '2025-10-26 06:06:14'),
(848, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-26', '2025-10-26 06:06:26', '2025-10-26 06:06:26'),
(849, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/galeri', '37199b1655c209d485aa0a7bbf6a275f', '2025-10-26 06:06:26', '2025-10-26', '2025-10-26 06:06:26', '2025-10-26 06:06:26'),
(850, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:06:45', '2025-10-26 06:06:45'),
(851, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:06:46', '2025-10-26 06:06:46'),
(852, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri-detail/16', NULL, NULL, '2025-10-26', '2025-10-26 06:09:47', '2025-10-26 06:09:47'),
(853, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:11:39', '2025-10-26 06:11:39'),
(854, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:11:40', '2025-10-26 06:11:40'),
(855, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:12:13', '2025-10-26 06:12:13'),
(856, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:12:15', '2025-10-26 06:12:15'),
(857, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'galeri', NULL, NULL, '2025-10-26', '2025-10-26 06:12:23', '2025-10-26 06:12:23'),
(858, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:13:41', '2025-10-26 06:13:41'),
(859, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:13:42', '2025-10-26 06:13:42'),
(860, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:13:50', '2025-10-26 06:13:50'),
(861, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:13:51', '2025-10-26 06:13:51'),
(862, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:14:13', '2025-10-26 06:14:13'),
(863, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:14:16', '2025-10-26 06:14:16'),
(864, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:14:33', '2025-10-26 06:14:33'),
(865, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:14:34', '2025-10-26 06:14:34');
INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `page_visited`, `visitor_key`, `visited_at`, `visit_date`, `created_at`, `updated_at`) VALUES
(866, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:18:03', '2025-10-26 06:18:03'),
(867, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:18:06', '2025-10-26 06:18:06'),
(868, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:18:12', '2025-10-26 06:18:12'),
(869, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:18:13', '2025-10-26 06:18:13'),
(870, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'event', NULL, NULL, '2025-10-26', '2025-10-26 06:18:22', '2025-10-26 06:18:22'),
(871, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/event', '37199b1655c209d485aa0a7bbf6a275f', '2025-10-26 06:18:22', '2025-10-26', '2025-10-26 06:18:22', '2025-10-26 06:18:22'),
(872, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:20:03', '2025-10-26 06:20:03'),
(873, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:20:08', '2025-10-26 06:20:08'),
(874, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:20:24', '2025-10-26 06:20:24'),
(875, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:20:26', '2025-10-26 06:20:26'),
(876, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:22:02', '2025-10-26 06:22:02'),
(877, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:22:05', '2025-10-26 06:22:05'),
(878, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:22:41', '2025-10-26 06:22:41'),
(879, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:22:42', '2025-10-26 06:22:42'),
(880, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:22:58', '2025-10-26 06:22:58'),
(881, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:22:59', '2025-10-26 06:22:59'),
(882, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:23:55', '2025-10-26 06:23:55'),
(883, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:23:58', '2025-10-26 06:23:58'),
(884, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:24:32', '2025-10-26 06:24:32'),
(885, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:24:35', '2025-10-26 06:24:35'),
(886, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:24:54', '2025-10-26 06:24:54'),
(887, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:24:55', '2025-10-26 06:24:55'),
(888, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:29:16', '2025-10-26 06:29:16'),
(889, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:29:19', '2025-10-26 06:29:19'),
(890, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:29:26', '2025-10-26 06:29:26'),
(891, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 06:29:28', '2025-10-26 06:29:28'),
(892, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 07:00:21', '2025-10-26 07:00:21'),
(893, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.104.3 Chrome/138.0.7204.251 Electron/37.6.1 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 07:00:26', '2025-10-26 07:00:26'),
(894, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 07:01:23', '2025-10-26 07:01:23'),
(895, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '/', NULL, NULL, '2025-10-26', '2025-10-26 07:01:24', '2025-10-26 07:01:24'),
(896, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'user/login', NULL, NULL, '2025-10-26', '2025-10-26 07:55:40', '2025-10-26 07:55:40'),
(897, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-28', '2025-10-27 23:48:14', '2025-10-27 23:48:14'),
(898, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', '2ecb2298a9788a55e50f9dc212cbc1ca', '2025-10-27 23:48:14', '2025-10-28', '2025-10-27 23:48:14', '2025-10-27 23:48:14'),
(899, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-28', '2025-10-27 23:48:46', '2025-10-27 23:48:46'),
(900, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-28', '2025-10-27 23:48:56', '2025-10-27 23:48:56'),
(901, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'user/login', NULL, NULL, '2025-10-28', '2025-10-27 23:50:37', '2025-10-27 23:50:37'),
(902, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-28', '2025-10-27 23:50:55', '2025-10-27 23:50:55'),
(903, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-28', '2025-10-27 23:50:57', '2025-10-27 23:50:57'),
(904, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-29', '2025-10-29 07:14:55', '2025-10-29 07:14:55'),
(905, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', '0341235e180982ee11dfa77c411f6ea2', '2025-10-29 07:14:55', '2025-10-29', '2025-10-29 07:14:55', '2025-10-29 07:14:55'),
(906, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-10-29', '2025-10-29 07:15:00', '2025-10-29 07:15:00'),
(907, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-11-01', '2025-10-31 19:52:06', '2025-10-31 19:52:06'),
(908, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', '54494480af4cbf46a4263a113486cc4f', '2025-10-31 19:52:06', '2025-11-01', '2025-10-31 19:52:06', '2025-10-31 19:52:06'),
(909, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '/', NULL, NULL, '2025-11-01', '2025-10-31 19:52:13', '2025-10-31 19:52:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_index` (`user_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galery_id` (`galery_id`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `galery_likes`
--
ALTER TABLE `galery_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori` (`kategori_id`),
  ADD KEY `fk_petugas` (`petugas_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_settings`
--
ALTER TABLE `school_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_otps_email_otp_code_index` (`email`,`otp_code`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `galery_likes`
--
ALTER TABLE `galery_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_settings`
--
ALTER TABLE `school_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`galery_id`) REFERENCES `galery` (`id`);

--
-- Constraints for table `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `fk_petugas` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
