@component('mail::message')
# Kepada {{ $pengajuan->nama_pemesan }}

Pengajuan Surat <b>{{ $pengajuan->kategori->nama }}</b> Anda Telah Jadi Silahkan Di Ambil Di Kelurahan.

{{--  @component('mail::button', ['url' => ''])
Button Text
@endcomponent  --}}

Thanks,<br>
Desa Maju Mundur
@endcomponent
