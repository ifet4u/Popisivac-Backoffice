<div class="col-lg-6 col-sm-12 m-0 p-0">

    <div class="card ">
        <div class="card-body m-0 p-1">
            @if($lista)
                <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Kolicina</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($lista as $art)
                        <tr>
                            <th scope="row" class="d-none d-md-table-cell">{{$art->barcode}}</th>
                            <th scope="row" class="d-md-none">{{$art->id}} </th>
                            <td>
                                {{$art->naziv}} <br>
                                <span class="d-md-none text-secondary">{{$art->barcode}}</span></td>
                            <td>{{$art->kolicina}}</td>
                            <td>
                                <button class="btn btn-danger" wire:click="obrisi({{$art->id}})" wire:confirm="Ukloniti artikal {{$art->naziv}} sa liste ?">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div>
                    {{ $lista->links() }} <!-- Linkovi za paginaciju -->
                </div>
            @endif
        </div>
    </div>
</div>
