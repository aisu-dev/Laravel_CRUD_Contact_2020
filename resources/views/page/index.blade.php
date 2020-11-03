@extends('layout.layout')

@section('content')
    <div class="container mt-5 pt-5">
        <h1>
            CONTACT
        </h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>GENDER</th>
                    <th>AGES</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->email}}
                        </td>
                        <td>
                            {{$item->phone}}
                        </td>
                        <td>
                            {{$item->gender}}
                        </td>
                        <td>
                            @php
                                $bday = new DateTime($item['bod']);
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                                printf('%d',$diff->y);
                            @endphp
                        </td>
                        <td>
                            <div class="form-group">
                                <a href="{{url('/edit',$item->id)}}"><button class="btn btn-info" type="submit">EDIT</button></a>
                                <a href="{{url('/delete',$item->id)}}"><button class="btn btn-danger" type="submit">DELETE</button></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
