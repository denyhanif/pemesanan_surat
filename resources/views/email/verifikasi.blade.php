@component('mail::message')
# Kepada {{ $pengajuan->nama_pemesan }}

Pengajuan Surat <b>{{ $pengajuan->kategori->nama }}</b> Anda Telah Diverifikasi Silahkan Cek Akun Anda.

@component('mail::button', ['url' => ''])
Login Warga
@endcomponent

Thanks,<br>
Desa Maju Mundur
@endcomponent
