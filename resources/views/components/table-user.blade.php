@props(['users'])
@foreach ($users as $user)
<tr>
    <td>{{$user['id']}}</td>
    <td>{{$user['nom']}}</td>
    <td>{{$user['metier']}}</td>
</tr>
@endforeach