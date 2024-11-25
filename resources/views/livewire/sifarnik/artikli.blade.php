<main id="main" class="main">

    <div class="pagetitle">
        <h1>Artikli</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Artikli</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6 col-sm-12  ">

                <div class="card ">

                    <div class="card-body  ">
                        <h1>Sifarnik Artikala</h1>
                        @if($artikli)
                            <table class="table table-sm table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Naziv</th>
                                    <th scope="text-end">Cena</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($artikli as $art)
                                    <tr>
                                        <th scope="row" >{{$art->id}} </th>
                                        <td>
                                            {{$art->naziv}} <br>
                                            <span class=" text-secondary">{{$art->barcode}}</span></td>
                                        <td class="text-end">{{br($art->cena)}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div>
                                {{ $artikli->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
