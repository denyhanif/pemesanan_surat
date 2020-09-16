
@foreach(json_decode($kategori->data_template,true)['nama'] as $data)
@php
    $data=json_decode($kategori->data_template,true);
    $tess= $loop->index;                               
    @endphp
    @if($data['type'][$loop->index]=="string")
    <div class="form-group col-md-6">
                <label for="inputEmail4">{{ str_replace('_',' ',$data['nama'][$tess]) }}</label>
                <input type="text" name="{{ $data['nama'][$tess] }}" class="form-control" id="inputEmail4">
    </div>
    @elseif($data['type'][$loop->index]=="date")
    <div class="form-group col-md-6">
                <label for="date">{{ str_replace('_',' ',$data['nama'][$tess]) }}</label>
                <input type="date" name="{{ $data['nama'][$tess] }}" class="form-control" id="date">
    </div>
    @elseif($data['type'][$loop->index]=='numeric')
    
    <div class="form-group col-md-6">
                <label for="date">{{ str_replace('_',' ',$data['nama'][$tess]) }}</label>
                <input type="number" name="{{ $data['nama'][$tess] }}" class="form-control" id="date">
    </div>
    @endif
        
    

@endforeach