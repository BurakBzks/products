@include('layouts.head')
@include('layouts.footer')

<body>
<div class="container">
    <div class="row">

        <div class="col-10">
            <h2>Ürünler</h2>
                    <a class="btn" style="float: right" href="/products"> Ürün Ekle</a>
            <br/>
         </div>

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Ürün ID</th>
                <th>ÜRÜN ADI</th>
                <th>Stok Adeti</th>
                <th>Oluşturma Zamanı</th>
                <th>İŞLEMLER</th>

            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                @php
                    $productsname=\App\Models\Product::where('id', $stock->product_id)->where('deleted',0)->first();
                @endphp
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$productsname['name']}}</td>
                    <td>{{$stock->pieces}}</td>
                    <td>{{date('d-m-Y', strtotime($stock->created_at))}}</td>
                    <td>
                        <div class="row">
                            <form action="{{URL::route('stockdelete', array('id'=>$stock->id))}}" method="POST">
                                @CSRF
                                <button type="submit" class="btn btn-danger"> SİL </button>
                            </form>
                            <a href="/stockview/{{$stock->id}}" class="edit btn btn-success btn-sm">GÜNCELLE</a>
                        </div>
                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>
    </div>
</div>

</body>










