@extends('layouts.app')

@section('content')
    <div class="jumbotron">
    <h1>{{$companiesDetails['name']}}</h1>
        <h2>id. {{$companiesDetails['id']}}</h2><small>{{'email: '.$companiesDetails['email'].' || phone: '.$companiesDetails['phone']}}</small>
    <p><b><i>
        Address: {{$companiesDetails['main_address_street'].'/'.$companiesDetails['main_address_number'].', '.$companiesDetails['main_address_zip_code'].', '.$companiesDetails['main_address_city'].', '.$companiesDetails['main_address_country']}}
    </i></b></p>
        <hr size="20" class="bg-dark">
        <h3>Company Modules</h3>
        <table class="table">
            <tr style="background-color:silver">
                <th scope="col">id</th> 
                <th scope="col">name</th> 
                <th scope="col">module_id</th> 
                <th scope="col">package_id</th> 
                <th scope="col">expiration_date</th> 
                <th scope="col">value</th> 
                <th scope="col">slug</th>
            </tr>
            @foreach ($companiesDetails->companyModules as $Module)
                <tr>
                    <td>{{$Module['id']}}</td>
                    <td>{{$Module->module->name}}</td>
                    <td>{{$Module['module_id']}}</td>
                    <td>{{$Module['package_id']}}</td>
                    <td>{{$Module['expiration_date']}}</td>
                    <td>{{$Module['value']}}</td>
                    <td>{{$Module->module->slug}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection