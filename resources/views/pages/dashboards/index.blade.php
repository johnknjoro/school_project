<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection


    @if (Auth::user()->hasRole('administrator'))
    administrator

    @endif

    @if (Auth::user()->hasRole('student'))
student

    @endif

    @if (Auth::user()->hasRole('lecturer'))


    @endif



</x-default-layout>
