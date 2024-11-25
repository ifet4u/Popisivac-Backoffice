@props([
    'tip'    => 'success'
])
@if(session('poruka'))
<div class="alert alert-important alert-{{$tip}} alert-dismissible" role="alert">
    <div class="d-flex">
        <div>
            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
            @if($tip == 'success')
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                     viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
            @elseif($tip == 'danger')
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-alert-circle">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/>
                    <path d="M12 8v4"/>
                    <path d="M12 16h.01"/>
                </svg>
            @elseif($tip == 'info' )
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-info-square-rounded">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 9h.01"/>
                    <path d="M11 12h1v4h1"/>
                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"/>
                </svg>
            @endif
        </div>
    </div>
</div>
@endif
