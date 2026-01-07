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
                    <p>商品一覧 > 果物
                    <div    class="item-img">
                        <img src="
                    " alt="" class="">
                    </div>
                    <input type="file" class="">
                </div>
                <div class="right">
                    <label for="" class="tab">商品名</label>
                    <input type="text" class="input">
                    <label for="" class="tab">値段</label>
                    <input type="text" class="input">
                    <label for="" class="radio-btn">
                        季節
                    </label>
                    <input type="radio" class="radio-inputs">
                </div>
            </div>
            <div class="upper-content">
                <label for="" class="tab">商品説明</label>
                <textarea name="description" id="" ></textarea>

            </div>
            <div class="btns">
                <button class="back-btn">戻る</button>
                <button class="update-btn">変更を保存</button>
                <button class="delete-btn">削除</button>
            </div>
        </div>