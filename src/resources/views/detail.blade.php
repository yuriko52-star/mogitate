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
                </div>
                <div class="right">
                    <label for="" class="tab">商品名</label>
                    <input type="text" class="input" name="name" value="{{ $product->name }}">
                    <label for="" class="tab">値段</label>
                    <input type="text" name="price" class="input" value="{{ $product->price }}" >
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
                </div>
            </div>
            <div class="upper-content">
                <label for="" class="tab">商品説明</label>
                <textarea name="description" id="" >{{ $product->description }}</textarea>

            </div>
            <div class="btns">
                <a href="/products" class="back-btn">戻る</a>
                <button class="update-btn">変更を保存</button>
                </form>
                <button class="delete-btn">削除</button>
            </div>
        </div>