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
                <!-- <button class="reset-btn">リセット</button> -->
                
            </div>
            <div class="right">
                <button class="add-btn">商品を追加</button>
                <div class="item-list">
                    <!-- 1 -->
                     @foreach($products as $product)
                    <div class="item">
                        <a href="" class="">
                            <img src="{{ asset('storage/images/' .$product->image) }}" alt="">
                        <!-- <img src="{{asset('../storage/images/muscat.png') }}" alt="" class=""> -->
                            <div class="info">
                            <span class="name">{{ $product->name}}</span>
                            <span class="price">{{ '￥' . $product->price}}</span>
                        </div>   
                        </a>
                            
                        
                    </div>
                    @endforeach
                   
                </div>
               <div class="pagination">
                      {{ $products->links('vendor.pagination.default') }}
                    
                </div> 
            </div>
 
        </div>
        
    </main>
    


</body>
</html>