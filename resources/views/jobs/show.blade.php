@extends('layouts.public')

@section('title', $job->posisi . ' di ' . $job->perusahaan . ' - Disnakertrans Kabupaten Banjar')

@section('content')
<header class="page-header" style="text-align: left; padding: 180px 8% 60px;">
    <div class="container" style="max-width: 1200px;">
        <div class="breadcrumb" style="justify-content: flex-start; margin-bottom: 20px;">
            <a href="/">Beranda</a>
            <span>/</span>
            <a href="{{ route('jobs.index') }}">Lowongan Kerja</a>
            <span>/</span>
            <span>Detail</span>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 30px;">
            <div>
                <span style="display: inline-block; padding: 6px 15px; background: var(--accent-soft); color: var(--accent); border-radius: 50px; font-size: 0.85rem; font-weight: 700; margin-bottom: 15px;">
                    {{ $job->perusahaan }}
                </span>
                <h1 style="margin: 0; line-height: 1.2;">{{ $job->posisi }}</h1>
            </div>
            <div style="display: flex; gap: 15px;">
                <button onclick="window.print()" style="padding: 12px 20px; border-radius: 12px; border: 1px solid #e2e8f0; background: white; cursor: pointer; font-weight: 600;">
                    <i class="fas fa-print"></i> Cetak
                </button>
                <a href="#apply" style="padding: 12px 30px; border-radius: 12px; background: var(--accent); color: white; text-decoration: none; font-weight: 700; box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);">
                    Lamar Sekarang
                </a>
            </div>
        </div>
    </div>
</header>

<section class="section" style="padding-top: 0;">
    <div class="container" style="max-width: 1200px;">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 50px;">
            <!-- Main Content -->
            <div>
                @if($job->images->count() > 0)
                    <div style="margin-bottom: 40px; border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-soft);">
                        <img src="{{ asset('storage/' . $job->images->first()->image_path) }}" alt="{{ $job->posisi }}" style="width: 100%; height: auto; display: block;">
                    </div>
                @endif

                <div style="background: white; padding: 40px; border-radius: 24px; border: 1px solid #f1f5f9; margin-bottom: 40px;">
                    <h3 style="font-size: 1.5rem; margin-bottom: 25px; color: var(--primary); display: flex; align-items: center; gap: 15px;">
                        <i class="fas fa-file-alt" style="color: var(--accent);"></i> Deskripsi & Syarat Pekerjaan
                    </h3>
                    <div style="line-height: 1.8; color: var(--text-dark); font-size: 1.05rem;">
                        {!! nl2br($job->syarat) !!}
                    </div>
                </div>

                <div id="apply" style="background: var(--primary); color: white; padding: 40px; border-radius: 24px; text-align: center;">
                    <h3 style="font-size: 1.5rem; margin-bottom: 15px;">Tertarik dengan posisi ini?</h3>
                    <p style="opacity: 0.8; margin-bottom: 30px; max-width: 500px; margin-left: auto; margin-right: auto;">
                        Pastikan Anda memenuhi kriteria di atas sebelum melakukan pendaftaran. Silakan klik tombol di bawah untuk proses selanjutnya.
                    </p>
                    <a href="#" style="display: inline-flex; align-items: center; gap: 12px; background: var(--accent); color: white; text-decoration: none; padding: 16px 40px; border-radius: 12px; font-weight: 700; font-size: 1.1rem; transition: 0.3s;">
                        Kirim Lamaran <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <div style="background: #f8fafc; padding: 35px; border-radius: 24px; border: 1px solid #f1f5f9; position: sticky; top: 120px;">
                    <h4 style="font-size: 1.1rem; margin-bottom: 25px; color: var(--primary); font-weight: 800; text-transform: uppercase; letter-spacing: 1px;">
                        Informasi Utama
                    </h4>
                    
                    <div style="display: flex; flex-direction: column; gap: 25px;">
                        <div style="display: flex; gap: 15px;">
                            <div style="width: 45px; height: 45px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--accent); box-shadow: 0 4px 10px rgba(0,0,0,0.03);">
                                <i class="fas fa-building"></i>
                            </div>
                            <div>
                                <p style="margin: 0; font-size: 0.8rem; color: var(--text-light); font-weight: 600;">Perusahaan</p>
                                <p style="margin: 0; font-weight: 700; color: var(--primary);">{{ $job->perusahaan }}</p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 15px;">
                            <div style="width: 45px; height: 45px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--secondary); box-shadow: 0 4px 10px rgba(0,0,0,0.03);">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <p style="margin: 0; font-size: 0.8rem; color: var(--text-light); font-weight: 600;">Batas Pendaftaran</p>
                                <p style="margin: 0; font-weight: 700; color: var(--primary);">{{ $job->deadline ? $job->deadline->format('d F Y') : 'N/A' }}</p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 15px;">
                            <div style="width: 45px; height: 45px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #10b981; box-shadow: 0 4px 10px rgba(0,0,0,0.03);">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <p style="margin: 0; font-size: 0.8rem; color: var(--text-light); font-weight: 600;">Status Verifikasi</p>
                                <p style="margin: 0; font-weight: 700; color: #10b981;">Perusahaan Terverifikasi</p>
                            </div>
                        </div>
                    </div>

                    <hr style="margin: 30px 0; border: none; border-top: 1px solid #e2e8f0;">

                    <h4 style="font-size: 1rem; margin-bottom: 20px; color: var(--primary); font-weight: 700;">Bagikan Lowongan</h4>
                    <div style="display: flex; gap: 10px;">
                        <a href="#" style="width: 40px; height: 40px; border-radius: 10px; background: #3b5998; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" style="width: 40px; height: 40px; border-radius: 10px; background: #25d366; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" style="width: 40px; height: 40px; border-radius: 10px; background: #1da1f2; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>

        @if($otherJobs->count() > 0)
            <div style="margin-top: 80px;">
                <h3 style="font-size: 1.8rem; font-weight: 800; color: var(--primary); margin-bottom: 40px;">Lowongan Lainnya</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                    @foreach($otherJobs as $oJob)
                        <div style="background: white; border-radius: 20px; border: 1px solid #f1f5f9; padding: 30px; box-shadow: var(--shadow-soft);">
                            <span style="display: inline-block; padding: 4px 12px; background: var(--accent-soft); color: var(--accent); border-radius: 50px; font-size: 0.75rem; font-weight: 700; margin-bottom: 15px;">{{ $oJob->perusahaan }}</span>
                            <h4 style="margin: 0 0 10px; font-size: 1.2rem;">{{ $oJob->posisi }}</h4>
                            <p style="font-size: 0.85rem; color: var(--text-light); margin-bottom: 20px;">Deadline: {{ $oJob->deadline ? $oJob->deadline->format('d M Y') : 'N/A' }}</p>
                            <a href="{{ route('jobs.show', $oJob->id) }}" style="color: var(--accent); text-decoration: none; font-weight: 700; font-size: 0.9rem;">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
