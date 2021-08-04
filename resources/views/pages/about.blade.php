@include('layouts.head')

@include('inc.navbar')

<div class="container">
    <h1 class="text-center"><?php echo $title; ?></h1>

    {{-- body --}}
    <p>Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Quia minima iure nesciunt, laudantium asperiores voluptas.
        Eaque magni doloribus veniam delectus totam aliquam quo,
        nam tempore praesentium vel voluptatem perferendis labore.</p>
        <h3 class="text-center">Our Mission</h3>
    <div class="row">

        <div class="col-lg-4">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti,
            numquam aspernatur? In odit et excepturi voluptatibus nostrum vero reprehenderit fuga
            voluptatum recusandae maiores accusantium minima,
            maxime eaque deleniti reiciendis omnis.
        </div>
        <div class="col-lg-4">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti,
            numquam aspernatur? In odit et excepturi voluptatibus nostrum vero reprehenderit fuga
            voluptatum recusandae maiores accusantium minima,
            maxime eaque deleniti reiciendis omnis.
        </div>
        <div class="col-lg-4">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti,
            numquam aspernatur? In odit et excepturi voluptatibus nostrum vero reprehenderit fuga
            voluptatum recusandae maiores accusantium minima,
            maxime eaque deleniti reiciendis omnis.
        </div>
    </div>
    <h3 class="text-center">Our top writers</h3>
    <div class="row">
        <div class="col-lg-3">
            <img src="{{asset('/images/team1.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-3">
            <img src="{{asset('/images/team2.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-3">
            <img src="{{asset('/images/team3.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-3">
            <img src="{{asset('/images/team4.jpg')}}" class="img-fluid" alt="">
        </div>
    </div>
    {{-- body --}}

</div>

@include('inc.footer')
