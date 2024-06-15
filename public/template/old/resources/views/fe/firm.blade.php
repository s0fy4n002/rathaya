@extends('fe.layouts.app')
@section('content')
    <section class="pt-10 pb-20 akm-container">
        
        <style>
* {
  box-sizing: border-box;
}

/* Buat dua kolom yang sama yang mengapung di samping satu sama lain */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  
}

/* Hapus floats setelah  columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
        <div class="row">
  <div class="column">
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">
        <h3 class="text-3xl font-semibold mb-8">{{ __('fe03bus.business') }}</h3>
        </div>
  </div>
  <div class="column" style="text-align: right;">
    Sortir : <select type="text" name="sortir" class="form-akm">
                        <option value="1">A to Z</option>
                        <option value="2">Z to A</option>
                    </select>
  </div>
</div>

        <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
            {{-- @for ($i = 0; $i < 9; $i++)
                <a href='/usaha/1' class="card-business">
                    <img src="{{ asset('imgfirms/image1.jpg') }}" alt="">
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 text-lg">Contoh Usaha</h3>
                        <div class="flex flex-col ">
                            <p>Akmal Riyadi</p>
                            <p>Riau, Kepulauan Riau</p>
                        </div>
                    </div>
                </a>
            @endfor --}}
            @foreach ($firms as $firm)
                {{-- <a href='{{route('firms_show',$firm['name_slug'])}}' class="card-business"> --}}
                <a href='{{ __('fe00menu.urlFirm').'/detail/'.$firm['name_slug'] }}' class="card-business">
                    {{-- <img src="{{ asset('imgfirms/image1.jpg') }}" alt=""> --}}
                    <img src="/imgfirms/{{ $firm['photo'] }}" alt="">
                    <div class="p-4">
                        {{-- <h3 class="font-semibold mb-2 text-lg">{{ $firm['name'] }}</h3> --}}
                        <h3 class="font-semibold mb-2 text-lg">{{ $firm->name }}</h3>
                        <div class="flex flex-col ">
                            <p>{{ $firm->pic->name }}</p>
                            <p><small class="">{{ $firm->regency->name }}, {{ $firm->province->name }}</small></p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <br>
        <!-- kalau datanya udah lengkap kode ini bisa di hapus -->
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
            {{-- @for ($i = 0; $i < 9; $i++)
                <a href='/usaha/1' class="card-business">
                    <img src="{{ asset('imgfirms/image1.jpg') }}" alt="">
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 text-lg">Contoh Usaha</h3>
                        <div class="flex flex-col ">
                            <p>Akmal Riyadi</p>
                            <p>Riau, Kepulauan Riau</p>
                        </div>
                    </div>
                </a>
            @endfor --}}
            @foreach ($firms as $firm)
                {{-- <a href='{{route('firms_show',$firm['name_slug'])}}' class="card-business"> --}}
                <a href='{{ __('fe00menu.urlFirm').'/detail/'.$firm['name_slug'] }}' class="card-business">
                    {{-- <img src="{{ asset('imgfirms/image1.jpg') }}" alt=""> --}}
                    <img src="/imgfirms/{{ $firm['photo'] }}" alt="">
                    <div class="p-4">
                        {{-- <h3 class="font-semibold mb-2 text-lg">{{ $firm['name'] }}</h3> --}}
                        <h3 class="font-semibold mb-2 text-lg">{{ $firm->name }}</h3>
                        <div class="flex flex-col ">
                            <p>{{ $firm->pic->name }}</p>
                            <p><small class="">{{ $firm->regency->name }}, {{ $firm->province->name }}</small></p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <br>
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
            {{-- @for ($i = 0; $i < 9; $i++)
                <a href='/usaha/1' class="card-business">
                    <img src="{{ asset('imgfirms/image1.jpg') }}" alt="">
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 text-lg">Contoh Usaha</h3>
                        <div class="flex flex-col ">
                            <p>Akmal Riyadi</p>
                            <p>Riau, Kepulauan Riau</p>
                        </div>
                    </div>
                </a>
            @endfor --}}
            @foreach ($firms as $firm)
                {{-- <a href='{{route('firms_show',$firm['name_slug'])}}' class="card-business"> --}}
                <a href='{{ __('fe00menu.urlFirm').'/detail/'.$firm['name_slug'] }}' class="card-business">
                    {{-- <img src="{{ asset('imgfirms/image1.jpg') }}" alt=""> --}}
                    <img src="/imgfirms/{{ $firm['photo'] }}" alt="">
                    <div class="p-4">
                        {{-- <h3 class="font-semibold mb-2 text-lg">{{ $firm['name'] }}</h3> --}}
                        <h3 class="font-semibold mb-2 text-lg">{{ $firm->name }}</h3>
                        <div class="flex flex-col ">
                            <p>{{ $firm->pic->name }}</p>
                            <p><small class="">{{ $firm->regency->name }}, {{ $firm->province->name }}</small></p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <!-- kalau datanya udah lengkap kode ini bisa di hapus -->
        <br>
<center><span style="background-color: #d1d5db; border-radius: 3px; color: #000; padding: 7px;">PREV</span> <span style="background-color: #d1d5db; border-radius: 3px;; color: #000; padding: 7px;">1</span> <span style="background-color: #d1d5db; border-radius: 3px; color: #000; padding: 7px;">2</span> <span style="background-color: #f16521; border-radius: 3px; color: #fff; padding: 7px;"><b>3</b></span> <span style="background-color: #d1d5db; border-radius: 3px; color: #000; padding: 7px;">4</span> <span style="background-color: #d1d5db; border-radius: 3px; color: #000; padding: 7px;">5</span> <span style="background-color: #d1d5db; border-radius: 3px; color: #000; padding: 7px;">NEXT</span> </span></center>
    </section>

@endsection
