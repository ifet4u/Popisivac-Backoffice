@if(session('poruka'))
<x-alert.alert tip="{{session('tip')}}" poruka="{{session('poruka')}}"/>
@endif
