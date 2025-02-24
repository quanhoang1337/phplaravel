@foreach ($kq as $row)
    {{$row->ten}} <br>
@endforeach

<hr>
@for ($i = 0; $i < count($kq); $i++)
    {{$kq[$i]->ten}}
@endfor

