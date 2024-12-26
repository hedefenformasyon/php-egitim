@extends('layouts.app')
@section('title')
    @lang('klinikler.title')
@endsection
@section('content')
        
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">@lang('klinikler.title')</h4>

                    @if (isset($new))

                        <form action="{{route('klinik.ekle')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>@lang('klinikler.ad')</label>
                                <input type="text" class="form-control" name="ad" value="{{old('ad') ?? ''}}" placeholder="@lang('klinikler.ad')">
                                @error('ad')
                                    <div class="badge badge-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('klinikler.telefon')</label>
                                <input type="text" class="form-control" name="telefon" value="{{old('telefon') ?? ''}}" placeholder="@lang('klinikler.telefon')">
                                @error('telefon')
                                    <div class="badge badge-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('klinikler.adres')</label>
                                <textarea name="adres" class="form-control" rows="10" placeholder="@lang('klinikler.adres')">{{old('adres') ?? ''}}</textarea>
                                @error('adres')
                                    <div class="badge badge-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success w-100">Kaydet</button>
                        </form>

                    @elseif(isset($klinik))
                        <form action="{{route('klinik.guncelle_post')}}" method="POST">
                            @csrf
                            <input type="hidden" name="klinik_id" value="{{$klinik['klinik_id']}}">
                            <div class="form-group">
                                <label>@lang('klinikler.ad')</label>
                                <input type="text" class="form-control" name="ad" value="{{$klinik['ad']}}" placeholder="@lang('klinikler.ad')">
                            </div>
                            <div class="form-group">
                                <label>@lang('klinikler.telefon')</label>
                                <input type="text" class="form-control" name="telefon" value="{{$klinik['telefon']}}" placeholder="@lang('klinikler.telefon')">
                            </div>
                            <div class="form-group">
                                <label>@lang('klinikler.adres')</label>
                                <textarea name="adres" class="form-control" rows="10" placeholder="@lang('klinikler.adres')">{{$klinik['adres']}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Kaydet</button>
                        </form>

                    @elseif(isset($klinik_sil))

                        <form action="{{route('klinik.sil_post')}}" method="POST">
                            @csrf
                            <input type="hidden" name="klinik_id" value="{{$klinik_sil['klinik_id']}}">
                            <p>{{$klinik_sil['ad']}} adlı klinik silinecek, emin misiniz?</p>

                            <button type="submit" class="btn btn-danger w-100">Evet</button>
                            <a href="{{route('klinik.index')}}" class="btn btn-success w-100 mt-2">Hayır</a>
                        </form>

                    @else


                        <a href="{{route('klinik.add')}}" class="btn btn-success">Klinik Ekle</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>@lang('klinikler.no')</th>
                                    <th>@lang('klinikler.ad')</th>
                                    <th>@lang('klinikler.adres')</th>
                                    <th>@lang('klinikler.telefon')</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($klinik_data as $item)
                                        <tr>
                                            <td>{{ $item['klinik_id'] }}</td>
                                            <td>{{ $item['ad'] }}</td>
                                            <td>{{ $item['adres'] }}</td>
                                            <td>{{ $item['telefon'] }}</td>
                                            <td>
                                                <a href="{{ route('klinik.sil',['id' => $item['klinik_id']]) }}" class="btn btn-danger btn-sm mr-2">Sil</a>
                                                <a href="{{ route('klinik.guncelle',['id' => $item['klinik_id']]) }}" class="btn btn-warning btn-sm">Güncelle</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                        @isset($success)
                            @if ($success == 1)
                                <div class="badge badge-success">Başarıyla eklendi.</div>
                            @elseif ($success == 2)
                                <div class="badge badge-success">Başarıyla silindi.</div>
                            @elseif ($success == 3)
                                <div class="badge badge-success">Başarıyla güncellendi.</div>
                            @endif
                        @endisset
                        


                    @endif

                  
                  



                </div>
              </div>
            </div>
           
          </div>
@endsection