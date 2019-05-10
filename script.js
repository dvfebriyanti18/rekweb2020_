let keyword = document.getElementById('keyword');
let container = document.getElementById('container');
let tombol = document.getElementById('tombol');

tombol.style.display = 'none';

//buat event
keyword.addEventListener('keyup', function() {

	// ajax
	let xhr = new XMLHttpRequest();

	// cek kesiapan ajax
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200) {
			container.innerHTML = xhr.responseText;
		}
	}

	// eksekusi ajax
	xhr.open('get', 'daftar_mobil.php?keyword=' + keyword.value);
	xhr.send();

});