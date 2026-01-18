<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>mogitate</title>
    
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" class="">
</head>
<body>
    <header id="header">
        <h1 class="site-title">
            <img src="{{ asset('images/mogitate.png')}}" alt="" class="">
        </h1>
    </header>
    <main>
        <div class="wrapper">
            <h2 class="page-title">商品登録</h2>
            <form action="{{route('products.store')}}" method="post"enctype="multipart/form-data">
                @csrf
           
                <label for="" class="tab">商品名<span class="require">必須</span></label>
                <input type="text" class="input" name="name" placeholder="商品を入力" value="{{ old('name') }}">
                <p class="error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
                <label for="" class="tab">値段<span class="require">必須</span></label>
                <input type="text" class="input" name="price" placeholder="値段を入力" value="{{ old('price') }}"><p class="error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </p>
                <label for="" class="tab">商品画像<span class="require">必須</span></label>
                <img src="{{ isset($product) && $product->image ? asset('storage/images/' . $product->image) : ''}}" alt="" class="">
                <input type="file" name="image" class="img">
                <p class="error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </p>
                <label for="" class="radio-btn">
                季節<span class="require">必須</span>
                <span class="selectable">複数選択可</span></label>
                <label for="" class="seasons-label">
                    @foreach($allSeasons as $season)
                
                    <input type="checkbox" name="season_id[]"class="season-input" value="{{$season->id}}"{{ in_Array($season->id, old('season_id', $product->seasons->pluck('id')->toArray())) ? 'checked' : ''}}>
                     <span class="season-text">{{ $season->name }}</span>
                    
                @endforeach
                </label>
                <p class="error">
                    @error('season_id')
                    {{ $message }}
                    @enderror
                </p>
                <!-- </div> -->
                <label for="" class="tab">商品説明<span class="require">必須</span></label>
                <textarea name="description" id=""placeholder="商品の説明を入力" >{{ old('description')}}</textarea>
                <p class="error">
                    @error('description')
                    {{ $message }}
                    @enderror
                </p>
                <div class="btns">
                    <a href="/products"
                     class="back-btn">戻る</a>
                    <button class="register-btn">登録</button>
                </div>
                 </form>
            </div>