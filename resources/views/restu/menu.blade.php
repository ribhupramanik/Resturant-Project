@include("restu.include.header")
@include("restu.include.navbar")



<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->
@if (Session::has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
        </div>


        @if (isset($catagory))




        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                @foreach ($catagory as $cata_all)
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{$loop->first ? 'active' : ''}}" data-bs-toggle="pill" href="#tab-{{$cata_all->id}}">
                        <i class="fa fa-coffee fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Popular</small>
                            <h6 class="mt-n1 mb-0">{{$cata_all->CatagoryName}}</h6>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        @endif
        @if (isset($all))

        <div class="tab-content">
            @foreach ($catagory as $cata_all)
            <div id="tab-{{$cata_all->id}}" class="tab-pane fade show p-0 {{$loop->first ? 'active' : ''}}">
                <div class="row g-4">
                @foreach ($all as $row)
                @if($cata_all->id == $row->CatagoryId)
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid rounded" src="{{$row->image}}" alt="" style="width: 80px;">
                            <div class="w-100 d-flex flex-column text-start ps-4">
                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                    <span>{{$row->FoodName}}</span>
                                    <span class="text-primary">Rs{{$row->Price}}</span>
                                </h5>
                                <small class="fst-italic">{{$row->Description}}</small>
                                <a href="javascript:void(0);" onclick="addToCart('{{$row->id}}');"><button class="btn btn-outline-primary mt-2"><i class="bi bi-cart"></i> Add to Cart</button></a>
                            </div>
                            
                        </div>
                    </div>
                    @endif
                @endforeach
                    
                </div>
            </div>
            @endforeach

        </div>



        <!-- <div class="tab-content">
            @foreach ($all as $row)


            <div id="{{$row->CatagoryId}}" class="tab-pane fade show p-0 {{$loop->first ? 'active' : ''}}">
                <div class="row g-4">

                    <div class="col-lg-6">
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid rounded" src="{{$row->image}}" alt="" style="width: 80px;">
                            <div class="w-100 d-flex flex-column text-start ps-4">
                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                    <span>{{$row->FoodName}}</span>
                                    <span class="text-primary">{{$row->Price}}</span>
                                </h5>
                                <small class="fst-italic">{{$row->Description}}</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div> -->
        @endif

    </div>
</div>
<!-- Menu End -->

@include("restu.include.footer")


<script type="text/javascript">
    function addToCart(id){
        $.ajax({
            
            url: '{{"/add-to-cart"}}',
            type: 'post',
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                id:id},

            dataType: 'json',
            success: function(response){
                if(response.status==true){
                    window.location.href="{{url('/cart')}}"
                }else{
                    alert(response.message);
                }
            }
        })
    }

</script>

