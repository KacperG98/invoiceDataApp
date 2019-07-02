<!-- showData.blade.php -->

@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <h1>
        Client List
    </h1>
    <hr>
    <table class="table display rounded" id="data-table">
        <thead style="background-color:silver">
            <tr>
                <th>
                    id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Phone
                </th>
                <th>
                    NIP
                </th>
                <th>
                    Expiration <br> Date
                </th>
                <th>
                    PayU id
                </th>
                <th>
                    total price
                </th>
                <th>
                    packages <br>
                    <small>present</small>
                </th>
                <th>
                    Details
                </th>
            </tr>
        </thead>
        {{-- ////////////////////////////DANE//////////////////////////////// --}}
        <tfoot  style="background-color:silver">
            <tr>
                <th>
                    id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Phone
                </th>
                <th>
                    NIP
                </th>
                <th>
                    Expiration <br> Date
                </th>
                <th>
                    PayU id
                </th>
                <th>
                    total price
                </th>
                <th>
                    packages <br>
                    <small>present</small>
                </th>
                <th>
                    Details
                </th>
            </tr>
        </tfoot>
    </table>

    <script type="text/javascript">
    $(document).ready(function(){
        $(function () {
        var table = $('#data-table').DataTable({
            "language": {
                            "processing": null
                        },
            "order": [[ 5, "desc" ]],
            searching: true,
            processing: true,
            serverSide: false,
            ajax: "{!! route('ajax.dataTable') !!}",
            columns: [
                {
                    data: 'id',
                    name: 'id',
                    defaultContent: "Empty Value"
                },
                {
                    data: 'name',
                    name: 'name',
                    defaultContent: "<i>Empty Value</i>"
                },
                {
                    data: 'email',
                    name: 'email',
                    defaultContent: "<i>Empty Value</i>"
                },
                {
                    data: 'phone',
                    name: 'phone',
                    defaultContent: "<i>Empty Value</i>"
                },
                {
                    data: 'vatin',
                    name: 'vatin',
                    defaultContent: "<i>Empty Value</i>"
                },
                {
                    data: 'expiration_date',
                    name: 'expiration_date',
                    defaultContent: ''
                },
                {
                    data: 'transaction_id', 
                    name: 'company_modules_history.transaction_id',
                    defaultContent: ''
                },
                {
                    data: 'total_price', 
                    name: 'company_modules_history.payments.price_total',
                    defaultContent: ''
                },
                {
                    data: 'new_package', 
                    name: 'company_modules.packages.name',
                    defaultContent: '',
                    searchable: true
                },
                {
                    data: 'action', 
                    name: 'action',
                    orderable: false, 
                    searchable: true
                },
            ]
        });
        });
        $('#data-table tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });
    </script>
</div>

@endsection