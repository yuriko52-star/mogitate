<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>mogitate</title>
    
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="{{ asset('css/list.css') }}" class="">
</head>
<body>
    <header id="header">
        <h1 class="site-title">
            <img src="{{ asset('images/mogitate.png')}}" alt="" class="">
        </h1>
    </header>
    <main>
        <div class="wrapper">
           
            <div class="left">
                <h2 class="page-title">商品一覧</h2>
                <input type="text" class="search-input" placeholder="商品名で検索">
                <button class="search-btn">検索</button>
                <h3 class="">価格順で表示</h3>
                <select name="" id="" class="select">
                    <option value="">価格で並び替え</option>
                    <option value="">高い順に表示</option>
                    <option value="">低い順に表示</option>
                </select>
                <button class="reset-btn">リセット</button>
            </div>
            <div class="right">
                <button class="add-btn">商品を追加</button>
                <div class="item-list">
                    <!-- 1 -->
                    <div class="item">
                        <a href="" class="">
                        <img src="{{asset('../storage/images/muscat.png') }}" alt="" class="">
                            <div class="info">
                            <span class="name">シャインマスカット</span>
                            <span class="price">￥1400</span>
                        </div>   
                        </a>
                            
                        
                    </div>
                    <!-- 2 -->
                    <div class="item">
                        <img src="{{asset('../storage/images/strawberry.png') }}" alt="" class="">
                        <div class="info">
                            <p class="name">ストロベリー</p>
                            <p class="price">￥1200</p>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="item">
                        <img src="{{asset('../storage/images/peach.png') }}" alt="" class="">
                        <div class="info">
                            <p class="name">ピーチ</p>
                            <p class="price">￥1000</p>
                        </div>
                    </div>
                    <!-- 4 -->
                    <div class="item">
                        <img src="{{asset('../storage/images/orange.png') }}" alt="" class="">
                        <div class="info">
                            <p class="name">オレンジ</p>
                            <p class="price">￥850</p>
                        </div>
                    </div>
                    <!-- 5 -->
                    <div class="item">
                        <img src="{{asset('../storage/images/kiwi.png') }}" alt="" class="">
                        <div class="info">
                            <p class="name">キウイ</p>
                            <p class="price">￥800</p>
                        </div>
                    </div>
                    <!-- 6 -->
                    <div class="item">
                        <img src="{{asset('../storage/images/watermelon.png') }}" alt="" class="">
                        <div class="info">
                            <p class="name">スイカ</p>
                            <p class="price">￥700</p>
                        </div>
                    </div>
                    <!-- 7 -->
                    <div class="item">
                        <img src="{{asset('../storage/images/banana.png') }}" alt="" class="">
                        <div class="info">
                            <p class="name">バナナ</p>
                            <p class="price">￥600</p>
                        </div>
                    </div>
                    <!-- 8 -->
                    <div class="item">
                        <img src="{{asset('../storage/images/grapes.png') }}" alt="" class="">
                        <div class="info">
                            <p class="name">ブドウ</p>
                            <p class="price">￥1100</p>
                        </div>
                    </div>
                    <!-- 9 -->
                    <div class="item">
                        <img src="{{asset('../storage/images/melon.png') }}" alt="" class="">
                        <div class="info">
                            <p class="name">メロン</p>
                            <p class="price">￥900</p>
                        </div>
                    </div>
                    <!-- 10 -->
                    <div class="item">
                        <img src="{{asset('../storage/images/pineapple.png') }}" alt="" class="">
                        <div class="info">
                            <p class="name">パイナップル</p>
                            <p class="price">￥800</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    


</body>
</html>