<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>mogitate</title>
    
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" class="">
</head>
<body>
    <header id="header">
        <h1 class="site-title">
            <img src="{{ asset('images/mogitate.png')}}" alt="" class="">
        </h1>
    </header>
    <main>
        <div class="wrapper">
            <div class="top-content">
                <div class="left">
                    <p>商品一覧 > {{ $product->name}}
                    </p>
                <form action="{{ route('products.update', $product->id) }}" class="" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div    class="item-img">
                        <img src="{{ Storage::url('images/' . $product->image) }}"alt="" class="image">
                        {{--<img src="{{ asset('storage/images/' . $product->image) }}
                    " alt="" class="image">--}}
                    </div>
                    <input type="file" name="image">
                    <p class="error">
                        @error('image')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="right">
                    <label for="" class="tab">商品名</label>
                    <input type="text" class="input" name="name" value="{{ $product->name }}">
                    <p class="error">
                        @error('name')
                        {{$message}}
                        @enderror
                    </p>
                    <label for="" class="tab">値段</label>
                    <input type="text" name="price" class="input" value="{{ $product->price }}" >
                    <p class="error">
                        @error('price')
                        {{$message}}
                        @enderror
                    </p>
                    <label for="" class="radio-btn">
                        季節
                    </label>
                    <label for="" class="seasons-label">
                        @foreach($allSeasons as $season)
                        <input type="checkbox" name="season_id[]" class="season-input"value="{{$season->id}}"{{ in_array($season->id, old('season_id',$product->seasons->pluck('id')->toArray())) ? 'checked' : ''}}
                        >
                        <span class="season-text">{{ $season->name }}</span>
                        @endforeach
                    </label>
                    <p class="error">
                        @error('season_id')
                        {{$message}}
                        @enderror
                    </p>
                </div>
            </div>
            <div class="upper-content">
                <label for="" class="tab">商品説明</label>
                <textarea name="description" id="" >{{ $product->description }}</textarea>
                <p class="error">
                        @error('description')
                        {{$message}}
                        @enderror
                    </p>
            </div>
            <div class="btns">
                <a href="/products" class="back-btn">戻る</a>
                <button class="update-btn">変更を保存</button>
                </form>
                <form action="{{ route('products.delete', $product->id) }}" method="post" >
                    @method('DELETE')
                    @csrf
                    <button class="delete-btn">削除</button>
                </form>
                
            </div>
        </div>