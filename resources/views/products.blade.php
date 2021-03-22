@include('layouts.head')
@include('layouts.footer')

<body>
<div class="container">
    <div class="row">
        <h2>ÜRÜNLER</h2><br/>
        <div class="col-10">
            <a class="btn" style="float: right" href="/anasayfa"> Geri Dön</a>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>{{__('Product ID')}}</th>
                <th>ÜRÜN ADI</th>
                <th>Oluşturma Tarihi</th>
                <th>Silinme Tarihi</th>
                <th>İşlemler</th>

            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{date('d-m-Y', strtotime($product->created_at))}}</td>
                    <td>
                        @if($product->deleted_at!= "")
                            {{date('d-m-Y', strtotime($product->deleted_at))}}
                        @endif
                    </td>
                    <td>

                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>
        <div class="col-10">
            <form action="{{route('productCreate')}}" method="Post">
                @CSRF
                <label for="productname">Ürün Adı:</label>
                <input type="text" name="name" id="name"><br>
                <label for="stockpieces">Stok Adeti:</label>
                <input type="number" name="stockpieces" id="stockpieces"><br>
                <button type="submit" style="margin-left: 1rem;"> Ekle</button>
            </form>


        </div>
    </div>
</div>

</body>










