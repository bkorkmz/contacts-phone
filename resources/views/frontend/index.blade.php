@extends('layout-frontend')

@section('meta')
    <title>Telefon rehberi </title>
@endsection

@section('css')
    <link  href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')

    <main class="container">
        <span class="h3 float-left">Telefon rehberi</span>
        <div class="col col-md-10 col-sm-10 ">

            <table id="test" class="display table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">İsim Soyisim</th>
                    <th scope="col">E posta</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Adres</th>
                    @if(Auth::check())
                        @if(Auth()->user()->status=='1')
                            <th scope="col">işlem yap </th>
                        @endif
                    @endif

                </tr>
                </thead>
                <tbody>
                @foreach($liste as $list)
                    <tr>
                        <th ></th>
                        <td>{{ $list->name }}</td>
                        <td>{{ $list->email }}</td>
                        <td>{{ $list->phone }}</td>
                        <td>{{ $list->adress }}</td>
                        @if(Auth::check())
                            @if(Auth()->user()->status=='1')
                                <td>
                                    <a class="btn btn-success" href="{{route('rehber.edit', $list->id)}}">Düzenle <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                    <a class="btn btn-warning" href="{{ route('rehber.destroy', $list->id) }}" onclik="return confirm('Silmek istediğinize eminmisiniz ?')" > Sil<i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                                </td>
                            @endif
                        @endif

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </main>

@endsection

@section('js')


    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#test').DataTable();
        } );
    </script>
@endsection


