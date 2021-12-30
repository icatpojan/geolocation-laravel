<form action="{{route('nexmo.submit')}}" method="POST">

{{ csrf_field() }}


<label for="hp">Masukkan No. HP *</label>


<input type="number" name="no_hp" id="hp" placeholder="Masukkan No. HP" required>

<label for="pesan">Masukkan Pesan</label>

<input type="text" name="pesan" id="pesan" placeholder="Masukkan Pesan"  required>

<button name="submit" type="submit">Kirim Pesan</button>

</form>
<br>
<small>untuk fitur gratis hanya bisa mengirim smms ke nomer yang sudah di register di nexmo</small>
