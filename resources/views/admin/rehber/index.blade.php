@extends('layout-admin')

@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <div class="card">
        <div class="card-header">
            <h5>Rehber Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ad Soyad</th>
                        <th>E Posta</th>
                        <th>Adres</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rehber as $list)
                        <tr>
                            <th scope="row"><img src="{{ $list->image }}" alt="" style=""></th>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->email }}</td>
                            <td>{{ $list->adress }}</td>
                            <td>
                                    <a href="{{ route('rehber.edit', $list->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                    <a href="{{ route('rehber.destroy', $list->id) }}" onclick="return confirm('İşlemi onaylıyormusunuz ?')" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script type="text/javascript">

         $(document).ready(function() {
             $('#example').DataTable({
                 "pagingType": "full_numbers"

             });});
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>

@endsection
