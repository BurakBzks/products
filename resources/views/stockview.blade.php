@include('layouts.head')
@include('layouts.footer')

<body>
<div class="container">
    <div class="row">
        <h2>Stok Güncelle</h2><br/>
        <div class="col-10">
            <a class="btn" style="float: right" href="/anasayfa"> Geri Dön</a>
        </div>

        <div class="col-10">
            <form action="{{ URL::route('stockupdate', array('id'=>$stock->id))}}" method="Post">
                @CSRF
                <label for="productname">Ürün Adı:</label>
                <input type="text" name="name" id="name" value="{{$product->name}}"><br>
                <label for="stockpieces">Stok Adeti:</label>
                <input type="number" name="stockpieces" id="stockpieces" value="{{$stock->pieces}}"><br>
                <button type="submit" style="margin-left: 1rem;"> Güncelle</button>
            </form>


        </div>
    </div>
</div>

</body>










