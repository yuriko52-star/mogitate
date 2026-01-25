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
        
        <div class="upper">
                <h2 class="page-title">
                    @if(isset($keyword) && $keyword !== '')
                    "{{$keyword}}"の商品一覧
                    @else
                    商品一覧
                    @endif
                </h2>
                <a href="/products/register" class="add-btn">商品を追加</a>
        </div>
        <div class="wrapper">
            <div class="left">
                <form action="/products/search" method="get">
                    @csrf
                    <input type="text" name="keyword"class="search-input" placeholder="商品名で検索" value="{{ old('keyword') }}">
                    <button class="search-btn">検索</button>
                
                <div class="select-box">
                <h3 class="tab">価格順で表示</h3>
                <select name="sort" id="sort" class="select">
                    <option value="" >価格で並び替え</option>
                    <option value="high"{{ ($sort ?? '') === 'high' ? 'selected' : ''}}>高い順に表示</option>
                    <option value="low"{{($sort ?? '') === 'low' ? 'selected' : ''}}>低い順に表示</option>
                </select>
                
                </form>
                @if(isset($sort) && $sort !== '')
                <div class="reset-btn">
                    <p class="searched-data">
                        @if($sort === 'high')
                            高い順に表示
                        @elseif($sort === 'low')
                            低い順に表示
                        @endif
                    </p>
                    <div class="close-btn">
                        <a href="/products" class="">
                            <img src="{{ asset('images/Frame 339 (1).png') }}" alt="" class="close-icon">
                        </a>
                    </div>
                </div>
                @endif
                </div>
            </div>
            <div class="right">
                
                <div class="item-list">
                    <!-- 1 -->
                     @foreach($products as $product)
                    <div class="item">
                        <a href="{{ route('products.show', ['productId' => $product->id]) }}" class="">
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
                      {{ $products->appends(request()->query())->links('vendor.pagination.default') }}
                    
                </div> 
            </div>
 
        </div>
        
    </main>
    


</body>
</html>