@component('mail::message')
# Kepada {{ $pengajuan->nama_pemesan }}

Pengajuan Surat <b>{{ $pengajuan->kategori->nama }}</b> Anda Telah berhasil Diverifikasi oleh Admin.

{{--  @component('mail::button', ['url' => ''])
Login Warga
@endcomponent  --}}

Terimaksih,<br>
@endcomponent
