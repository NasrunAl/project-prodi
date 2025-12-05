-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2025 at 09:38 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_prodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `penulis`, `slug`, `konten`, `gambar`, `excerpt`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Prodi Bisnis Digital Mendapatkan Akredetasi Baik Sekali', 'Budiono Siregar', 'prodi-bisnis-digital-mendapatkan-akredetasi-baik-sekali', 'Program Studi Sarjana Terapan Bisnis Digital (BSD) Politeknik Negeri Jember (Polije) berhasil meraih prestasi gemilang dengan mendapatkan Akreditasi \"BAIK SEKALI\" dari Lembaga Akreditasi Mandiri Ekonomi, Manajemen, Bisnis, dan Akuntansi (LAMEMBA). Sertifikat akreditasi ini resmi berlaku setelah melalui proses evaluasi komprehensif yang mencakup kurikulum, kualitas dosen, fasilitas, dan riset terapan. Pencapaian ini menegaskan komitmen BSD Polije dalam menyelenggarakan pendidikan vokasi unggul yang menghasilkan lulusan siap kerja dan kompeten di era revolusi industri 4.0. Akreditasi ini menjadi jaminan mutu bagi seluruh calon mahasiswa dan stakeholder terkait.', 'berita-images/nMQeFTdRKvu9wMnlDZY46HbTS5mNOBUnoK8hPxdv.jpg', NULL, 1, '2025-11-27 06:54:35', '2025-11-30 01:38:38'),
(2, 'B-STAR Festival 2025: Together in Competition, Together in Celebration', 'Nasrun Al amin', 'b-star-festival-2025-together-in-competition-together-in-celebration', 'Ajang tahunan kolaboratif Polije Kampus 2 Bondowoso ini adalah panggung utama bagi mahasiswa dan pelajar se-Bondowoso untuk menampilkan bakat dan kreativitas. Festival ini bukan hanya kompetisi, tetapi juga perayaan semangat generasi muda dalam bidang seni, olahraga, dan inovasi. B-STAR Festival berfungsi sebagai wadah untuk membangun jaringan, menyalurkan potensi, dan menumbuhkan daya saing. Bersiaplah untuk momen puncak inspirasi!', 'berita-images/PbbPGH7AiI8tVW7oxjwzIPVyYY60gSZ39QAuG71s.jpg', NULL, 1, '2025-11-30 09:00:15', '2025-11-30 09:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-boost:mcp:database-schema:mysql:dosens', 'a:3:{s:6:\"engine\";s:5:\"mysql\";s:6:\"tables\";a:1:{s:6:\"dosens\";a:5:{s:7:\"columns\";a:8:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"nama\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:3:\"nip\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:7:\"jabatan\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"kategori\";a:1:{s:4:\"type\";s:4:\"enum\";}s:4:\"foto\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}}s:6:\"global\";a:4:{s:5:\"views\";a:0:{}s:17:\"stored_procedures\";a:0:{}s:9:\"functions\";a:0:{}s:9:\"sequences\";a:0:{}}}', 1764429296),
('laravel-cache-boost:mcp:database-schema:mysql:fasilitas', 'a:3:{s:6:\"engine\";s:5:\"mysql\";s:6:\"tables\";a:1:{s:9:\"fasilitas\";a:5:{s:7:\"columns\";a:9:{s:2:\"id\";a:1:{s:4:\"type\";s:6:\"bigint\";}s:4:\"nama\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:8:\"kategori\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:9:\"deskripsi\";a:1:{s:4:\"type\";s:4:\"text\";}s:7:\"ikon_fa\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:6:\"gambar\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:4:\"foto\";a:1:{s:4:\"type\";s:7:\"varchar\";}s:10:\"created_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}s:10:\"updated_at\";a:1:{s:4:\"type\";s:9:\"timestamp\";}}s:7:\"indexes\";a:1:{s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:0:{}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}}s:6:\"global\";a:4:{s:5:\"views\";a:0:{}s:17:\"stored_procedures\";a:0:{}s:9:\"functions\";a:0:{}s:9:\"sequences\";a:0:{}}}', 1764262234),
('laravel-cache-boost.roster.scan', 'a:2:{s:6:\"roster\";O:21:\"Laravel\\Roster\\Roster\":3:{s:13:\"\0*\0approaches\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:11:\"\0*\0packages\";O:32:\"Laravel\\Roster\\PackageCollection\":2:{s:8:\"\0*\0items\";a:7:{i:0;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^12.0\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:LARAVEL\";s:14:\"\0*\0packageName\";s:17:\"laravel/framework\";s:10:\"\0*\0version\";s:7:\"12.39.0\";s:6:\"\0*\0dev\";b:0;}i:1;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v0.3.7\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PROMPTS\";s:14:\"\0*\0packageName\";s:15:\"laravel/prompts\";s:10:\"\0*\0version\";s:5:\"0.3.7\";s:6:\"\0*\0dev\";b:0;}i:2;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v0.3.4\";s:10:\"\0*\0package\";E:33:\"Laravel\\Roster\\Enums\\Packages:MCP\";s:14:\"\0*\0packageName\";s:11:\"laravel/mcp\";s:10:\"\0*\0version\";s:5:\"0.3.4\";s:6:\"\0*\0dev\";b:1;}i:3;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.24\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:PINT\";s:14:\"\0*\0packageName\";s:12:\"laravel/pint\";s:10:\"\0*\0version\";s:6:\"1.25.1\";s:6:\"\0*\0dev\";b:1;}i:4;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.41\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:SAIL\";s:14:\"\0*\0packageName\";s:12:\"laravel/sail\";s:10:\"\0*\0version\";s:6:\"1.48.1\";s:6:\"\0*\0dev\";b:1;}i:5;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:7:\"^11.5.3\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PHPUNIT\";s:14:\"\0*\0packageName\";s:15:\"phpunit/phpunit\";s:10:\"\0*\0version\";s:7:\"11.5.44\";s:6:\"\0*\0dev\";b:1;}i:6;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:10:\"\0*\0package\";E:41:\"Laravel\\Roster\\Enums\\Packages:TAILWINDCSS\";s:14:\"\0*\0packageName\";s:11:\"tailwindcss\";s:10:\"\0*\0version\";s:6:\"4.1.17\";s:6:\"\0*\0dev\";b:1;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:21:\"\0*\0nodePackageManager\";E:43:\"Laravel\\Roster\\Enums\\NodePackageManager:NPM\";}s:9:\"timestamp\";i:1764416759;}', 1764503159);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('koordinator','dosen','admin','teknisi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `nama`, `nip`, `jabatan`, `kategori`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Lukman Hakim, S.KOM., M.KOM', '198909112024211001', 'Dosen', 'dosen', 'dosen-images/ujjzukTD526FcfYC56pRQinHlQTawmxxNFjThQGq.jpg', '2025-11-27 06:54:06', '2025-11-30 09:21:45'),
(3, 'Prof Nasrun Al amin S. Tr. Bns., M.M.', '199105292024061003', 'Direktur', 'dosen', 'dosen-images/dv9DRhI6tCddSwDxYHrVTY0RjmdxAlOte4gzJSE8.png', '2025-11-29 07:44:05', '2025-11-30 09:38:33'),
(5, 'Rizky Adhitya Nugraha S.A.B., M.M', '198909112024211001', 'Koordinator Program Studi', 'koordinator', 'dosen-images/7JwDsdg4tDHT4RRnTVRbfWOQS6gcjcsAdYzmqaap.jpg', '2025-11-30 00:41:40', '2025-11-30 00:41:40'),
(6, 'Ahmad Marzuq, S.Sos', '198909112024211001', 'Admin', 'admin', 'dosen-images/kE6RvqM5k973PviIBK5RhSlXVAS25Dw6ZtRtPduk.jpg', '2025-11-30 09:23:21', '2025-11-30 09:23:21'),
(7, 'Muhammad Bahanan, S.E., M.M', '198909112024211001', 'Dosen', 'dosen', 'dosen-images/3EEqllfFWtzP4Awc2QU8l9n4dLSfhXybYFZDmltd.jpg', '2025-11-30 09:24:19', '2025-11-30 09:24:19'),
(8, 'Rezha Isyraqi Qastalano, S.ST., M.MT', '198909112024211001', 'Dosen', 'dosen', 'dosen-images/8UOWxryAOOfR2uQ57GyB7B2pq6N1A4HEoIzT3BSy.jpg', '2025-11-30 09:25:01', '2025-11-30 09:25:01'),
(9, 'Arif indar H, A.Md', '198909112024211001', 'Teknisi', 'teknisi', 'dosen-images/6iLLkOW8nctlMEOKaJJJZtULLB5NmPQzcy6s2Unj.jpg', '2025-11-30 09:27:12', '2025-11-30 09:27:12'),
(10, 'Istik Lailiyah, S.Kom', '198909112024211001', 'Teknisi', 'teknisi', 'dosen-images/Y6zen0XJ97YTFHYPzRN49YKC5dZB3SliZfz15VyX.jpg', '2025-11-30 09:27:50', '2025-11-30 09:27:50'),
(11, 'Imam Abrori, S.E., M.M', '198909112024211001', 'Dosen', 'dosen', 'dosen-images/R1pcug39NLtTrTzPTr6jTuphLCnGkbzbiQ05eizO.png', '2025-11-30 09:28:36', '2025-11-30 09:28:36'),
(12, 'Eka Yuniar, S.KOM., MMSI', '198909112024211001', 'Dosen', 'dosen', 'dosen-images/oObx7ZOtru1Y4WzPUrY77rjOPB4603nOOU7YbwM4.jpg', '2025-11-30 09:31:00', '2025-11-30 09:31:00'),
(13, 'Mas\'ud Hermansyah, S.KOM., M.KOM', '198909112024211001', 'Dosen', 'dosen', 'dosen-images/fEHdaJDOKo1azo92UtvCdOjT9LnwN4UJWBvgTwuq.jpg', '2025-11-30 09:31:29', '2025-11-30 09:31:29'),
(14, 'Prisilia Angel Tantri, SE., M.M', '198909112024211001', 'Dosen', 'dosen', 'dosen-images/9ncFn5Zh6iCyz7isQK6lFiP38brAyzVQTuxLWDBk.jpg', '2025-11-30 09:35:41', '2025-11-30 09:35:41'),
(15, 'Fitriya Andriyani, S.PD., M.Akun', '199105292024061003', 'Dosen', 'dosen', 'dosen-images/UQFIS4EENDpFTnsXwdpsH42xYkmJWhL11MEVXJXq.jpg', '2025-11-30 09:41:34', '2025-11-30 09:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `ikon_fa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `kategori`, `deskripsi`, `ikon_fa`, `gambar`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Ruang Podcast', NULL, 'Ruang podcast adalah dapur kreatif bagi para penyiar. Ini adalah tempat di mana ide dan cerita dihidupkan melalui audio. Dengan suasana yang nyaman dan peralatan rekaman prima, ruang ini mendukung lahirnya konten-konten unik dan menarik bagi pendengar.', 'fa-solid fa-microphone', 'fasilitas/uH2TEuGH69xwbDxBTcPhWnUZJmhBPPTYyfsazHlM.jpg', NULL, '2025-11-30 12:03:38', '2025-11-30 12:03:38'),
(4, 'Ruang Dosen', NULL, 'Tempat kerja khusus bagi staf pengajar untuk administrasi, penelitian, serta layanan konsultasi dan bimbingan akademik bagi mahasiswa.', 'fa-regular fa-building', 'fasilitas/9ecwpTBBetXljXxEmt2ast78T16WuB7gxsO4luL9.jpg', NULL, '2025-11-30 12:06:06', '2025-11-30 12:06:06'),
(5, 'Ruang Studio', NULL, 'Studio adalah area kerja khusus yang diatur secara fungsional dan dilengkapi dengan instrumen atau alat spesifik untuk menghasilkan sebuah karya, mulai dari rekaman audio, foto, hingga karya seni visual.', 'fa-solid fa-camera', 'fasilitas/NZ1IcWChNeAMqOYKfxM8wD7hTIRz4CJw2z6FZJZb.jpg', NULL, '2025-11-30 12:07:51', '2025-11-30 12:07:51'),
(6, 'Ruang Lab', NULL, 'Ruangan khusus yang difasilitasi dengan infrastruktur jaringan kuat dan software khusus (seperti tools pemrograman atau simulasi) untuk kegiatan praktikum dan eksperimen di bidang informatika. Laboratorium ini mendukung pengembangan keterampilan teknis dan hands-on bagi pengguna.', 'fa-solid fa-desktop', 'fasilitas/FdNBHFfwmw1kpNapwieO6vyYNVeVbRxt5wmC66io.jpg', NULL, '2025-11-30 12:10:53', '2025-11-30 12:10:53'),
(7, 'Gedung Jurusan Bisnis', NULL, 'Pusat kegiatan akademik bagi mahasiswa jurusan bisnis, dilengkapi ruang kuliah, kantor dosen, serta fasilitas pendukung (seperti lab simulasi bisnis) untuk pembelajaran dan praktik kewirausahaan.', 'fa-regular fa-building', 'fasilitas/CDEYF9u2ozQqlmChqKVOTOP8mWnBS2KHVyNSEBVA.jpg', NULL, '2025-11-30 12:11:57', '2025-11-30 12:11:57'),
(8, 'Ruang Lobby', NULL, 'Lobi merupakan wajah dan cerminan citra institusi. Dengan desain interior yang elegan/modern/terbuka, ruang ini menyambut pengunjung dengan suasana yang terorganisir dan estetis, memberikan kenyamanan sebelum mereka melanjutkan ke area lain di dalam gedung.', 'fa-regular fa-building', 'fasilitas/jAxcv62e04cpRcetMTUaPvWYez2L7FAO3sX4vLVo.jpg', NULL, '2025-11-30 12:13:34', '2025-11-30 12:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_23_081611_create_dosens_table', 1),
(5, '2025_11_23_081611_create_fasilitas_table', 1),
(6, '2025_11_23_081612_create_profil_lulusans_table', 1),
(7, '2025_11_27_135001_create_beritas_table', 1),
(8, '2025_11_27_170500_add_ikonfa_and_gambar_to_fasilitas_table', 2),
(9, '2025_11_29_152107_add_koordinator_to_kategori_enum', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_lulusans`
--

CREATE TABLE `profil_lulusans` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `ikon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_lulusans`
--

INSERT INTO `profil_lulusans` (`id`, `judul`, `deskripsi`, `ikon`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Digital Enterpreneur', 'Wirausaha yang mampu merencanakan, merancang dan mengembangkan bisnis dengan memanfaatkan teknologi digital yang adaptif.', 'profil-images/YNecq8iUazvHlfy8r7566hHJetnsAg3hBiTXNX0G.png', 1, '2025-11-27 07:31:32', '2025-11-27 07:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8vQGiLPpjk8PHbEYdSfc52yNuai9vX8lZVHA8ACp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialRqZFFvVVhXQ09NcnZqZDNwdnkxbm45Q0NBcmJkbEhqQ3ZwcnBseSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1764581026),
('Yf9M4X6X51Hvtqde5g9oYr3nKvQy6l2oiaRD2Y0z', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV3Z1Tm5VRUd1U1FPd3FSQTUySUdTVTJUVm9IYlVFTHk2emFlQkdUcyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mYXNpbGl0YXMiO3M6NToicm91dGUiO3M6MTU6ImZhc2lsaXRhcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1764581642);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Prodi', 'admin@polije.ac.id', NULL, '$2y$12$9V0HFjgklvhpT0PYRtJrKufiVsv/x9d6RMB4NkdFvWZQRUIad8k8S', NULL, '2025-11-27 06:52:55', '2025-11-27 06:52:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
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
-- Indexes for table `profil_lulusans`
--
ALTER TABLE `profil_lulusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profil_lulusans`
--
ALTER TABLE `profil_lulusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
