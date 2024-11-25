<x-layouts.app>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{$firma}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
            <livewire:import.sync/>
        </div>

        <section class="section dashboard">

            <div class="row">
                @foreach($listapopisa as $popis)
                    <livewire:widget.popis id="{{$popis->id}}" />
                @endforeach
            </div>
        </section>

    </main>

</x-layouts.app>
