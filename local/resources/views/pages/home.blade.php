@extends('welcome')
@section('title','Home')
@section('content')
    <div class="row list-product">
        <div class="col-md-12">
            <div class="clearfix"></div>
            <h3>Sản phẩm mới</h3>
            @foreach($newPro as $new)
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-3 text-center post">
                    <a href="#"><img width="100%" height="300px" src="{{asset('public/admin/product/'.$new->pro_img)}}"></a>
                    <p><a href="#">{{$new->pro_name}}</a></p>
                    <span>{{number_format($new->pro_price,0,',','.')}} VND</span>
                    <div class="hover col-xs-12 col-sm-12 col-md-12">
                        <p><a href="{{asset('chi-tiet/'.$new->id.'/'.$new->pro_slug)}}.html">Xem chi tiết</a></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row list-product">
        <div class="col-md-12">
            <div class="clearfix"></div>
            <h3>Sản phẩm đặc biệt</h3>
            @foreach($specPro as $spec)
                <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-3 text-center post">
                    <a href="#"><img width="100%" height="300px" src="{{asset('public/admin/product/'.$spec->pro_img)}}"></a>
                    <p><a href="#">{{$spec->pro_name}}</a></p>
                    <span>{{number_format($spec->pro_price,0,',','.')}} VND</span>
                    <div class="hover col-xs-12 col-sm-12 col-md-12">
                        <p><a href="{{asset('chi-tiet/'.$spec->id.'/'.$spec->pro_slug)}}.html">Xem chi tiết</a></p>
                    </div>
                </div>
            @endforeach
        </div>  
    </div>
@stop
